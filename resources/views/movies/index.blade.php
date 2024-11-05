<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Movies') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>




    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Movies:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($movies as $movie)
                        <div>
                        <a href="{{ route('movies.show', $movie) }}"> 
                         <x-movie-card
                         :title="$movie->title"
                         :year="$movie->year"
                         :rating="$movie->rating"
                         :image="$movie->image"
                        />
                        </a>
                        <div class="mt-4 flex space-x-2"> 
                            <a href="{{ route('movies.edit', $movie) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                Edit
                            </a>
    
    
                            <form action="{{ route('movies.destroy', $movie) }}" method="POST" onsumbit="return confirm('Are you sure you want to delete this movie?');">
                                @csrf
                                @method('DELETE')
                                <button type="sumbit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    
                    </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>








