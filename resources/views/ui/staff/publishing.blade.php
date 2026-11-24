@php
    $role = 'staff';
    $currentProject = null;
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
@endphp

<x-ui.dashboard-layout
    title="Publishing Project — LiveWorks Archive"
    :role="$role"
    :projects="$projects"
    :current-project="$currentProject"
    :user="$user"
>
    <section class="dashboard-content">
        <p>STAFF DASHBOARD</p>
        <h1>Create project</h1>

        <x-ui.submission-progress
            title="Project published."
            text="The new project has been created."
        />
    </section>
</x-ui.dashboard-layout>
