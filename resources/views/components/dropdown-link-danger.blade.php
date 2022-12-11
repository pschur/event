<a {{ $attributes->merge(['class' => 'block px-4 py-2 text-sm leading-5 font-bold text-red-500 hover:bg-red-500 hover:text-white focus:outline-none focus:bg-gray-100 transition']) }}>
    {{ $slot }}
</a>
