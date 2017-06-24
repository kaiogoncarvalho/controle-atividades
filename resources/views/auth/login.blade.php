@extends('layouts.app')

@section('title')
    @lang('auth.login')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                        @lang('auth.login')
                </div>
                <div class="panel-body">
                    {{ Form::open(['route' => 'login', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'login' ]) }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">@lang('auth.email_address')</label>

                            <div class="col-md-6">
                                {{
                                    Form::text(
                                        'email',
                                         old('email'),
                                        [
                                            'class'           => 'form-control',
                                            'data-validation' => 'required email',
                                            'autofocus'       => true,
                                        ]
                                    )
                                }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">@lang('auth.password')</label>

                            <div class="col-md-6">
                                {{
                                    Form::password(
                                        'password',
                                        [
                                            'class'           => 'form-control',
                                            'data-validation' => 'required'
                                        ]
                                    )
                                }}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        {{
                                            Form::checkbox(
                                                'remember',
                                                true,
                                                empty(old('remember')) ? false : true
                                            )

                                        }}
                                        @lang('auth.remember_me')
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('auth.access')
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                   @lang('auth.forgot_password')
                                </a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('components.validation')
@endsection