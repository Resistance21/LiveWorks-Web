@props([
    'name',
    'title',
    'description',
    'accept',
])

<div class="file-upload" data-file-upload>
    <div>
        <h3>{{ $title }}</h3>
        <p>{{ $description }}</p>
    </div>

    <span class="file-status" data-file-status>Required</span>

    <div class="upload-controls">
        <label class="upload-button" for="{{ $name }}">
            Upload
            <input
                id="{{ $name }}"
                name="{{ $name }}"
                type="file"
                accept="{{ $accept }}"
                required
                data-file-input
            >
        </label>
        <button type="button" class="clear-file" data-clear-file hidden>Clear</button>
    </div>
</div>
