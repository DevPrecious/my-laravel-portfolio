<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit About Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Edit Bio --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Bio Information') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update the main description on the About page.") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('admin.about.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="bio" :value="__('Bio (HTML allowed)')" />
                                <textarea id="bio" name="bio"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    rows="10" required>{{ old('bio', $about->bio ?? '') }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            {{-- Manage Skills --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Skills') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Add or remove skills displayed on the About page.") }}
                            </p>
                        </header>

                        {{-- Add Skill Form --}}
                        <form method="post" action="{{ route('admin.skills.store') }}" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="name" :value="__('New Skill')" />
                                <div class="flex gap-2">
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                        required />
                                    <x-primary-button class="mt-1">{{ __('Add') }}</x-primary-button>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                        </form>

                        {{-- Skills List --}}
                        <div class="mt-6">
                            <ul class="divide-y divide-gray-200">
                                @foreach($skills as $skill)
                                    <li class="py-4 flex justify-between items-center">
                                        <span class="text-gray-800">{{ $skill->name }}</span>
                                        <form method="post" action="{{ route('admin.skills.destroy', $skill) }}"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 text-sm font-medium">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                </div>
            </div>

            {{-- Manage Work History --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Work History') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Add or remove work experiences.") }}
                            </p>
                        </header>

                        {{-- Add Experience Form --}}
                        <form method="post" action="{{ route('admin.experiences.store') }}" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="role" :value="__('Role')" />
                                <x-text-input id="role" name="role" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('role')" />
                            </div>

                            <div>
                                <x-input-label for="company" :value="__('Company')" />
                                <x-text-input id="company" name="company" type="text" class="mt-1 block w-full"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('company')" />
                            </div>

                            <div>
                                <x-input-label for="period" :value="__('Period')" />
                                <x-text-input id="period" name="period" type="text" class="mt-1 block w-full"
                                    placeholder="e.g. 2023 - Present" required />
                                <x-input-error class="mt-2" :messages="$errors->get('period')" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description (HTML allowed)')" />
                                <textarea id="description" name="description"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    rows="4"></textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Add Experience') }}</x-primary-button>
                            </div>
                        </form>

                        {{-- Experience List --}}
                        <div class="mt-6">
                            <ul class="divide-y divide-gray-200">
                                @foreach($experiences as $experience)
                                    <li class="py-4">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h4 class="text-gray-900 font-bold">{{ $experience->role }}</h4>
                                                <p class="text-gray-600 text-sm">{{ $experience->company }} |
                                                    {{ $experience->period }}</p>
                                            </div>
                                            <form method="post"
                                                action="{{ route('admin.experiences.destroy', $experience) }}"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 text-sm font-medium">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>