<x-layout>
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-3xl shadow-xl shadow-emerald-100/50 border border-slate-100 overflow-hidden">
                <div class="p-8 md:p-10">
                    <div class="text-center mb-10">
                        <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200 mx-auto mb-6">
                            <i class="fa fa-lock text-white text-2xl"></i>
                        </div>
                        <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Welcome Back</h2>
                        <p class="text-slate-500 mt-2 font-medium">Log in to manage your job search</p>
                    </div>

                    <form method="POST" action="{{ route('login.authenticate') }}" class="space-y-6">
                        @csrf
                        
                        <div class="space-y-1">
                            <label for="email" class="block text-sm font-bold text-slate-700 ml-1">Email Address</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-emerald-500 transition-colors">
                                    <i class="fa fa-envelope text-sm"></i>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    class="block w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-medium"
                                    placeholder="name@company.com">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center justify-between ml-1">
                                <label for="password" class="block text-sm font-bold text-slate-700">Password</label>
                                {{-- <a href="#" class="text-xs font-bold text-emerald-600 hover:text-emerald-700">Forgot password?</a> --}}
                            </div>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-emerald-500 transition-colors">
                                    <i class="fa fa-key text-sm"></i>
                                </div>
                                <input id="password" type="password" name="password" required
                                    class="block w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all font-medium"
                                    placeholder="••••••••">
                            </div>
                            @error('password')
                                <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-4 rounded-2xl font-bold transition-all shadow-lg shadow-emerald-200 active:scale-[0.98] flex items-center justify-center space-x-2">
                            <span>Sign In</span>
                            <i class="fa fa-arrow-right text-sm opacity-70"></i>
                        </button>
                    </form>
                </div>
                
                <div class="px-8 py-6 bg-slate-50 border-t border-slate-100 text-center">
                    <p class="text-slate-500 text-sm font-medium">
                        Don't have an account?
                        <a class="text-emerald-600 font-bold hover:text-emerald-700 hover:underline" href="{{ route('register') }}">Create one for free</a>
                    </p>
                </div>
            </div>

            <div class="mt-8 text-center">
                 <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Secure Login powered by FindJobs</p>
            </div>
        </div>
    </div>
</x-layout>
