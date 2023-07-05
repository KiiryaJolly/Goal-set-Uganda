<div>
    <x-jet-form-section submit="#">
        <x-slot name="title">
            {{ __('Teachers Recommendation') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure  that you provide accurate details about yourself. This will help you provide you with the best experience') }}
            <br><hr><p class=" mt-4 text-sm text-center text-red-700">Updated at: {{ $recommendation->created_at }} </p>
        </x-slot>


        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4 ">
                <p class="text-justify">
                    {{$recommendation->recommendation}}
                </p>
            </div>
        </x-slot>

        {{-- <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot> --}}
    </x-jet-form-section>

</div>
