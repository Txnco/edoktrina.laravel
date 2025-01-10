<header>
    <nav class="bg-[#242526] p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-white text-3xl font-bold">Šalabahter</a>

            <!-- Links -->
            <div class="hidden md:flex space-x-6">
                <a href="/" class="text-[#F2AFEF] hover:text-white">POČETNA</a>
                <a href="/instruktori" class="text-white hover:text-[#F2AFEF]">INSTRUKTORI</a>
                <a href="/materijali" class="text-white hover:text-[#F2AFEF]">OBRAZOVNI MATERIJALI</a>
                <a href="/o-nama" class="text-white hover:text-[#F2AFEF]">O NAMA</a>
            </div>

            <!-- Right buttons -->
            <div class="hidden md:flex space-x-4">
                <a href="/login" class="text-white hover:text-[#F2AFEF]">PRIJAVA</a>
                <a href="{{ route('register') }}" class="text-white border border-white px-4 py-1 rounded hover:bg-[#F2AFEF] hover:text-gray-900">REGISTRACIJA</a>
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </nav>
</header>


