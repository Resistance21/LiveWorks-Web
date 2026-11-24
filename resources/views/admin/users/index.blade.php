<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('User Admin') }}
        </h2>
    </x-slot>

    <section class="py-4 mx-8 space-y-4 " x-data="{ deleteUrl: '' }">
        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                Users
            </h3>
        </header>
        <div class="flex flex-1 w-full max-h-min overflow-x-auto">
            <table class="min-w-full divide-y-2 divide-zinc-200 bg-zinc-50">
                <thead class="sticky top-0 bg-zinc-700 ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-white">
                        <th class="px-3 py-2 whitespace-nowrap">User</th>
                        <th class="px-3 py-2 whitespace-nowrap">Role</th>
                        <th class="px-3 py-2 whitespace-nowrap">Status</th>
                        <th class="px-3 py-2 whitespace-nowrap">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-zinc-200">
                    @foreach ($users as $user)
                        <tr class="*:text-zinc-900 *:first:font-medium hover:bg-white">
                            <td class="px-3 py-1 whitespace-nowrap flex flex-col min-w-1/3">
                                <span class="">{{ $user->name }}</span>
                                <span class="text-sm text-zinc-500">{{ $user->email }}</span>
                            </td>
                            <td class="px-3 py-1 whitespace-nowrap w-auto">
                                <span class="text-xs rounded-full bg-zinc-700 p-0.5 px-2 text-zinc-200">
                                    role
                                </span>
                            </td>
                            <td class="px-3 py-1 whitespace-nowrap w-1/6">
                                Suspended
                            </td>
                            <td class="px-3 py-1 whitespace-nowrap w-1/8">
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                    class="grid grid-cols-3 gap-2 w-full">
                                    @csrf
                                    @method('delete')

                                    <a href="{{ route('admin.users.show', $user) }}"
                                        class="hover:text-green-500 transition border p-2 text-center rounded">
                                        <i class="fa-solid fa-user-tag"></i>
                                    </a>

                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="hover:text-blue-500 transition border p-2 text-center rounded">
                                        {{-- x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"> --}}
                                        <i class="fa-solid fa-user-cog"></i>
                                    </a>
                                    <button type="button"
                                        class="hover:text-red-500 transition border p-2 text-center rounded"
                                        x-on:click="deleteUrl = '{{ route('admin.users.destroy', $user) }}'"
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                                        <i class="fa-solid fa-user-slash"></i>
                                    </button>


                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="4" class="p-3">
                            {{ $users->onEachSide(2)->links('vendor.pagination.tailwind') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div>
            <a href="{{ route('admin.users.create') }}">
                <x-primary-button>Add New User</x-primary-button>
            </a>
        </div>


        <x-modal name="confirm-user-deletion" class="z-60" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" :action="deleteUrl" class="p-6" x-data="{ confirm: '' }">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-zinc-900">
                    {{ __('Are you sure you want to delete the user account?') }}
                </h2>

                <p class="mt-1 text-sm text-zinc-600">
                    {{ __('Once the user account is deleted, all of its resources and data will be permanently deleted.') }}
                </p>

                <div class="mt-6">
                    <x-input-label for="confirm" value="{{ __('Confirm Deletion') }}" class="" />
                    <p class="mt-1 text-sm text-zinc-600">
                        {{ __('Type "delete user" to confirm deletion of user account.') }}
                    </p>

                    <x-text-input id="confirm" name="confirm" type="text" class="mt-1 block w-3/4"
                        placeholder="{{ __('delete user') }}" x-model="confirm" />

                    <x-input-error :messages="$errors->userDeletion->get('confirm')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3" x-bind:disabled="confirm !== 'delete user'"
                        x-bind:class="confirm !== 'delete user' ? 'opacity-50 cursor-not-allowed bg-gray-400' : 'bg-red-600'">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </section>



</x-admin-layout>
