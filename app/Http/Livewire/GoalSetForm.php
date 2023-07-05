<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GoalSetForm extends Component
{

    public $subjects = [
        'Maths',
        'Science',
        'English',
    ];

    public $selectedSubject = null;
    public $papers = [];
    public $selectedPaper = null;
    public $targetMark = null;
    public $actualMark = null;

    public function updatedSelectedSubject($value)
    {
        // Fetch the papers for the selected subject
        // and update the $papers property
    }

    public function save()
    {
        // Validate the input and save the goal
    }

    public function render()
    {
        return view('livewire.goal-set-form');
    }
    // public function render()
    // {
    //     return view('livewire.goal-set-form');
    // }
}
