@php
    $role = 'staff';
    $currentProject = $projectSlug;
    $user = [
        'name' => auth()->user()->name,
        'number' => auth()->user()->student_number ?: auth()->user()->email,
    ];
    $projects = [
        ['slug' => 'liveworks-archive', 'name' => 'LiveWorks Archive', 'student' => 'Filip Riccio'],
        ['slug' => 'farm-tour-bookings', 'name' => 'Farm Tour Bookings', 'student' => 'Rich Harris'],
        ['slug' => 'local-gym-website', 'name' => 'Local Gym Website', 'student' => 'Dave Rupert'],
        ['slug' => 'council-website', 'name' => 'Council Website', 'student' => 'Blake Smith'],
        ['slug' => 'cafe-ordering-system', 'name' => 'Cafe Ordering System', 'student' => 'Chris Coyier'],
        ['slug' => 'event-ticket-website', 'name' => 'Event Ticket Website', 'student' => 'Scott Tolinski'],
    ];

    $missingFiles = [
        ['name' => 'Project ZIP File', 'description' => 'Final code archive', 'uploaded' => false, 'file' => 'N/A'],
        ['name' => 'Hosting Information', 'description' => 'Domain, hosting and contact details', 'uploaded' => false, 'file' => 'N/A'],
        ['name' => 'Deployment Documentation', 'description' => 'Install, restore and handover steps', 'uploaded' => false, 'file' => 'N/A'],
    ];
    $projectOnlyFiles = [
        ['name' => 'Project ZIP File', 'description' => 'Final code archive', 'uploaded' => true, 'file' => 'project-archive.zip'],
        ['name' => 'Hosting Information', 'description' => 'Domain, hosting and contact details', 'uploaded' => false, 'file' => 'N/A'],
        ['name' => 'Deployment Documentation', 'description' => 'Install, restore and handover steps', 'uploaded' => false, 'file' => 'N/A'],
    ];
    $uploadedFiles = [
        ['name' => 'Project ZIP File', 'description' => 'Final code archive', 'uploaded' => true, 'file' => 'project-archive.zip'],
        ['name' => 'Hosting Information', 'description' => 'Domain, hosting and contact details', 'uploaded' => true, 'file' => 'hosting-info.zip'],
        ['name' => 'Deployment Documentation', 'description' => 'Install, restore and handover steps', 'uploaded' => true, 'file' => 'deployment-docs.zip'],
    ];

    $project = match ($projectSlug) {
        'liveworks-archive' => [
            'name' => 'LiveWorks Archive',
            'description' => 'Website build for the LiveWorks archive prototype.',
            'status' => 'Draft',
            'student' => 'Filip Riccio',
            'course' => 'Diploma of Web Development',
            'cutoff' => '02/06/27',
            'client' => 'North Metropolitan TAFE',
            'files' => $missingFiles,
        ],
        'farm-tour-bookings' => [
            'name' => 'Farm Tour Bookings',
            'description' => 'Booking website for a farm tour operator.',
            'status' => 'Incomplete',
            'student' => 'Rich Harris',
            'course' => 'Diploma of Web Development',
            'cutoff' => '18/06/27',
            'client' => 'Farm tour operator',
            'files' => $missingFiles,
        ],
        'local-gym-website' => [
            'name' => 'Local Gym Website',
            'description' => 'Business website for a local gym.',
            'status' => 'Incomplete',
            'student' => 'Dave Rupert',
            'course' => 'Certificate IV Web',
            'cutoff' => '25/06/27',
            'client' => 'Local gym',
            'files' => $projectOnlyFiles,
        ],
        'council-website' => [
            'name' => 'Council Website',
            'description' => 'Information website for a local council team.',
            'status' => 'Ready for review',
            'student' => 'Blake Smith',
            'course' => 'Certificate IV Web',
            'cutoff' => '12/06/27',
            'client' => 'Local council team',
            'files' => $uploadedFiles,
        ],
        'cafe-ordering-system' => [
            'name' => 'Cafe Ordering System',
            'description' => 'Ordering system for the campus cafe.',
            'status' => 'Archived',
            'student' => 'Chris Coyier',
            'course' => 'Diploma of Web Development',
            'cutoff' => '20/06/27',
            'client' => 'Campus cafe',
            'files' => $uploadedFiles,
        ],
        'event-ticket-website' => [
            'name' => 'Event Ticket Website',
            'description' => 'Ticketing website for a community events group.',
            'status' => 'Archived',
            'student' => 'Scott Tolinski',
            'course' => 'Certificate IV Web',
            'cutoff' => '05/07/27',
            'client' => 'Community events group',
            'files' => [
                ['name' => 'Project ZIP File', 'description' => 'Final code archive', 'uploaded' => true, 'file' => 'event-ticket-archive.zip'],
                ...array_slice($uploadedFiles, 1),
            ],
        ],
        default => null,
    };

    abort_if($project === null, 404);
@endphp

<x-ui.dashboard-layout
    :title="$project['name'].' — LiveWorks Archive'"
    :role="$role"
    :projects="$projects"
    :current-project="$currentProject"
    :user="$user"
>
    <article class="dashboard-content project-view">
        <p>STAFF PROJECT VIEW</p>

        <header class="project-heading">
            <div>
                <h1>{{ $project['name'] }}</h1>
                <p>{{ $project['description'] }}</p>
            </div>

            <x-ui.project-status :status="$project['status']" />
        </header>

        <x-ui.project-details :project="$project" />
        <x-ui.submission-checklist :items="$project['files']" />

        <section class="staff-actions">
            <h2>Staff Actions</h2>
            <div>
                <button type="button" @disabled($project['status'] === 'Archived')>Request Changes</button>
                <button type="button" @disabled($project['status'] === 'Archived')>
                    {{ $project['status'] === 'Archived' ? 'Archive Approved' : 'Approve Archive' }}
                </button>
            </div>
        </section>
    </article>
</x-ui.dashboard-layout>
