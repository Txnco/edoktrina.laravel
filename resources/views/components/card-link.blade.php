<a href="{{ $href }}" class="block rounded-xl border border-[#242526] p-8 shadow-xl transition hover:border-pink-500/10 hover:shadow-pink-500/10 bg-gradient-to-b from-[#2D2F31] to-[#27292B]">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
    </svg>
    <h2 class="mt-4 text-xl font-bold text-white">{{ $title }}</h2>
    <p class="mt-1 text-sm text-gray-300">{{ $description }}</p>
</a>