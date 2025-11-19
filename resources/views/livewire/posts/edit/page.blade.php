<form wire:submit="update" class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <flux:fieldset class="flex flex-col gap-y-4 h-full">
        <flux:field>
            <flux:label>Title</flux:label>
            <flux:input wire:model="title" />
            <flux:error name="title" />
        </flux:field>
        <flux:field>
            <flux:label>Slug</flux:label>
            <flux:input wire:model="slug" />
            <flux:error name="slug" />
        </flux:field>
        <flux:field>
            <flux:label>Published</flux:label>
            <flux:switch wire:model="published" />
            <flux:error name="published" />
        </flux:field>
        <flux:editor wire:model="summary" label="Summary" />
        <flux:editor wire:model="body" label="Body" />
        <div class="flex justify-end gap-x-2">
            <flux:button :href="route('posts.show', $post)">
                Cancel
            </flux:button>
            <flux:button variant="primary" type="submit">
                Update Post
            </flux:button>
        </div>
    </flux:fieldset>
</form>
