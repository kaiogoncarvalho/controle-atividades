@extends('layouts.app')

@section('title')
    @lang('auth.register')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('auth.register')</div>
                <div class="panel-body">
                    {{
                        Form::open(['route' => 'register', 'role' => 'form', 'class' => 'form-horizontal'])
                     }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('auth.name')</label>

                            <div class="col-md-6">

                                {{
                                    Form::text(
                                        'name',
                                        old('name'),
                                        [
                                            'class'           => 'form-control',
                                            'data-validation' => 'required',
                                            'autofocus'       => true
                                        ]
                                    )
                                }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
                                           'class'                            => 'form-control',
                                           'data-validation'                  => 'required length',
                                           'data-validation-length'           => 'min6',
                                           'data-validation-error-msg-length' => 'Senha deve ter mais que 6 caracteres'
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
                            <label for="password-confirm" class="col-md-4 control-label">@lang('auth.confirm_password')</label>

                            <div class="col-md-6">
                                {{
                                   Form::password(
                                       'password_confirmation',
                                       [
                                           'class'                                  => 'form-control',
                                           'data-validation'                        => 'confirmation',
                                           'data-validation-confirm'                => 'password',
                                           'data-validation-error-msg-confirmation' => 'Confirmação de senha está incorreta'
                                       ]
                                   )
                               }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('auth.confirm')
                                </button>
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