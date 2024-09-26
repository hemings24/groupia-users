<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card-body">
                       @if($people->count()==0)
                          <p>No records for current user</p>
                       @else
                          <table class="table table-bordered table-striped">
                             <thead>
                                <tr>
                                   <th>Name</th>
                                   <th>Age</th>
                                   <th>Image</th>
                                </tr>
                             </thead>
                             <tbody>
                                @foreach($people as $person)
                                   <tr>
                                      <td>{{$person->name}}</td>
                                      <td>{{$person->age}}</td>
                                      <td><img src="{{$person->photo}}" width="100px" height="70px" alt="{{$person->photo}}"></td>
                                   </tr>
                                @endforeach
                             </tbody>
                          </table>
                          {{$people->withQueryString()->links()}}
                       @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>