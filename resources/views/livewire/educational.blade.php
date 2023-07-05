
<div>
    <x-jet-form-section submit="insertEducationInformation">
        <x-slot name="title">
            {{ __('Education') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure  that you provide accurate details about yourself. This will help you provide you with the best experience') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="career" value="{{ __('Career') }}" />
                <x-jet-input id="career" type="text" class="mt-1 block w-full" wire:model.defer="state.career" autocomplete="career" />
                <x-jet-input-error for="career" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="role_model" value="{{ __('Role Model') }}" />
                <x-jet-input id="role_model" type="text" class="mt-1 block w-full" wire:model.defer="state.role_model" autocomplete="role_model" />
                <x-jet-input-error for="role_model" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="target_points" value="{{ __('Target Points at UCE or UACE') }}" />
                <x-jet-input id="target_points" type="number" class="mt-1 block w-full" wire:model.defer="state.target_points" autocomplete="target_points" />
                <x-jet-input-error for="target_points" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="target_university" value="{{ __('Target University') }}" />
                <x-jet-input id="target_university" type="text" class="mt-1 block w-full" wire:model.defer="state.target_university" autocomplete="target_university" />
                <x-jet-input-error for="target_university" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="university_cutoff" value="{{ __('University cutoff') }}" />
                <x-jet-input id="university_cutoff" type="text" class="mt-1 block w-full" wire:model.defer="state.university_cutoff" autocomplete="university_cutoff" />
                <x-jet-input-error for="university_cutoff" class="mt-2" />
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
