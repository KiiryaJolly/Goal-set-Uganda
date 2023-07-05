<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Mark;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CompulsorySubjectOne extends Component
{
    public $state = [];
    public $selectedSubject = null;

    public function mount()
    {
        $this->state = [
            'subject_name' => 'History',
            'target_mark_one' => '0',
            'actual_mark_one' => '60',
            'compulsory_subject_number' => '0'
        ];

        $this->state['compulsory_subject_number'] = 1;

        // if Target and Actual exists, update $state with data from database
        if (Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 1)->exists()) {
            $this->state['compulsory_subject_number'] = 1;
            // find the subject id of the first compulsory subject
            $targetSubjectId = Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 1)->first()->subject_id;
            $target = Mark::where('user_id', Auth::user()->id)->where('subject_id', $targetSubjectId)->first();
            $subject = Subject::where('id', $targetSubjectId)->first();
            $this->state = [
                'subject_name' => $subject->subject_name,
                'target_mark_one' => $target->target_mark,
                'actual_mark_one' => $target->actual_mark,
                'compulsory_subject_number' => $target->compulsory_subject_number,
            ];
        }
    }

    // insert marks
    public function insertMarks()
    {
        $this->validate([
            'state.subject_name' => 'required',
            'state.target_mark_one' => 'required',
            'state.actual_mark_one' => 'required',
            'state.compulsory_subject_number' => 'required',
        ]);

        if (Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 1)) {
            $this->updateMarks();
        } else {
            // if Target and Actual does not exist, create new record
            $subjectId = Subject::where('subject_name', $this->state['subject_name'])->first()->id;
            if (Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 1)) {
                Mark::create([
                    'user_id' => Auth::user()->id,
                    'subject_id' => $subjectId,
                    'target_mark' => $this->state['target_mark_one'],
                    'actual_mark' => $this->state['actual_mark_one'],
                    'compulsory_subject_number' => $this->state['compulsory_subject_number'],
                    'deviation' => $this->state['target_mark_one'] - $this->state['actual_mark_one'],
                ]);
            }
        }
    }

    // update marks
    public function updateMarks()
    {
        $subjectId = Subject::where('subject_name', $this->state['subject_name'])->first()->id;
        $target = Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 1)->first();
        // log::info($target);
        Log::info($target);

        if ($target) {
            $target->update([
                'user_id' => Auth::user()->id,
                'subject_id' => $subjectId,
                'target_mark' => $this->state['target_mark_one'],
                'actual_mark' => $this->state['actual_mark_one'],
                'compulsory_subject_number' => $this->state['compulsory_subject_number'],
                'deviation' => $this->state['target_mark_one'] - $this->state['actual_mark_one'],
            ], ['id' => $target->mark_id]);
        }
    }





    // render the view
    public function render()
    {
        $listedSubjects = Subject::all();
        return view('livewire.compulsory-subject-one', compact('listedSubjects'));
    }
}
