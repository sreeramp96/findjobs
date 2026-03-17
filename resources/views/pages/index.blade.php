<x-layout>
    <div class="mb-12">
        <div class="flex items-center justify-between mb-8 px-4">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Featured Opportunities</h2>
                <p class="text-slate-500 font-medium">Hand-picked premium job listings for you</p>
            </div>
            <a href="{{ route('jobs.index') }}" class="hidden md:flex items-center text-emerald-600 font-bold hover:text-emerald-700 transition-colors group">
                Browse all jobs 
                <i class="fa fa-arrow-right ml-2 text-sm transition-transform group-hover:translate-x-1"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($jobs as $job)
                <x-job-card :job="$job" />
            @empty
                <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-slate-100 shadow-sm">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa fa-briefcase text-slate-300 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">No jobs available yet</h3>
                    <p class="text-slate-500 max-w-xs mx-auto">Check back later or be the first to post a job on our platform!</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12 text-center md:hidden">
            <a href="{{ route('jobs.index') }}" class="inline-flex items-center bg-white border border-slate-200 px-8 py-4 rounded-2xl font-bold text-slate-900 shadow-sm hover:bg-slate-50 transition-all">
                Browse All Jobs
                <i class="fa fa-arrow-right ml-2 text-sm"></i>
            </a>
        </div>
    </div>

    <x-bottom-banner />
</x-layout>
