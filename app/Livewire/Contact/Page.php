<?php

namespace App\Livewire\Contact;

use App\Mail\ContactMessage;
use App\Models\User;
use Flux\Flux;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
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

        Mail::to(config('mail.contact_email'))->send(
            new ContactMessage(
                name: $this->name,
                email: $this->email,
                message: $this->message,
            )
        );

        Flux::toast(
            text: 'Your message has been sent!',
            heading: 'Message Sent',
            duration: 0,
            variant: 'success'
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
