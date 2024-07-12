<x-layout>
    <section class="flex flex-col gap-4">
        <h1 class="text-xl">Edit Post, id:{{ $post->id }}</h1>
        @if ($errors->any())
            <div class="bg-red-400">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('posts.update', $post) }}" method="POST" class="flex flex-col justify-start gap-2" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" placeholder="title..." name="title" class="border" value="{{ $post->title }}" />
            <textarea rows="4" name="description" class="border" placeholder="description...">{{ $post->description }}</textarea>
            <img class="max-w-sm" src="{{ url( 'storage/' . $post->image_path) }}" alt="image">
            <input type="file" name="image_path" accept="image/png, image/jpg, image/jpeg" />
            <button class="cursor-pointer self-start border px-4 py-2">Update</button>
        </form>
    </section>
</x-layout>