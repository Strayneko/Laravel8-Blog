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

    <x-dropdown-item href="/db/posts?{{ http_build_query(request()->except('category', 'page')) }}" :active="!request('search') && !request('category')">All
    </x-dropdown-item>
    @foreach ($categories as $category)
        {{-- http_build_query used to turn array into url query parameter --}}
        <x-dropdown-item
            href="/db/posts?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="isset($currentCategory) && $currentCategory->is($category)">
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
