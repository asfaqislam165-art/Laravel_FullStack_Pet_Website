@extends('layouts.app')

@section('content')
<style>
    @keyframes reviewFadeUp {
        0% {
            opacity: 0;
            transform: translateY(22px) scale(0.985);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes reviewEyebrowFloat {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-3px);
        }
    }

    .review-eyebrow {
        display: inline-block;
        animation: reviewEyebrowFloat 3.6s ease-in-out infinite;
    }

    .review-stagger {
        opacity: 0;
        animation: reviewFadeUp 0.65s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        animation-delay: var(--delay, 0ms);
        will-change: transform, opacity;
    }

    .review-card {
        transition:
            transform 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            border-color 0.36s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.32s ease;
        will-change: transform, box-shadow;
    }

    .review-card:hover {
        transform: translateY(-7px);
        background-color: rgba(255, 255, 255, 0.96);
        border-color: rgba(91, 141, 184, 0.45);
        box-shadow: 0 20px 36px -14px rgba(91, 141, 184, 0.24), 0 8px 18px -8px rgba(37, 54, 74, 0.08);
    }

    .review-stars {
        transition: transform 0.32s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .review-card:hover .review-stars {
        transform: scale(1.06) translateX(2px);
    }

    .review-author {
        transition: color 0.28s ease;
    }

    .review-card:hover .review-author {
        color: #5B8DB8;
    }

    .review-pagination a,
    .review-pagination span {
        transition:
            transform 0.24s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.24s ease,
            color 0.24s ease,
            border-color 0.24s ease,
            box-shadow 0.24s ease;
    }

    .review-pagination a:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px -8px rgba(91, 141, 184, 0.35);
    }

    @media (prefers-reduced-motion: reduce) {
        .review-eyebrow,
        .review-stagger,
        .review-card,
        .review-stars,
        .review-author,
        .review-pagination a,
        .review-pagination span {
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
            <span class="review-eyebrow review-stagger block text-[10px] sm:text-xs font-bold uppercase tracking-widest text-[#F5C95C]" style="--delay: 40ms;">
                Client Testimonials
            </span>

            <h1 class="review-stagger mt-2 text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#5B8DB8] leading-tight" style="--delay: 120ms;">
                What Pet Parents Say
            </h1>

            <p class="review-stagger mt-3 sm:mt-4 text-xs sm:text-sm md:text-base text-[#25364A]/80 leading-relaxed max-w-xl mx-auto" style="--delay: 200ms;">
                Read genuine experiences from pet owners who trust Paws & Claws with their beloved companions.
            </p>
        </div>

        <!-- Reviews Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8 mb-8 sm:mb-10">
            @forelse($reviews as $index => $review)
                <div class="review-card review-stagger group bg-white/80 backdrop-blur-md rounded-2xl p-5 sm:p-6 md:p-7 border border-[#5B8DB8]/20 shadow-sm flex flex-col" style="--delay: {{ min(240 + ($index * 75), 750) }}ms;">
                    <div class="flex-1">
                        <!-- Rating -->
                        <div class="review-stars flex items-center gap-0.5 mb-3 text-base sm:text-lg" aria-label="Rated {{ $review->rating }} out of 5">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $review->rating ? 'text-[#F5C95C]' : 'text-gray-300' }}">
                                    ★
                                </span>
                            @endfor
                        </div>

                        <!-- Review -->
                        <p class="text-xs sm:text-sm text-[#25364A]/80 italic leading-relaxed line-clamp-5">
                            “{{ $review->review_text }}”
                        </p>
                    </div>

                    <!-- Reviewer -->
                    <div class="pt-4 mt-5 border-t border-[#5B8DB8]/10">
                        <h3 class="review-author font-bold text-[#25364A] text-xs sm:text-sm truncate">
                            {{ $review->customer_name }}
                        </h3>

                        <span class="text-[11px] sm:text-xs text-[#5B8DB8] font-medium">
                            Verified Client
                        </span>
                    </div>
                </div>
            @empty
                <div class="review-stagger sm:col-span-2 lg:col-span-3 text-center py-10 sm:py-14" style="--delay: 240ms;">
                    <p class="text-sm text-[#25364A]/60">
                        No reviews available yet. Be the first to share your experience!
                    </p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($reviews->hasPages())
            <div class="review-pagination review-stagger mt-4 sm:mt-6 flex justify-center" style="--delay: 360ms;">
                <div class="w-full sm:w-auto overflow-x-auto">
                    <div class="inline-flex min-w-max [&_nav]:flex [&_nav]:items-center [&_nav]:justify-center [&_nav]:gap-1 [&_nav]:flex-wrap">
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection