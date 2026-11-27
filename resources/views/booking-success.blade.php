@extends('layouts.app')

@section('content')
<style>
    @keyframes confirmCardIn {
        0% {
            opacity: 0;
            transform: translateY(24px) scale(0.975);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes confirmItemIn {
        0% {
            opacity: 0;
            transform: translateY(14px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes checkPopIn {
        0% {
            opacity: 0;
            transform: scale(0.45) rotate(-18deg);
        }
        65% {
            opacity: 1;
            transform: scale(1.12) rotate(4deg);
        }
        100% {
            opacity: 1;
            transform: scale(1) rotate(0deg);
        }
    }

    @keyframes checkRingPulse {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(245, 201, 92, 0.35);
        }
        50% {
            box-shadow: 0 0 0 10px rgba(245, 201, 92, 0);
        }
    }

    .confirm-card {
        animation: confirmCardIn 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
        will-change: transform, opacity;
    }

    .confirm-badge {
        animation:
            checkPopIn 0.65s cubic-bezier(0.34, 1.56, 0.64, 1) 0.14s both,
            checkRingPulse 2.8s ease-in-out 0.9s infinite;
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), background-color 0.3s ease;
    }

    .confirm-badge:hover {
        transform: scale(1.08);
        background-color: rgba(245, 201, 92, 0.32);
    }

    .confirm-stagger {
        opacity: 0;
        animation: confirmItemIn 0.55s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        animation-delay: var(--delay, 0ms);
        will-change: transform, opacity;
    }

    .confirm-row {
        transition:
            background-color 0.28s ease,
            transform 0.28s cubic-bezier(0.22, 1, 0.36, 1),
            padding-left 0.28s cubic-bezier(0.22, 1, 0.36, 1),
            padding-right 0.28s cubic-bezier(0.22, 1, 0.36, 1);
        border-radius: 0.5rem;
    }

    .confirm-row:hover {
        background-color: rgba(91, 141, 184, 0.05);
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .confirm-btn {
        transition:
            transform 0.3s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.3s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.25s ease;
        will-change: transform, box-shadow;
    }

    .confirm-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px -8px rgba(91, 141, 184, 0.45);
    }

    .confirm-btn:active {
        transform: translateY(0) scale(0.985);
    }

    @media (prefers-reduced-motion: reduce) {
        .confirm-card,
        .confirm-badge,
        .confirm-stagger,
        .confirm-row,
        .confirm-btn {
            animation: none !important;
            transition: none !important;
            opacity: 1 !important;
            transform: none !important;
        }
    }
</style>

<div class="py-10 sm:py-14 md:py-20 bg-[#FFFDF7] min-h-[70vh] flex items-center overflow-hidden">
    <div class="w-full max-w-2xl mx-auto px-4 sm:px-6">

        <div class="confirm-card bg-white/80 backdrop-blur-xl border border-[#5B8DB8]/20 rounded-3xl p-5 sm:p-8 md:p-10 shadow-xl">

            <!-- Success Icon -->
            <div class="confirm-badge w-14 h-14 sm:w-16 sm:h-16 bg-[#F5C95C]/20 rounded-full flex items-center justify-center mx-auto mb-5 sm:mb-6 text-[#5B8DB8] text-xl sm:text-2xl font-bold">
                ✓
            </div>

            <!-- Heading -->
            <h1 class="confirm-stagger text-xl sm:text-2xl md:text-3xl font-serif font-bold text-[#25364A] mb-2 text-center" style="--delay: 180ms;">
                Booking Confirmed!
            </h1>

            <p class="confirm-stagger text-xs sm:text-sm text-[#25364A]/70 mb-6 sm:mb-8 text-center leading-relaxed" style="--delay: 250ms;">
                Thank you for choosing Paws & Claws Boutique. We have logged your request.
            </p>

            <!-- Booking Details -->
            <div class="confirm-stagger bg-[#FFFDF7] rounded-2xl p-4 sm:p-6 mb-6 sm:mb-8 border border-[#5B8DB8]/20 text-xs sm:text-sm" style="--delay: 320ms;">

                <!-- Reference -->
                <div class="confirm-row confirm-stagger flex flex-col gap-1 pb-3 border-b border-[#5B8DB8]/10 sm:flex-row sm:items-center sm:justify-between sm:gap-4" style="--delay: 370ms;">
                    <span class="text-[#25364A]/70 font-medium">Reference #:</span>
                    <span class="font-bold text-[#5B8DB8] break-all">
                        #PCB-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}
                    </span>
                </div>

                <!-- Pet -->
                <div class="confirm-row confirm-stagger flex flex-col gap-1 py-3 border-b border-[#5B8DB8]/10 sm:flex-row sm:items-center sm:justify-between sm:gap-4" style="--delay: 430ms;">
                    <span class="text-[#25364A]/70 font-medium">Pet Name & Type:</span>
                    <span class="font-semibold text-[#25364A] text-right sm:text-left">
                        {{ $booking->pet_name }} ({{ $booking->pet_type }})
                    </span>
                </div>

                <!-- Service -->
                <div class="confirm-row confirm-stagger flex flex-col gap-1 py-3 border-b border-[#5B8DB8]/10 sm:flex-row sm:items-center sm:justify-between sm:gap-4" style="--delay: 490ms;">
                    <span class="text-[#25364A]/70 font-medium">Service Reserved:</span>
                    <span class="font-semibold text-[#25364A] text-right sm:text-left">
                        {{ $booking->pricing->package_name }}
                    </span>
                </div>

                <!-- Date & Time -->
                <div class="confirm-row confirm-stagger flex flex-col gap-1 py-3 border-b border-[#5B8DB8]/10 sm:flex-row sm:items-center sm:justify-between sm:gap-4" style="--delay: 550ms;">
                    <span class="text-[#25364A]/70 font-medium">Date & Time:</span>
                    <span class="font-semibold text-[#25364A] text-right sm:text-left">
                        {{ $booking->appointment_date }} at {{ $booking->appointment_time }}
                    </span>
                </div>

                <!-- Status -->
                <div class="confirm-row confirm-stagger flex flex-col gap-2 pt-3 sm:flex-row sm:items-center sm:justify-between sm:gap-4" style="--delay: 610ms;">
                    <span class="text-[#25364A]/70 font-medium">Status:</span>

                    <div>
                        <span class="inline-block bg-[#F5C95C]/20 text-[#25364A] text-xs px-3 py-1.5 rounded-full font-semibold">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Action Button -->
            <div class="confirm-stagger text-center" style="--delay: 680ms;">
                <a
                    href="{{ route('home') }}"
                    class="confirm-btn inline-flex items-center justify-center w-full sm:w-auto bg-[#5B8DB8] text-[#FFFDF7] px-8 py-3 rounded-xl font-semibold hover:bg-[#5B8DB8]/90 shadow-sm text-sm sm:text-base"
                >
                    Return to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection