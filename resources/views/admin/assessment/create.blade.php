<x-app-layout>

    @if ($errors->any())
        <pre>{{ $errors }}</pre>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
            {{ __('Creat New Assessment') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.assessment.store', $unit) }}" enctype="multipart/form-data"
        class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        class="text-2xl font-semibold bg-zinc-700 text-zinc-200 px-6 py-4 -mx-6 -mt-4 mb-6">
        <h2>
            {{ __('Assessment Information') }}
        </h2>

        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="unit_code" :value="__('Unit Code')" />
            <x-text-input id="unit_code" class="block mt-1 w-full" type="text" name="unit_code"
                value="{{ $unit->unit_code }}" disabled />
            <x-input-error :messages="$errors->get('unit_code')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="unit_name" :value="__('Unit Name')" />
            <x-text-input id="unit_name" class="block mt-1 w-full" type="text" name="unit_name"
                value="{{ $unit->unit_name }}" disabled />
            <x-input-error :messages="$errors->get('unit_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="assessment_year" :value="__('Year')" />
            <x-text-input id="assessment_year" class="block mt-1 w-full" type="number" name="year" min='2010'
                max='2099' step='1' placeholder='YYYY' pattern="[0-9]{4}" required />
            <x-input-error :messages="$errors->get('assessment_year')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="assessment_name" :value="__('Assessment Name')" />
            <x-text-input id="assessment_name" class="block mt-1 w-full" type="text" name="name" />
            <x-input-error :messages="$errors->get('assessment_name')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Creat Assessment') }}
            </x-primary-button>
        </div>
    </form>


</x-app-layout>
