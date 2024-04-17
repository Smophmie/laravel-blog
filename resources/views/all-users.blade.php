<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tous les utilisateurs') }}
        </h2>
    </x-slot>

    <section class="max-w-7xl mx-auto pt-5 sm:pt-5 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-2">
            
                    @if ($users)
                    @foreach($users as $user)                        
                        <div
                            class="m-15 flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div class="flex flex-col gap-2 pt-2 sm:pt-2">
                                <h2 class="text-xl font-semibold text-black dark:text-white">
                                    {{$user['name']}}
                                </h2>
                                <p class="text-sm/relaxed">
                                    Rôle: {{$user['role']}}
                                </p>
                                <p class="text-sm/relaxed">
                                    E-mail: {{$user['email']}}
                                </p>
                                <div class="flex flex-row gap-2">
                                    <a href="{{ route('modifuser', $user->id) }}">Modifier</a>
                                    
                                    <form action="{{ route('suppruser', $user->id) }}" method="post">
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
                    class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                >
                    <p class="mt-4 text-sm/relaxed">Il n'existe aucun utilisateur.</p>
                </div>
                @endif
                
            </div>
        </section>

</x-app-layout>