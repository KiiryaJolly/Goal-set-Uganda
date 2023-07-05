
<div>
    <x-jet-form-section submit="insertEntrepreneurshipInformation">
        <x-slot name="title">
            {{ __('Entrepreneurship') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure  that you provide accurate details about yourself. This will help you provide you with the best experience') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="co-cirricular" value="{{ __('Co-cirricular') }}" />
                <x-jet-input id="co-cirricular" type="text" class="mt-1 block w-full" wire:model.defer="state.co-cirricular" autocomplete="co-cirricular" />
                <x-jet-input-error for="co-cirricular" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="economic_activity" value="{{ __('Economic Activity') }}" />
                <x-jet-input id="economic_activity" type="text" class="mt-1 block w-full" wire:model.defer="state.economic_activity" autocomplete="economic_activity" />
                <x-jet-input-error for="economic_activity" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

</div
