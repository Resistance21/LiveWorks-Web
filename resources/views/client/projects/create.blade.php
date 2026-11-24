<x-app-layout>

    @php
        $oldMembers = old('team_members', []);
    @endphp

    @if ($errors->any())
        <pre>{{ $errors }}</pre>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
            {{ __('Creat New Project Archive') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('project.store', $unit) }}" enctype="multipart/form-data"
        class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        x-data="{
            assessments: {{ $assessments->toJson() }},
            selectedYear: '',
            selectedAssessment: ''
        }">

        <h2 class="text-2xl font-semibold bg-zinc-700 text-zinc-200 px-6 py-4 -mx-6 -mt-4 mb-6">
            {{ __('Project Information') }}
        </h2>

        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="unit" :value="__('Unit')" />
            <x-text-input id="unit" class="block mt-1 w-full" type="text" name="unit"
                value='{{ $unit->id }}' disabled />
            <x-input-error :messages="$errors->get('unit')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="year" :value="__('Year')" />
            <select id="year" name='year'
                class="block mt-1 w-full p-2 py-1 border-zinc-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow shadow-zinc-500/50"
                x-model="selectedYear">
                <option>Pick a Year</option>
                @foreach ($assessments->keys() as $year)
                    <option value={{ $year }}>{{ $year }} </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="assesment_id" :value="__('Year')" />
            <select id="assesment_id" name='name' x-model="selectedAssessment"
                class="block mt-1 w-full p-2 py-1 border-zinc-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow shadow-zinc-500/50">
                <template x-for="assessment in (assessments[selectedYear] || [])" :key='assessment.id'>
                    <option :value="assessment.id" x-text="assessment.name"></option>
                </template>
            </select>
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="team-leader" :value="__('Team Leader')" />
            <x-text-input id="team-leader" class="block mt-1 w-full" type="text" name="team_leader"
                value="{{ $user->id }}" required disabled />
            <x-input-error :messages="$errors->get('team-leader')" class="mt-2" />
        </div>

        <div x-data="{ members: {{ $oldMembers ? Js::from($oldMembers) : '[]' }} }">
            <x-input-label for="team_members" :value="__('Team Members')" />
            <template x-for="(member, index) in members" :key='index'>
                <div class="flex gap-2 items-center mt-1">
                    <x-text-input x-bind:id="`team_members_${index}`" class="block mt-1 w-full" type="number"
                        name="team_members[]" x-model='members[index]' />
                    <button type="button" x-show="members.length > 1" @click="members.splice(index, 1)"
                        class="ml-5">Delete</button>
                </div>
            </template>
            <button type="button" @click="members.push('')">+ Add member</button>
            <x-input-error :messages="$errors->get('team_members')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="project-description" :value="__('Project Description')" />
            <x-text-input id="project_description" class="block mt-1 w-full" type="text" name="project_description"
                :value="old('project-description')" required />
            <x-input-error :messages="$errors->get('project-description')" class="mt-2" />
        </div>

        <div x-data="{ documents: [''] }">
            <x-input-label for="documentation" :value="__('Documentation')" />
            <template x-for="(document, index) in documents" :key='index'>
                <div class="flex gap-2 items-center mt-1">
                    <x-text-input x-bind:id="`documentation-${index}`" class="block mt-1 w-full" type="file"
                        name="documentation[]" x-model="documents[index]" />
                    <button type="button" x-show="documents.length > 1" @click="documents.splice(index, 1)"
                        class="ml-5">Delete</button>
                </div>
            </template>
            <button type="button" @click="documents.push('')">+ Add document</button>
            <x-input-error :messages="$errors->get('documentation')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="project" :value="__('Project Archive')" />
            <x-text-input id="project" class="block mt-1 w-full" type="file" name="project" required />
            <x-input-error :messages="$errors->get('file')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Upload Project') }}
            </x-primary-button>
        </div>
    </form>


</x-app-layout>
