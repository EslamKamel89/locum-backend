@extends('doctor.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <!-- صورة البروفايل -->
                    <img src="{{ asset(auth()->user()->doctor?->photo) }}" alt="avatar" class="rounded-circle img-fluid"
                        style="width: 150px;">
                    <!-- اسم المستخدم -->
                    <h5 class="my-3">{{ auth()->user()->name }}</h5>
                    <!-- معلومات الوظيفة والموقع -->
                    <p class="text-muted mb-1">{{ auth()->user()->doctor?->jobInfo?->name }}</p>
                    <p class="text-muted mb-4">{{ auth()->user()->district?->name }} - {{ auth()->user()->state?->name }}
                    </p>

                    <!-- زر المتابعة -->
                    @if (Auth::user()->id !== $doctor->user_id)
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary">Follow</button>
                        </div>
                    @endif

                    <!-- زر تسجيل الخروج -->
                    <div class="d-flex justify-content-center">
                        <form method="get" action="{{ route('admin.logout') }}">
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            @include('doctor.includes.suggested-doctors')
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    @include('doctor.pages.posts')
                </div>
            </div>
        </div>

    </div>
@endsection
