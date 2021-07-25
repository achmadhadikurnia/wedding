<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Daftar Pesan') }}
        </h2>
    </x-slot>

    @livewire('messages')
</x-app-layout>
