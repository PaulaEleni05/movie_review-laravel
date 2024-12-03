@props(['action', 'method', 'director'])

<div>
    <form action="{{$action}}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @if($method ==='PUT'|| $method === 'PATCH')
        @method($method)   
        @endif
        
        <div class="mb-4">
            <label for="name" class="block text-sm text-gray-700">Name</label>
            <input type="text"
            name="name"
            id="name"
            value="{{old('name',$director->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('title')
        <p class="txt-sm text-red-600">{{$message}}</p>
        @enderror
        </div>


        <div class="mb-4">
            <label for="bio" class="block text-sm text-gray-700">Bio</label>
            <input type="text"
            name="bio"
            id="bio"
            value="{{old('bio',$director->bio ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
        @error('bio')
        <p class="txt-sm text-red-600">{{$message}}</p>
        @enderror
        </div>


        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Director Image</label>
            <input 
            type="file"
            name="image"
            id="image"
            {{isset($director)? '':'required'}}
            class="mt-1 block w-full border-fray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('image')
        <p class="txt-sm text-red-600">{{$message}}</p>
        @enderror
        </div>


        @isset($director->image)
        <div class="mb-4">
            <img src="{{asset($director->image)}}" alt="Director Image" class="w-24 h-32 object-cover">
        </div>
        @endisset


<div> 
    <x-primary-button> 
    {{isset ($director) ?'Update Director': 'Add Director'}}
    </x-primary-button> 
</div>    
    </form>