<header class="bg-white border-b border-slate-200 sticky top-0 z-50" x-data="{ open: false }">
    <div class="container mx-auto px-4 h-20 flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center space-x-2">
             <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-200">
                <i class="fa fa-briefcase text-white text-xl"></i>
             </div>
             <span class="text-2xl font-bold tracking-tight text-slate-900">FindJobs</span>
        </a>

        <nav class="hidden md:flex items-center space-x-8">
            <x-nav-link url="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link url="/jobs" :active="request()->is('jobs')">Browse Jobs</x-nav-link>
            @auth
                <x-nav-link url="/bookmarks" :active="request()->is('bookmarks')">Saved</x-nav-link>
                
                <div class="h-6 w-px bg-slate-200 mx-2"></div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}" class="group flex items-center space-x-3">
                        <div class="relative">
                            @if (Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
                                    class="w-10 h-10 rounded-full border-2 border-transparent group-hover:border-emerald-600 transition-all object-cover"
                                    onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=059669&background=ECFDF5'">
                            @else
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center border-2 border-transparent group-hover:border-emerald-600 transition-all">
                                    <i class="fa fa-user text-slate-400"></i>
                                </div>
                            @endif
                        </div>
                    </a>
                    <x-logout-button />
                </div>

                <a href="/jobs/create" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-full font-medium transition-all shadow-md shadow-emerald-100 flex items-center">
                    <i class="fa fa-plus mr-2 text-sm"></i> Post a Job
                </a>
            @else
                <x-nav-link url="/login" :active="request()->is('login')">Sign In</x-nav-link>
                <a href="/register" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2.5 rounded-full font-medium transition-all shadow-md shadow-emerald-100">
                    Get Started
                </a>
            @endauth
        </nav>

        <button @click="open = !open" class="text-slate-600 md:hidden p-2 hover:bg-slate-100 rounded-lg transition-colors">
            <i class="fa" :class="open ? 'fa-times' : 'fa-bars'" class="text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         @click.away="open = false" 
         class="md:hidden bg-white border-t border-slate-100 absolute w-full shadow-xl">
        <div class="container mx-auto px-4 py-6 flex flex-col space-y-4">
            <x-nav-link url="/" :active="request()->is('/')" :mobile="true">Home</x-nav-link>
            <x-nav-link url="/jobs" :active="request()->is('jobs')" :mobile="true">Browse Jobs</x-nav-link>
            @auth
                <x-nav-link url="/bookmarks" :active="request()->is('bookmarks')" :mobile="true">Saved Jobs</x-nav-link>
                <x-nav-link url="/dashboard" :active="request()->is('dashboard')" :mobile="true">Dashboard</x-nav-link>
                <div class="pt-2 border-t border-slate-100">
                    <x-logout-button :mobile="true" />
                </div>
                <a href="/jobs/create" class="bg-emerald-600 text-white text-center py-3 rounded-xl font-medium">
                    Post a Job
                </a>
            @else
                <x-nav-link url="/login" :active="request()->is('login')" :mobile="true">Sign In</x-nav-link>
                <a href="/register" class="bg-emerald-600 text-white text-center py-3 rounded-xl font-medium">
                    Get Started
                </a>
            @endauth
        </div>
    </div>
</header>
