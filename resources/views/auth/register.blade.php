<x-layout>
    <div class="container mx-auto px-4 py-12 md:py-20">
        <div class="max-w-xl mx-auto">
            <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-emerald-100/30 border border-slate-100 overflow-hidden">
                <div class="p-8 md:p-12">
                    <div class="text-center mb-12">
                        <div class="w-20 h-20 bg-emerald-600 rounded-3xl flex items-center justify-center shadow-2xl shadow-emerald-200 mx-auto mb-8 rotate-3 hover:rotate-0 transition-transform duration-500">
                            <i class="fa fa-user-plus text-white text-3xl"></i>
                        </div>
                        <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Create your account</h2>
                        <p class="text-slate-500 mt-3 font-medium text-lg">Join thousands of professionals finding their next move</p>
                    </div>

                    <form method="POST" action="{{ route('register.store') }}" class="space-y-8">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-bold text-slate-700 ml-1">Full Name</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-emerald-500 transition-colors">
                                        <i class="fa fa-user text-sm"></i>
                                    </div>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                        class="block w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 transition-all font-medium"
                                        placeholder="John Doe">
                                </div>
                                @error('name')
                                    <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-bold text-slate-700 ml-1">Email Address</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-emerald-500 transition-colors">
                                        <i class="fa fa-envelope text-sm"></i>
                                    </div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                        class="block w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 transition-all font-medium"
                                        placeholder="john@example.com">
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="password" class="block text-sm font-bold text-slate-700 ml-1">Password</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-emerald-500 transition-colors">
                                        <i class="fa fa-key text-sm"></i>
                                    </div>
                                    <input id="password" type="password" name="password" required
                                        class="block w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 transition-all font-medium"
                                        placeholder="••••••••">
                                </div>
                                @error('password')
                                    <p class="text-red-500 text-xs font-bold mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="password_confirmation" class="block text-sm font-bold text-slate-700 ml-1">Confirm Password</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-emerald-500 transition-colors">
                                        <i class="fa fa-shield text-sm"></i>
                                    </div>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required
                                        class="block w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 transition-all font-medium"
                                        placeholder="••••••••">
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-50 p-6 rounded-2xl border border-dashed border-slate-200">
                             <p class="text-xs text-slate-500 leading-relaxed font-medium">
                                By creating an account, you agree to FindJobs' <a href="#" class="text-emerald-600 font-bold hover:underline">Terms of Service</a> and <a href="#" class="text-emerald-600 font-bold hover:underline">Privacy Policy</a>. We'll occasionally send you job-related updates.
                             </p>
                        </div>

                        <button type="submit"
                            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-5 rounded-2xl font-extrabold text-lg transition-all shadow-xl shadow-emerald-200 active:scale-[0.97] flex items-center justify-center group">
                            <span>Get Started Now</span>
                            <i class="fa fa-arrow-right ml-3 text-sm opacity-50 group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </form>
                </div>
                
                <div class="px-8 py-8 bg-slate-50 border-t border-slate-100 text-center">
                    <p class="text-slate-500 font-semibold">
                        Already have an account?
                        <a class="text-emerald-600 font-extrabold hover:text-emerald-700 hover:underline" href="{{ route('login') }}">Sign in here</a>
                    </p>
                </div>
            </div>

            <div class="mt-12 text-center space-y-4">
                 <p class="text-slate-400 text-xs font-extrabold uppercase tracking-widest">Join 10,000+ companies hiring on FindJobs</p>
                 <div class="flex justify-center gap-8 text-slate-300">
                    <i class="fab fa-stripe text-2xl"></i>
                    <i class="fab fa-slack text-2xl"></i>
                    <i class="fab fa-spotify text-2xl"></i>
                    <i class="fab fa-github text-2xl"></i>
                 </div>
            </div>
        </div>
    </div>
</x-layout>
