<?php

namespace App\Livewire\Contact;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use RyanChandler\LaravelCloudflareTurnstile\Rules\Turnstile;

#[Layout('components.layouts.main')]
class Page extends Component
{
    public string $name = '';

    public string $email = '';

    public string $message = '';

    public string $captcha = '';

    public function submit(): void
    {
        $this->validate();

        Mail::to('sheldon@sheldoncorcoran.me')->send(
            new ContactMessage(
                name: $this->name,
                email: $this->email,
                message: $this->message,
            )
        );

        $this->reset();
    }

    protected function rules(): array
    {
        return [
            'captcha' => ['required', new Turnstile],
            'email' => ['required', 'email'],
            'message' => ['required'],
            'name' => ['required'],
        ];
    }

    public function render()
    {
        return view('livewire.contact.page');
    }
}
