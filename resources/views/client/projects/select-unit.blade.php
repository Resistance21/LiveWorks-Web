<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
            {{ __('Select the Unit to create a New Project Archive') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('project.select-unit') }}" enctype="multipart/form-data"
        class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

        <h2 class="text-2xl font-semibold bg-zinc-700 text-zinc-200 px-6 py-4 -mx-6 -mt-4 mb-6">
            {{ __('Project Information') }}
        </h2>

        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="unit_id" :value="__('Unit')" />
            <select id="unit_id" name='unit_id' class="block mt-1 w-full">
                @foreach ($units as $unit)
                    <option value={{ $unit->id }}>{{ $unit->unit_code }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Create Project') }}
            </x-primary-button>
        </div>
    </form>


</x-app-layout>
