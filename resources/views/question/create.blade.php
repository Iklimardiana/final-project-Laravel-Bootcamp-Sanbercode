@extends('layouts.master')

@section('title')
    QUESTIONS
@endsection
@section('content')

<section class="contact-section section-padding pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Questions</h4>
                        </div>

                        <form action="/question" method="POST" enctype="multipart/form-data" class="custom-form contact-form"  >
                        @csrf
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control"  name="question"
                                            placeholder="Describe message here"></textarea>

                                        <label for="floatingTextarea">What is your questions?</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="file" name="image"  class="form-control"
                                            required="">
                                    </div>
                                    <div class="form-floating">
                                            <select class="form-control" name="category_id" id="" placeholder="Masukkan Kategori">
                                            <option value="">--Pilih Salah satu Kategoti--</option>
                                            @forelse ($category as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>    
                                            @empty
                                                <option value="">Tidak ada Kategori</option>
                                            @endforelse
                                        @error('category_id')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </select>

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