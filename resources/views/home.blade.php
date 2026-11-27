@extends('layouts.app')

@section('content')
<style>
    @keyframes homeFadeUp {
        0% {
            opacity: 0;
            transform: translateY(22px) scale(0.985);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes homeVisualIn {
        0% {
            opacity: 0;
            transform: translateY(24px) scale(0.96);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes pawGentleFloat {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        50% {
            transform: translateY(-7px) rotate(4deg);
        }
    }

    @keyframes iconSoftBob {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-4px);
        }
    }

    .home-hero-item {
        opacity: 0;
        animation: homeFadeUp 0.68s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        animation-delay: var(--delay, 0ms);
        will-change: transform, opacity;
    }

    .home-hero-visual {
        opacity: 0;
        animation: homeVisualIn 0.8s cubic-bezier(0.22, 1, 0.36, 1) 0.18s forwards;
        will-change: transform, opacity;
    }

    .home-paw {
        display: inline-block;
        animation: pawGentleFloat 3.8s ease-in-out infinite;
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .home-hero-box:hover .home-paw {
        transform: scale(1.14) rotate(8deg);
    }

    .home-ready {
        opacity: 0;
        transform: translateY(20px) scale(0.985);
        will-change: transform, opacity;
    }

    .home-visible {
        animation: homeFadeUp 0.68s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        animation-delay: var(--delay, 0ms);
    }

    .home-btn-primary {
        transition:
            transform 0.3s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.3s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.25s ease;
        will-change: transform, box-shadow;
    }

    .home-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 26px -10px rgba(91, 141, 184, 0.5);
    }

    .home-btn-primary:active {
        transform: translateY(0) scale(0.988);
    }

    .home-btn-secondary {
        transition:
            transform 0.3s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.25s ease,
            border-color 0.25s ease,
            box-shadow 0.3s cubic-bezier(0.22, 1, 0.36, 1);
        will-change: transform;
    }

    .home-btn-secondary:hover {
        transform: translateY(-2px);
        border-color: rgba(91, 141, 184, 0.7);
        box-shadow: 0 10px 20px -12px rgba(91, 141, 184, 0.35);
    }

    .home-btn-secondary:active {
        transform: translateY(0) scale(0.988);
    }

    .home-service-card {
        transition:
            transform 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            border-color 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.32s ease;
        will-change: transform, box-shadow;
    }

    .home-service-card:hover {
        transform: translateY(-6px);
        background-color: rgba(255, 255, 255, 0.94);
        border-color: rgba(91, 141, 184, 0.42);
        box-shadow: 0 18px 34px -14px rgba(91, 141, 184, 0.24), 0 8px 16px -8px rgba(37, 54, 74, 0.08);
    }

    .home-service-title {
        transition: color 0.28s ease;
    }

    .home-service-card:hover .home-service-title {
        color: #5B8DB8;
    }

    .home-standard-card {
        transition:
            transform 0.35s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.35s cubic-bezier(0.22, 1, 0.36, 1),
            border-color 0.35s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.32s ease;
        will-change: transform, box-shadow;
    }

    .home-standard-card:hover {
        transform: translateY(-5px);
        background-color: rgba(255, 255, 255, 0.88);
        border-color: rgba(91, 141, 184, 0.4);
        box-shadow: 0 14px 28px -12px rgba(91, 141, 184, 0.2), 0 6px 12px -6px rgba(37, 54, 74, 0.07);
    }

    .home-standard-icon {
        display: inline-block;
        animation: iconSoftBob 3.4s ease-in-out infinite;
        transition: transform 0.32s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .home-standard-card:hover .home-standard-icon {
        transform: scale(1.15);
    }

    @media (prefers-reduced-motion: reduce) {
        .home-hero-item,
        .home-hero-visual,
        .home-paw,
        .home-ready,
        .home-visible,
        .home-btn-primary,
        .home-btn-secondary,
        .home-service-card,
        .home-service-title,
        .home-standard-card,
        .home-standard-icon {
            animation: none !important;
            transition: none !important;
            opacity: 1 !important;
            transform: none !important;
        }
    }
</style>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-b from-[#FFFDF7] via-[#F5C95C]/10 to-[#FFFDF7] py-10 sm:py-14 md:py-20 lg:py-24">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

            <!-- Hero Text -->
            <div class="text-center lg:text-left">
                <span class="home-hero-item inline-block bg-[#F5C95C]/30 text-[#25364A] text-[10px] sm:text-xs font-bold uppercase tracking-widest px-3 py-1.5 sm:px-3.5 rounded-full mb-4" style="--delay: 40ms;">
                    USA's Premier Pet Sanctuary
                </span>

                <h1 class="home-hero-item text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-serif font-bold text-[#5B8DB8] leading-tight mb-4 sm:mb-6" style="--delay: 120ms;">
                    Exceptional Care for Your Beloved Companions
                </h1>

                <p class="home-hero-item text-xs sm:text-sm md:text-base text-[#25364A]/80 leading-relaxed max-w-xl mx-auto lg:mx-0 mb-6 sm:mb-8" style="--delay: 200ms;">
                    Experience high-end grooming, serene boarding, and personalized spa treatments designed for dogs, cats, rabbits, and birds in a calm, luxury boutique environment.
                </p>

                <div class="home-hero-item flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center lg:justify-start" style="--delay: 280ms;">
                    <a
                        href="{{ route('booking.create') }}"
                        class="home-btn-primary inline-flex items-center justify-center bg-[#5B8DB8] text-[#FFFDF7] px-6 sm:px-8 py-3 sm:py-3.5 rounded-xl font-semibold shadow-md hover:bg-[#5B8DB8]/90 text-sm sm:text-base"
                    >
                        Book Appointment Now
                    </a>

                    <a
                        href="{{ route('services') }}"
                        class="home-btn-secondary inline-flex items-center justify-center border border-[#5B8DB8]/40 text-[#5B8DB8] px-6 sm:px-8 py-3 sm:py-3.5 rounded-xl font-semibold hover:bg-[#5B8DB8]/10 text-sm sm:text-base"
                    >
                        Explore Services
                    </a>
                </div>
            </div>

            <!-- Hero Visual -->
            <div class="home-hero-visual relative mt-2 lg:mt-0">
                <div class="home-hero-box w-full aspect-[4/3] sm:aspect-[16/10] lg:aspect-auto lg:h-[420px] xl:h-[460px] bg-[#5B8DB8]/10 rounded-3xl shadow-xl flex items-center justify-center border border-[#5B8DB8]/20 transition duration-300 hover:shadow-2xl hover:border-[#5B8DB8]/35">
                    <div class="text-center px-5 sm:px-8">
                        <span class="home-paw block text-5xl sm:text-6xl mb-3 sm:mb-4">🐾</span>

                        <h2 class="text-lg sm:text-xl font-serif font-bold text-[#5B8DB8]">
                            Boutique Luxury Pet Care
                        </h2>

                        <p class="mt-2 text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                            Professional stylists & veterinary-grade comfort.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Services -->
<section class="py-12 sm:py-16 md:py-20">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="home-ready js-home-anim text-center max-w-2xl mx-auto mb-8 sm:mb-12 md:mb-16" style="--delay: 0ms;">
            <h2 class="text-xl sm:text-2xl md:text-3xl font-serif font-bold text-[#5B8DB8] mb-3">
                Signature Services & Pricing
            </h2>

            <p class="text-xs sm:text-sm md:text-base text-[#25364A]/80 leading-relaxed">
                Tailored packages crafted with gentle techniques, premium organic shampoos, and individual attention.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
            @forelse($services as $index => $service)
                <div class="home-service-card home-ready js-home-anim group bg-white/70 backdrop-blur-md rounded-2xl p-5 sm:p-6 md:p-7 border border-[#5B8DB8]/20 shadow-sm flex flex-col" style="--delay: {{ min(80 + ($index * 75), 600) }}ms;">
                    <div class="flex-1">
                        <span class="block text-[10px] sm:text-xs uppercase font-bold text-[#F5C95C] tracking-wider mb-1">
                            {{ $service->service_name }}
                        </span>

                        <h3 class="home-service-title text-lg sm:text-xl font-serif font-bold text-[#25364A] mb-2 sm:mb-3">
                            {{ $service->package_name }}
                        </h3>

                        <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                            {{ $service->description }}
                        </p>
                    </div>

                    <div class="flex items-center justify-between gap-3 pt-4 mt-5 border-t border-[#5B8DB8]/10">
                        <span class="text-lg sm:text-xl md:text-2xl font-bold text-[#5B8DB8]">
                            ${{ number_format($service->price, 2) }}
                        </span>

                        <span class="text-[11px] sm:text-xs text-[#25364A]/60 whitespace-nowrap">
                            {{ $service->duration }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="home-ready js-home-anim sm:col-span-2 lg:col-span-3 text-center py-10" style="--delay: 80ms;">
                    <p class="text-sm text-[#25364A]/60">No services available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-10 sm:py-14 md:py-16 bg-[#F5C95C]/10 border-y border-[#5B8DB8]/20">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="home-ready js-home-anim text-center max-w-2xl mx-auto mb-8 sm:mb-10 md:mb-12" style="--delay: 0ms;">
            <h2 class="text-xl sm:text-2xl md:text-3xl font-serif font-bold text-[#5B8DB8]">
                The Paws & Claws Standard
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8 text-center">
            <div class="home-standard-card home-ready js-home-anim bg-white/60 p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm" style="--delay: 80ms;">
                <span class="home-standard-icon block text-3xl mb-3">🌿</span>

                <h3 class="font-bold text-[#25364A] mb-2 text-sm sm:text-base">
                    100% Organic Products
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Hypoallergenic and gentle formulas safe for sensitive skin.
                </p>
            </div>

            <div class="home-standard-card home-ready js-home-anim bg-white/60 p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm" style="--delay: 170ms;">
                <span class="home-standard-icon block text-3xl mb-3" style="animation-delay: 0.6s;">🛡️</span>

                <h3 class="font-bold text-[#25364A] mb-2 text-sm sm:text-base">
                    Stress-Free Environment
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Calming acoustics and private individual suites for pets.
                </p>
            </div>

            <div class="home-standard-card home-ready js-home-anim bg-white/60 p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm sm:col-span-2 lg:col-span-1" style="--delay: 260ms;">
                <span class="home-standard-icon block text-3xl mb-3" style="animation-delay: 1.2s;">🩺</span>

                <h3 class="font-bold text-[#25364A] mb-2 text-sm sm:text-base">
                    Certified Specialists
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Experienced handlers trained in animal behavior and safety.
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    (function () {
        const initHomeAnimations = () => {
            const targets = document.querySelectorAll('.js-home-anim');
            if (!targets.length) return;

            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReducedMotion || !('IntersectionObserver' in window)) {
                targets.forEach((el) => {
                    el.classList.remove('home-ready');
                    el.classList.add('home-visible');
                });
                return;
            }

            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('home-visible');
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
            document.addEventListener('DOMContentLoaded', initHomeAnimations);
        } else {
            initHomeAnimations();
        }
    })();
</script>
@endsection