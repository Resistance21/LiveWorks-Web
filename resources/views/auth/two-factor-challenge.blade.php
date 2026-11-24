<x-app-layout>

    <div class="mt-4 flex flex-col items-center justify-between">
        <form method="POST" action="{{ route('two-factor.login.store') }}">
            @csrf
            <input class='border-1' type="text" name="code" placeholder="Authentication Code">
            <input class='border-1' type="text" name="recovery_code" placeholder="Or enter a recovery code">
            <button type="submit">Confirm</button>
        </form>

        @error('code')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror

        @error('recovery_code')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
    </div>
</x-app-layout>
