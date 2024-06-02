@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Verify Your Email Address</p>

            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Resend Verification Email</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection
