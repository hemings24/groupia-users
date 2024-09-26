<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PersonController extends Controller
{
   public function __construct()
   {
      $this->middleware(['auth','verified']);
   }

   public function index()
   {
      $url = 'http://personator.nmxldev.com';
      $response = file_get_contents($url);
      $apidata = json_decode($response,false);

      $person = new Person;
      $person->name = $apidata->data->first_name." ".$apidata->data->surname;
      $person->age = $apidata->data->age;
      $person->photo = $apidata->data->photo->full_url;
      $person->user_id = Auth::user()->id;
      $person->save();

      return view('dashboard', ['person'=>$apidata->data]);
   }

   function history()
   {
      $people = Person::latest()->where('user_id',Auth::user()->id)->paginate(5);

      return view('history', compact('people'));
   }

   function reset()
   {
      $peoplecount = Person::where('user_id',Auth::user()->id)->count();

      return view('reset', compact('peoplecount'));
   }

   public function destroy()
   {
      Person::where('user_id',Auth::user()->id)->delete();
      
      return redirect()->back()->with('status','All Records Deleted');
   }
}