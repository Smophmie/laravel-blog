@include("layouts.front.head")
@include("layouts.front.header")

    <main class="mt-6 rounded-lg">
        <div class="flex flex-col gap-2 lg:gap-2">     
            <div
                class="m-3 flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10"
            >
                <div class=" flex flex-col gap-4 sm:pt-5 w-full">
                    <h2 class="text-xl font-semibold text-black">
                        {{$post['title']}}
                    </h2>
                    <div class="flex justify-center">
                        <img src='{{$post['image']}}' alt="">
                    </div>
                    <div class="w-full">
                        <p class="mt-4">
                            {{$post['description']}}
                        </p>
                        <p class="mt-4">
                            {{$post['content']}}
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
                    </div>
                </div>
            </div>  
        </div>
    </main>

@include("layouts.front.footer")
                
