@extends('front_end.main')

@section('content')

    <!-- Content -->
    <div id="content">

        <!-- Linking -->
        <div class="linking">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Authentication</li>
                </ol>
            </div>
        </div>

        <!-- Blog -->
        <section class="login-sec padding-top-30 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <!-- Login Your Account -->
                        <h5>Login Your Account</h5>

                        <!-- FORM -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Username
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    </label>
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </li>
                                <li class="col-sm-12">
                                    <label>Password
                                        <input id="password" type="password" class="form-control{{ $errors->has('password1') ? ' is-invalid' : '' }}" name="password" required>
                                    </label>
                                    @if ($errors->has('password'))
                                         <div class="alert alert-danger">
                                             <strong>{{ $errors->first('password1') }}</strong>
                                         </div>
                                    @endif
                                </li>
                                <li class="col-sm-6">
                                    <div class="checkbox checkbox-primary">
                                        <input id="cate1" class="styled" type="checkbox" >
                                        <label for="cate1"> Keep me logged in </label>
                                    </div>
                                </li>
                                <li class="col-sm-6"> <a href="#." class="forget">Forgot your password?</a> </li>
                                <li class="col-sm-12 text-left">
                                    <button type="submit" class="btn-round">Login</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection