<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Recommendation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TeacherRecommendation extends Component
{

    // show user recommendation
    public function render()
    {
        $recommendation = Recommendation::where('user_id', Auth::user()->id)->first();
        //Log::info('Recommmednations', ['recommendation'=>$recommendation]);
        return view('livewire.teacher-recommendation', compact('recommendation'));

    }
}
