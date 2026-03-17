<x-layout>
    <div class="container mx-auto px-4 py-8">
        {{-- Header Area --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div class="flex items-center space-x-4">
                <a href="{{ route('jobs.index') }}" class="w-10 h-10 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-slate-400 hover:text-emerald-600 hover:border-emerald-200 transition-all shadow-sm">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <div>
                    <nav class="flex items-center space-x-2 text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">
                        <a href="/" class="hover:text-emerald-600">Home</a>
                        <span>/</span>
                        <a href="/jobs" class="hover:text-emerald-600">Jobs</a>
                        <span>/</span>
                        <span class="text-slate-500">Details</span>
                    </nav>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">{{ $job->title }}</h1>
                </div>
            </div>

            @can('update', $job)
                <div class="flex items-center space-x-3">
                    <a href="{{ route('jobs.edit', $job->id) }}"
                        class="px-5 py-2.5 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl hover:bg-slate-50 transition-all shadow-sm">
                        <i class="fa fa-edit mr-2 text-emerald-500"></i> Edit
                    </a>
                    <form method="POST" action="{{ route('jobs.destroy', $job->id) }}"
                        onsubmit="return confirm('Are you sure you want to delete this job?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-5 py-2.5 bg-red-50 text-red-600 font-bold rounded-xl hover:bg-red-100 transition-all">
                            <i class="fa fa-trash mr-2"></i> Delete
                        </button>
                    </form>
                </div>
            @endcan
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-8">
                {{-- Job Overview Card --}}
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center">
                        <i class="fa fa-file-lines mr-3 text-emerald-500"></i> Job Description
                    </h2>
                    <div class="text-slate-600 leading-relaxed space-y-4 text-lg">
                        {{ $job->description }}
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-10 pt-8 border-t border-slate-50">
                        <div>
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Salary</span>
                            <span class="text-slate-900 font-bold">${{ number_format($job->salary) }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Type</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                {{ $job->job_type }}
                            </span>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Remote</span>
                            <span class="text-slate-900 font-bold">{{ $job->remote ? 'Yes' : 'No' }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Location</span>
                            <span class="text-slate-900 font-bold">{{ $job->city }}, {{ $job->state }}</span>
                        </div>
                    </div>
                </div>

                {{-- Requirements & Benefits --}}
                @if ($job->requirements || $job->benefits)
                    <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm space-y-8">
                        @if($job->requirements)
                            <div>
                                <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                                    <i class="fa fa-list-check mr-3 text-emerald-500"></i> Requirements
                                </h2>
                                <p class="text-slate-600 leading-relaxed">
                                    {{ $job->requirements }}
                                </p>
                            </div>
                        @endif

                        @if($job->benefits)
                            <div>
                                <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                                    <i class="fa fa-gift mr-3 text-emerald-500"></i> Benefits
                                </h2>
                                <p class="text-slate-600 leading-relaxed">
                                    {{ $job->benefits }}
                                </p>
                            </div>
                        @endif
                    </div>
                @endif

                {{-- Application Section --}}
                <div class="bg-slate-900 rounded-3xl p-8 md:p-10 text-white relative overflow-hidden">
                    <div class="absolute right-0 top-0 -mr-16 -mt-16 w-64 h-64 bg-emerald-600/20 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <h2 class="text-2xl font-bold mb-4">Ready to apply?</h2>
                        <p class="text-slate-400 mb-8 max-w-lg">
                            Submit your application today and take the next step in your professional journey.
                        </p>

                        @auth
                            <div x-data="{ open: false }">
                                <button @click="open = true"
                                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-2xl font-bold transition-all shadow-xl shadow-emerald-900/20 flex items-center space-x-2 active:scale-95">
                                    <span>Apply for this position</span>
                                    <i class="fa fa-paper-plane text-sm opacity-70"></i>
                                </button>
                                
                                {{-- Application Modal --}}
                                <div x-cloak x-show="open" 
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/80 backdrop-blur-sm">
                                    <div @click.away="open = false" class="bg-white p-8 rounded-3xl shadow-2xl w-full max-w-xl max-h-[90vh] overflow-y-auto text-slate-900">
                                        <div class="flex justify-between items-center mb-6">
                                            <h3 class="text-2xl font-extrabold tracking-tight">
                                                Apply For <span class="text-emerald-600">{{ $job->title }}</span>
                                            </h3>
                                            <button @click="open = false" class="text-slate-400 hover:text-slate-600">
                                                <i class="fa fa-times text-xl"></i>
                                            </button>
                                        </div>
                                        
                                        <form method="POST" action="{{ route('applicant.store', $job->id) }}" enctype="multipart/form-data" class="space-y-5">
                                            @csrf
                                            <x-inputs.text id="full_name" name="full_name" label="Full Name" :required="true" />
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                                <x-inputs.text id="contact_phone" name="contact_phone" label="Phone Number" />
                                                <x-inputs.text id="contact_email" name="contact_email" label="Email Address" :required="true" />
                                            </div>
                                            <x-inputs.text-area id="message" name="message" label="Cover Letter / Message" />
                                            <x-inputs.text id="location" name="location" label="Your Location" />
                                            <x-inputs.file id="resume" name="resume" label="Upload Resume (PDF)" :required="true" />

                                            <div class="pt-4 flex flex-col md:flex-row gap-3">
                                                <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-emerald-100">
                                                    Submit Application
                                                </button>
                                                <button @click="open = false" type="button" class="px-6 py-4 text-slate-500 font-bold hover:bg-slate-50 rounded-2xl transition-all border border-transparent hover:border-slate-100">
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="bg-white/5 border border-white/10 rounded-2xl p-6 flex items-start space-x-4">
                                <div class="w-10 h-10 bg-emerald-500/20 rounded-xl flex items-center justify-center shrink-0">
                                    <i class="fa fa-lock text-emerald-400"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-1 tracking-tight leading-tight">Authentication Required</h4>
                                    <p class="text-slate-400 text-sm mb-4">You must be logged in to apply for this position.</p>
                                    <a href="/login" class="text-emerald-400 font-bold text-sm hover:underline">Sign in to apply &rarr;</a>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <aside class="space-y-8">
                {{-- Company Info --}}
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm text-center">
                    <div class="w-24 h-24 bg-slate-50 rounded-3xl border border-slate-100 flex items-center justify-center p-4 mx-auto mb-6">
                        @if ($job->company_logo)
                            @if (file_exists(public_path('images/' . $job->company_logo)))
                                <img src="{{ asset('images/' . $job->company_logo) }}" alt="{{ $job->company_name }}" class="max-w-full max-h-full object-contain" />
                            @else
                                <img src="{{ asset('storage/' . $job->company_logo) }}" alt="{{ $job->company_name }}" class="max-w-full max-h-full object-contain" />
                            @endif
                        @else
                            <i class="fa fa-building text-slate-300 text-4xl"></i>
                        @endif
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-900 mb-2 tracking-tight">{{ $job->company_name }}</h3>
                    
                    @if ($job->company_description)
                        <p class="text-slate-500 text-sm leading-relaxed mb-6">
                            {{ $job->company_description }}
                        </p>
                    @endif

                    <div class="space-y-3 pt-6 border-t border-slate-50">
                        @if ($job->company_website)
                            <a href="{{ $job->company_website }}" target="_blank" class="block w-full py-3 bg-slate-50 text-slate-700 font-bold rounded-xl hover:bg-slate-100 transition-all border border-slate-100">
                                <i class="fa fa-globe mr-2 text-emerald-500"></i> Visit Website
                            </a>
                        @endif

                        {{-- Bookmark Button --}}
                        @auth
                            <form method="POST"
                                action="{{ auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists()? route('bookmarks.destroy', $job->id): route('bookmarks.store', $job->id) }}">
                                @csrf
                                @if (auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists())
                                    @method('DELETE')
                                    <button class="w-full py-3 bg-red-50 text-red-600 font-bold rounded-xl hover:bg-red-100 transition-all flex items-center justify-center">
                                        <i class="fas fa-bookmark mr-2"></i> Saved
                                    </button>
                                @else
                                    <button class="w-full py-3 bg-emerald-50 text-emerald-600 font-bold rounded-xl hover:bg-emerald-100 transition-all flex items-center justify-center border border-emerald-100">
                                        <i class="far fa-bookmark mr-2"></i> Save Job
                                    </button>
                                @endif
                            </form>
                        @else
                             <div class="py-3 bg-slate-50 text-slate-400 text-xs font-bold rounded-xl border border-dashed border-slate-200">
                                Sign in to save this job
                             </div>
                        @endauth
                    </div>
                </div>

                {{-- Share Job --}}
                <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
                    <h3 class="font-bold text-slate-900 mb-4 tracking-tight leading-tight">Share this opportunity</h3>
                    <div class="flex gap-3">
                        <button class="w-10 h-10 bg-slate-50 rounded-lg flex items-center justify-center text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 transition-all">
                            <i class="fab fa-linkedin-in"></i>
                        </button>
                        <button class="w-10 h-10 bg-slate-50 rounded-lg flex items-center justify-center text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 transition-all">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="w-10 h-10 bg-slate-50 rounded-lg flex items-center justify-center text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 transition-all">
                            <i class="fa fa-link text-xs"></i>
                        </button>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</x-layout>
