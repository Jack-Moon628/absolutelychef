@extends('layouts.theme')

@section('content')
    <div class="blog-single-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="blog-single-title mt-5">
                        <h1>{{$page->title}}</h1>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="blog-single-content p-4 shadow rounded-lg bg-white  mb-5 text-justify">
                        {!! $page->post_content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection