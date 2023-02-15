<div x-data="{ show: false }" @click.away="show = false" class="overflow-auto max-height-52">
    {{-- trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>
    {{-- end of trigger --}}



    <div class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50" x-show="show" style="display:none">
        {{ $slot }}
    </div>
</div>
