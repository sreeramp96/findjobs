@props([
    'title' => 'Find Your Dream Career Today',
])
<section class="relative bg-white pt-16 pb-24 lg:pt-24 lg:pb-32 overflow-hidden">
    <!-- Background Decoration -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-emerald-50 rounded-full blur-3xl opacity-50"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-slate-100 rounded-full blur-3xl opacity-50"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <div class="inline-flex items-center space-x-2 bg-emerald-50 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold mb-8 border border-emerald-100">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            <span>Over 1,200+ new jobs posted this week</span>
        </div>

        <h2 class="text-4xl md:text-6xl lg:text-7xl text-slate-900 font-extrabold mb-8 tracking-tight leading-tight">
            {{ $title }}
        </h2>
        
        <p class="text-lg md:text-xl text-slate-600 mb-12 max-w-2xl mx-auto leading-relaxed">
            Connecting talented professionals with the world's leading companies. Browse thousands of curated job listings in tech, design, and marketing.
        </p>

        <div class="max-w-4xl mx-auto">
             <x-search />
        </div>

        <div class="mt-12 flex flex-wrap justify-center items-center gap-6 text-slate-400 grayscale opacity-70">
            <span class="text-sm font-semibold tracking-widest uppercase">Trusted by:</span>
            <i class="fab fa-google text-2xl"></i>
            <i class="fab fa-amazon text-2xl"></i>
            <i class="fab fa-apple text-2xl"></i>
            <i class="fab fa-microsoft text-2xl"></i>
            <i class="fab fa-facebook text-2xl"></i>
        </div>
    </div>
</section>
