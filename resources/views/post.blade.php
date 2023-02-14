{{-- first approach layouting blade --}}

@extends('layouts.base')
@section('title', $post->title)
@section('content')
<div>
    <article>
        <h1>{{ $post->title }}</h1>
   {!! $post->body !!}
    </article>
    <a href="/db/posts">Back</a>
</div>
@endsection
