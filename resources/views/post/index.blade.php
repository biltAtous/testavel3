<x-layout>
    <div>
        <section class="p-8 mx-auto max-w-[1280px]">
            <div class="flex flex-row flex-wrap gap-4">
                
                @foreach($posts as $post)
                    <div class="grid gap-4 p-4 border shadow-md max-w-[380px]">
                        <h2 class="text-xl">
                            {{ $post->title }}
                        </h2>

                        <img src="{{ url( 'storage/' . $post->image_path) }}" alt="post image">

                        <p class="text-lg">
                            {{ $post->description }}
                        </p>

                        <div class="grid border p-2">
                            <p class="text-md">
                                Author ID: {{ $post->user_id }}
                            </p>
                            <p class="text-md">
                                Published: {{ $post->created_at }}
                            </p>
                        </div>

                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-layout>