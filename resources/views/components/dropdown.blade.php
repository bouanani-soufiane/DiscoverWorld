<div x-data="{ show: false }" class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
    {{ $trigger }}

    <div x-show="show" @click.away="show = false" class="py-2 absolute w-32 mt-2 rounded-xl bg-white border border-gray-200 shadow-lg overflow-auto max-h-52">
        {{ $slot }}
    </div>

</div>
