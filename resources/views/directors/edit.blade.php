<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Director') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Edit New Director:</h3>
                    
                    <x-director-form
                    :action="route('directors.update', $director)"
                    :method="'PATCH'"
                    :director="$director"
                    />
                 
                </div>
            </div>
        </div>
    </div>
   
</x-app-layout>
