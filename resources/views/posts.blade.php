{{-- layouting blade using component --}}
<x-layout title="All Post">
  @foreach ($posts as $post)
  <article>
    <a href="posts/{{ $post->slug }}">
      <h1>{{ $post->title }}</h1>
    </a>
    {{ $post->excerpt }}
  </article>
  @endforeach
</x-layout>

