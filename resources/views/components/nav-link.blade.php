@props(['url' => '/', 'active' => false, 'icon' => null, 'mobile' => false])

@if ($mobile)
    <a href="{{ $url }}"
        class="block px-4 py-2 text-base font-medium transition-colors rounded-lg {{ $active ? 'bg-emerald-50 text-emerald-700' : 'text-slate-600 hover:bg-slate-50 hover:text-emerald-600' }}">
        @if ($icon)
            <i class="fa fa-{{ $icon }} mr-2 opacity-70"></i>
        @endif
        {{ $slot }}
    </a>
@else
    <a href="{{ $url }}"
        class="text-sm font-semibold transition-all py-2 border-b-2 {{ $active ? 'text-emerald-600 border-emerald-600' : 'text-slate-600 border-transparent hover:text-emerald-600 hover:border-emerald-200' }}">
        @if ($icon)
            <i class="fa fa-{{ $icon }} mr-1.5 opacity-70"></i>
        @endif
        {{ $slot }}
    </a>
@endif
