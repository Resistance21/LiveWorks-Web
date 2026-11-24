@props(['message', 'type' => 'success'])

<div {{ $attributes->merge(['class' => 'rounded-md mx-auto p-4 bg-green-100 flex justify-center']) }}>
    <p class="text-xl bold text-red-600">
        {{ $message }}
    </p>
</div>
