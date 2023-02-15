{{-- layouting blade using component --}}
<x-styled-layout title="All Post">

    {{-- header --}}
    @include('_post-header')
    {{-- end of header --}}


    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        {{-- check if there is atleast 1 post available --}}
        @if ($posts->count())
            {{-- Featured post card --}}
            <x-featured-post-card :post="$posts[0]" />
            {{-- end of Featured post card --}}

            {{-- Posts --}}
            <x-posts-grid :posts="$posts" />
            {{-- end of posts --}}
        @else
            <p class="text-center">No post available</p>
        @endif
    </main>


    {{-- @foreach ($posts as $post)
  <article>
    <a href="/db/posts/{{ $post->slug }}">
      <h1>{{ $post->title }}</h1>
    </a>
    <p>By : <a href="/db/author/{{ $post->author->username }}">{{ $post->author->name }}</a>
      in
      <a href="/db/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
    </p>
    {{ $post->excerpt }}
  </article>
  @endforeach --}}
</x-styled-layout>
