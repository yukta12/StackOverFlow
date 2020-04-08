@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                   <h3> Edit your answer</h3>
               </div>

            <div class="card-body">
                <form action="{{route('questions.answers.update',[$question->id,$answer->id])}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <input type="hidden" id="body" name="body" value="{{ old('body',$answer->body) }}">
                        <trix-editor input="body"></trix-editor>
                        @error('body')
                        <div class="text-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary">Edit Your answer</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection

@section('custom-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection

