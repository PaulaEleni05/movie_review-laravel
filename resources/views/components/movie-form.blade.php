@props(['action', 'method'])

<form action="{{$action}}" method="POST" enctype="multipart/form-data"> 
@csrf
@if($method ==='PUT'|| $method === 'PATCH')
@method($method)   
@endif


<div class="mb-4">
    <label for="title" class="block text-sm text-gray-700">Title</label>
    <input type="text"
    name="title"
    id="title"
    value="{{old('title',$movie->title ??) }}"
    required
    class="mt-1 block w-full border-fray-300 rounded-md shadow-sm"/>
@error('title')
<p class="txt-sm text-red-600">{{$message}}</p>
@enderror
</div>


<div class="mb-4">
    <label for="title" class="block text-sm font-medium text-gray-700">Movie Poster Image</label>
    <input 
    type="file"
    name="image"
    id="image"
    {{isset($movie)? ":'required'"}}
    class="mt-1 block w-full border-fray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
@error('image')
<p class="txt-sm text-red-600">{{$message}}</p>
@enderror
</div>

@isset($movie->image)
<div class="mb-4">
    <img src="{{asset($movie->image)}}" alt="Movie Poster" class="w-24 h-32 object-cover">
</div>
@endisset









</form>