@extends('layouts.master')

@section('title')
    EDIT PROFILE
@endsection
@section('content')

<section class="contact-section section-padding pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Profile</h4>
                        </div>

                        <form action="/profile/{{$detailProfile->id}}" method="post" class="custom-form contact-form" role="form">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    
                                    
                                        
                                    <div class="form-floating">
                                        <input type="number" name="age"  class="form-control" value="{{$detailProfile->age}}"
                                            required="">

                                        <label for="">Umur</label>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" name="bio" placeholder="Describe message here">{{$detailProfile->bio}}</textarea>
                                        <label for="floatingTextarea">Bio</label>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" name="address" placeholder="Describe message here">{{$detailProfile->address}}</textarea>
                                        <label for="floatingTextarea">Alamat</label>
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