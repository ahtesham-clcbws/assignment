<section>
    <header>
        @if (count($errors) > 0)
            @foreach ($errors as $error)
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="color: red !important;">
                    {{ $error }}
                </p>
            @endforeach
        @endif
    </header>

    <form method="post" action="{{ route('service.add') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div>
            <x-input-label for="name" :value="__('Service Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus
                autocomplete="name" />
        </div>
        <div>
            <x-input-label for="location" :value="__('Service Location')" />
            <x-select-input id="location" name="location" class="mt-1 block w-full" required autofocus
                autocomplete="location" :optionPlaceholder="__('Select location')" :options="$locations" />
        </div>
        <div>
            <x-input-label for="price" :value="__('Service Price')" />
            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" required autofocus
                autocomplete="price" />
        </div>
        <div>
            <x-input-label for="image" :value="__('Service Image')" />
            <x-text-input id="image" name="image" accept=".jpg, .jpeg, .png" type="file"
                class="mt-1 block w-full" required autofocus autocomplete="image" />
        </div>
        <div>
            <x-input-label for="description" :value="__('Service Description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" required
                autofocus autocomplete="description" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
