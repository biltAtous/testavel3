<x-layout>
    <section class="flex flex-row flex-wrap gap-4">
        @foreach($posts as $post)
            <div class="grid gap-4 p-4 border shadow-md max-w-[380px]">
                <h2 class="text-xl"> {{ $post->title }} </h2>
                <img src="{{ url( 'storage/' . $post->image_path) }}" alt="post image">
                <p class="text-lg"> {{ $post->description }} </p>
                <div class="grid border p-2">
                    <p class="text-md">
                        Author: {{ $post->user->name }}
                    </p>
                    <p class="text-md">
                        Published: {{ $post->created_at }}
                    </p>
                </div>
                @if(Auth::user() && Auth::user()->id==$post->user_id)
                    <div class="flex flex-row gap-2">
                        <a class="bg-blue-200 max-w-[80px] max-h-[40px] border p-2 font-medium" href="{{ route('posts.update', $post) }}/edit">Update</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="max-w-[80px]">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-200 max-w-[80px] max-h-[40px] border p-2 font-medium">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </section>
</x-layout>