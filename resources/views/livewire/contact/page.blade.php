<flux:main class="flex flex-col justify-center place-items-center mt-20">
    <flux:card>
        <h1 class="text-2xl font-bold">Contact Me</h1>
        <form class="mt-6" wire:submit="submit">
            <flux:fieldset>
                <flux:field>
                    <flux:label>Name</flux:label>
                    <flux:input wire:model="name" />
                    <flux:error name="name" />
                </flux:field>
                <flux:field>
                    <flux:label>Email</flux:label>
                    <flux:input wire:model="email" type="email" />
                    <flux:error name="email" />
                </flux:field>
                <flux:field>
                    <flux:label>Message</flux:label>
                    <flux:textarea wire:model="message" type="message" />
                    <flux:error name="message" />
                </flux:field>
                <flux:field>
                    <x-turnstile wire:model="captcha" class="border-2 border-zinc-950 leading-0" />
                </flux:field>
                <flux:button type="submit" class="w-full">
                    Contact Me
                </flux:button>
            </flux:fieldset>
        </form>
    </flux:card>
</flux:main>
