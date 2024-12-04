<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Svi restorani') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('pages.restaurant')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
