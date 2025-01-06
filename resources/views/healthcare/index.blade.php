@extends('healthcare.layouts.master')

@section('content')
    <!-- Tabs Content -->
    <div class="row">
        <div class="col-md-9">
            <div class="tab-content " id="myTabContent">

                <!-- Tabs Navigation -->
                {{-- <div class="my-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting"
                            type="button" role="tab" aria-controls="setting" aria-selected="true">Setting</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="job-tab" data-bs-toggle="tab" data-bs-target="#job" type="button"
                            role="tab" aria-controls="job" aria-selected="false">Job Applications</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="adds-tab" data-bs-toggle="tab" data-bs-target="#adds" type="button"
                            role="tab" aria-controls="adds" aria-selected="false">Job Adds</button>
                    </li>
                </ul>
            </div> --}}
                {{-- @include('healthcare.profile-info')
            @include('healthcare.job-applications') --}}
            @include('healthcare.pages.dashboard')
            @include('healthcare.pages.analytics')
            @include('healthcare.pages.activity')
            @include('healthcare.pages.feed')
            @include('healthcare.pages.inbox')
            @include('healthcare.pages.edit')
            @include('healthcare.pages.jobs')
            @include('healthcare.pages.posts')
            </div>
        </div>
        <div class="col-md-3">
            <div class="my-2 card w-100" style="">
                <div class="card-body row">
                    <h5 class="card-title col-md-10">Profile Language</h5>
                    <a href="#" class="btn btn-muted col-md-2"><i class="bi bi-pencil"></i></a>
                    <p class="card-text">
                        English</p>

                </div>
            </div>

        </div>
    </div>
@endsection
