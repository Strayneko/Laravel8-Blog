{{-- layouting blade using component --}}
<x-layout title="All Post">
  @foreach ($posts as $post)
  <article>
    <a href="/db/posts/{{ $post->slug }}">
      <h1>{{ $post->title }}</h1>
    </a>
    <p>By : <a href="#">{{ $post->user->name }}</a>
      in
      <a href="/db/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
    </p>
    {{ $post->excerpt }}
  </article>
  @endforeach
</x-layout>

