@extends('healthcare.layouts.master')

@section('content')
    <!-- Tabs Content -->
   <div class="row">
    <div class="col-md-3"></div>
    <div class="tab-content container-fluid col-md-9" id="myTabContent">

        <!-- Tabs Navigation -->

        @include('healthcare.profile-info')
        @include('healthcare.job-applications')
        @include('healthcare.job-adds')
    </div>
   </div>
@endsection
