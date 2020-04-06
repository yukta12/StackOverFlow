<?php

namespace App;


use Illuminate\Support\Str;
class Question extends BaseModel
{
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function getUrlAttribute(){
        return "questions/{$this->id}";
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

}
