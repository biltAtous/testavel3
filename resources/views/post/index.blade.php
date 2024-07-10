<x-layout>
    <div>
        <section class="p-8 mx-auto max-w-[1280px]">
            <div class="flex flex-row gap-4">
                
                @foreach($posts as $post)
                    <div class="grid gap-4 p-4 border shadow-md max-w-[380px]">
                        <h2>
                            {{ $post->title }}
                        </h2>

                        <img src="{{ url( 'storage/' . $post->image_path) }}" alt="post image">

                        <p class="text-xl">
                            {{ $post->description }}
                        </p>

                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-layout>