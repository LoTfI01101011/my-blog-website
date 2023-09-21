@auth
<x-panel>
  <form method="Post" action="/posts/{{$post->slug}}/comments">
    @csrf

    <header class="flex items-center">
      <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="60" height="60" class="rounded-xl">

      <h2 class="ml-4">want to Participate?</h2>
    </header>

    <div class="mt-6">
      <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="Quick , thing or somthing to say"></textarea>
    </div>
    @error('body')
    <span class="text-xs text-red-500">{{$message}}</span>
    @enderror

    <div class="flex justify-end mt-6 pt-6 boarder-t boarder-gray-200 ">
      <x-submit-button>
        Post
      </x-submit-button>
    </div>
  </form>
</x-panel>

@else
<p class="text-semibold">
  <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Login </a>to leave a Comment .
</p>
@endauth