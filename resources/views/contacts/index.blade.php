<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Daftar Kontak') }}
        </h2>
    </x-slot>

    @livewire('contacts')
</x-app-layout>
