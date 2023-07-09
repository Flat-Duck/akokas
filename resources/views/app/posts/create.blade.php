@extends('layouts.app', ['page' => 'post'])

@section('title',  trans('crud.posts.create_title') )
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.posts.create_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form
                    role="form"
                    method="POST"
                    action="{{ route('posts.store') }}"
                    class="card"
                    enctype="multipart/form-data"

                >
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.posts.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <x-form.input type="file" name="screen" placeholder="Header Image" />
                                <x-form.input type="text" name="body" placeholder="Post Title" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            @lang('crud.common.create')
                        </button>

                        <a
                            href="{{ route('posts.index') }}"
                            class="btn btn-default"
                            >@lang('crud.common.back')</a
                        >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
