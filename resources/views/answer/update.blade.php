@extends('layouts.master')

@section('title')
    UPDATE ANSWER
@endsection
@section('content')
<section class="latest-podcast-section section-padding" id="section_2">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">ANSWER</h4>
                </div>
            </div>
            <div class=" col-12 mb-4 mb-lg-0 mt-4">
                <div class="custom-block d-flex">
                    <div class="card" style="width: 100%;">
                        <h4 class="mx-2 mt-3">Update jawaban</h4>
                        <hr>

                        <form action="/answer/{{$answer->id}}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" value="{{$answer->question->id}}" name="question_id" >
                            <textarea name="answer" class="my-3 form-control" placeholder="Update Jawaban" cols="30" rows="10">{{old('answer', $answer->answer)}}</textarea>
                            @error('answer')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                            <input type="submit" class="btn custom-btn mx-2 my-2" value="Edit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection