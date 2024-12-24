@extends('admin.layouts.master')

@section('content')
<div class="card-group">
    <!-- Card -->
    <div class="card col-md-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                    <span class="btn btn-circle btn-lg bg-danger">
                        <i class="ti-clipboard text-white"></i>
                    </span>
                </div>
                <div>
                    States
                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{ DB::table('states')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Card -->
    <div class="card col-md-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                    <span class="btn btn-circle btn-lg bg-warning">
                        <i class="mdi mdi-currency-usd text-white"></i>
                    </span>
                </div>
                <div>
                    districts

                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{ DB::table('districts')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Card -->
    <div class="card col-md-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                    <span class="btn btn-circle btn-lg btn-info">
                        <i class="ti-wallet text-white"></i>
                    </span>
                </div>
                <div>
                    Doctors
                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{ DB::table('doctors')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Card -->
    <div class="card col-md-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                    <span class="btn btn-circle btn-lg bg-success">
                        <i class="ti-shopping-cart text-white"></i>
                    </span>
                </div>
                <div>
                    Hospitals
                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{ DB::table('hospitals')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-group">
    <div class="card col-md-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                    <span class="btn btn-circle btn-lg bg-success">
                        <i class="ti-shopping-cart text-white"></i>
                    </span>
                </div>
                <div>
                    universities
                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{ DB::table('universities')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="card col-md-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                    <span class="btn btn-circle btn-lg bg-success">
                        <i class="ti-shopping-cart text-white"></i>
                    </span>
                </div>
                <div>
                    Skills
                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{ DB::table('skills')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="card col-md-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                    <span class="btn btn-circle btn-lg bg-success">
                        <i class="ti-shopping-cart text-white"></i>
                    </span>
                </div>
                <div>
                    specialties
                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{ DB::table('specialties')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="card col-md-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="m-r-10">
                    <span class="btn btn-circle btn-lg bg-success">
                        <i class="ti-shopping-cart text-white"></i>
                    </span>
                </div>
                <div>
                    languages
                </div>
                <div class="ml-auto">
                    <h2 class="m-b-0 font-light">{{ DB::table('langs')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection