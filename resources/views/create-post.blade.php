<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>

    <section class="max-w-7xl mx-auto pt-5 sm:pt-5 sm:px-6 lg:px-8">

        <form class="w-full max-w-lg px-8 pt-6 pb-8 mb-4" action="{{ route('storepost') }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('POST')

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                        Titre du post
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="title" type="text" name="title">
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                        Description
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" type="text" name='description'>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="content">
                        Contenu du post
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="content" type="text" name='content'>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="photo-url">
                        Photo illustrant le post
                    </label>
                    <input id="image" type="file" name='imageinput'>
                </div>
            </div>

            
            @if ($categories)
                <fieldset class="flex flex-wrap -mx-3 mb-6">
                    <legend class=" w-full px-3 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Choisir la ou les catégories liées au post:</legend>
                    @foreach ($categories as $category)
                        <div class="px-3">
                            <input type="checkbox" id="{{$category->name}}" name="category_id[]" value="{{$category->id}}"/>
                            <label for="{{$category->name}}" class=" w-full px-3 text-gray-700">{{$category->name}}</label>
                        </div>
                    @endforeach
                </fieldset>  
            @endif

            <input class="shadow focus:shadow-outline focus:outline-none font-bold py-2 px-4 uppercase tracking-wide text-gray-700 text-xs mb-2 rounded" type="submit">
            
        </form>
        
    </section>


</x-app-layout>