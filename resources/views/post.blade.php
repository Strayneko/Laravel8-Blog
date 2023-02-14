{{-- first approach layouting blade --}}

@extends('layouts.base')
@section('title', $post->title)
@section('content')
<div>
    <article>
        <h1>{{ $post->title }}</h1>
    <p>By : <a href="/db/author/{{ $post->author->username }}">{{ $post->author->name }}</a>
        in
        <a href="/db/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
    </p>
   {!! $post->body !!}
    </article>
    <a href="/db/posts">Back</a>
</div>
@endsection
