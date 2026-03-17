<form method="GET" action="{{ route('jobs.search') }}" class="bg-white p-2 rounded-2xl md:rounded-full shadow-xl shadow-emerald-100/50 border border-slate-100 flex flex-col md:flex-row items-stretch md:items-center space-y-3 md:space-y-0 transition-all hover:border-emerald-200">
    <div class="flex-1 flex items-center px-4 md:border-r border-slate-100">
        <i class="fa fa-briefcase text-slate-400 mr-3"></i>
        <input type="text" name="keywords" placeholder="Job title or keywords" class="w-full py-3 md:py-4 bg-transparent focus:outline-none text-slate-700 placeholder:text-slate-400 font-medium"
            value="{{ request('keywords') }}" />
    </div>
    
    <div class="flex-1 flex items-center px-4">
        <i class="fa fa-location-dot text-slate-400 mr-3"></i>
        <input type="text" name="location" placeholder="City, state, or zip" class="w-full py-3 md:py-4 bg-transparent focus:outline-none text-slate-700 placeholder:text-slate-400 font-medium"
            value="{{ request('location') }}" />
    </div>

    <button class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-4 rounded-xl md:rounded-full font-bold transition-all flex items-center justify-center space-x-2 shadow-lg shadow-emerald-200 active:scale-95">
        <i class="fa fa-search text-sm"></i> 
        <span>Find Jobs</span>
    </button>
</form>
