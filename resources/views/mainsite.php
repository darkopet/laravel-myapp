<?php // foreach ($posts as $post) : ?>          <!-- @foreach ($posts as $post) -->
            <article>
                <h5><?= $post->excerpt; ?></h5>
                <div> {{ $post->excerpt }} </div>
                <h6><?= $post->date; ?></h6>
                <div> {{ $post->date }}</div>
                <h1>
                    <a href="/posts/<?= $post->slug ?>">    <!-- /posts/{{ $post->slug }}  -->
                        {{ $post->title }}
                        <?= $post->title; ?>
                        <?php echo $post->title; ?>
                    </a>
                </h1>
                
            </article>
        <?php //endforeach; ?>                              <!-- @endforeach -->  


<!--  -->
<!-- @foreach ($mposts as $post) 
                <article>
                    <div> {{ $post->excerpt }} </div>
                    <div> {{ $post->date }}</div>
                    <h1>
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>
                </article>
            @endforeach                               -->

<!-- <body> -->


<!-- @extends('layout')

    @section('banner')
        <h1>LARAVEL Web Site</h1>
    @endsection    

    @section('content')
        @foreach ($posts as $post) 
            <article>
                <div> {{ $post->excerpt }} </div>
                <div> {{ $post->date }} </div>
                <h1>
                    <a href="/posts/{{ $post->slug }}">
                        {{ $post->title }}
                    </a>
                </h1>
            </article>
        @endforeach   
    @endsection  -->




<!-- layout.blade.php -->
    <!-- <!doctype html>
<title>LARAVEL Frist Web Site</title>
<link rel="stylesheet" href="/app.css">
<body>
    <header>
        @yield('banner')
    </header>
        @yield('content')  
     {{ $slot }}   
</body> -->