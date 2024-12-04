<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';
    public string $username = '';
    public string $first_name = '';
    public string $last_name = '';
    public string $street_number = '';
    public string $phone_number = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'street_number' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'digits:9'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('home', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register" class="space-y-3">
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="username" :value="__('Korisničko Ime')" />
            <x-text-input wire:model="username" id="username" class="block mt-1 w-full" type="text" name="username" required autofocus />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div class="flex items-center space-x-1">
            <div class="w-full">
                <x-input-label for="first_name" :value="__('Ime')" />
                <x-text-input wire:model="first_name" id="first_name" class="block mt-1 w-full" type="text" name="first_name" required autofocus />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div class="w-full">
                <x-input-label for="last_name" :value="__('Prezime')" />
                <x-text-input wire:model="last_name" id="last_name" class="block mt-1 w-full" type="text" name="last_name" required autofocus/>
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center space-x-1">
            <div class="w-full">
                <x-input-label for="street_number" :value="__('Ulica i broj')" />
                <x-text-input wire:model="street_number" id="street_number" class="block mt-1 w-full" type="text" name="street_number" required autofocus />
            </div>

            <div class="w-full">
                <x-input-label for="phone_number" :value="__('Broj telefona')" />
                <x-text-input wire:model="phone_number" id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" required autofocus/>
            </div>
        </div>

        <x-input-error :messages="$errors->get('street_number')" />
        <x-input-error :messages="$errors->get('phone_number')" />

        <div>
            <x-input-label for="password" :value="__('Lozinka')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Ponovite lozinku')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="block">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary-50" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Prihvatam') }} <a href="#" class="underline text-primary">Pravila I uslove korišćenja</a></span>
            </label>
        </div>


        <div class="flex flex-col items-center justify-center mt-4 gap-2">
            <x-primary-button class="w-full justify-center">
                {{ __('Registrujte se') }}
            </x-primary-button>   
        </div>
    </form>
    <div class="mt-2 text-center">
        <p class="font-medium text-sm">Već ste registrovani? <a href="{{ route('login') }}" class="underline text-primary">Ulogujte se!</a></p>
    </div>
</div>
