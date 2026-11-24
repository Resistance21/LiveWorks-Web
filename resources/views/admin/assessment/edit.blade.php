<x-app-layout>
    {{-- {{ dd($assessmentsByYear) }} --}}
    @if ($errors->any())
        <pre>{{ $errors }}</pre>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
            {{ __('Assessment Edit') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.assessment.update', $unit) }}" enctype="multipart/form-data"
        class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        class="text-2xl font-semibold bg-zinc-700 text-zinc-200 px-6 py-4 -mx-6 -mt-4 mb-6">
        <h2>
            {{ __('Assessment Edit') }}
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


        <div x-data="{
            assessmentsByYear: {{ Js::from($assessmentsByYear) }},
            selectedYear: null,
            selectedAssessmentId: null,
            get availableAssessments() {
                return this.selectedYear ? this.assessmentsByYear[this.selectedYear] : [];
            },
            get selectedAssessment() {
                return this.availableAssessments.find(a => a.id == this.selectedAssessmentId) ?? null;
            }
        }">
            <div>
                <x-input-label for="assessment_year" :value="__('Year')" />
                <select x-model="selectedYear" name="year">
                    <option value="" selected>Select a year</option>
                    <template x-for="year in Object.keys(assessmentsByYear)" :key="year">
                        <option :value="year" x-text="year"></option>
                    </template>
                </select>
            </div>
            <div>
                <select x-model='selectedAssessmentId'>
                    <option value="" selected>Select an assessment</option>
                    <template x-for="assessment in availableAssessments" :key="assessment.id">
                        <option :value="assessment.id" x-text="assessment.name"></option>
                    </template>
                </select>
            </div>
            <div>
                <x-input-label for="assessment_name" :value="__('Assessment Name')" />
                <x-text-input id="assessment_name" class="block mt-1 w-full" type="text" name="name"
                    x-bind:value="selectedAssessment?.name ?? ''" />
                <x-input-error :messages="$errors->get('assessment_name')" class="mt-2" />
            </div>
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Edit Assessment') }}
            </x-primary-button>
        </div>
    </form>


</x-app-layout>
