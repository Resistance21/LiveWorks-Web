<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-zinc-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <x-alert-modal class='absolute left-1/2 -translate-x-1/2' :message="session('success')" x-data="{ show: false }"
            x-init="setTimeout(() => show = true, 50);
            setTimeout(() => show = false, 3000)" x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-y-0 opacity-100"
            x-transition:leave-end="-translate-y-full opacity-0" />
    @endif

    @if ($errors->has('month_picker'))
        <x-alert-modal class='absolute left-1/2 -translate-x-1/2' :message="$errors->first('month_picker')" type="error"
            x-data="{ show: false }" x-init="setTimeout(() => show = true, 50);
            setTimeout(() => show = false, 4000)" x-show="show"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-y-full opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-full opacity-0" />
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.users.partials.show-profile-information-form')
                </div>
            </div>


        </div>
    </div>

</x-app-layout>
