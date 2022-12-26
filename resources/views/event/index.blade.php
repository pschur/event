<x-app-layout>
    <x-page-heading>
        {{ __('Events') }}
        <x-slot name="buttons">
             @can('create', \App\Models\Event::class)
                <a href="{{ route('event.create') }}" class="ml-3">
                    <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ __('Create') }}
                    </button>
                </a>
            @endcan

        </x-slot>
    </x-page-heading>

    <div class="py-12 max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
        @foreach($events as $event)
            <x-event-card :event="$event" />
        @endforeach
    </div>
</x-app-layout>
