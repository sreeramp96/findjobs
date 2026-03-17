@props([
    'heading' => 'Looking to hire?',
    'subheading' => 'Post your job listing now and find the perfect candidate today.',
])
<section class="container mx-auto px-4 my-16">
    <div class="bg-emerald-600 rounded-3xl p-8 md:p-12 shadow-2xl shadow-emerald-200 relative overflow-hidden group">
        <!-- Decoration -->
        <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-emerald-500 rounded-full blur-3xl opacity-50 group-hover:scale-110 transition-transform duration-500"></div>
        <div class="absolute -left-10 -top-10 w-32 h-32 bg-emerald-700 rounded-full blur-2xl opacity-30"></div>

        <div class="flex flex-col md:flex-row items-center justify-between gap-8 relative z-10 text-center md:text-left">
            <div class="max-w-xl">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4 tracking-tight leading-tight">
                    {{ $heading }}
                </h2>
                <p class="text-emerald-50 text-lg opacity-90 leading-relaxed">
                    {{ $subheading }}
                </p>
            </div>
            <a href="/jobs/create" class="bg-white text-emerald-700 hover:bg-emerald-50 px-8 py-4 rounded-2xl font-bold transition-all shadow-xl shadow-emerald-900/10 flex items-center space-x-2 active:scale-95 shrink-0">
                <i class="fa fa-edit"></i>
                <span>Post Your Job</span>
            </a>
        </div>
    </div>
</section>
