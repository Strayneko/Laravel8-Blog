 @auth
     <x-panel>
         <form action="/db/posts/{{ $post->slug }}/comments" method="POST">
             @csrf

             <header class="flex items-center">
                 <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="60" height="60"
                     class="rounded-xl shadow-lg">
                 <h2 class="ml-3">Want to participate?</h2>
             </header>


             <div class="mt-6">
                 <textarea name="body" id="" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                     placeholder="What do you think?" required></textarea>
                 @error('body')
                     <p class="text-xs text-red-500">{{ $message }}</p>
                 @enderror
             </div>

             <div class="flex justify-end border-t border-gray-200 pt-6 mt-6">
                 <x-submit-button>Post</x-submit-button>
             </div>
         </form>
     </x-panel>
 @else
     <p class="font-semibold">
         <a href="/auth/register" class="hover:underline">Register</a>
         or
         <a href="/auth/login" class="hover:underline">Log in</a> to leave a comment
     </p>
 @endauth
