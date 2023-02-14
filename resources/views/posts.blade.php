<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>
<body>
    <div>
      @foreach ($posts as $post)
          <article>
            <a href="posts/{{ $post->slug }}">
              <h1>{{ $post->title }}</h1>
            </a>
            {{ $post->excerpt }}
          </article>
      @endforeach
    </div>
</body>
</html>