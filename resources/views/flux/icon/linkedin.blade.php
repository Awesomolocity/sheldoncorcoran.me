@blaze

{{-- LinkedIn logo (https://brand.linkedin.com/downloads) --}}

@props([
    'variant' => 'outline',
])

@php
    if ($variant === 'solid') {
        throw new \Exception('The "solid" variant is not supported in this icon.');
    }

    $classes = Flux::classes('shrink-0')
        ->add(match($variant) {
            'outline' => '[:where(&)]:size-6',
            'mini' => '[:where(&)]:size-5',
            'micro' => '[:where(&)]:size-4',
        });
@endphp

<svg
    {{ $attributes->class($classes) }}
    data-flux-icon
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 72 72"
    aria-hidden="true"
    data-slot="icon"
>
    <defs>
        <mask id="linkedin-silhouette-mask">
            <!-- Everything starts white (fully visible), then we "erase" the letters -->
            <rect width="72" height="72" rx="8" fill="white" />

            <!-- "i" cutout -->
            <rect x="11" y="27.3" width="10.7" height="34.7" rx="1" fill="black" />
            <circle cx="16.35" cy="16.4" r="6.35" fill="black" />

            <!-- "n" cutout -->
            <path
                d="M62 62h-10.7V43.8c0-4.99-1.9-7.78-5.85-7.78-4.3 0-6.54 2.9-6.54 7.78V62H28.63V27.33h10.3v4.67s3.1-5.73 10.45-5.73C56.74 26.27 62 30.76 62 40.05V62z"
                fill="black"
            />
        </mask>
    </defs>

    <!-- Fill entire logo with currentColor, but mask out the “in” letters -->
    <rect width="72" height="72" rx="8" fill="currentColor" mask="url(#linkedin-silhouette-mask)" />
</svg>
