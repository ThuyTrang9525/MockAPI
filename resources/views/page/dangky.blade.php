@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{ route('trang-chu') }}">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <form action="{{ route('register') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>

                    <!-- Hiển thị lỗi nếu có -->
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="form-block">
                        <label for="fullname">Fullname*</label>
                        <input type="text" name="name" id="fullname" required>
                    </div>

                    <div class="form-block">
                        <label for="address">Address*</label>
                        <input type="text" name="address" id="address" value="Street Address" required>
                    </div>

                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" name="phone" id="phone" required>
                    </div>

                    <div class="form-block">
                        <label for="password">Password*</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <div class="form-block">
                        <label for="password_confirmation">Re-enter Password*</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required>
                    </div>

                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
`