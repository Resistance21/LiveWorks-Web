@props(['items'])

<section class="submission-checklist">
    <h3>Submission Checklist</h3>

    <div class="checklist" role="table">
        <div class="checklist-head" role="row">
            <div role="columnheader">Archive Item</div>
            <div role="columnheader">Description</div>
            <div role="columnheader">Status</div>
            <div role="columnheader">File</div>
        </div>

        @foreach ($items as $item)
            <div class="checklist-row" role="row">
                <div role="cell"><strong>{{ $item['name'] }}</strong></div>
                <div role="cell">{{ $item['description'] }}</div>
                <div role="cell">{{ $item['uploaded'] ? 'Uploaded' : 'Missing' }}</div>
                <div role="cell">
                    <span>{{ $item['file'] }}</span>

                    <button
                        type="button"
                        title="{{ $item['uploaded'] ? 'Download will be connected during backend integration' : 'No file uploaded' }}"
                        @disabled(! $item['uploaded'])
                    >
                        <x-ui.icons.download />
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</section>
