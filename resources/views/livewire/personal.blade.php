<div>
    <x-jet-form-section submit="insertPersonalInformation">
        <x-slot name="title">
            {{ __('Personal Information') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure  that you provide accurate details about yourself. This will help you provide you with the best experience') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="telephone" value="{{ __('Telephone') }}" />
                <x-jet-input id="telephone" type="text" class="mt-1 block w-full" wire:model.defer="state.telephone"
                    autocomplete="telephone" />
                <x-jet-input-error for="telephone" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="school_name" value="{{ __('School Name') }}" />
                <x-jet-input id="school_name" type="text" class="mt-1 block w-full"
                    wire:model.defer="state.school_name" autocomplete="school_name " />
                <x-jet-input-error for="school_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="class" value="{{ __('Class') }}" />
                <x-jet-input id="class" type="text" class="mt-1 block w-full" wire:model.defer="state.class"
                    autocomplete="class" />
                <x-jet-input-error for="class" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="school" value="{{ __(' Change School Name') }}" />
                <select wire:model.defer="state.school_name" class="form-control" style="color:black;">
                    <option value="{{ __('School Name') }}" selected>Select school</option>
                    @foreach ($enrolledSchools as $school)
                        <option value="{{ $school->School_name }}">{{ $school->School_name }}</option>
                    @endforeach
                </select>
                @if ($selectedSchool)
                    <div class="mt-1 block w-full">
                        You have selected {{ $enrolledSchools->where('id', $selectedSchool)->first()->School_name }}
                    </div>
                @endif

                <x-jet-input-error for="school" class="mt-2" />
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

</div>

<script>
    $('input#school_name').mousedown(function(e) {
        e.preventDefault();
        $(this).blur();
        return false;
    });
</script>
