@php
    $role = 'staff';
    $currentProject = null;
    $user = [
        'name' => auth()->user()->name,
        'number' => auth()->user()->student_number ?: auth()->user()->email,
    ];
@endphp

<x-ui.dashboard-layout title="Staff Dashboard — LiveWorks Archive" :role="$role" :projects="$projects" :current-project="$currentProject"
    :user="$user">
    <section class="dashboard-content staff-dashboard">
        <p>STAFF DASHBOARD</p>
        <h1>Projects</h1>
        <p>Select a project from the sidebar or find one below.</p>

        <div class="dashboard-search">
            <div class="search-group">
                <input type="search" placeholder="Search by project or student name">
                <button type="button">Search</button>
            </div>

            <a class="create-link" href="{{ route('ui.staff.projects.create') }}">New Project</a>
        </div>
    </section>
</x-ui.dashboard-layout>
