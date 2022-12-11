<x-app-layout>
    <x-page-heading>
        {{ __('Events') }}
        <x-slot name="buttons">
            <a href="{{ route('event.index') }}">
                <x-secondary-button>
                    {{ __('Home') }}
                </x-secondary-button>
            </a>
            <a href="{{ route('event.create') }}" class="ml-3">
                <x-button>
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ __('Create') }}
                </x-button>
            </a>
        </x-slot>
    </x-page-heading>
</x-app-layout>
