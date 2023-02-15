<div class="lg:grid lg:grid-cols-6">
    {{-- loop trhough posts and skip 1 data --}}
    @foreach ($posts->skip(1) as $post)
        <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
    @endforeach
</div>
