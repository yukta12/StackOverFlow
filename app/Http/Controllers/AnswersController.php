<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\Answers\CreateAnswerRequest;
use App\Notifications\AnswerPost;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;

class AnswersController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Question $question, CreateAnswerRequest $request)
    {
      //  dd($question);
        $question->answers()->create([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        session()->flash('success','Answer has been added successfully');
        Notification::route('mail',''.$question->owner->email)
                        ->notify(new AnswerPost($question->title,auth()->user()->name,$question->url));

        return redirect($question->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Answer $answer
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Question $question,Answer $answer)
    {
        $this->authorize('update',$answer);
        return view('answers.edit',compact(['question','answer']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Answer $answer
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request,Question $question, Answer $answer)
    {
        $this->authorize('update',$answer);
        $answer->update([
            'body'=>$request->body
        ]);
        session()->flash('success','Answer has been updated successfully');
        return redirect($question->url);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Answer $answer
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Question $question, Answer $answer)
    {
        $this->authorize('update',$answer);
        $answer->delete();
        session()->flash('success','Answer has been deleted successfully');
        return redirect($question->url);
    }

    public function bestAnswer(Answer $answer)
    {
        $answer->question->markBestAnswer($answer);
        return redirect()->back();
    }
    public function unMarkBestAnswer(Answer $answer)
    {
        //dd("unmark");
        $answer->question->unMarkBest($answer);
        return redirect()->back();
    }


}
