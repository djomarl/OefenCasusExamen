<nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="text-xl font-bold text-indigo-600 tracking-tight hover:text-indigo-700 transition">
                    Iron Pulse Gym
                </a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                
                @guest
                <a href="/" class="{{ request()->is('/') ? 'text-indigo-600 bg-indigo-50' : 'text-slate-600 hover:text-indigo-600' }} px-3 py-2 rounded-md text-sm font-medium transition-colors">
                    Home
                </a>
                @endguest


                {{-- Role gebaseerde navs --}}
                @auth
                    @if (Auth::user()->role === 'Beheerder')
                        <a href="/beheerder/dashboard" class="{{ request()->is('beheerder/dashboard*') ? 'text-indigo-600 bg-indigo-50' : 'text-slate-600 hover:text-indigo-600' }} px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Beheerder Dashboard
                        </a>
                    @elseif (Auth::user()->role === 'Lid')
                        <a href="/lid/mijngegevens" class="{{ request()->is('lid/mijngegevens*') ? 'text-indigo-600 bg-indigo-50' : 'text-slate-600 hover:text-indigo-600' }} px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Mijn Gegegvens
                        </a>
                        <a href="/lid/dashboard" class="{{ request()->is('lid/dashboard*') ? 'text-indigo-600 bg-indigo-50' : 'text-slate-600 hover:text-indigo-600' }} px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Lid Dashboard
                        </a>
                    @elseif (Auth::user()->role === 'Balie')
                        <a href="/balie/dashboard" class="{{ request()->is('balie/dashboard*') ? 'text-indigo-600 bg-indigo-50' : 'text-slate-600 hover:text-indigo-600' }} px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Balie Dashboard
                        </a>
                    @elseif (Auth::user()->role === 'Trainer')
                    <a href="/trainer/mijngegevens" class="{{ request()->is('trainer/mijngegevens*') ? 'text-indigo-600 bg-indigo-50' : 'text-slate-600 hover:text-indigo-600' }} px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Mijn Gegegvens
                        </a>    
                    <a href="/trainer/dashboard" class="{{ request()->is('trainer/dashboard*') ? 'text-indigo-600 bg-indigo-50' : 'text-slate-600 hover:text-indigo-600' }} px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Trainer Dashboard
                        </a>
                    @endif
                @endauth
                
                <div class="border-l border-slate-200 h-6 mx-2"></div>
                
                    @auth
                    <div class="text-slate-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Welkom, {{ Auth::user()->name }}!
                    </div>

                        <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <x-button variant="danger" type="submit">Logout</x-button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'text-indigo-600 bg-indigo-50' : 'text-slate-600 hover:text-indigo-600' }} px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Log in
                        </a>

                        <x-button href="{{ route('register') }}" variant="primary" class="ml-2">
                            Registeren
                        </x-button>
                    @endauth
            </div>
            
        </div>
    </div>
</nav>
