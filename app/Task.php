<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $guarded= [];
    public function arrayToString(){
    return [
        'id' => $this->id,
        'title' => $this->title,
        'due_date' => $this->due_date,
        'completed' => $this->completed,
        'working_on' => $this->working_on,
    ];
    }
}
