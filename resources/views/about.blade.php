@extends('layouts.app')

@section('content')
<style>
    @keyframes petFadeUp {
        0% {
            opacity: 0;
            transform: translateY(22px) scale(0.985);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes petSoftFloat {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-4px);
        }
    }

    .anim-ready {
        opacity: 0;
        transform: translateY(22px) scale(0.985);
        will-change: transform, opacity;
    }

    .anim-visible {
        animation: petFadeUp 0.75s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        animation-delay: var(--anim-delay, 0ms);
    }

    .pet-card {
        transition:
            transform 0.38s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.38s cubic-bezier(0.22, 1, 0.36, 1),
            border-color 0.38s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.38s cubic-bezier(0.22, 1, 0.36, 1);
        will-change: transform, box-shadow;
    }

    .pet-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 18px 34px -12px rgba(91, 141, 184, 0.22), 0 8px 16px -8px rgba(37, 54, 74, 0.08);
        border-color: rgba(91, 141, 184, 0.45);
        background-color: rgba(255, 255, 255, 0.96);
    }

    .pet-badge {
        transition:
            transform 0.38s cubic-bezier(0.34, 1.56, 0.64, 1),
            background-color 0.35s ease,
            color 0.35s ease,
            box-shadow 0.35s ease;
    }

    .pet-card:hover .pet-badge {
        transform: scale(1.1) rotate(4deg);
        background-color: #F5C95C;
        color: #25364A;
        box-shadow: 0 8px 18px -4px rgba(245, 201, 92, 0.55);
    }

    .pet-title {
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .pet-card:hover .pet-title {
        color: #5B8DB8;
        transform: translateY(-1px);
    }

    .pet-eyebrow {
        display: inline-block;
        animation: petSoftFloat 3.6s ease-in-out infinite;
    }

    @media (prefers-reduced-motion: reduce) {
        .anim-ready,
        .anim-visible,
        .pet-eyebrow,
        .pet-card,
        .pet-badge,
        .pet-title {
            animation: none !important;
            transition: none !important;
            opacity: 1 !important;
            transform: none !important;
        }
    }
</style>

<div class="py-10 sm:py-12 md:py-16 bg-[#FFFDF7] overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-10 md:mb-16">
            <span class="pet-eyebrow anim-ready js-animate text-[11px] sm:text-xs font-bold uppercase tracking-widest text-[#F5C95C]" style="--anim-delay: 0ms;">
                Our Story & Philosophy
            </span>

            <h1 class="anim-ready js-animate mt-2 text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#5B8DB8] leading-tight" style="--anim-delay: 110ms;">
                Boutique Pet Care Excellence
            </h1>

            <p class="anim-ready js-animate mt-4 text-sm sm:text-base text-[#25364A]/80 leading-relaxed" style="--anim-delay: 220ms;">
                Founded with a vision to revolutionize pet care in the USA, Paws & Claws provides a peaceful, stress-free environment tailored to your pet's emotional and physical well-being.
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">

            <!-- Card 1 -->
            <div class="pet-card anim-ready js-animate bg-white/80 backdrop-blur-md p-5 sm:p-6 md:p-8 rounded-2xl border border-[#5B8DB8]/20 shadow-sm text-center flex flex-col items-center" style="--anim-delay: 120ms;">
                <div class="pet-badge w-11 h-11 sm:w-12 sm:h-12 bg-[#F5C95C]/20 text-[#5B8DB8] rounded-full flex items-center justify-center mb-3 sm:mb-4 font-bold text-lg sm:text-xl">
                    1
                </div>

                <h3 class="pet-title font-serif font-bold text-[#25364A] text-lg sm:text-xl mb-2">
                    Certified Specialists
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Our groomers and handlers are certified in gentle handling and pet CPR.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="pet-card anim-ready js-animate bg-white/80 backdrop-blur-md p-5 sm:p-6 md:p-8 rounded-2xl border border-[#5B8DB8]/20 shadow-sm text-center flex flex-col items-center" style="--anim-delay: 240ms;">
                <div class="pet-badge w-11 h-11 sm:w-12 sm:h-12 bg-[#F5C95C]/20 text-[#5B8DB8] rounded-full flex items-center justify-center mb-3 sm:mb-4 font-bold text-lg sm:text-xl">
                    2
                </div>

                <h3 class="pet-title font-serif font-bold text-[#25364A] text-lg sm:text-xl mb-2">
                    Luxury Facilities
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Climate-controlled suites, soundproof rooms, and organic grooming products.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="pet-card anim-ready js-animate bg-white/80 backdrop-blur-md p-5 sm:p-6 md:p-8 rounded-2xl border border-[#5B8DB8]/20 shadow-sm text-center flex flex-col items-center sm:col-span-2 lg:col-span-1" style="--anim-delay: 360ms;">
                <div class="pet-badge w-11 h-11 sm:w-12 sm:h-12 bg-[#F5C95C]/20 text-[#5B8DB8] rounded-full flex items-center justify-center mb-3 sm:mb-4 font-bold text-lg sm:text-xl">
                    3
                </div>

                <h3 class="pet-title font-serif font-bold text-[#25364A] text-lg sm:text-xl mb-2">
                    Personalized Attention
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Individualized care schedules based on species, breed, and temperament.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        const initSmoothAnimations = () => {
            const targets = document.querySelectorAll('.js-animate');
            if (!targets.length) return;

            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReducedMotion || !('IntersectionObserver' in window)) {
                targets.forEach((el) => {
                    el.classList.remove('anim-ready');
                    el.classList.add('anim-visible');
                });
                return;
            }

            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('anim-visible');
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
            document.addEventListener('DOMContentLoaded', initSmoothAnimations);
        } else {
            initSmoothAnimations();
        }
    })();
</script>
@endsection