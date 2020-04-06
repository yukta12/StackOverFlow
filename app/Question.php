<?php

namespace App;


class Question extends BaseModel
{
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }
}
