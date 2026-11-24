@php
    $role = 'student';
    $currentProject = null;
    $user = [
        'name' => auth()->user()->name,
        'number' => auth()->user()->student_number ?: auth()->user()->email,
    ];
    $project = [
        'slug' => 'farm-tour-bookings',
        'name' => 'Farm Tour Bookings',
        'student' => 'Rich Harris',
        'cutoff' => '18/06/27',
        'status' => 'Incomplete',
    ];
@endphp

<x-ui.dashboard-layout title="Student Dashboard — LiveWorks Archive" :role="$role" :projects="$projects" :current-project="$currentProject"
    :user="$user">
    <section class="dashboard-content student-project">
        <p>PROJECT FILES UPLOAD</p>
        <h1>{{ $project['name'] }}</h1>
        <p>Lecturer: John Proferson &nbsp; Due: {{ $project['cutoff'] }} &nbsp; Status: {{ $project['status'] }}</p>
        <p>Upload each required file before submitting the project for archival approval.</p>

        <form class="upload-form">
            <div class="uploads">
                <x-ui.file-upload name="project_archive" title="Project ZIP File"
                    description="Final codebase as a single ZIP archive." accept=".zip" />

                <x-ui.file-upload name="hosting_information" title="Project Hosting Information"
                    description="Domain, hosting location, handover notes, and contact details."
                    accept=".pdf,.docx,.txt" />

                <x-ui.file-upload name="deployment_documentation" title="Deployment Documentation"
                    description="Installation, deployment, and recovery instructions." accept=".pdf,.docx,.txt" />
            </div>

            <footer class="form-footer">
                <div>
                    <button type="button">Save Draft</button>
                    <button type="button">Submit</button>
                </div>
            </footer>
        </form>
    </section>
</x-ui.dashboard-layout>
