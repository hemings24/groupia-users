<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card-body">
                       @if($peoplecount==0)
                          <p>No records for current user</p>
                       @else
                          <p class="my-3">Total to Delete: {{$peoplecount}}</p>
                          <form action="{{route('delete')}}" method="post">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-lg btn-danger">Delete</button>
                          </form>
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>