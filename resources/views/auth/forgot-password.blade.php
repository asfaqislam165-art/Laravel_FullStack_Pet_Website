@extends('layouts.guest')

@section('title', 'Reset Password')

@section('content')
<div class="w-full max-w-md mx-auto bg-white/90 backdrop-blur-xl border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-xl">
    
    <!-- Header -->
    <div class="text-center mb-6">
        <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Forgot Password?</h2>
        <p class="text-[11px] sm:text-xs text-[#25364A]/70 mt-1.5 leading-relaxed">
            No problem. Just enter your registered email address and we will email you a password reset link to choose a new one.
        </p>
    </div>

    <!-- Session Status / Success Message -->
    @if (session('status'))
        <div class="mb-6 p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs sm:text-sm font-medium">
            {{ session('status') }}
        </div>
    @endif

    <!-- Forgot Password Form -->
    <form method="POST" action="{{ route('password.email') }}" class="space-y-4 sm:space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Email Address</label>
            <input 
                id="email"
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
                placeholder="name@example.com"
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-2.5 sm:py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('email')
                <span class="mt-1.5 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Actions / Submit Button -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 pt-2">
            <a href="{{ route('login') }}" class="text-xs text-[#5B8DB8] hover:underline font-medium text-center sm:text-left">
                ← Back to Sign In
            </a>

            <button type="submit" class="w-full sm:w-auto bg-[#5B8DB8] text-[#FFFDF7] px-5 py-3 rounded-xl font-bold hover:bg-[#5B8DB8]/90 transition shadow-md text-xs sm:text-sm tracking-wide text-center">
                Email Reset Link
            </button>
        </div>
    </form>
</div>
@endsection