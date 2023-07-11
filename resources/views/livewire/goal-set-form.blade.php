<form method="post" action="goalset.php">
        <table>
            <tr>
                <th>Subjects</th>
                <th>Set 1</th>
                <th>Set 2</th>
                <th>Set 3</th>
                <th>Set 4</th>
            </tr>
            <tr>
                <td><input type="text" name="subject1" /></td>
                <td><input type="number" name="subject1_set1" /></td>
                <td><input type="number" name="subject1_set2" /></td>
                <td><input type="number" name="subject1_set3" /></td>
                <td><input type="number" name="subject1_set4" /></td>
            </tr>
            <tr>
                <td><input type="text" name="subject2" /></td>
                <td><input type="number" name="subject2_set1" /></td>
                <td><input type="number" name="subject2_set2" /></td>
                <td><input type="number" name="subject2_set3" /></td>
                <td><input type="number" name="subject2_set4" /></td>
            </tr>
            <tr>
                <td><input type="text" name="subject3" /></td>
                <td><input type="number" name="subject3_set1" /></td>
                <td><input type="number" name="subject3_set2" /></td>
                <td><input type="number" name="subject3_set3" /></td>
                <td><input type="number" name="subject3_set4" /></td>
            </tr>
            <tr>
                <td><input type="text" name="subject4" /></td>
                <td><input type="number" name="subject4_set1" /></td>
                <td><input type="number" name="subject4_set2" /></td>
                <td><input type="number" name="subject4_set3" /></td>
                <td><input type="number" name="subject4_set4" /></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Submit">
    </form>

<!-- <div>
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
</div> -->
