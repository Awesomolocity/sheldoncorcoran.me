<?php

namespace App\Livewire\Posts\Create;

use App\Models\Post;
use Livewire\Component;

class Page extends Component
{
    public string $title = '';

    public string $slug = '';

    public bool $published = false;

    public string $summary = '';

    public string $body = '';

    protected function rules(): array
    {
        return [
            'title' => 'required|string',
            'slug' => 'required|alpha_dash:ascii|unique:posts,slug',
            'published' => 'required|boolean',
            'summary' => 'string',
            'body' => 'string',
        ];
    }

    public function create(): void
    {
        $validated = $this->validate();
        $validated['user_id'] = auth()->user()->id;

        $post = Post::create($validated);

        $this->redirectRoute('posts.show', $post);
    }

    public function render()
    {
        return view('livewire.posts.create.page');
    }
}
