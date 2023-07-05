<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Inspiring;

class SetTargets extends Component
{
    public function render()
    {
        $quote = Inspiring::quote();
        return view('livewire.set-targets', ['quote' => $quote]);
    }
}
