@props(['buttons' => '', 'infos' => ''])

<div class="bg-white">
    <div class="py-5 max-w-7xl mx-auto px-6 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                {{ $slot }}
            </h2>
            <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                {!! $infos !!}
            </div>
        </div>
        <div class="mt-5 flex lg:mt-0 lg:ml-4">
            {!! $buttons !!}
        </div>
    </div>
</div>
