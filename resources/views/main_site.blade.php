<x-layout>
        @include ('_posts-header')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($main_site->count())
                <x-posts-grid :posts="$main_site"/> 
            @else
                <p class="text-center">No articles yet.</p>
            @endif
        </main>

</x-layout>