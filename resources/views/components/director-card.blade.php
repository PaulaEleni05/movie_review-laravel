@props(['name', 'image', 'bio'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h1 class="font-bold text-lg">{{ $name }}</h1>
    <img src="{{asset( 'images/directors/' .$image)}}" alt="{{$name}}">
    <p class="text-gray-800 mt-4">{{ $bio }}</p>


</div>