<x-layout>

    <section class="grid gap-4">
        <h1 class="text-2xl">Dashboard</h1>
        <p>Welcome to the dashboard.</p>
    </section>  

    <section class="py-8">
        <h2 class="underline text-xl">My posts</h2>    
    
        <table class="table-auto py-8">
            <thead>
                <tr>
                    <th>
                        Title
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Image Path
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            {{ $post->title; }}
                        </td>
                        <td>
                            {{ $post->description; }}
                        </td>
                        <td>
                            {{ $post->image_path; }}
                        </td>
                        <td>
                            <a class="bg-blue-200 max-w-[80px] border p-2 font-medium" href="{{ route('posts.update', $post) }}/edit">Update</a>
                        </td>
                        <td>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="max-w-[80px]">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-200 max-w-[80px] border p-2 font-medium">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        No posts...
                    </tr>
                @endif
            </tbody>
        </table>
    </section>

</x-layout>