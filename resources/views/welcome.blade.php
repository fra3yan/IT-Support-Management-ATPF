@extends('head')

@section('content')
<div class="links">
    <a href="https://laravel.com/docs">Krik Krik</a>
    <a href="https://laracasts.com">Laracasts</a>
    <a href="https://laravel-news.com">News</a>
    <a href="https://blog.laravel.com">Blog</a>
    <a href="https://nova.laravel.com">Nova</a>
    <a href="https://forge.laravel.com">Forge</a>
    <a href="https://github.com/laravel/laravel">GitHub</a>

    <ul>
    <?php foreach ($hobi as $hobi_ ) : ?>
        <li> <?php echo $hobi_ ?>
    <?php endforeach ?>


    </ul>
</div>
@endsection



