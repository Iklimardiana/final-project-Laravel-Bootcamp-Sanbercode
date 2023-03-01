
@extends('layouts.master')

@section('title')
    ANSWER
@endsection
@push('tiny')
<script>
  tinymce.init({
    // selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
  });
</script>
@endpush
@section('content')

<section class="contact-section section-padding pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Answer</h4>
                        </div>

                        <form action="{{ route('answer.store', ['question_id' => $question_id]) }}" method="POST" enctype="multipart/form-data" class="custom-form contact-form" role="form" >
                        @csrf
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control"  name="answer"
                                            placeholder="Describe message here"></textarea>

                                        <label for="floatingTextarea">What is your Answer?</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="hidden" name="question_id" value="{{ $question_id }}">
                                  </div>
                                </div>
                                <div class="col-lg-4 col-12 ms-auto">
                                    <button type="submit" class="form-control">Submit</button>
                                </div>

                            </div>
                        </form>

    
                    </div>

                </div>
            </div>
        </section>

<!-- @include('partials.topik') -->
    
@endsection