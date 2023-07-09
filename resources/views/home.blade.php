@extends('layouts.app')

@section('custom_styles')

@endsection

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-2">
                <div class="card">
                    <div class="card-body">
                        <h1> AkoKas</h1>
                        {{-- <h3>Community is a community of 3,509 amazing developers</h3>
                        <p> We're a place where coders share, stay up-to-date and grow their careers. </p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-7">

                @foreach (\App\Models\Post::all() as $post)
                    <x-generics.post :post="$post" />
                @endforeach

            </div>
            <div class="col-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>#_Trending Tags</h2>
                    </div>
                    <div class="card-body">

                        <div class="badges-list">
                            {{-- @foreach (\App\Models\Tag::all() as $tag)
                                <h2><x-generics.tag :tag="$tag" /></h2>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
                <div class="card card-borderless card-footer-transparent mb-4">


                        <div class="card card-link card-link-pop  my-1">
                            <div class="card-body">
                                <h2><i class="ti ti-flame"></i>_HOT topics</h2>
                            </div>
                        </div>
                        {{-- @foreach (\App\Models\Topic::all()->take(6) as $tag)
                            @php
                                $x = mt_rand(1, 100);
                            @endphp

                            <div class="card card-link card-link-pop card-rotate-{{$x>=50?'right':'left'}} my-1">
                                <div class="card-body">
                                    <a href="#">
                                    <h3>Card rotate right</h3>
                                    </a>
                                </div>
                            </div>

                        @endforeach --}}
                    </div>

            </div>
            </div>
        </div>
    </div>
    @endsection
