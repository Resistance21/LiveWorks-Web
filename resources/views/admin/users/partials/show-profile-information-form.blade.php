@php
    /** @var \App\Models\User $user */
@endphp

<section>
    <header>
        <h2 class="text-lg font-medium text-zinc-900">
            {{ __('User Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-zinc-600">
            {{ __("User's account profile information and email address.") }}
        </p>
    </header>

    <div class="mt-6 space-y-6">

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" disabled="true" required autofocus autocomplete="name" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" disabled="true" required autocomplete="username" />
        </div>

        <div>
            <x-input-label for="given_name" :value="__('Given Name')" />
            <x-text-input id="given_name" name="given_name" type="text" class="mt-1 block w-full" :value="old('given_name', $user->given_name)" disabled required autocomplete="given_name" />
        </div>

        <div>
            <x-input-label for="family_name" :value="__('Family Name')" />
            <x-text-input id="family_name" name="family_name" type="text" class="mt-1 block w-full" :value="old('family_name', $user->family_name)" disabled="true" required autocomplete="family_name" />
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.users.index') }}">
                <x-primary-button>{{ __('Return') }}</x-primary-button>

            </a>
        </div>
    </div>
</section>