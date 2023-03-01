@extends('layouts.master')

@section('title')
    QUESTIONS
@endsection
@push('tiny')
<script>
  tinymce.init({
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
  });
</script>
@endpush
@section('content')
    <section class="latest-podcast-section section-padding" id="section_2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="section-title-wrap mb-5">
                        <h4 class="section-title">All Questions</h4>
                    </div>
                </div>
                <div class="col-12 mb-4 mb-lg-0 mt-4">
                    <div class="custom-block d-flex">
                        <div class="card" style="width: 100%;">
                            <img src="{{asset('/images/'. $question->image)}}" class=" img-fluid " width="75%" alt="Question Image">
                            <div class="card-body">
                                <p class="card-text fw-bold" style="color:black">{{$question->question}}</p>
                                <button class="btn custom-btn">
                                    <a href="/question" style="color:white"><span>Kembali</span></a>
                                </button>
                            </div>
                            <hr>
                            <h4 class="mx-3">List Komentar</h4>
                            <hr>
                            @forelse ($question->answer as $item)
                                <div class="d-flex my-3" style="flex-direction: column">
                                    <div>
                                        <h6 style="margin-left:20px">{{$item->user->name}}</h6>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p style="font-weight:bold; color:black">{{$item->answer}}</p>
                                    </div>
                                </div>
                                @auth
                                @if (Auth::user()->id == $item->user->id)
                                    <form action="/answer/{{$item->id}}/" method="POST">
                                        <a href="/answer/{{$item->id}}/edit" class="btn custom-btn mx-2">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                        <input type="submit" class="btn custom-btn" value="Delete">
                                    </form>
                                @endif
                                @endauth  
                                <hr>
                            @empty
                                No Replies
                            @endforelse

                            <form action="/answer/{{$question->id}}" method="post">
                                @csrf
                                <textarea name="answer" class="my-3 form-control" placeholder="Beri Jawaban" cols="30" rows="10"></textarea>
                                @error('answer')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                <input type="submit" class="btn custom-btn my-2 mx-2" value="Reply">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection