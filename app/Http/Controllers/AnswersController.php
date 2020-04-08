<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\Answers\CreateAnswerRequest;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @param  \App\Answer  $answer
     * @return Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
