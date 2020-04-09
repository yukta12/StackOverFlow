<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function getAvatarAttribute(){
            $size= 40;
            $name = $this->name;
            return "https://ui-avatars.com/api/?name={$name}&rounded=true&size={$size}";
    }

    public function favorites(){
        return $this->belongsToMany(Question::class)->withTimestamps();
    }

        /*
       * mapping polymorphic relationship
       */


    public function votesQuestion(){
        return $this->morphedByMany(Question::class,'vote')->withTimestamps();
    }
    public function votesAnswers(){
        return $this->morphedByMany(Answer::class,'vote')->withTimestamps();
    }

        /*
        * To check question upvotes or downvote
        */

    public function hasQuestionUpVote(Question $question){
        return $this->votesQuestion()->where(['vote'=>1,'vote_id'=>$question->id])->exists();
    }
    public function hasQuestionDownVote(Question $question){
        return $this->votesQuestion()->where(['vote'=>-1,'vote_id'=>$question->id])->exists();
    }

    public function hasVoteForQuestion(Question $question){
        return $this->hasQuestionDownVote($question) || $this->hasQuestionUpVote($question);
    }


    /*
     * To check answer upvotes or downvote
     */

    public function hasAnswerUpVote(Answer $answer){
        return $this->votesAnswers()->where(['vote'=>1,'vote_id'=>$answer->id])->exists();
    }
    public function hasAnswerDownVote(Answer $answer){
        return $this->votesAnswers()->where(['vote'=>-1,'vote_id'=>$answer->id])->exists();
    }

    public function hasVoteForAnswer(Answer $answer){
        return $this->hasAnswerUpVote($answer) || $this->hasAnswerDownVote($answer);
    }






}
