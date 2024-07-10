<x-layout>

    <section class="p-8 max-w-[1280px] mx-auto">
        <h1 class="text-2xl">Login</h1>



        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

    </section>  

</x-layout>