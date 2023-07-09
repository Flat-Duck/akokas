@extends('layouts.app', ['page' => 'user'])

@section('title',  trans('crud.users.create_title') )
@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.users.show_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.users.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('users.index') }}" class="mr-4"
                                ><i class="ti ti-arrow-back"></i
                            ></a>
                            @lang('crud.users.show_title')
                        </h4>
                        <div class="mt-3">
                            <div class="mb-3">
                                <h5>@lang('crud.users.inputs.name')</h5>
                                <span>{{ $user->name ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.users.inputs.email')</h5>
                                <span>{{ $user->email ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div class="mb-4">
                                <h5>@lang('crud.roles.name')</h5>
                                <div>
                                    @forelse ($user->roles as $role)
                                    <div class="badge badge-primary">
                                        {{ $role->name }}
                                    </div>
                                    <br />
                                    @empty - @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="mt-3">
                                <a
                                    href="{{ route('users.index') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-return-left"></i>
                                    @lang('crud.common.back')
                                </a>

                                @can('create', App\Models\User::class)
                                <a
                                    href="{{ route('users.create') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-add"></i>
                                    @lang('crud.common.create')
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
        </div>
    </div>
</div>
