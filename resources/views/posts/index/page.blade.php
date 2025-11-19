<x-layouts.main>
    <flux:main class="flex flex-col justify-center place-items-center space-y-8 mt-20">
        @auth
            <flux:button :href="route('posts.create')">
                Create New
            </flux:button>
        @endauth
        @foreach($posts as $post)
            <flux:card class="space-y-4">
                <article class="prose prose-zinc dark:prose-invert prose-p:font-medium min-w-[65ch]">
                    <h1 class="mb-0">{{ $post->title }}</h1>
                    <h3 class="mt-0 text-zinc-600 dark:text-zinc-300">{{ $post->created_at->toFormattedDateString() }}</h3>
                    {!! $post->summary !!}
                </article>
                <div class="flex place-content-end">
                    <flux:button :href="route('posts.show', $post)">
                        Read More
                    </flux:button>
                </div>
            </flux:card>
        @endforeach
        {{ $posts->links() }}
    </flux:main>
</x-layouts.main>
