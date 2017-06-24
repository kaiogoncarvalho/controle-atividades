@extends('layouts.app')

@section('title')
    @if(isset($activity))
        @lang('activity.edit')
    @else
        @lang('activity.create')
    @endif
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(isset($activity))
                        @lang('activity.edit')
                    @else
                        @lang('activity.create')
                    @endif
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => 'activity/save', 'role' => 'form', 'class' => 'form-horizontal']) }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('activity.name')</label>

                            <div class="col-md-6">

                                {{
                                    Form::text(
                                        'name',
                                        isset($activity->name) ? $activity->name : old('name'),
                                        [
                                            'class'                  => 'form-control',
                                            'data-validation'        => 'required length',
                                            'data-validation-length' => 'max255'
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

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">@lang('activity.description')</label>

                            <div class="col-md-6">
                                {{
                                    Form::textarea(
                                        'description',
                                        isset($activity->description) ? $activity->description : old('description'),
                                        [
                                            'class'                  => 'form-control',
                                            'data-validation'        => 'required length',
                                            'data-validation-length' => 'max600'
                                        ]
                                    )
                                }}

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
                                {{
                                    Form::text(
                                        'start_date',
                                        isset($activity->start_date) ? $activity->start_date : old('start_date'),
                                        [
                                            'data-validation'        => 'required date',
                                            'data-validation-format' => 'dd/mm/yyyy',
                                            'class'                  => 'form-control',
                                            'id'                     => 'start_date'
                                        ]
                                    )

                                }}

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
                                {{
                                   Form::text(
                                       'end_date',
                                       isset($activity->end_date) ? $activity->end_date : old('end_date'),
                                       [
                                           'data-validation'                  => 'required date',
                                           'data-validation-format'           => 'dd/mm/yyyy',
                                           'data-validation-depends-on'       => 'status',
                                           'data-validation-depends-on-value' => 4,
                                           'class'                            => 'form-control',
                                           'id'                               => 'end_date'
                                       ]
                                   )

                                }}
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
                                <select name="status_id" class="form-control" data-validation="required">
                                    <option></option>
                                    @foreach($status as $value)
                                        @if(isset($activity) && $activity->status == $value->id)
                                            <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endif
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
                                <select name="situation" class="form-control" data-validation="required"s>
                                    <option></option>
                                    @if(isset($activity) && $activity->situation == true)
                                        <option selected value="1">Ativo</option>
                                    @else
                                        <option value="1">Ativo</option>
                                    @endif
                                    @if(isset($activity) && $activity->situation == false)
                                        <option selected value="0">Inativo</option
                                    @else
                                        <option value="0">Inativo</option
                                    @endif
                                    >
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
                                    @if(isset($activity))
                                        @lang('activity.editing')
                                    @else
                                        @lang('activity.creating')
                                     @endif
                                </button>
                            </div>
                        </div>
                    {{ Form::close() }}
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