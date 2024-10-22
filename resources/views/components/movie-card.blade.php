@props(['title', 'year', 'rating', 'image'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h1 class="font-bold text-lg">{{ $title }}</h1>
    <img src="{{asset( 'images/movies/' .$image)}}" alt="{{$title}}">
    <p class="text-gray-600">({{ $year }})</p>
    <p class="text-gray-800 mt-4">({{ $rating }})</p>
</div>