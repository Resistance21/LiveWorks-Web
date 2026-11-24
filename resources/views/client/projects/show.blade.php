<x-app-layout>

    {{-- @php
        $oldMembers = old('team_members', []);
    @endphp --}}

    {{-- @php
        dd(get_defined_vars());
    @endphp --}}
    @if ($errors->any())
        <pre>{{ $errors }}</pre>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
            {{ __('Project Archive') }}
        </h2>
    </x-slot>

    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        {{-- x-data="{
            assessments: {{ $assessments->toJson() }},
            selectedYear: '',
            selectedAssessment: ''
        }"> --}} <h2 class="text-2xl font-semibold bg-zinc-700 text-zinc-200 px-6 py-4 -mx-6 -mt-4 mb-6">
        {{ __('Project Information') }}
        </h2>

        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="unit" :value="__('Unit')" />
            <x-text-input id="unit" class="block mt-1 w-full" type="text" name="unit"
                value='{{ $unit->unit_code }}' disabled />
            <x-input-error :messages="$errors->get('unit')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="year" :value="__('Year')" />
            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year"
                value='{{ $assessment->year }}' disabled />
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="assessment_id" :value="__('Year')" />
            <x-text-input id="assessment_id" class="block mt-1 w-full" type="text" name="assessment_id"
                value='{{ $assessment->name }}' disabled />
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="team-leader" :value="__('Team Leader')" />
            @foreach ($projectMembers as $member)
                @if ($member->role === 'leader')
                    <x-text-input id="team-leader" class="block mt-1 w-full" type="text" name="team_leader"
                        value="{{ $member->user->name }}" required disabled />
                    <x-text-input id="team-leader" class="block mt-1 w-full" type="text" name="team_leader"
                        value="{{ $member->user_id }}" required disabled />
                    <x-input-error :messages="$errors->get('team-leader')" class="mt-2" />
                @endif
            @endforeach

        </div>

        <div>
            <x-input-label for="team_members" :value="__('Team Members')" />
            @foreach ($projectMembers as $member)
                @if ($member->role === 'member')
                    <div class="flex gap-2 items-center mt-1">
                        <x-text-input class="block mt-1 w-full" type="text" disbled value={{ member->user->name }} />
                        <x-text-input class="block mt-1 w-full" type="number" disbled value={{ member->user_id }} />
                    </div>
                @else
                    <div class="flex gap-2 items-center mt-1">
                        <x-text-input class="block mt-1 w-full" type="text" disbled value='No Members' />
                    </div>
                @endif
            @endforeach
            <x-input-error :messages="$errors->get('team_members')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="project-description" :value="__('Project Description')" />
            <x-text-input id="project_description" class="block mt-1 w-full" type="text" name="project_description"
                value='{{ $project->description }}' required />
            <x-input-error :messages="$errors->get('project-description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="documentation" :value="__('Documentation')" />
            @if ($projectDocuments->isNotEmpty())
                @foreach ($projectDocuments as $projectDocument)
                    <a href={{ route('project.projectDocument-download', $projectDocument) }}>
                        <x-primary-button class="ms-4">
                            {{ $projectDocument->file_name }}
                        </x-primary-button>
                    </a>
                @endforeach
            @else
                <x-text-input class="block mt-1 w-full" type="text" disabled value='No documents' />
            @endif
            <x-input-error :messages="$errors->get('documentation')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="project" :value="__('Project Archive')" />
            <a href={{ route('project.projectArchive-download', $projectArchive) }}>
                <x-primary-button class="ms-4">
                    {{ $projectArchive->file_name }}
                </x-primary-button>

            </a>
            <x-input-error :messages="$errors->get('file')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Upload Project') }}
            </x-primary-button>
        </div>
    </div>


</x-app-layout>
