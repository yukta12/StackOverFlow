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
        return "questions/{$this->slug}";
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getAnswersStylesAttribute(){
        if($this->answers_count > 0)
        {
            if($this->best_answer_id){
                return "has-best-answer";
            }
            return "answered";
        }
        return "unanswered";
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }

}
