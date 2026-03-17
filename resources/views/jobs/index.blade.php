<x-layout>
    <div class="bg-slate-900 py-12 px-4 mb-12 rounded-3xl relative overflow-hidden">
        <div class="absolute inset-0 bg-emerald-600/10"></div>
        <div class="relative z-10 max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-8 tracking-tight">Search for your next career move</h1>
            <x-search />
        </div>
    </div>

    <div class="container mx-auto px-4">
        {{-- Back button --}}
        @if (request()->has('keywords') || request()->has('location'))
            <div class="mb-8">
                <a href="{{ route('jobs.index') }}"
                    class="inline-flex items-center text-slate-600 hover:text-emerald-600 font-bold transition-colors">
                    <i class="fa fa-arrow-left mr-2"></i> Clear all filters
                </a>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @forelse($jobs as $job)
                <x-job-card :job="$job" />
            @empty
                <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-slate-100 shadow-sm">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa fa-search text-slate-300 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">No jobs found</h3>
                    <p class="text-slate-500 max-w-xs mx-auto">We couldn't find any job listings matching your current search criteria.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        <div class="mt-12">
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
