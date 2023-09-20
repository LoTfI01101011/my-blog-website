<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 ">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register!</h1>
                <form method="Post" action="/register">

                    @csrf

                    <x-form.input name="name" autocomplete="name" />

                    <x-form.input name="username" autocomplete="username" />

                    <x-form.input name="email" type="email" autocomplete="email" />

                    <x-form.input name="password" type="password" autocomplete="new-password" />

                    <x-submit-button>Register</x-submit-button>

                    <div class="mt-3">
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <p class="text-red-500 text-xs">{{ $error }}</p>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
