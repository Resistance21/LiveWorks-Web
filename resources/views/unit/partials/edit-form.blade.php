@if ($errors->any())
    <pre>{{ $errors }}</pre>
@endif

<x-slot name="header">
    <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
        {{ __('Creat New Unit') }}
    </h2>
</x-slot>

<form method="POST" action="{{ $updateRoute }}" enctype="multipart/form-data"
    class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
    class="text-2xl font-semibold bg-zinc-700 text-zinc-200 px-6 py-4 -mx-6 -mt-4 mb-6">
    <h2>
        {{ __('Project Information') }}
    </h2>

    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="unit_code" :value="__('Unit Code')" />
        <x-text-input id="unit_code" class="block mt-1 w-full" type="text" name="unit_code"
            value="{{ $unit->unit_code }}" />
        <x-input-error :messages="$errors->get('unit_code')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="unit_name" :value="__('Unit Name')" />
        <x-text-input id="unit_name" class="block mt-1 w-full" type="text" name="unit_name"
            value="{{ $unit->unit_name }}" />
        <x-input-error :messages="$errors->get('unit_name')" class="mt-2" />
    </div>


    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4">
            {{ __('Update Unit') }}
        </x-primary-button>
    </div>
</form>

