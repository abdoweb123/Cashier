@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">Create New Account</h2>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group content-input mt-sm-3">
                            <label for="name">{{ __('Name') }}</label>
                            <div>
                                <input id="name" type="text" class="form-control input-register  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group content-input mt-sm-3">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <div>
                                <input id="email" type="email" class="form-control input-register  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       <div class="form-group content-input mt-sm-3">
                            <label for="mobile">{{ __('Mobile phone') }}</label>
                            <div>
                                <input type="text" class="form-control input-register  @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required>

                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group content-input mt-sm-3">
                            <label for="address">{{ __('address') }}</label>

                            <div>
                                <input type="text" class="form-control input-register  @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group content-input mt-sm-3">
                            <label for="password">{{ __('Password') }}</label>
                            <div>
                                <input id="password" type="password" class="form-control input-register  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group content-input mt-sm-3">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <div>
                                <input id="password-confirm" type="password" class="form-control input-register " name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4 text-center">
                                <button type="submit" class="btn btn-primary register-btn ">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
