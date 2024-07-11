<x-layout>
    <section class="flex flex-col gap-4">
        <h1 class="text-xl">Create New Note</h1>
        @if(Auth::user())
            <form action="{{ route('posts.store') }}" method="POST" class="flex flex-col justify-start gap-2" enctype="multipart/form-data">
                @csrf
                <input type="text" placeholder="title..." name="title" class="border" required/>
                <textarea rows="4" name="description" class="border" placeholder="description..."></textarea>
                <input type="file" name="image_path" accept="image/png, image/jpg, image/jpeg" required/>
                <button class="cursor-pointer self-start border px-4 py-2">Submit</button>
            </form>
        @else
            <h2 class="text-xl">You need to log in!</h2>
            <a href="/admin/login" class="underline p-2 border max-w-[80px]">log in</a>
        @endif
    </section>
</x-layout>