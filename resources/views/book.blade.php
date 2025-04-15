<div class="max-w-4xl mx-auto px-4 py-6">
    <div class="mb-8">
        
        <h1 class="text-3xl font-bold mb-4">{{ $book->name }}</h1>

        <p class="text-gray-600 text-sm mb-4">
            By:
            <a href="/hall?author={{ $book->author->slug }}" class="hover:text-blue-500">
                {{ $book->author->name }}
            </a>
            in
            <a href="/hall?category={{ $book->category->slug }}" class="hover:text-blue-500">
                {{ $book->category->name }}
            </a>
        </p>

        @if
            <div class="max-h-[350px] overflow-hidden rounded-sm">
                <img src="{{ Storage::url($book->image) }}" alt="{{ $book->category->name }}" class="w-full object-cover">
            </div>
        @else
            <img src="https://picsum.photos/600/400" alt="Book Cover" class="w-full h-60 object-cover">
        @endif

        <article class="prose max-w-none my-6">
            {!! $book->body !!}
        </article>

        <a href="/hall" class="inline-block text-blue-500 rounded-lg hover:underline mt-4"><- Back to Hall</a>
    </div>
</div>