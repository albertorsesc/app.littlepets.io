<button {{ $attributes->merge(['type' => 'submit', 'class' => 'lp-btn-success']) }}>
    {{ $slot }}
</button>
