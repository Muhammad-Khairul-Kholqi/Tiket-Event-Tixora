<div class="flex justify-center p-5">
    <div class="w-full max-w-[1300px]">
        <div class="relative">
            <div class="relative overflow-hidden">
                <div id="sliderTrack" class="flex gap-5 transition-transform duration-700 ease-in-out">
                    @php
                        $images = [
                            'https://images.unsplash.com/photo-1682687221038-404cb8830901?w=1200&h=800&fit=crop',
                            'https://images.unsplash.com/photo-1682687220063-4742bd7fd538?w=1200&h=800&fit=crop',
                            'https://images.unsplash.com/photo-1682687220199-d0124f48f95b?w=1200&h=800&fit=crop',
                            'https://images.unsplash.com/photo-1682687220923-c58b9a4592ae?w=1200&h=800&fit=crop',
                            'https://images.unsplash.com/photo-1682687220742-aba13b6e50ba?w=1200&h=800&fit=crop',
                        ];
                        $totalImages = count($images);
                        
                        $circularImages = array_merge(
                            array_slice($images, -2), 
                            $images,                   
                            array_slice($images, 0, 2)  
                        );
                    @endphp

                    @foreach($circularImages as $index => $image)
                    <div class="flex-shrink-0 w-full sm:w-[80%] px-2 sm:px-0">
                        <img src="{{ $image }}" 
                             alt="Slide {{ $index + 1 }}" 
                             class="w-full h-[300px] object-cover rounded-xl shadow-2xl">
                    </div>
                    @endforeach
                </div>
            </div>

            <button id="prevBtn" 
                    class="absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 rounded-full p-2 sm:p-3 shadow-lg transition-all duration-200 z-10 hover:scale-110">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button id="nextBtn" 
                    class="absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 rounded-full p-2 sm:p-3 shadow-lg transition-all duration-200 z-10 hover:scale-110">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <div class="flex justify-center gap-2 mt-4">
                @foreach($images as $index => $image)
                <button class="dot w-8 h-1 rounded-full transition-all duration-300" 
                        data-index="{{ $index }}">
                </button>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.getElementById('sliderTrack');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const dots = document.querySelectorAll('.dot');
        const totalSlides = {{ $totalImages }};
        let currentIndex = 2; 
        let isAnimating = false;

        function isMobile() {
            return window.innerWidth < 640; 
        }

        function updateSlider(transition = true) {
            const slideWidth = isMobile() ? 100 : 80;
            const offset = isMobile() ? 0 : 10; 
            
            if (!transition) {
                track.style.transition = 'none';
            } else {
                track.style.transition = 'transform 0.7s ease-in-out';
            }
            
            track.style.transform = `translateX(calc(-${currentIndex * slideWidth}% + ${offset}%))`;
            
            const actualIndex = ((currentIndex - 2) % totalSlides + totalSlides) % totalSlides;
            dots.forEach((dot, index) => {
                if (index === actualIndex) {
                    dot.classList.remove('bg-gray-200');
                    dot.classList.add('bg-yellow-400');
                } else {
                    dot.classList.remove('bg-yellow-400');
                    dot.classList.add('bg-gray-200');
                }
            });
        }

        function handleInfiniteLoop() {
            if (currentIndex === 0) {
                currentIndex = totalSlides;
                setTimeout(() => {
                    updateSlider(false);
                }, 50);
            } else if (currentIndex === totalSlides + 2) {
                currentIndex = 2;
                setTimeout(() => {
                    updateSlider(false);
                }, 50);
            }
        }

        nextBtn.addEventListener('click', function() {
            if (isAnimating) return;
            isAnimating = true;
            
            currentIndex++;
            updateSlider(true);
            
            setTimeout(() => {
                handleInfiniteLoop();
                isAnimating = false;
            }, 700);
        });

        prevBtn.addEventListener('click', function() {
            if (isAnimating) return;
            isAnimating = true;
            
            currentIndex--;
            updateSlider(true);
            
            setTimeout(() => {
                handleInfiniteLoop();
                isAnimating = false;
            }, 700);
        });

        dots.forEach(dot => {
            dot.addEventListener('click', function() {
                if (isAnimating) return;
                isAnimating = true;
                
                const targetIndex = parseInt(this.getAttribute('data-index'));
                currentIndex = targetIndex + 2; 
                updateSlider(true);
                
                setTimeout(() => {
                    isAnimating = false;
                }, 700);
            });
        });

        window.addEventListener('resize', function() {
            updateSlider(false);
        });

        updateSlider(false);
    });
</script>