@props(['name', 'image', 'bio'])

{{-- Director Details Components --}}

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto">
<h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{ $name}}</h1>
<div class="overflow-hidden rounded-lg mb-4 flex justify-center">
    <img src="{{asset( 'images/directors/' .$image)}}" alt="{{$name}}" class="w-full max-w-xs h-auto object-cover">
</div>
</div>
<h2 class="text-black-500 text-sm italic mb-4" style="font-size: 2rem;">{{ $bio}}</h2>