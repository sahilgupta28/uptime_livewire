<form action="#" wire:submit.prevent="save" class="mt-6 space-y-6">
    <div>
        <x-input-label for="project_name" :value="__('Project Name')" />
        <x-text-input id="project_name" name="project_name" type="text" class="mt-1 block w-full" wire:model="project_name" required autofocus autocomplete="project_name" />

        @error('project_name')<x-input-error class="mt-2" :messages="$message" />@enderror
    </div>

    <div>
        <x-input-label for="url" :value="__('URL')" />
        <x-text-input id="url" name="url" type="url" class="mt-1 block w-full" wire:model="url" required autocomplete="url" />
        @error('url')<x-input-error class="mt-2" :messages="$message" />@enderror
    </div>

    <div>
        <x-input-label for="slack_hook" :value="__('slack Hook')" />
        <x-text-input id="slack_hook" name="slack_hook" type="text" class="mt-1 block w-full" wire:model="slack_hook"/>
        @error('slack_hook')<x-input-error class="mt-2" :messages="$message" />@enderror
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
