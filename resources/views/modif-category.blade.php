<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier une catégorie') }}
        </h2>
    </x-slot>

    <section class="max-w-7xl mx-auto pt-5 sm:pt-5 sm:px-6 lg:px-8">

        <form class="w-full max-w-lg px-8 pt-6 pb-8 mb-4" action="{{ route('updatecategory', $category->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        Nom de la catégorie
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" type="text" name="name" value="{{$category->name}}">
                </div>
            </div>
        
            <input class="shadow focus:shadow-outline focus:outline-none font-bold py-2 px-4 uppercase tracking-wide text-gray-700 text-xs mb-2 rounded" type="submit">
            
        </form> 
    </section>


</x-app-layout>