
<div>
    <x-jet-form-section submit="insertMarks()">
        <x-slot name="title">
            {{ __('Subject Two') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure  that you provide accurate details about yourself. This will help you provide you with the best experience') }}
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="subject_name_two" value="{{ __('Subject Name') }}" />
                <x-jet-input id="subject_name_two" type="text" class="mt-1 block w-full"
                    wire:model.defer="state_two.subject_name_two" autocomplete="subject_name_two" />
                <x-jet-input-error for="subject_name_two" class="mt-2" />
            </div>


            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="actual_mark_two" value="{{ __('Actual Mark') }}" />
                <x-jet-input id="actual_mark_two" type="range" class="mt-1 block w-full"
                    wire:model.defer="state_two.actual_mark_two" autocomplete="actual_mark_two" min="0"
                    max="100" value="{{ $state_two['actual_mark_two'] }}" />
                <p>Value: <output id="value1_two">{{ $state_two['actual_mark_two'] }}</output></p>
                <x-jet-input-error for="actual_mark_two" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="target_mark_two" value="{{ __('Target Mark') }}" />
                <x-jet-input id="target_mark_two" type="range" class="mt-1 block w-full"
                    wire:model.defer="state_two.target_mark_two" autocomplete="target_mark_two" min="0"
                    max="100"
                    value="60" value="{{ $state_two['target_mark_two'] }} "/>
                <p>Value: <output id="value2_two">{{ $state_two['target_mark_two'] }}</output>
                    </p>
                    <x-jet-input-error for="target_mark_two" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="subject" value="{{ __(' Change Subject Name') }}" />
                <select wire:model.defer="state_two.subject_name_two" class="form-control" style="color:black;">
                    <option value="{{ __('School Name') }}" selected>Select school</option>
                    @foreach ($listedSubjects_two as $subject)
                        <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
                @if ($selectedSubject_two)
                    <div class="mt-1 block w-full">
                        You have selected
                        {{ $listedSubjects_two->where('id', $selectedSubject_two)->first()->subject_name }}
                    </div>
                @endif

                <x-jet-input-error for="subject" class="mt-2" />
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
    $('input#subject_name_two').mousedown(function(e) {
        e.preventDefault();
        $(this).blur();
        return false;
    });


    const value1_two = document.querySelector("#value1_two");
    const value2_two = document.querySelector("#value2_two");


    const actual_mark_two = document.querySelector("#actual_mark_two");
    const target_mark_two = document.querySelector("#target_mark_two");


    value1_two.textContent = actual_mark_two.value;
    value2_two.textContent = target_mark_two.value;


    actual_mark_two.addEventListener("input", (event) => {
        value1_two.textContent = event.target.value
    });
    target_mark_two.addEventListener("input", (event) => {
        value2_two.textContent = event.target.value
    });

</script>
