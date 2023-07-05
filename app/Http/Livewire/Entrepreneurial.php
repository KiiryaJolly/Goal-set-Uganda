<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Entrepreneurship;

class Entrepreneurial extends Component
{

    public $state = [];

    public function mount()
    {

        // initialize $state with some data from entrepreneurship table
        $this->state = [
            'co-cirricular' => 'football',
            'economic_activity' => 'farming',
        ];

        // if Person exists, update $state with data from database
        if (Entrepreneurship::where('user_id', Auth::user()->id)->exists()) {

            $this->state = [
                'co-cirricular' => Entrepreneurship::where('user_id', Auth::user()->id)->first()->cocirricular_activity,
                'economic_activity' => Entrepreneurship::where('user_id', Auth::user()->id)->first()->economic_activity,
            ];
        }
    }


    //insert  entrepreneurship information into database
    public function insertEntrepreneurshipInformation()
    {
        $this->validate([
            'state.co-cirricular' => 'required',
            'state.economic_activity' => 'required',
        ]);

        if (Entrepreneurship::where('user_id', Auth::user()->id)->exists()) {

            $this->updateEntrepreneurshipInformation();

            return redirect('/academic-profile')->with('success', 'Entrepreneurship information updated successfully');
        }

            $entrepreneurship =  new Entrepreneurship();
            $entrepreneurship->user_id = Auth::user()->id;
            $entrepreneurship->cocirricular_activity = $this->state['co-cirricular'];
            $entrepreneurship->economic_activity = $this->state['economic_activity'];
            $entrepreneurship->save();

        return redirect('/academic-profile')->with('success', 'Entrepreneurship information added successfully');

    }

    // update entrepreneurship information into database
    public function updateEntrepreneurshipInformation()
    {

        Entrepreneurship::where('user_id', Auth::user()->id)->update([
            'cocirricular_activity' => $this->state['co-cirricular'],
            'economic_activity' => $this->state['economic_activity'],
        ]);
    }


    public function render()
    {
        return view('livewire.entrepreneurial');
    }
}
