@extends('layouts.pageCategories')
@section('posts')

<?php

// dump($all_last_posts["not_found"]);

?>
@if ($all_last_posts['not_found'] == '1')
    <div class="text-center">
        {!! $all_last_posts["not_found_text"] !!}
    </div>
@endif
@endsection