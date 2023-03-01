@extends('layouts.master')

@section('title')
    QUESTIONS
@endsection
@section('content')

        <section class="latest-podcast-section section-padding" id="section_2">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">All Questions</h4>
                        </div>
                    </div>
                    @foreach ($question as $key => $item)
                    <div class=" col-12 mb-4 mb-lg-0 mt-4">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a href="" class="">
                                        <img src="{{asset('/images/'. $item->image)}}"
                                            class=" img-fluid  " width="200px" alt="">
                                    </a>
                                </div>

                                <div class="mt-2">
                                @auth
                                @if (Auth::user()->id == $item->user->id)
                                <form action="/question/{{$item->id}}" method="POST">
                                    <a href="/question/{{$item->id}}/edit" class="btn custom-btn">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                    <input type="submit" class="btn custom-btn" value="Delete">
                                </form>
                                @endif
                                @endauth
                                </div>
                            </div>

                            <div class="custom-block-info">

                                <h5 class="mb-2">
                                    <a href="detail-page.html">
                                    {{$item->question}}
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <p>
                                        <strong >By {{$item->user->name}}</strong>
                                    </p>
                                </div>

                                <p class="mb-0">{{$item->kategori->name}}</p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="/question/{{ $item->id }}" class="bi-chat me-1">
                                        <span>Detail</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    
@endsection