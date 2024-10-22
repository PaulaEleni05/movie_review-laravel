@props(['title', 'year', 'rating', 'image'])

{{-- Movie Details Componets --}}

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto"></div>
<h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{ $title }}</h1>
<div class="overflow-hidden rounded-lg mb-4 flex justify-center">
    <img src="{{asset( 'images/movies/' .$image)}}" alt="{{$title}}" class="w-full max-w-xs h-auto object-cover">
</div>

<h2 class="text-black-500 text-sm italic mb-4" style="font-size: 1rem;">Realsed: ({{ $year }})</h2>
<h3 class="text-black-500 text-sm italic mb-4" style="font-size: 1rem;">({{ $rating }})</h3>