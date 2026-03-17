@props([
    'heading' => 'Unlock Your Career Potential',
    'subheading' => 'Discover thousands of opportunities from top companies worldwide.',
])
<section class="bg-slate-900 text-white py-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-emerald-600/10"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-3">
            {{ $heading }}
        </h2>
        <p class="text-slate-400 text-lg max-w-xl mx-auto">
            {{ $subheading }}
        </p>
    </div>
</section>
