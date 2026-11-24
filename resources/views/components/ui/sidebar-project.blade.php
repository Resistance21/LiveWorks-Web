@props([
    'project',
    'role',
    'current',
])

@php
    $href = $role === 'staff'
        ? route('ui.staff.projects.show', $project['slug'])
        : route('ui.student.dashboard');
@endphp

<article>
    <a href="{{ $href }}" @if ($current) aria-current="page" @endif>
        <h2>{{ $project['name'] }}</h2>

        <div class="project-info">
            <p>{{ $project['student'] }}</p>

            @if ($role === 'student')
                <p>{{ strtolower($project['status']) }}</p>
            @endif
        </div>
    </a>
</article>
