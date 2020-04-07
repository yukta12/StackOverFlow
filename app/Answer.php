<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
