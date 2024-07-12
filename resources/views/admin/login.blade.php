<x-layout>

    <section class="grid gap-4">
        <h1 class="text-2xl">Login</h1>
        @if ($errors->any())
            <div class="bg-red-400">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.login_post') }}" class="flex flex-col gap-2 justify-start">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="max-w-[80px] border p-2 font-medium">Login</button>
        </form>

    </section>  

</x-layout>