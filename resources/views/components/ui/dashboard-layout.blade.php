@props(['role', 'projects', 'currentProject', 'user'])

<x-ui.layout>
    <div class="dashboard-layout">
        <x-ui.dashboard-sidebar :role="$role" :projects="$projects" :current-project="$currentProject" :user="$user" />

        <main class="dashboard-main">
            <div class="dashboard-container">
                {{ $slot }}
            </div>
        </main>
    </div>
</x-ui.layout>
