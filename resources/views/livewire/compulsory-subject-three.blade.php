<div>
    <x-jet-form-section submit="insertMarks()">
        <x-slot name="title">
            {{ __('Subject Three') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure  that you provide accurate details about yourself. This will help you provide you with the best experience') }}
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="subject_name_three" value="{{ __('Subject Name') }}" />
                <x-jet-input id="subject_name_three" type="text" class="mt-1 block w-full"
                    wire:model.defer="state_three.subject_name_three" autocomplete="subject_name_three" />
                <x-jet-input-error for="subject_name_three" class="mt-2" />
            </div>


            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="actual_mark_three" value="{{ __('Actual Mark') }}" />
                <x-jet-input id="actual_mark_three" type="range" class="mt-1 block w-full"
                    wire:model.defer="state_three.actual_mark_three" autocomplete="actual_mark_three" min="0"
                    max="100" value="{{ $state_three['actual_mark_three'] }}" />
                <p>Value: <output id="value1_three">{{ $state_three['actual_mark_three'] }}</output></p>
                <x-jet-input-error for="actual_mark_three" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="target_mark_three" value="{{ __('Target Mark') }}" />
                <x-jet-input id="target_mark_three" type="range" class="mt-1 block w-full"
                    wire:model.defer="state_three.target_mark_three" autocomplete="target_mark_three" min="0"
                    max="100" value="60" value="{{ $state_three['target_mark_three'] }} " />
                <p>Value: <output id="value2_three">{{ $state_three['target_mark_three'] }}</output>
                </p>
                <x-jet-input-error for="target_mark_three" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="subject" value="{{ __(' Change Subject Name') }}" />
                <select wire:model.defer="state_three.subject_name_three" class="form-control" style="color:black;">
                    <option value="{{ __('School Name') }}" selected>Subject Name</option>
                    @foreach ($listedSubjects_three as $subject)
                        <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
                @if ($selectedSubject_three)
                    <div class="mt-1 block w-full">
                        You have selected
                        {{ $listedSubjects_two->where('id', $selectedSubject_three)->first()->subject_name }}
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
    $('input#subject_name_three').mousedown(function(e) {
        e.preventDefault();
        $(this).blur();
        return false;
    });


    const value1_three = document.querySelector("#value1_three");
    const value2_three = document.querySelector("#value2_three");


    const actual_mark_three = document.querySelector("#actual_mark_three");
    const target_mark_three = document.querySelector("#target_mark_three");


    value1_three.textContent = actual_mark_three.value;
    value2_three.textContent = target_mark_three.value;


    actual_mark_three.addEventListener("input", (event) => {
        value1_three.textContent = event.target.value
    });
    target_mark_three.addEventListener("input", (event) => {
        value2_three.textContent = event.target.value
    });
</script>
