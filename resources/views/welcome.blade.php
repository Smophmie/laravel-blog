@include("layouts.front.head")
@include("layouts.front.header")

    <main class="mt-6 rounded-lg">
        <div class="flex flex-col gap-2 lg:gap-2">
            
            @if ($categories)
                <div class="m-3 flex flex-row flex-wrap rounded-lg bg-white gap-2 p-6">
                    <form action="{{route('welcome')}}" method="GET">
                        <fieldset class="flex flex-col gap-4">
                            <div>
                                <legend class="text-xl font-semibold text-black">Catégories :</legend>
                            </div>
                            <div class="flex flex-row gap-4">
                                @foreach($categories as $category)
                                    <div> 
                                        <input type="checkbox" id="{{$category['name']}}" name="category_id[]" value="{{$category['id']}}">
                                        <label for="{{$category['name']}}">{{$category['name']}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <input type="submit" value="Valider" class="hover:text-black/70">
                            </div>
                        </fieldset>
                    </form>
            </div>
            @endif

            @if ($posts)
                @foreach($posts as $post)                        
                    <div
                        class="m-3 flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10"
                    >
                        <div class=" flex flex-col gap-4 sm:pt-5 w-full">
                            <h2 class="text-xl font-semibold text-black">
                                {{$post['title']}}
                            </h2>
                            <div class="w-full flex flex-row flex-nowrap justify-between gap-6">
                                @if ($post->image)
                                    <img src='{{asset('storage/'.$post->image)}}' alt="" class="h-40">  
                                @endif
                                
                                <p class="mt-4">
                                    {{$post['description']}}
                                </p>
                            </div>
                            <div>
                                <p>
                                    Auteur : {{$post->user->name}}
                                </p>
                                @if (count($post->categories) !== 0)
                                    <p>
                                        Catégorie :
                                        @foreach($post->categories as $category)
                                            {{$category->name}}
                                        @endforeach
                                    </p>
                                @endif
                                <a href="{{ route('showpost', $post->id) }}" class="hover:text-black/70">Voir plus</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div
                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
            >
                <p class="mt-4 text-sm/relaxed">Le contenu de ce blog est vide.</p>
            </div>
            @endif
        </div>
    </main>

@include("layouts.front.footer")
                
