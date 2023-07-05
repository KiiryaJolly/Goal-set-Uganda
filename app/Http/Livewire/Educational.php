<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Education;

class Educational extends Component
{
    public $state = [];


    // update state with data from database
    public function mount()
    {
        $this->state = [
            'career' => 'Software Engineer',
            'role_model' => 'Bill Gates',
            'target_points' => '20',
            'target_university' => 'University of Nairobi',
            'university_cutoff' => '30',
            // ...
        ];

        if (Education::where('user_id', Auth::user()->id)->exists()) {
            $education = Education::where('user_id', Auth::user()->id)->first();
            $this->state = [
                'career' => $education->career,
                'role_model' => $education->role_model,
                'target_points' => $education->target_points,
                'target_university' => $education->target_university,
                'university_cutoff' => $education->university_cutoff,
                // ...
            ];
        }
    }

    //insert  education information into database
    public function insertEducationInformation()
    {
        $this->validate([
            'state.career' => 'required',
            'state.role_model' => 'required',
            'state.target_points' => 'required',
            'state.target_university' => 'required',
            'state.university_cutoff' => 'required',
        ]);

        if (Education::where('user_id', Auth::user()->id)->exists()) {

            $this->updateEducationInformation();

            return redirect('/academic-profile')->with('success', 'Education information updated successfully');
        }

            $education =  new Education();
            $education->user_id = Auth::user()->id;
            $education->career = $this->state['career'];
            $education->role_model = $this->state['role_model'];
            $education->target_points = $this->state['target_points'];
            $education->target_university = $this->state['target_university'];
            $education->university_cutoff = $this->state['university_cutoff'];
            $education->save();

        return redirect('/academic-profile')->with('success', 'Education information added successfully');

    }

    // update education information into database
    public function updateEducationInformation()
    {
        $education = Education::where('user_id', Auth::user()->id)->first();
        $education->career = $this->state['career'];
        $education->role_model = $this->state['role_model'];
        $education->target_points = $this->state['target_points'];
        $education->target_university = $this->state['target_university'];
        $education->university_cutoff = $this->state['university_cutoff'];
        $education->save();

        return redirect('/academic-profile')->with('success', 'Education information updated successfully');
    }

    // render live wire view
    public function render()
    {
        return view('livewire.educational');
    }
}
