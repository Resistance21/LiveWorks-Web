@props([
    'title',
    'text',
])

<div class="submission-progress" aria-live="polite">
    <h3>{{ $title }}</h3>
    <p>{{ $text }}</p>
</div>
