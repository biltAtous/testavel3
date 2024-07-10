<x-layout>

    <section class="p-8 max-w-[1280px] mx-auto">
        <h1 class="text-2xl">Register</h1>


        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>

    </section>  

</x-layout>