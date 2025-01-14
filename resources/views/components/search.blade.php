<!-- Replace the existing search div with this in your navbar -->
<div class="relative items-center" role="search">
    <form action="{{ route('search') }}" method="GET" class="flex items-center">
        <div class="flex items-center bg-white bg-opacity-20 rounded-lg px-6 py-2 space-x-2">
            <span class="text-white" aria-hidden="true">🔍</span>
            <input 
                type="text" 
                name="query" 
                placeholder="Search..." 
                class="bg-transparent text-white placeholder-white border-none focus:outline-none w-full"
                value="{{ request('query') }}"
            >
        </div>
    </form>
    <div id="searchResults" class="absolute w-full mt-2 bg-white rounded-lg shadow-lg hidden">
        <!-- Results will be populated here via JavaScript -->
    </div>
</div>