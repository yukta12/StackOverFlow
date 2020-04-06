@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Questions</div>

                    @foreach($questions as $question)
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4><a href="{{ $question->url }}">{{$question->title}}</a></h4>
                                    <p> Asked By:
                                        <a href="#">{{ $question->owner->name }}</a>
                                        <span class="text-muted"> {{ $question->created_date }}</span>
                                    </p>
                                    <p>{{ Str::limit($question->body,250) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <br>
                    <div class="card-footer">
                        {{ $questions->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

