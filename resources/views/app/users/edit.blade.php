@extends('layouts.app', ['page' => 'user'])

@section('title',  trans('crud.users.edit_title') )
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.users.edit_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form
                    role="form"
                    method="PUT"
                    action="{{ route('users.update', $user) }}"
                    enctype="multipart/form-data"
                    class="card"
                >
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.users.edit_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                @include('app.users.form-inputs')
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            @lang('crud.common.update')
                        </button>

                        <a
                            href="{{ route('users.index') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.back')
                        </a>
                        <a
                            href="{{ route('users.create') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.create')
                        </a>
                    </div>
                </form>
                @can('view-any', App\Models\Post::class)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="card-title w-100 mb-2">Posts</h4>
                    </div>
                    <div class="card-body">
                        <livewire:user-posts-detail :user="$user" />
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
