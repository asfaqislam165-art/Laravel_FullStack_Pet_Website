@extends('layouts.app')

@section('content')
<style>
    @keyframes contactFadeUp {
        0% {
            opacity: 0;
            transform: translateY(20px) scale(0.985);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes contactPanelIn {
        0% {
            opacity: 0;
            transform: translateY(24px) scale(0.98);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes contactAlertIn {
        0% {
            opacity: 0;
            transform: translateY(-10px) scale(0.985);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes contactEyebrowFloat {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-3px);
        }
    }

    .contact-eyebrow {
        display: inline-block;
        animation: contactEyebrowFloat 3.6s ease-in-out infinite;
    }

    .contact-stagger {
        opacity: 0;
        animation: contactFadeUp 0.62s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        animation-delay: var(--delay, 0ms);
        will-change: transform, opacity;
    }

    .contact-form-panel {
        opacity: 0;
        animation: contactPanelIn 0.72s cubic-bezier(0.22, 1, 0.36, 1) 0.14s forwards;
        will-change: transform, opacity;
    }

    .contact-alert {
        animation: contactAlertIn 0.45s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .contact-info-card {
        transition:
            transform 0.34s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.34s cubic-bezier(0.22, 1, 0.36, 1),
            border-color 0.34s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.34s ease;
        will-change: transform, box-shadow;
    }

    .contact-info-card:hover {
        transform: translateY(-4px);
        background-color: rgba(255, 255, 255, 0.92);
        border-color: rgba(91, 141, 184, 0.42);
        box-shadow: 0 14px 26px -12px rgba(91, 141, 184, 0.22), 0 6px 12px -8px rgba(37, 54, 74, 0.08);
    }

    .contact-field-group label {
        transition: color 0.25s ease, transform 0.25s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .contact-field-group:focus-within label {
        color: #5B8DB8;
        transform: translateX(2px);
    }

    .contact-input {
        transition:
            border-color 0.28s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.28s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.28s ease,
            transform 0.28s cubic-bezier(0.22, 1, 0.36, 1);
        will-change: transform, box-shadow, border-color;
    }

    .contact-input:hover {
        border-color: rgba(91, 141, 184, 0.55);
    }

    .contact-input:focus {
        border-color: #5B8DB8;
        background-color: #FFFFFF;
        transform: translateY(-1px);
        box-shadow: 0 10px 22px -10px rgba(91, 141, 184, 0.38), 0 0 0 3px rgba(91, 141, 184, 0.14);
    }

    .contact-submit {
        transition:
            transform 0.3s cubic-bezier(0.22, 1, 0.36, 1),
            box-shadow 0.3s cubic-bezier(0.22, 1, 0.36, 1),
            background-color 0.25s ease;
        will-change: transform, box-shadow;
    }

    .contact-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 28px -10px rgba(91, 141, 184, 0.48);
    }

    .contact-submit:active {
        transform: translateY(0) scale(0.988);
    }

    @media (prefers-reduced-motion: reduce) {
        .contact-eyebrow,
        .contact-stagger,
        .contact-form-panel,
        .contact-alert,
        .contact-info-card,
        .contact-field-group label,
        .contact-input,
        .contact-submit {
            animation: none !important;
            transition: none !important;
            opacity: 1 !important;
            transform: none !important;
        }
    }
</style>

<div class="py-8 sm:py-12 md:py-16 bg-[#FFFDF7] overflow-hidden">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-12 items-start">

            <!-- Left: Contact Information -->
            <div class="text-center lg:text-left">
                <span class="contact-eyebrow contact-stagger block text-[10px] sm:text-xs font-bold uppercase tracking-widest text-[#F5C95C]" style="--delay: 40ms;">
                    Get In Touch
                </span>

                <h1 class="contact-stagger mt-2 mb-3 sm:mb-4 text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#5B8DB8] leading-tight" style="--delay: 110ms;">
                    Concierge Support
                </h1>

                <p class="contact-stagger text-xs sm:text-sm md:text-base text-[#25364A]/80 mb-6 sm:mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0" style="--delay: 180ms;">
                    Have questions regarding custom feeding, special care routines, or booking inquiries? Reach out to our concierge team directly.
                </p>

                <div class="space-y-3 sm:space-y-4 text-left">
                    <!-- Address -->
                    <div class="contact-info-card contact-stagger bg-white/60 p-4 sm:p-5 rounded-2xl border border-[#5B8DB8]/20 shadow-sm" style="--delay: 250ms;">
                        <span class="block text-[10px] sm:text-xs uppercase font-bold text-[#F5C95C]">
                            Sanctuary Address
                        </span>

                        <p class="mt-1 text-xs sm:text-sm font-semibold text-[#25364A] leading-relaxed">
                            {{ $settings->address ?? '742 Evergreen Terrace, Suite 400, Beverly Hills, CA' }}
                        </p>
                    </div>

                    <!-- Contact -->
                    <div class="contact-info-card contact-stagger bg-white/60 p-4 sm:p-5 rounded-2xl border border-[#5B8DB8]/20 shadow-sm" style="--delay: 330ms;">
                        <span class="block text-[10px] sm:text-xs uppercase font-bold text-[#F5C95C]">
                            Direct Contact
                        </span>

                        <p class="mt-1 text-xs sm:text-sm font-semibold text-[#25364A]">
                            Phone:
                            <a
                                href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->phone ?? '(800) 555-PAWS') }}"
                                class="text-[#5B8DB8] hover:underline transition-colors break-all"
                            >
                                {{ $settings->phone ?? '(800) 555-PAWS' }}
                            </a>
                        </p>

                        <p class="mt-1 text-xs sm:text-sm font-semibold text-[#25364A]">
                            Email:
                            <a
                                href="mailto:{{ $settings->email ?? 'concierge@pawsandclaws.com' }}"
                                class="text-[#5B8DB8] hover:underline transition-colors break-all"
                            >
                                {{ $settings->email ?? 'concierge@pawsandclaws.com' }}
                            </a>
                        </p>
                    </div>

                    <!-- Hours -->
                    <div class="contact-info-card contact-stagger bg-white/60 p-4 sm:p-5 rounded-2xl border border-[#5B8DB8]/20 shadow-sm" style="--delay: 410ms;">
                        <span class="block text-[10px] sm:text-xs uppercase font-bold text-[#F5C95C]">
                            Business Hours
                        </span>

                        <p class="mt-1 text-xs sm:text-sm font-semibold text-[#25364A] leading-relaxed">
                            {{ $settings->business_hours ?? 'Mon - Sat: 8:00 AM - 7:00 PM' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right: Inquiry Form -->
            <div class="contact-form-panel bg-white/80 backdrop-blur-xl border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-4 sm:p-6 md:p-8 shadow-md">
                <h2 class="contact-stagger text-lg sm:text-xl md:text-2xl font-serif font-bold text-[#5B8DB8] mb-5 sm:mb-6" style="--delay: 200ms;">
                    Send an Inquiry
                </h2>

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="contact-alert mb-5 p-3 sm:p-4 bg-red-50 border border-red-200 rounded-xl sm:rounded-2xl">
                        <ul class="list-disc list-inside text-xs sm:text-sm text-red-600 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-4 sm:space-y-5">
                    @csrf

                    <!-- Name -->
                    <div class="contact-field-group contact-stagger" style="--delay: 260ms;">
                        <label for="name" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">
                            Your Name *
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            placeholder="Enter your full name"
                            class="contact-input w-full rounded-xl border border-[#5B8DB8]/30 bg-white text-[#25364A] text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-[#5B8DB8] outline-none"
                        >
                    </div>

                    <!-- Email -->
                    <div class="contact-field-group contact-stagger" style="--delay: 320ms;">
                        <label for="email" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">
                            Email Address *
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="Enter your email address"
                            class="contact-input w-full rounded-xl border border-[#5B8DB8]/30 bg-white text-[#25364A] text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-[#5B8DB8] outline-none"
                        >
                    </div>

                    <!-- Subject -->
                    <div class="contact-field-group contact-stagger" style="--delay: 380ms;">
                        <label for="subject" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">
                            Subject *
                        </label>

                        <input
                            id="subject"
                            type="text"
                            name="subject"
                            value="{{ old('subject') }}"
                            required
                            placeholder="What can we help you with?"
                            class="contact-input w-full rounded-xl border border-[#5B8DB8]/30 bg-white text-[#25364A] text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-[#5B8DB8] outline-none"
                        >
                    </div>

                    <!-- Message -->
                    <div class="contact-field-group contact-stagger" style="--delay: 440ms;">
                        <label for="message" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">
                            Message *
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                            required
                            placeholder="Write your message here..."
                            class="contact-input w-full rounded-xl border border-[#5B8DB8]/30 bg-white text-[#25364A] text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-[#5B8DB8] outline-none resize-y"
                        >{{ old('message') }}</textarea>
                    </div>

                    <!-- Submit -->
                    <div class="contact-stagger pt-1" style="--delay: 500ms;">
                        <button
                            type="submit"
                            class="contact-submit w-full bg-[#5B8DB8] text-[#FFFDF7] py-3.5 rounded-xl font-bold hover:bg-[#5B8DB8]/90 shadow-md text-sm sm:text-base"
                        >
                            Send Inquiry Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection