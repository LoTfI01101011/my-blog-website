<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">

      <form method="Post" action="/login">
        <h1 class="text-center font-bold text-xl">Log in!</h1>
        @csrf
        
        <x-form.input name="email" type="email" autocomplete="username"/>
        <x-form.input name="password" type="password" autocomplete="new-password"/>
        
        <div class="mb-6">
          <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
            Submit
          </button>
        </div>
        @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error )
          <p class="text-red-500 text-xs">{{$error}}</p>
          @endforeach
        </ul>
        @endif
      </form>
    </main>
  </section>
</x-layout>