@props(['mobile' => false])

<form method="POST" action="{{ route('logout') }}" class="{{ $mobile ? 'w-full' : '' }}">
    @csrf
    @if($mobile)
        <button type="submit" class="flex items-center w-full px-4 py-2 text-base font-medium text-slate-600 hover:bg-red-50 hover:text-red-600 transition-all rounded-lg">
            <i class="fa fa-sign-out mr-2 opacity-70"></i> Logout
        </button>
    @else
        <button type="submit" class="text-sm font-semibold text-slate-600 hover:text-red-600 transition-all py-2 border-b-2 border-transparent">
            <i class="fa fa-sign-out mr-1.5 opacity-70"></i> Logout
        </button>
    @endif
</form>
