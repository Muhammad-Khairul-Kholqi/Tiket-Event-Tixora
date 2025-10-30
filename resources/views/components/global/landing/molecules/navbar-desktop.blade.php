<nav class="fixed top-0 left-0 right-0 bg-white border-b border-gray-200 flex justify-center p-5 z-40">
    <div class="w-full max-w-[1500px] flex justify-between items-center">
        <div class="flex items-center gap-10">
            <span>Logo</span>
            <div class="hidden md:flex items-center gap-5">
                <a href="" class="hover:text-yellow-500 transition-colors">Beranda</a>
                <a href="" class="hover:text-yellow-500 transition-colors">Event</a>
                <a href="" class="hover:text-yellow-500 transition-colors">Trending</a>
                <a href="" class="hover:text-yellow-500 transition-colors">Segera Hadir</a>
            </div>
        </div>
        <div class="flex items-center gap-5">
            <a href="" class="hidden sm:flex">
                <div class="flex items-center gap-2 hover:text-yellow-500 transition-colors">
                    <x-heroicon-o-calendar class="w-5 h-5" />
                    <p>Buat Event</p>
                </div>
            </a>
            <p class="hidden sm:block">|</p>
            <div class="hidden sm:flex items-center gap-3">
                <a href="" class="border border-gray-200 hover:bg-gray-50 px-5 py-2 rounded-lg">
                    <span>Daftar</span>
                </a>
                <a href="" class="bg-[#FCB031] hover:bg-[#FCB031]/90 px-5 py-2 rounded-lg">
                    <span>Masuk</span>
                </a>
            </div>
            <button id="hamburger-btn" class="md:hidden">
                <x-heroicon-o-bars-3 class="w-6 h-6" />
            </button>
        </div>
    </div>
</nav>