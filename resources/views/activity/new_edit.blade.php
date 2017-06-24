@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('activity.create')</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('activity.name')</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">@lang('activity.description')</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" value="{{ old('description') }}"  autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="start_date" class="col-md-4 control-label">@lang('activity.start_date')</label>

                            <div class="col-md-6">
                                <input id="start_date" type="text" class="form-control" name="start_date" value="{{ old('start_date') }}" autofocus>

                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                            <label for="end_date" class="col-md-4 control-label">@lang('activity.end_date')</label>

                            <div class="col-md-6">
                                <input id="end_date" type="text" class="form-control" name="end_date" value="{{ old('end_date') }}"  autofocus>

                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">@lang('activity.status')</label>

                            <div class="col-md-6">
                                <select name="status" class="form-control">
                                    <option></option>
                                    @foreach($status as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('situation') ? ' has-error' : '' }}">
                            <label for="situation" class="col-md-4 control-label">@lang('activity.situation')</label>

                            <div class="col-md-6">
                                <select name="situation" class="form-control">
                                    <option></option>
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                                @if ($errors->has('situation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('situation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    @lang('activity.creating')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
@endsection

@section('footer')
    {{ Html::script('js/moment/moment.min.js') }}
    {{ Html::style('css/bootstrap-datetimepicker.min.css') }}
    {{ Html::script('js/datetimepicker/bootstrap-datetimepicker.js') }}
    {{ Html::script('js/moment/locales/pt-br.js') }}
    {{ Html::script('js/datetimepicker/new_edit.js') }}

    @include('components.validation')
@endsection