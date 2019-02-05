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
                    <!-- Don’t have an Account? Register now -->
                    <div class="col-md-6 col-md-offset-3">
                        <h5>Don’t have an Account? Register now</h5>

                        <!-- FORM -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <ul class="row">
                                <li class="col-sm-12">
                                    <label>Username
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    </label>


                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('name') }}</strong> Indicates a dangerous or potentially negative action.
                                        </div>
                                    @endif
                                </li>
                                <li class="col-sm-12">
                                    <label>Email
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    </label>
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </li>
                                <li class="col-sm-12">
                                    <label>Password
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    </label>
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </li>
                                <li class="col-sm-12">
                                    <label>Confirm Password
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </label>
                                </li>
                                <li class="col-sm-12 text-left">
                                    <button type="submit" class="btn-round">Register</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection