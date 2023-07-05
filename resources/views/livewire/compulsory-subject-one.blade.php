<div>
    <x-jet-form-section submit="insertMarks">
        <x-slot name="title">
            {{ __('Subject One') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure  that you provide accurate details about yourself. This will help you provide you with the best experience') }}
        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="subject_name" value="{{ __('Subject Name') }}" />
                <x-jet-input id="subject_name" type="text" class="mt-1 block w-full"
                    wire:model.defer="state.subject_name" autocomplete="subject_name" />
                <x-jet-input-error for="subject_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="actual_mark_one" value="{{ __('Actual Mark') }}" />
                <x-jet-input id="actual_mark_one" type="range" class="mt-1 block w-full"
                    wire:model.defer="state.actual_mark_one" autocomplete="actual_mark_one" min="0"
                    max="100" value="{{ $state['actual_mark_one'] }}" />
                <p>Value: <output id="value1">{{ $state['actual_mark_one'] }}</output></p>
                <x-jet-input-error for="actual_mark_one" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="target_mark_one" value="{{ __('Target Mark') }}" />
                <x-jet-input id="target_mark_one" type="range" class="mt-1 block w-full"
                    wire:model.defer="state.target_mark_one" autocomplete="target_mark_one" min="0"
                    max="100"
                    value="60" value="{{ $state['target_mark_one'] }} "/>
                <p>Value: <output id="value2">{{ $state['target_mark_one'] }}</output>
                    </p>
                    <x-jet-input-error for="target_mark_one" class="mt-2" />
            </div>



            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="subject" value="{{ __(' Change Subject') }}" />
                <select wire:model.defer="state.subject_name" class="form-control" style="color:black;">
                    <option value="{{ __('School Name') }}" selected>Select school</option>
                    @foreach ($listedSubjects as $subject)
                        <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
                @if ($selectedSubject)
                    <div class="mt-1 block w-full">
                        You have selected {{ $listedSubjects->where('id', $selectedSubject)->first()->subject_name }}
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
    $('input#subject_name').mousedown(function(e) {
        e.preventDefault();
        $(this).blur();
        return false;
    });


    const value1 = document.querySelector("#value1");
    const value2 = document.querySelector("#value2");


    const target_mark_one = document.querySelector("#actual_mark_one");
    const actual_mark_one = document.querySelector("#target_mark_one");


    value1.textContent = target_mark_one.value;
    value2.textContent = actual_mark_one.value;


    target_mark_one.addEventListener("input", (event) => {
        value1.textContent = event.target.value
    });
    actual_mark_one.addEventListener("input", (event) => {
        value2.textContent = event.target.value
    });
</script>
