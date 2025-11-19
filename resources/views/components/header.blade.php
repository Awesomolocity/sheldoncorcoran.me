<flux:header :container="true" class="absolute left-1/2 -translate-x-1/2 top-6">
    <flux:navbar class="-mb-px neobrutalist">
        <flux:navbar.item class="text-zinc-800 hover:text-zinc-950" :href="route('home')">Home</flux:navbar.item>
        <flux:navbar.item class="text-zinc-800 hover:text-zinc-950" :href="route('posts.index')">Blog</flux:navbar.item>
        <flux:navbar.item class="text-zinc-800 hover:text-zinc-950" :href="route('contact')">Contact</flux:navbar.item>
    </flux:navbar>
</flux:header>
