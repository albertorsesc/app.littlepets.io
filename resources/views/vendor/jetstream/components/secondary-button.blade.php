<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-white focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-200 active:bg-white disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
