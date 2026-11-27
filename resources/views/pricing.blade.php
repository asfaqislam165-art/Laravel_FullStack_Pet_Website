@extends('layouts.app')

@section('content')
<style>
    @keyframes pricingFadeUp {
        0% {
            opacity: 0;
            transform: translateY(22px) scale(0.985);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes pricingEyebrowFloat {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-3px);
        }
    }

    .pricing-eyebrow {
        display: inline-block;
        animation: pricingEyebrowFloat 3.6s ease-in-out infinite;
    }

    .pricing-stagger {
        opacity: 0;
        animation: pricingFadeUp 0.65s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        animation-delay: var(--delay, 0ms);
        will-change: transform, opacity;
    }

    .pricing-card {
        transition:
            transform 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            border-color 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.32s ease;
        will-change: transform, box-shadow;
    }

    .pricing-card:hover {
        transform: translateY(-7px);
        background-color: rgba(255, 255, 255, 0.96);
        border-color: rgba(91, 141, 184, 0.45);
        box-shadow: 0 20px 36px -14px rgba(91, 141, 184, 0.24), 0 8px 18px -8px rgba(37, 54, 74, 0.08);
    }

    .pricing-title {
        transition: color 0.28s ease;
    }

    .pricing-card:hover .pricing-title {
        color: #5B8DB8;
    }

    .pricing-price {
        display: inline-block;
        transition: transform 0.32s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .pricing-card:hover .pricing-price {
        transform: scale(1.04);
    }

    .pricing-btn {
        transition:
            transform 0.3s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.3s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.25s ease;
        will-change: transform, box-shadow;
    }

    .pricing-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px -8px rgba(91, 141, 184, 0.45);
    }

    .pricing-btn:active {
        transform: translateY(0) scale(0.988);
    }

    @media (prefers-reduced-motion: reduce) {
        .pricing-eyebrow,
        .pricing-stagger,
        .pricing-card,
        .pricing-title,
        .pricing-price,
        .pricing-btn {
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
            <span class="pricing-eyebrow pricing-stagger block text-[10px] sm:text-xs font-bold uppercase tracking-widest text-[#F5C95C]" style="--delay: 40ms;">
                Transparent Rate Card
            </span>

            <h1 class="pricing-stagger mt-2 text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#5B8DB8] leading-tight" style="--delay: 120ms;">
                Services Pricing
            </h1>

            <p class="pricing-stagger mt-3 sm:mt-4 text-xs sm:text-sm md:text-base text-[#25364A]/80 leading-relaxed max-w-xl mx-auto" style="--delay: 200ms;">
                Clear pricing with no hidden charges. Choose the right care package for your pet.
            </p>
        </div>

        <!-- Pricing Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
            @forelse($pricings as $index => $pricing)
                <div class="pricing-card pricing-stagger group bg-white/80 backdrop-blur-md rounded-2xl p-5 sm:p-6 md:p-7 border border-[#5B8DB8]/20 shadow-sm flex flex-col" style="--delay: {{ min(240 + ($index * 75), 750) }}ms;">
                    <div class="flex-1">
                        <span class="block text-[10px] sm:text-xs uppercase font-bold text-[#F5C95C] tracking-wider mb-1">
                            {{ $pricing->service_name }}
                        </span>

                        <h2 class="pricing-title text-lg sm:text-xl md:text-2xl font-serif font-bold text-[#25364A] mb-2">
                            {{ $pricing->package_name }}
                        </h2>

                        <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                            {{ $pricing->description }}
                        </p>
                    </div>

                    <div class="pt-4 mt-5 border-t border-[#5B8DB8]/10">
                        <div class="flex items-end justify-between gap-3 mb-4 sm:mb-5">
                            <span class="pricing-price text-xl sm:text-2xl md:text-3xl font-bold text-[#5B8DB8] leading-none">
                                ${{ number_format($pricing->price, 2) }}
                            </span>

                            <span class="text-[11px] sm:text-xs text-[#25364A]/60 font-medium text-right">
                                / {{ $pricing->duration }}
                            </span>
                        </div>

                        <a
                            href="{{ route('booking.create') }}"
                            class="pricing-btn inline-flex items-center justify-center w-full bg-[#5B8DB8] text-[#FFFDF7] py-3 rounded-xl font-semibold hover:bg-[#5B8DB8]/90 shadow-sm text-sm"
                        >
                            Book Package
                        </a>
                    </div>
                </div>
            @empty
                <div class="pricing-stagger sm:col-span-2 lg:col-span-3 text-center py-10 sm:py-14" style="--delay: 240ms;">
                    <p class="text-sm text-[#25364A]/60">
                        No pricing packages are available at the moment.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection