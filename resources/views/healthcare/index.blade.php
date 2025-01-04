@extends('healthcare.layouts.master')

@section('content')
    <!-- Tabs Content -->
    <div class="tab-content container-fluid" id="myTabContent">
        @include('healthcare.profile-info')
        @include('healthcare.job-applications')
        @include('healthcare.job-adds')
    </div>
@endsection
