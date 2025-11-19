<x-layouts.main>
    <flux:main class="flex flex-col justify-center place-items-center mt-20">
        <flux:card class="space-y-4 min-w-xl">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item :href="route('home')">Home</flux:breadcrumbs.item>
                <flux:breadcrumbs.item :href="route('posts.index')">Blog</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>{{ $post->title }}</flux:breadcrumbs.item>
            </flux:breadcrumbs>
            <article class="prose prose-zinc dark:prose-invert prose-p:font-medium min-w-[65ch]">
                <h1 class="mb-0">{{ $post->title }}</h1>
                <h3 class="mt-0 text-zinc-600 dark:text-zinc-300">{{ $post->created_at->toFormattedDateString() }}</h3>
                {!! $post->body !!}
            </article>
            @auth
                <div class="flex justify-end">
                    <flux:button :href="route('posts.edit', $post)">
                        Edit
                    </flux:button>
                </div>
            @endauth
        </flux:card>
    </flux:main>
</x-layouts.main>
