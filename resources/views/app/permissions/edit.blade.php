@extends('layouts.app', ['page' => 'permission'])

@section('title',  trans('crud.permissions.edit_title') )
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.permissions.edit_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form
                    role="form"
                    method="PUT"
                    action="{{ route('permissions.update', $permission) }}"
                    enctype="multipart/form-data"
                    class="card"
                >
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.permissions.edit_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                @include('app.permissions.form-inputs')
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            @lang('crud.common.update')
                        </button>

                        <a
                            href="{{ route('permissions.index') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.back')
                        </a>
                        <a
                            href="{{ route('permissions.create') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.create')
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
