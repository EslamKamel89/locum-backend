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
            @include('healthcare.tabs.home')
            @include('healthcare.tabs.about')
            @include('healthcare.tabs.jobs')
            @include('healthcare.tabs.reviews')
            @include('healthcare.tabs.info')
            </div>
        </div>
        <div class="col-md-3">
            <div class="my-2 card w-100" style="">
                <img src="{{ asset('web/images/wanted.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Surgery</h5>
                    <p class="card-text">
                        Provide temporary medical coverage for shifts at our clinic/hospital. Responsibilities include
                        patient consultations, diagnosis, treatment, and maintaining patient records.</p>
                    <a href="#" class="btn btn-primary">Apply</a>
                </div>
            </div>
            <div class="my-2 card w-100" style="">
                <img src="{{ asset('web/images/wanted.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Surgery</h5>
                    <p class="card-text">
                        Provide temporary medical coverage for shifts at our clinic/hospital. Responsibilities include
                        patient consultations, diagnosis, treatment, and maintaining patient records.</p>
                    <a href="#" class="btn btn-primary">Apply</a>
                </div>
            </div>
        </div>
    </div>
@endsection
