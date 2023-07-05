<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['user_id', 'subject_id', 'actual_mark', 'target_mark', 'deviation', 'compulsory_subject_number'];
    use HasFactory;
}
