<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log in!</h1>
                <form method="Post" action="/login" class="mt-10">

                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />

                    <x-submit-button>Log In</x-submit-button>
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <p class="text-red-500 text-xs">{{ $error }}</p>
                            @endforeach
                        </ul>
                    @endif
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
