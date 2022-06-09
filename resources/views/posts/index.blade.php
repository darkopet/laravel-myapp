<x-layout>
        @include ('posts._header')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($posts->count())
                <x-posts-grid :posts="$posts" /> 
                <?php
                    echo "<pre>"; 
                    var_dump($posts[0]);
                    echo "/<pre>"; 
                ?>
            @else
                <p class="text-center">No articles yet.</p>
            @endif
        </main> 
</x-layout>