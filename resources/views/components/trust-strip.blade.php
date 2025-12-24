@props([
    'iconUrl' => 'https://ik.imagekit.io/AthaConstruction/assets/interior_design_694b9390b8bc19.82573814_q-zNSJuTg.svg',
    'goldColor' => '#C9A86C',
])

{{-- ============================================
    TRUST STRIP COMPONENT
    Premium Interior Design - Trust Indicators
    Usage: <x-trust-strip />
    Usage with custom icon: <x-trust-strip icon-url="https://..." />
    ============================================ --}}

<section id="trust" class="relative py-10 sm:py-12 border-y border-white/10" style="background-color: var(--color-primary);">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 items-stretch" data-animate="stagger" data-stagger="0.1">
            {{-- Trust Item 1 --}}
            <div class="flex items-center gap-4 md:gap-5 font-primary">
                <div class="flex-shrink-0 w-11 h-11 sm:w-12 sm:h-12 rounded-full flex items-center justify-center shadow-sm shadow-black/20" style="border: 1px solid {{ $goldColor }}30; background-color: {{ $goldColor }}20;">
                    <div 
                        class="w-6 h-6 sm:w-7 sm:h-7"
                        style="
                            mask-image: url('{{ $iconUrl }}');
                            -webkit-mask-image: url('{{ $iconUrl }}');
                            mask-size: contain;
                            -webkit-mask-size: contain;
                            mask-repeat: no-repeat;
                            -webkit-mask-repeat: no-repeat;
                            mask-position: center;
                            -webkit-mask-position: center;
                            background-color: {{ $goldColor }};
                        "
                    ></div>
                </div>
                <span class="text-white/80 text-sm sm:text-base leading-snug">Design-only & Execution</span>
            </div>
            {{-- Trust Item 2 --}}
            <div class="flex items-center gap-4 md:gap-5 font-primary">
                <div class="flex-shrink-0 w-11 h-11 sm:w-12 sm:h-12 rounded-full flex items-center justify-center shadow-sm shadow-black/20" style="border: 1px solid {{ $goldColor }}30; background-color: {{ $goldColor }}20;">
                    <div 
                        class="w-6 h-6 sm:w-7 sm:h-7"
                        style="
                            mask-image: url('https://ik.imagekit.io/AthaConstruction/assets/transparent-budget_694b957d8a36b0.62732096_yYXoW0o-r.svg');
                            -webkit-mask-image: url('https://ik.imagekit.io/AthaConstruction/assets/transparent-budget_694b957d8a36b0.62732096_yYXoW0o-r.svg');
                            mask-size: contain;
                            -webkit-mask-size: contain;
                            mask-repeat: no-repeat;
                            -webkit-mask-repeat: no-repeat;
                            mask-position: center;
                            -webkit-mask-position: center;
                            background-color: {{ $goldColor }};
                        "
                    ></div>
                </div>
                <span class="text-white/80 text-sm sm:text-base leading-snug">Transparent Budgets</span>
            </div>
            {{-- Trust Item 3 --}}
            <div class="flex items-center gap-4 md:gap-5 font-primary">
                <div class="flex-shrink-0 w-11 h-11 sm:w-12 sm:h-12 rounded-full flex items-center justify-center shadow-sm shadow-black/20" style="border: 1px solid {{ $goldColor }}30; background-color: {{ $goldColor }}20;">
                    <div 
                        class="w-6 h-6 sm:w-7 sm:h-7"
                        style="
                            mask-image: url('https://ik.imagekit.io/AthaConstruction/assets/timeline-that-you-can-trust_694b958838e103.17332843_zu1sD3y_C.svg');
                            -webkit-mask-image: url('https://ik.imagekit.io/AthaConstruction/assets/timeline-that-you-can-trust_694b958838e103.17332843_zu1sD3y_C.svg');
                            mask-size: contain;
                            -webkit-mask-size: contain;
                            mask-repeat: no-repeat;
                            -webkit-mask-repeat: no-repeat;
                            mask-position: center;
                            -webkit-mask-position: center;
                            background-color: {{ $goldColor }};
                        "
                    ></div>
                </div>
                <span class="text-white/80 text-sm sm:text-base leading-snug">Timelines You Can Trust</span>
            </div>
            {{-- Trust Item 4 --}}
            <div class="flex items-center gap-4 md:gap-5 font-primary">
                <div class="flex-shrink-0 w-11 h-11 sm:w-12 sm:h-12 rounded-full flex items-center justify-center shadow-sm shadow-black/20" style="border: 1px solid {{ $goldColor }}30; background-color: {{ $goldColor }}20;">
                    <div 
                        class="w-6 h-6 sm:w-7 sm:h-7"
                        style="
                            mask-image: url('https://ik.imagekit.io/AthaConstruction/assets/premium-materials_694b95920099e2.33224692_TlVIOO743.svg');
                            -webkit-mask-image: url('https://ik.imagekit.io/AthaConstruction/assets/premium-materials_694b95920099e2.33224692_TlVIOO743.svg');
                            mask-size: contain;
                            -webkit-mask-size: contain;
                            mask-repeat: no-repeat;
                            -webkit-mask-repeat: no-repeat;
                            mask-position: center;
                            -webkit-mask-position: center;
                            background-color: {{ $goldColor }};
                        "
                    ></div>
                </div>
                <span class="text-white/80 text-sm sm:text-base leading-snug">Premium Materials</span>
            </div>
        </div>
    </div>
</section>

