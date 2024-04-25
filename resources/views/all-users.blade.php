<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tous les utilisateurs') }}
        </h2>
    </x-slot>

    <section class="max-w-7xl mx-auto pt-5 sm:pt-5 sm:px-6 lg:px-8">
        <div class="flex flex-row flex-wrap gap-2">
            
                    @if ($users)
                    @foreach($users as $user)                        
                        <div
                            class="size-72 flex justify-center content-center items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10"
                        >
                            <div class="flex flex-col gap-2 pt-2 sm:pt-2">
                                <h2 class="text-xl font-semibold text-black">
                                    {{$user['name']}}
                                </h2>
                                <p>
                                    Rôle: {{$user['role']}}
                                </p>
                                <p>
                                    E-mail: {{$user['email']}}
                                </p>
                                <div class="flex flex-row gap-2">
                                    <a href="{{ route('modifuser', $user->id) }}" class="hover:text-black/70">Modifier</a>
                                    
                                    <form action="{{ route('suppruser', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm hover:text-black/70">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <div
                    class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10"
                >
                    <p class="mt-4 text-sm/relaxed">Il n'existe aucun utilisateur.</p>
                </div>
                @endif
                
            </div>
        </section>

</x-app-layout>