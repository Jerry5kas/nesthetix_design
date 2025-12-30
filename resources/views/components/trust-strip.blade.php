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

<section id="trust" class="relative py-6 sm:py-8 bg-black border-y border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 items-center" data-animate="stagger" data-stagger="0.1">
            @php
                $items = [
                    [
                        'icon' => $iconUrl,
                        'text' => 'Design-only & Execution'
                    ],
                    [
                        'icon' => 'https://ik.imagekit.io/AthaConstruction/assets/transparent-budget_694b957d8a36b0.62732096_yYXoW0o-r.svg',
                        'text' => 'Transparent Budgets'
                    ],
                    [
                        'icon' => 'https://ik.imagekit.io/AthaConstruction/assets/timeline-that-you-can-trust_694b958838e103.17332843_zu1sD3y_C.svg',
                        'text' => 'Timelines You Can Trust'
                    ],
                    [
                        'icon' => 'https://ik.imagekit.io/AthaConstruction/assets/premium-materials_694b95920099e2.33224692_TlVIOO743.svg',
                        'text' => 'Premium Materials'
                    ]
                ];
            @endphp

            @foreach($items as $item)
                <div class="flex items-center gap-3 md:gap-4 font-primary">
                    <div class="flex-shrink-0 w-10 h-10 sm:w-11 sm:h-11 rounded-full flex items-center justify-center" style="border: 1px solid {{ $goldColor }}30; background-color: {{ $goldColor }}20;">
                        <div 
                            class="w-5 h-5 sm:w-6 sm:h-6"
                            style="
                                mask-image: url('{{ $item['icon'] }}');
                                -webkit-mask-image: url('{{ $item['icon'] }}');
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
                    <span class="text-white/80 text-xs sm:text-sm leading-tight">{{ $item['text'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

