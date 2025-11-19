<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ $title ?? config('app.name') }}</title>
        @include('partials.head')
        <x-turnstile.scripts />
    </head>
    <body class="neobrutalist min-h-screen">
        <x-header />
        {{ $slot }}
        <flux:footer>
            <x-personal-info />
        </flux:footer>
        @fluxScripts
    </body>
</html>
