<x-app-layout>

    @if ($errors->any())
        <pre>{{ $errors }}</pre>
    @endif
    {{-- {{ dd($units) }} --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
            {{ __('Projects List') }}
        </h2>
    </x-slot>

    <x-accodion :units="$units" />



</x-app-layout>
