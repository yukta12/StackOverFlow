@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $question->title }}</h4>
                    </div>
                    <div class="card-body">

                        {!!$question->body  !!}!
                    </div>

                    <div class="card-footer">
                        {{--                        to display user info of owner--}}
                        <div class="d-flex justify-content-between">
                            <div></div>
                           <div class="d-flex flex-column">
                               <div class="text-muted flex-column">
                                   Asked  : {{ $question->created_date }}
                               </div>
                               <div class="d-flex mb-2">
                                   <div>
                                       <img src="{{ $question->owner->avatar }}" alt="{{ $question->owner->name }}">
                                   </div>
                                   <div class="mt-2 ml-2">
                                       {{ $question->owner->name }}
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-0"> {{ $question->answers_count}} {{ Str::plural('Answer',$question->answers_count) }}</h3>
                    </div>

                    <div class="card-body">
                        @foreach($question->answers as $answer)
                            {!! $answer->body !!}

                                {{--                        to display user info of owner--}}
                                <div class="d-flex justify-content-between">
                                    <div></div>
                                    <div class="d-flex flex-column">
                                        <div class="text-muted flex-column">
                                            Asked  : {{ $answer->created_date }}
                                        </div>
                                        <div class="d-flex mb-2">
                                            <div>
                                                <img src="{{ $answer->author->avatar }}" alt="{{ $answer->author->name }}">
                                            </div>
                                            <div class="mt-2 ml-2">
                                                {{ $answer->author->name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <hr>

                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
