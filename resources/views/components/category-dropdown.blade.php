<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 tect-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex" style="display: inline-flex;" width="22">

            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />

        </button>
    </x-slot>

    <x-dropdown-item href="/main_site" :active="request()->routeIs('home')">
        All
    </x-dropdown-item>

    @foreach ($categories as $category)
    <x-dropdown-item href="/main_site?category={{ $category->slug }}" :active='request()->is("categories/.{$category->slug}")'>
        {{ ucwords($category->name) }}
    </x-dropdown-item>
    @endforeach
</x-dropdown>