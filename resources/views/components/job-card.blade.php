@props(['job'])
<div class="group relative bg-white rounded-3xl p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:shadow-emerald-100/40 hover:border-emerald-100 transition-all duration-300 flex flex-col h-full">
    <div class="flex items-start justify-between mb-6">
        <div class="flex items-center space-x-4">
            <div class="w-14 h-14 bg-slate-50 rounded-2xl border border-slate-100 flex items-center justify-center p-2 group-hover:bg-white transition-colors">
                @if ($job->company_logo)
                    @if (file_exists(public_path('images/' . $job->company_logo)))
                        <img src="{{ asset('images/' . $job->company_logo) }}" alt="{{ $job->company_name }}" class="max-w-full max-h-full object-contain" />
                    @else
                        <img src="{{ asset('storage/' . $job->company_logo) }}" alt="{{ $job->company_name }}" class="max-w-full max-h-full object-contain" />
                    @endif
                @else
                    <i class="fa fa-building text-slate-300 text-2xl"></i>
                @endif
            </div>
            <div>
                <h3 class="text-sm font-bold text-emerald-600 uppercase tracking-wider mb-1">{{ $job->company_name }}</h3>
                <h2 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition-colors leading-tight">
                    {{ $job->title }}
                </h2>
            </div>
        </div>
        
        <div class="bg-slate-50 text-slate-500 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-tight">
            {{ $job->job_type }}
        </div>
    </div>

    <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-2">
        {{ $job->description }}
    </p>

    <div class="grid grid-cols-2 gap-4 mb-6">
        <div class="flex items-center text-slate-500 text-sm">
            <i class="fa fa-wallet mr-2 text-emerald-500/70"></i>
            <span class="font-semibold text-slate-700">${{ number_format($job->salary / 1000) }}k/yr</span>
        </div>
        <div class="flex items-center text-slate-500 text-sm">
            <i class="fa fa-location-dot mr-2 text-emerald-500/70"></i>
            <span class="truncate">{{ $job->city }}, {{ $job->state }}</span>
        </div>
    </div>

    @if ($job->tags)
        <div class="flex flex-wrap gap-2 mb-8">
            @foreach(explode(',', $job->tags) as $tag)
                <span class="bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider border border-emerald-100">
                    {{ trim($tag) }}
                </span>
            @endforeach
        </div>
    @endif

    <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
        @if ($job->remote)
            <span class="flex items-center text-xs font-bold text-emerald-600">
                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-2"></span> Remote
            </span>
        @else
            <span class="flex items-center text-xs font-bold text-slate-400">
                <i class="fa fa-building-user mr-2"></i> On-site
            </span>
        @endif

        <a href="{{ route('jobs.show', $job->id) }}"
            class="inline-flex items-center text-sm font-bold text-slate-900 hover:text-emerald-600 transition-colors group/btn">
            View Details 
            <i class="fa fa-arrow-right ml-2 text-xs transition-transform group-hover/btn:translate-x-1"></i>
        </a>
    </div>
</div>
