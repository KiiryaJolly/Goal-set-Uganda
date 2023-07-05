<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subject;
use App\Models\Mark;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CompulsorySubjectThree extends Component
{
    public $state_three = [];
    public $selectedSubject_three = null;

    public function mount()
    {
        $this->state_three = [
            'subject_name_three' => 'History',
            'target_mark_three' => '0',
            'actual_mark_three' => '60',
            'compulsory_subject_number_three' => '0'
        ];

        $this->state_three['compulsory_subject_number_three'] = 3;

        // if Target and Actual exists, update $state with data from database
        if (Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 3)->exists()) {
            $this->state_three['compulsory_subject_number'] = 3;
            // find the subject id of the first compulsory subject
            $targetSubjectId = Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 3)->first()->subject_id;
            $target = Mark::where('user_id', Auth::user()->id)->where('subject_id', $targetSubjectId)->first();
            $subject = Subject::where('id', $targetSubjectId)->first();
            $this->state_three = [
                'subject_name_three' => $subject->subject_name,
                'target_mark_three' => $target->target_mark,
                'actual_mark_three' => $target->actual_mark,
                'compulsory_subject_number_three' => $target->compulsory_subject_number,
            ];
        }
    }


    // insert marks
    public function insertMarks()
    {

        Log::info($this->state_three);
        $this->validate([
            'state_three.subject_name_three' => 'required',
            'state_three.target_mark_three' => 'required',
            'state_three.actual_mark_three' => 'required',
            'state_three.compulsory_subject_number_three' => 'required',
        ]);


        if (Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 3)->exists()) {
            $this->updateMarks();
        } else {
            Log::info('inserting marks');
            // if Target and Actual does not exist, create new record
            //Log::info(Subject::where('subject_name', $this->state_three['subject_name_three'])->first());
            $subjectId = Subject::where('subject_name', $this->state_three['subject_name_three'])->first()->id;
            if (Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 3)) {
                Mark::create([
                    'user_id' => Auth::user()->id,
                    'subject_id' => $subjectId,
                    'target_mark' => $this->state_three['target_mark_three'],
                    'actual_mark' => $this->state_three['actual_mark_three'],
                    'compulsory_subject_number' => $this->state_three['compulsory_subject_number_three'],
                    'deviation' => $this->state_three['target_mark_three'] - $this->state_three['actual_mark_three'],
                ]);
            }
        }
    }


    // update marks
    public function updateMarks()
    {
        $subjectId = Subject::where('subject_name', $this->state_three['subject_name_three'])->first()->id;
        $target = Mark::where('user_id', Auth::user()->id)->where('compulsory_subject_number', 3)->first();

        Log::info($target);

        if ($target) {
            $target->update([
                'user_id' => Auth::user()->id,
                'subject_id' => $subjectId,
                'target_mark' => $this->state_three['target_mark_three'],
                'actual_mark' => $this->state_three['actual_mark_three'],
                'compulsory_subject_number' => $this->state_three['compulsory_subject_number_three'],
                'deviation' => $this->state_three['target_mark_three'] - $this->state_three['actual_mark_three'],
            ], ['id' => $target->mark_id]);
        }
    }



    public function render()
    {
        $listedSubjects_three = Subject::all();
        return view('livewire.compulsory-subject-three', compact('listedSubjects_three'));
    }
}
