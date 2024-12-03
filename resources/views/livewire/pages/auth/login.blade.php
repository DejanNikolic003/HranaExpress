<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-3">
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="password" :value="__('Lozinka')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <div class="block">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary-50" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Upamti me na ovom uređaju') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-center justify-center mt-4 gap-2">
            <x-primary-button class="w-full justify-center">
                {{ __('Ulogujte se') }}
            </x-primary-button>   
        </div>
    </form>
    <div class="mt-2 text-center">
        <p class="font-medium text-sm">Nemate nalog? <a href="{{ route('register') }}" class="underline text-primary">Registrujte se!</a></p>
    </div>
</div>
