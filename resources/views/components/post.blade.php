@props(['post'=>$post])
<div class="mb-4">
    <a href="{{ route('profile', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{ $post->body }}</p>

    {{-- @if($post->ownedBy(auth()->user())) --}}
    @can('delete',$post)

    <form action="{{ route('post.destroy',$post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500">Delete</button>
    </form>
    @endcan

    {{-- @endif --}}
    <div class="flex items-center">
        @auth
        @if(!$post->likedBy(auth()->user()))
        <form action="{{ route('post.likes',$post) }}" method="POST" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">Like</button>
        </form>
        @else
        <form action="{{ route('post.likes',$post) }}" method="POST" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Unlike</button>
        </form>
        @endif
        @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>
