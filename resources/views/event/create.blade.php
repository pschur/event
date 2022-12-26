<x-app-layout>
    <x-page-heading>
        {{ __('Events') }}
        <x-slot name="buttons">
            <a href="{{ route('event.index') }}">
                <x-secondary-button>
                    {{ __('Home') }}
                </x-secondary-button>
            </a>
        </x-slot>
    </x-page-heading>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-jet-form-section method="POST" :action="route('event.store')">
            <x-slot name="form">
                @csrf
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" :value="old('title')" type="text" class="mt-1 block w-full" name="title" />
                    <x-jet-input-error for="title" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-textarea name="description" />
                    <x-jet-input-error for="description" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="date" value="{!! __('Date & Time') !!}" />
                    <x-jet-input name="date" :value="old('date')" type="datetime-local" class="mt-1 block w-full" />
                    <x-jet-input-error for="date" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="place" value="{{ __('Place') }}" />
                    <x-jet-input name="place-short" :value="old('date')" type="text" class="mt-1 block w-full" placeholder="{{ __('Title of the place') }}"/>
                    <x-jet-input-error for="place-short" class="mt-2" />

                    <textarea
                        name="place-long"
                        id="place-long"
                        rows="3"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                        placeholder="{{ __('Address of the place') }}"
                    ></textarea>
                    <x-jet-input-error for="place-long" class="mt-2" />
                </div>


            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    </div>

</x-app-layout>
