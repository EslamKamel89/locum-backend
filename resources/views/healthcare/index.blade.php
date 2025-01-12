@extends('healthcare.layouts.master')

@section('content')
    <!-- Tabs Content -->
    <div class="row">
        <div class="col-md-9">
            <div class="tab-content " id="myTabContent">
                @include('healthcare.pages.basic-info')
                @include('healthcare.pages.specialities')
                {{-- @include('healthcare.pages.operation-hours') --}}
                @include('healthcare.pages.analytics')
                @include('healthcare.pages.inbox')
                @include('healthcare.pages.jobs')
                @include('healthcare.pages.login')
            </div>
        </div>
        <div class="col-md-3">
            {{-- <div class="my-2 card w-100" style="">
                <div class="card-body row">
                    <h5 class="card-title col-md-10">Profile Language</h5>
                    <a href="#" class="btn btn-muted col-md-2"><i class="bi bi-pencil"></i></a>
                    <p class="card-text">
                        English</p>

                </div>
            </div> --}}
            <div class="row ms-2">
                Suggested Doctors
            </div>
            <div class="row col-md-11 ms-1">
                @foreach ($doctorRecommended as $doctor)
                <div class="p-3 my-2 card">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset($doctor->photo) }}" class="rounded-circle w-100" alt=""
                                srcset="">
                        </div>
                        <div class="col-md-6">
                            <span class="card-title fw-bold col-md-8">{{ Str::limit($doctor->user?->name, 20, '..') }}</span>
                            <p class="card-text">{{ $doctor->specialty->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary">Follow</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    </div>
@endsection
