<div class=" row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="m-0"> {{ $question->answers_count}} {{ Str::plural('Answer',$question->answers_count) }}</h3>
            </div>

            <div class="card-body">

                @foreach($question->answers as $answer)

                    <div class="d-flex">
                        <div>
                            <div>
                                <a href="#" title="Up Vote" class="d-block text-dark text-center">
                                    <i class="fa fa-caret-up fa-3x"></i>
                                </a>
                                <h4 class="text-dark m-0 text-center"> {{ $answer->votes_count }}</h4>
                                <a href="#" title="down Vote" class="d-block text-dark text-center">
                                    <i class="fa fa-caret-down fa-3x"></i>
                                </a>
                            </div>

                            <div class="mt-2">
                                <a href="#" title="mark as best" class="d-block text-dark text-center">
                                    <i class="fa fa-check fa-2x"></i>
                                </a>

                            </div>
                        </div>

                        <div class="ml-5 flex-fill">
                            {!! $answer->body !!}

                            {{--                        to display user info of owner--}}
                            <div class="d-flex justify-content-between">
                                <div></div>
                                <div class="d-flex flex-column">
                                    <div class="text-muted flex-column">
                                        Asked : {{ $answer->created_date }}
                                    </div>
                                    <div class="d-flex mb-2">
                                        <div>
                                            <img src="{{ $answer->author->avatar }}"
                                                 alt="{{ $answer->author->name }}">
                                        </div>
                                        <div class="mt-2 ml-2">
                                            {{ $answer->author->name }}
                                        </div>
                                    </div>
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
