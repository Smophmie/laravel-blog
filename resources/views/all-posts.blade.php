<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tous les posts') }}
        </h2>
    </x-slot>

    <section class="max-w-7xl mx-auto pt-5 sm:pt-5 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-2">
            
                    @if ($posts)
                    @foreach($posts as $post)                        
                        <div
                            class="m-15 flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10"
                        >
                            <div class="m-10 flex flex-col items-start gap-2 pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold text-black">
                                    {{$post['title']}}
                                </h2>
                                <div class="flex flex-row justify-start items-start gap-2">
                                    <div>
                                        <p class="mt-4 text-sm/relaxed">
                                            {{$post['description']}}
                                        </p>
                                        <p class="mt-4 text-sm/relaxed">
                                            {{$post['content']}}
                                        </p>
                                    </div>
                                    <img src='{{$post['image']}}' alt="">
                                </div>
                                <div class="flex gap-2">
                                    <a href="{{ route('modifpost', $post->id) }}">Modifier</a>
                                    
                                    <form action="{{ route('supprpost', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <div
                    class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10]"
                >
                    <p class="mt-4 text-sm/relaxed">Le contenu de ce blog est vide.</p>
                </div>
                @endif
                
            </div>
        </section>

</x-app-layout>