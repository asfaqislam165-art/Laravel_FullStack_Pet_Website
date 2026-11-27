@extends('layouts.guest')

@section('title', 'Reset Password')

@section('content')
<div class="w-full max-w-md mx-auto bg-white/90 backdrop-blur-xl border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-xl">
    
    <!-- Header -->
    <div class="text-center mb-6">
        <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Reset Password</h2>
        <p class="text-[11px] sm:text-xs text-[#25364A]/70 mt-1">Please enter your new password below.</p>
    </div>

    <!-- Reset Password Form -->
    <form method="POST" action="{{ route('password.store') }}" class="space-y-4 sm:space-y-5">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Email Address</label>
            <input 
                id="email"
                type="email" 
                name="email" 
                value="{{ old('email', $request->email) }}" 
                required 
                autofocus 
                autocomplete="username" 
                placeholder="name@example.com"
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-2.5 sm:py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('email')
                <span class="mt-1.5 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- New Password -->
        <div>
            <label for="password" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">New Password</label>
            <input 
                id="password"
                type="password" 
                name="password" 
                required 
                autocomplete="new-password" 
                placeholder="••••••••"
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-2.5 sm:py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('password')
                <span class="mt-1.5 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Confirm Password</label>
            <input 
                id="password_confirmation"
                type="password" 
                name="password_confirmation" 
                required 
                autocomplete="new-password" 
                placeholder="••••••••"
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-2.5 sm:py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('password_confirmation')
                <span class="mt-1.5 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Actions / Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full bg-[#5B8DB8] text-[#FFFDF7] px-6 py-3 rounded-xl font-bold hover:bg-[#5B8DB8]/90 transition shadow-md text-xs sm:text-sm tracking-wide text-center">
                Reset Password
            </button>
        </div>
    </form>
</div>
@endsection