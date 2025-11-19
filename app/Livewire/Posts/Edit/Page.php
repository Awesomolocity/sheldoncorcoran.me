<?php

namespace App\Livewire\Posts\Edit;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Page extends Component
{
    public Post $post;

    public string $title = '';

    public string $slug = '';

    public bool $published = false;

    public string $summary = '';

    public string $body = '';

    public function mount(Post $post): void
    {
        $this->post = $post;

        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->published = $this->post->published;
        $this->summary = $this->post->summary;
        $this->body = $this->post->body;
    }

    protected function rules(): array
    {
        return [
            'title' => 'required|string',
            'slug' => [
                'required',
                'alpha_dash:ascii',
                Rule::unique('posts', 'slug')->ignore($this->post),
            ],
            'published' => 'required|boolean',
            'summary' => 'string',
            'body' => 'string',
        ];
    }

    public function update(): void
    {
        $validated = $this->validate();
        $validated['user_id'] = auth()->user()->id;

        $this->post->update($validated);

        $this->redirectRoute('posts.show', $this->post);
    }

    public function render()
    {
        return view('livewire.posts.edit.page', [
            'post' => $this->post,
        ]);
    }
}
