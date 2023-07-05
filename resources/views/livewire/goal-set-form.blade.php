<div>
    <div>
        <label for="subject">Subject</label>
        <select name="subject" id="subject" wire:model="selectedSubject">
            <option value="">Select subject</option>
            @foreach ($subjects as $subject)
                <option value="{{ $subject }}">{{ $subject }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="paper">Paper</label>
        <select name="paper" id="paper" wire:model="selectedPaper">
            <option value="">Select paper</option>
            @foreach ($papers as $paper)
                <option value="{{ $paper }}">{{ $paper }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="target_mark">Target Mark</label>
        <input type="text" name="target_mark" id="target_mark" wire:model="targetMark">
    </div>

    <div>
        <label for="actual_mark">Actual Mark</label>
        <input type="text" name="actual_mark" id="actual_mark" wire:model="actualMark">
    </div>

    <button type="button" wire:click="save">Save</button>
</div>
