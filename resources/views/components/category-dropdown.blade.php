<x-dropdown>
    {{-- button trigger --}}
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">

            {{-- check the current category name --}}
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}


            <x-icon name="down-arrow" class="absolute pointer-events-none" />
        </button>
    </x-slot>
    {{-- end of trigger man --}}

    <x-dropdown-item href="/db/posts" :active="!request('search') && !request('category')">All</x-dropdown-item>
    @foreach ($categories as $category)
        <x-dropdown-item href="/db/posts?category={{ $category->slug }}" :active="isset($currentCategory) && $currentCategory->is($category)">
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
