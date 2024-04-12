<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un post') }}
        </h2>
    </x-slot>

    <section class="max-w-7xl mx-auto pt-5 sm:pt-5 sm:px-6 lg:px-8">

        <form class="w-full max-w-lg px-8 pt-6 pb-8 mb-4" action="{{ route('updatepost', $post->id) }}" method="post">
        

            @csrf
            @method('PUT')

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="modif-post-title">
                        Titre du post
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="modif-post-title" type="text" name="title" value="{{$post->title}}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="modif-post-description">
                        Description
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="modif-post-description" type="text" name='description' value="{{$post->description}}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="modif-post-content">
                        Contenu du post
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="modif-post-content" type="text" name='content' value="{{$post->content}}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="modif-post-photo-url">
                        URL de la photo illustrant le post
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="modif-post-photo-url" type="text" name='image' value="{{$post->image}}">
                </div>
            </div>

            @if ($categories)
                <fieldset class="flex flex-wrap -mx-3 mb-6">
                    <legend class=" w-full px-3 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Choisir la ou les catégories liées au post:</legend>
                    @foreach ($categories as $category)
                        <div class="px-3">
                            <input type="checkbox" id="{{$category->name}}" name="category_id[]" value="{{$category->id}}"/>
                            <label for="{{$category->name}}" class=" w-full px-3">{{$category->name}}</label>
                        </div>
                    @endforeach
                </fieldset>  
            @endif
        
            <input class="shadow focus:shadow-outline focus:outline-none font-bold py-2 px-4 uppercase tracking-wide text-gray-700 text-xs mb-2 rounded" type="submit">
            
        </form> 
    </section>


</x-app-layout>