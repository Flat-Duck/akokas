@extends('layouts.app', ['page' => 'profile'])

@section('title',  'profile' )

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                Employee Profile
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="row g-0">
                <div class="col-3 d-none d-md-block border-end">
                    <div class="card-body">
                        <h4 class="subheader">Business settings</h4>
                        <div class="list-group list-group-transparent">
                            <a href="#tabs-home-8" class="list-group-item list-group-item-action d-flex align-items-center active" data-bs-toggle="tab">Home</a>
                            <a href="#tabs-profile-8" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="tab">Profile</a>
                            <a href="#tabs-activity-8" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="tab">Activity</a>
                        </div>
                        <h4 class="subheader mt-4">Experience</h4>
                        <div class="list-group list-group-transparent">
                            <a href="#" class="list-group-item list-group-item-action">Give Feedback</a>
                        </div>
                    </div>
                </div>
                
                <div class="col d-flex flex-column">
                    <div class="tab-content card-body">
                        <div class="tab-pane fade active show" id="tabs-home-8">
                            <h2 class="mb-4 card-title">My Settings</h2>
                            <x-profile.account-card />
                        </div>
                        <div class="tab-pane fade" id="tabs-activity-8">
                            <h2 class="mb-4 card-title">Activity tab</h2>
                            <x-profile.settings-card />
                        </div>
                    </div>
                    <div class="card-footer bg-transparent mt-auto">
                        <div class="btn-list justify-content-end">
                            <a href="#" class="btn">
                                Cancel
                            </a>
                            <a href="#" class="btn btn-primary">
                                Submit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
