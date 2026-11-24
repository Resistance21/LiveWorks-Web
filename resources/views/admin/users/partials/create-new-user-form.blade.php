<section>
    <header>
        <h2 class="text-lg font-medium text-zinc-900">
            {{ __('Create User Profile Information') }}
        </h2>
    </header>

    <div class="mt-6 space-y-6">
        <form method="post" action="{{ route('admin.users.store') }}" class="mt-6 space-y-6">
            @csrf
            @method('post')
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')"
                    required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                    autocomplete="password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- <div>
                <x-input-label for="given_name" :value="__('Given Name')" />
                <x-text-input id="given_name" name="given_name" type="text" class="mt-1 block w-full" :value="old('given_name')" required autocomplete="given_name" />
                <x-input-error :messages="$errors->get('given_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="family_name" :value="__('Family Name')" />
                <x-text-input id="family_name" name="family_name" type="text" class="mt-1 block w-full" :value="old('family_name')" required autocomplete="family_name" />
                <x-input-error :messages="$errors->get('family_name')" class="mt-2" />
            </div> --}}

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Create User') }}</x-primary-button>
                <a href="{{ route('admin.users.index') }}">
                    <x-secondary-button>{{ __('Return') }}</x-secondary-button>
                </a>
                @if (session('status') === 'profile-created')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-zinc-600">{{ __('profile created.') }}</p>
                @endif
            </div>
        </form>
    </div>
</section>
