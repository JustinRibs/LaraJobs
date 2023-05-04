<x-layout>
    <x-card
    class="p-10 max-w-lg mx-auto mt-24"
>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Login
        </h2>
        <p class="mb-4">Log in to start posting!</p>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>⛔️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </header>

    <form method="POST" action="/users/authenticate">
        @csrf

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Email</label
            >
            <input
                type="email"
                class="border border-gray-200 rounded p-2 w-full"
                name="email"
                value="{{old('email')}}"
            />
        </div>

        <div class="mb-6">
            <label
                for="password"
                class="inline-block text-lg mb-2"
            >
                Password
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password"
                value="{{old('password')}}"
            />
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Sign In
            </button>
        </div>

        <div class="mt-8">
            <p>
                Dont have an account?
                <a href="/register" class="text-laravel"
                    >Register</a
                >
            </p>
        </div>
    </form>
</x-card>
</x-layout>
