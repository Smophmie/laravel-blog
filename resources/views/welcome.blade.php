@include("layouts.front.head")
@include("layouts.front.header")

    <main class="mt-6">
        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
            
            @if ($posts)
                @foreach($posts as $post)                        
                    <div
                        class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                    >
                        <div class="pt-3 sm:pt-5">
                            <h2 class="text-xl font-semibold text-black dark:text-white">
                                {{$post['title']}}
                            </h2>

                            <p class="mt-4 text-sm/relaxed">
                                {{$post['content']}}
                            </p>
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
                
