<x-layout>

    <section class="grid gap-4">
        <h1 class="text-2xl">Register</h1>


        <form method="POST" action="{{ route('admin.register_post') }}" class="flex flex-col gap-2 justify-start">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <!-- <input type="password" name="password_confirmation" placeholder="Confirm Password" required> -->
            <button type="submit" class="max-w-[80px] border p-2 font-medium">Register</button>
        </form>

    </section>  

</x-layout>