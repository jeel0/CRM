<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full text-center justify-center bg-cyan-600 hover:bg-cyan-700 active:bg-cyan-700 focus-visible:ring ring-black text-white text-sm md:text-base font-semibold rounded-md outline-none transition duration-100 px-8 py-3']) }}>
    {{ $slot }}
</button>