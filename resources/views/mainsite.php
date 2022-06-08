<?php // foreach ($main_site as $post) : ?>          <!-- @foreach ($posts as $post) -->
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
<!-- @foreach ($main_site as $post) 
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
        @foreach ($main_site as $post) 
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


        <!-- <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                <option value="category" disabled selected>Category</option> -->
                <!-- <option value="personal">Personal</option> -->
                <!-- @foreach ($categories as $category) -->
                <!-- <option value="{{ $category->slug }}">{{ $category->name }}</option> -->
                <!-- @endforeach -->
            <!-- </select> -->
            <!-- <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22"> -->
                <!-- <g fill="none" fill-rule="evenodd"> -->
                    <!-- <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"> -->
                    <!-- </path> -->
                    <!-- <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path> -->
                <!-- </g> -->
            <!-- </svg> -->
        <!-- </div> -->