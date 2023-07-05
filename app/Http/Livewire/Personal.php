<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Person;
use App\Models\School;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Personal extends Component
{

    public $state = [];
    public $selectedSchool = null;

    public function mount()
    {

        // initialize $state with some data
        $this->state = [
            'school_name' => 'ABC School',
            'telephone' => '1234567890',
            'class' => '10',
            // ...
        ];

        // if Person exists, update $state with data from database
        if (Person::where('user_id', Auth::user()->id)->exists()) {
            $person = Person::where('user_id', Auth::user()->id)->first();
            $this->state = [
                'school_name' => $person->school_name,
                'telephone' => $person->telephone,
                'class' => $person->class,
                // ...
            ];
        }
    }

    // insert or update personal information
    public function insertPersonalInformation()
    {

        $this->validate([
            'state.school_name' => 'required',
            'state.telephone' => 'required',
            'state.class' => 'required',
        ]);

        $user = Auth::user();


        // if Person exists, update
        if (Person::where('user_id', $user->id)->exists()) {

            $this->updatePersonalInformation();

            return redirect('/academic-profile')->with('success', 'Personal Information Updated Successfully');
        }

        $person = new Person();
        $person->school_name = $this->state['school_name'];
        $person->telephone = $this->state['telephone'];
        $person->class = $this->state['class'];
        $person->user_id = Auth::user()->id;
        $person->save();

        return redirect('')->back()->with('success', 'Personal Information Updated Successfully');
    }


    //update personal information into database
    public function updatePersonalInformation()
    {

        $user = Auth::user();

        Person::where('user_id', $user->id)->update([
            'school_name' => $this->state['school_name'],
            'telephone' => $this->state['telephone'],
            'class' => $this->state['class'],
        ]);
    }


    // render livewire component
    public function render()
    {
        $enrolledSchools = School::all();
        //Log::info('Enrolled schools', ['enrolledSchools'=>$enrolledSchools]);
        return view('livewire.personal', compact('enrolledSchools'));
    }
}
