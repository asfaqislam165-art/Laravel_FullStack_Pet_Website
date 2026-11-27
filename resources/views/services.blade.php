@extends('layouts.app')

@section('content')
<style>
    @keyframes svcFadeUp {
        0% {
            opacity: 0;
            transform: translateY(22px) scale(0.985);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes svcEyebrowFloat {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-3px);
        }
    }

    .svc-eyebrow {
        display: inline-block;
        animation: svcEyebrowFloat 3.6s ease-in-out infinite;
    }

    .svc-header-item {
        opacity: 0;
        animation: svcFadeUp 0.65s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        animation-delay: var(--delay, 0ms);
        will-change: transform, opacity;
    }

    .svc-ready {
        opacity: 0;
        transform: translateY(20px) scale(0.985);
        will-change: transform, opacity;
    }

    .svc-visible {
        animation: svcFadeUp 0.65s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        animation-delay: var(--delay, 0ms);
    }

    .svc-card {
        transition:
            transform 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            border-color 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.32s ease;
        will-change: transform, box-shadow;
    }

    .svc-card:hover {
        transform: translateY(-7px);
        background-color: rgba(255, 255, 255, 0.96);
        border-color: rgba(91, 141, 184, 0.45);
        box-shadow: 0 20px 36px -14px rgba(91, 141, 184, 0.24), 0 8px 18px -8px rgba(37, 54, 74, 0.08);
    }

    .svc-title {
        transition: color 0.28s ease;
    }

    .svc-card:hover .svc-title {
        color: #5B8DB8;
    }

    .svc-price {
        display: inline-block;
        transition: transform 0.32s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .svc-card:hover .svc-price {
        transform: scale(1.04);
    }

    .svc-reserve-btn {
        transition:
            transform 0.3s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.3s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.25s ease;
        will-change: transform, box-shadow;
    }

    .svc-reserve-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 22px -8px rgba(91, 141, 184, 0.45);
    }

    .svc-reserve-btn:active {
        transform: translateY(0) scale(0.98);
    }

    @media (prefers-reduced-motion: reduce) {
        .svc-eyebrow,
        .svc-header-item,
        .svc-ready,
        .svc-visible,
        .svc-card,
        .svc-title,
        .svc-price,
        .svc-reserve-btn {
            animation: none !important;
            transition: none !important;
            opacity: 1 !important;
            transform: none !important;
        }
    }
</style>

<div class="py-8 sm:py-12 md:py-16 bg-[#FFFDF7] overflow-hidden">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Page Header -->
        <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-12 md:mb-16">
            <span class="svc-eyebrow svc-header-item block text-[10px] sm:text-xs font-bold uppercase tracking-widest text-[#F5C95C]" style="--delay: 40ms;">
                Luxury Care Offerings
            </span>

            <h1 class="svc-header-item mt-2 text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#5B8DB8] leading-tight" style="--delay: 120ms;">
                Boutique Services & Spa Treatments
            </h1>

            <p class="svc-header-item mt-3 sm:mt-4 text-xs sm:text-sm md:text-base text-[#25364A]/80 leading-relaxed max-w-xl mx-auto" style="--delay: 200ms;">
                From gentle hydromassage baths to spacious boarding suites, every experience is designed for maximum pet comfort.
            </p>
        </div>

        @if(isset($pricings) && count($pricings) > 0)
            @foreach($pricings as $serviceName => $packages)
                <section class="mb-10 sm:mb-12 md:mb-16">
                    <h2 class="svc-ready js-svc-anim text-lg sm:text-xl md:text-2xl font-serif font-bold text-[#5B8DB8] mb-4 sm:mb-6 border-b border-[#5B8DB8]/20 pb-2 sm:pb-3" style="--delay: 0ms;">
                        {{ $serviceName }}
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
                        @foreach($packages as $index => $package)
                            <div class="svc-card svc-ready js-svc-anim group bg-white/80 backdrop-blur-md rounded-2xl p-5 sm:p-6 md:p-7 border border-[#5B8DB8]/20 shadow-sm flex flex-col" style="--delay: {{ min(80 + ($index * 75), 600) }}ms;">
                                <div class="flex-1">
                                    <h3 class="svc-title text-base sm:text-lg md:text-xl font-serif font-bold text-[#25364A] mb-2">
                                        {{ $package->package_name }}
                                    </h3>

                                    <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                                        {{ $package->description }}
                                    </p>
                                </div>

                                <div class="pt-4 mt-5 border-t border-[#5B8DB8]/10">
                                    <div class="flex flex-wrap items-end justify-between gap-3">
                                        <div class="min-w-0">
                                            <span class="svc-price block text-lg sm:text-xl md:text-2xl font-bold text-[#5B8DB8] leading-none">
                                                ${{ number_format($package->price, 2) }}
                                            </span>

                                            <span class="block mt-1 text-[11px] sm:text-xs text-[#25364A]/60">
                                                {{ $package->duration }}
                                            </span>
                                        </div>

                                        <a
                                            href="{{ route('booking.create') }}"
                                            class="svc-reserve-btn inline-flex items-center justify-center bg-[#5B8DB8] text-[#FFFDF7] px-4 py-2.5 rounded-xl font-semibold hover:bg-[#5B8DB8]/90 shadow-sm text-xs sm:text-sm whitespace-nowrap"
                                        >
                                            Reserve
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach
        @else
            <div class="svc-ready js-svc-anim text-center py-10 sm:py-14 bg-white/50 rounded-2xl border border-[#5B8DB8]/20" style="--delay: 80ms;">
                <p class="text-sm text-[#25364A]/70">
                    No service packages are currently available.
                </p>
            </div>
        @endif
    </div>
</div>

<script>
    (function () {
        const initServicesAnimations = () => {
            const targets = document.querySelectorAll('.js-svc-anim');
            if (!targets.length) return;

            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReducedMotion || !('IntersectionObserver' in window)) {
                targets.forEach((el) => {
                    el.classList.remove('svc-ready');
                    el.classList.add('svc-visible');
                });
                return;
            }

            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('svc-visible');
                            obs.unobserve(entry.target);
                        }
                    });
                },
                {
                    threshold: 0.14,
                    rootMargin: '0px 0px -30px 0px'
                }
            );

            targets.forEach((el) => observer.observe(el));
        };

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initServicesAnimations);
        } else {
            initServicesAnimations();
        }
    })();
</script>
@endsection