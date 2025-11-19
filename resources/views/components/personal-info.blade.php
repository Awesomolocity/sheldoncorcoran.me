@props([
    'size' => 'base',
    'variant' => 'subtle',
])

@php
    $heading_classes = Flux::classes()
        ->add(match ($size) {
            'xl' => 'text-5xl',
            'lg' => 'text-3xl',
            default => 'text-2xl',
        })
        ->add(match ($variant) {
            'subtle' => 'text-zinc-600 dark:text-zinc-300',
            'ghost' => 'text-zinc-950 dark:text-zinc-50',
        });

    $subheading_classes = Flux::classes()
        ->add(match ($size) {
            'xl' => 'text-xl',
            'lg' => 'text-lg',
            default => 'text-base',
        })
        ->add(match ($variant) {
            'subtle' => 'text-zinc-600 dark:text-zinc-400',
            'ghost' => 'text-zinc-600 dark:text-zinc-400',
        })
@endphp

<h1 class=" {{ $heading_classes }} font-bold">Sheldon Corcoran</h1>
<h3 class="{{ $subheading_classes }}">Aspiring Web Application Developer</h3>
<div class="mt-2">
    <flux:button variant="{{ $variant }}" aria-label="Navigate to Sheldon's GitHub profile" icon="github" href="https://github.com/Awesomolocity" />
    <flux:button variant="{{ $variant }}" aria-label="Navigate to Sheldon's Bluesky profile" icon="bluesky" href="https://bsky.app/profile/awesomolocity.bsky.social" />
    <flux:button variant="{{ $variant }}" aria-label="Navigate to Sheldon's LinkedIn profile" icon="linkedin" href="https://www.linkedin.com/in/sheldoncorcoran/" />
</div>
