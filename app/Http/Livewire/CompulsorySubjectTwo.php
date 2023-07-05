<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Mark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class CompulsorySubjectTwo extends Component
{

    public $state_two = [];
    public $selectedSubject_two = null;

    public function mount()
    {
        $this->state_two = [
            'subject_name_two' => 'History',
            'target_mark_two' => '0',
            'actual_mark_two' => '60',
            'compulsory_subject_number_two' => '0'
        ];

        $this->state_two['compulsory_subject_number_two'] = 2;

        // if Target and Actual exists, update $state with data from database
        if (Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 2)->exists()) {
            $this->state_two['compulsory_subject_number'] = 2;
            // find the subject id of the first compulsory subject
            $targetSubjectId = Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 2)->first()->subject_id;
            $target = Mark::where('user_id', Auth::user()->id)->where('subject_id', $targetSubjectId)->first();
            $subject = Subject::where('id', $targetSubjectId)->first();
            $this->state_two = [
                'subject_name_two' => $subject->subject_name,
                'target_mark_two' => $target->target_mark,
                'actual_mark_two' => $target->actual_mark,
                'compulsory_subject_number_two' => $target->compulsory_subject_number,
            ];
        }
    }


    // insert marks
    public function insertMarks()
    {

        Log::info($this->state_two);
        $this->validate([
            'state_two.subject_name_two' => 'required',
            'state_two.target_mark_two' => 'required',
            'state_two.actual_mark_two' => 'required',
            'state_two.compulsory_subject_number_two' => 'required',
        ]);

        Log::info(Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 2)->exists());

        if (Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 2)) {
            $this->updateMarks();
        } else {
            Log::info('inserting marks');
            // if Target and Actual does not exist, create new record
            $subjectId = Subject::where('subject_name', $this->state_two['subject_name_two'])->first()->id;
            if (Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 2)) {
                Mark::create([
                    'user_id' => Auth::user()->id,
                    'subject_id' => $subjectId,
                    'target_mark' => $this->state_two['target_mark_two'],
                    'actual_mark' => $this->state_two['actual_mark_two'],
                    'compulsory_subject_number' => $this->state_two['compulsory_subject_number_two'],
                    'deviation' => $this->state_two['target_mark_two'] - $this->state_two['actual_mark_two'],
                ]);
            }
        }
    }


    // update marks
    public function updateMarks()
    {
        $subjectId = Subject::where('subject_name', $this->state_two['subject_name_two'])->first()->id;
        $target = Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number_two', 2)->first();
        // log::info($target);
        Log::info($target);

        if ($target) {
            $target->update([
                'user_id' => Auth::user()->id,
                'subject_id' => $subjectId,
                'target_mark' => $this->state_two['target_mark_two'],
                'actual_mark' => $this->state_two['actual_mark_two'],
                'compulsory_subject_number' => $this->state_two['compulsory_subject_number_two'],
                'deviation' => $this->state_two['target_mark_two'] - $this->state_two['actual_mark_two'],
            ], ['id' => $target->mark_id]);
        }
    }









    public function render()
    {
        $listedSubjects_two = Subject::all();
        return view('livewire.compulsory-subject-two', compact('listedSubjects_two'));
    }
}
