@extends('healthcare.layouts.master')

@section('content')
    <div class="tab-content container-fluid" id="myTabContent">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="success-alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" id="error-alert">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <script>
            // لإخفاء رسائل النجاح بعد 3 ثوانٍ
            setTimeout(() => {
                const successAlert = document.getElementById('success-alert');
                if (successAlert) {
                    successAlert.style.transition = 'opacity 0.5s ease';
                    successAlert.style.opacity = '0';
                    setTimeout(() => successAlert.remove(), 500); // إزالة العنصر بعد اختفاءه
                }

                const errorAlert = document.getElementById('error-alert');
                if (errorAlert) {
                    errorAlert.style.transition = 'opacity 0.5s ease';
                    errorAlert.style.opacity = '0';
                    setTimeout(() => errorAlert.remove(), 500); // إزالة العنصر بعد اختفاءه
                }
            }, 3000); // 3 ثوانٍ
        </script>


        @include('healthcare.profile-info')
        @include('healthcare.job-applications')
        @include('healthcare.job-adds')
    </div>
@endsection
