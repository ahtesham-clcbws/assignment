<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Site Setting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>

                            @if (session('site-status') === 'success')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('Site updated succesfully.') }}
                                </p>
                            @endif
                            @if (session('site-status') === 'error')
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="color: red !important;">
                                    {{ __('Unable to save data.') }}
                                </p>
                            @endif
                        </header>

                        <form method="post" action="{{ route('site.setting') }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <div>
                                <x-input-label for="validity" :value="__('Site validity')" />
                                <x-text-input id="validity" name="validity" type="date" class="mt-1 block w-full"
                                    required autofocus autocomplete="validity" :value="date('Y-m-d', intval($siteSetting['validity']) / 1000)" />
                            </div>
                            <div>
                                <x-input-label for="show_price" :value="__('Show Services Price?')" />
                                <select id="show_price" name="show_price" required
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Show price ?</option>
                                    <option {{ $siteSetting['show_price'] ? 'selected' : '' }}>
                                        Yes
                                    </option>
                                    <option {{ !$siteSetting['show_price'] ? 'selected' : '' }}>
                                        No
                                    </option>
                                </select>
                            </div>


                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
