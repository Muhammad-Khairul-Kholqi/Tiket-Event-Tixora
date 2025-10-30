<div id="mobile-menu" class="hidden fixed inset-0 bg-white z-50 overflow-y-auto">
    <div class="flex flex-col h-full">
        <div class="flex justify-between items-center px-5 py-3 border-b border-gray-200">
            <span>Logo</span>
            <button id="close-menu-btn">
                <x-heroicon-o-x-mark class="w-6 h-6" />
            </button>
        </div>
        
        <div class="flex flex-col px-5 flex-1">
            <a href="" class="flex items-center justify-between py-4 border-b border-gray-200 hover:text-yellow-500 transition-colors">
                <span>Beranda</span>
                <x-heroicon-o-chevron-right class="w-5 h-5" />
            </a>
            <a href="" class="flex items-center justify-between py-4 border-b border-gray-200 hover:text-yellow-500 transition-colors">
                <span>Event</span>
                <x-heroicon-o-chevron-right class="w-5 h-5" />
            </a>
            <a href="" class="flex items-center justify-between py-4 border-b border-gray-200 hover:text-yellow-500 transition-colors">
                <span>Trending</span>
                <x-heroicon-o-chevron-right class="w-5 h-5" />
            </a>
            <a href="" class="flex items-center justify-between py-4 border-b border-gray-200 hover:text-yellow-500 transition-colors">
                <span>Segera Hadir</span>
                <x-heroicon-o-chevron-right class="w-5 h-5" />
            </a>
        </div>
        
        <div class="sm:hidden flex flex-col items-center gap-3 p-5 border-t border-gray-200">
            <a href="" class="w-full">
                <div class="flex items-center justify-center gap-2 hover:text-yellow-500 transition-colors py-3">
                    <x-heroicon-o-calendar class="w-5 h-5" />
                    <p>Buat Event</p>
                </div>
            </a>
            <a href="" class="w-full border border-gray-200 hover:bg-gray-50 px-5 py-3 rounded-lg text-center">
                <span>Daftar</span>
            </a>
            <a href="" class="w-full bg-[#FCB031] hover:bg-[#FCB031]/90 px-5 py-3 rounded-lg text-center">
                <span>Masuk</span>
            </a>
        </div>
    </div>
</div>

<script>
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeMenuBtn = document.getElementById('close-menu-btn');

    hamburgerBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    });

    closeMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        document.body.style.overflow = '';
    });
</script>