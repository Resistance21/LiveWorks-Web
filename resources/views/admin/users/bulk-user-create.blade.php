<x-ui.layout>
    @if ($errors->any())
        <pre>{{ $errors }}</pre>
    @endif
    @if (session('importErrors'))
        @foreach (session('importErrors') as $row)
            <li>
                {{ $row['row']['name'] ?? 'Unknown' }} — {{ implode(', ', $row['errors']) }}
            </li>
        @endforeach
    @endif
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-xl font-semibold mb-4">Bulk Create Users</h1>

        @if (session('status'))
            <div class="mb-4 text-green-600">{{ session('status') }}</div>
        @endif

        @error('csv_file')
            <div class="mb-4 text-red-600">{{ $message }}</div>
        @enderror

        <form method="POST" action="{{ route('admin.users.bulk-store') }}" enctype="multipart/form-data">
            @csrf

            <input type="file" name="csv_file" accept=".csv,.txt">

            <button type="submit">Upload</button>
        </form>
    </div>
</x-ui.layout>
