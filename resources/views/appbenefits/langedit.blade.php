@extends('layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('appbenefits.titles.edit') }}
</h3>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"></div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <form action="/appbenefits/langupdate" method="post" id="form_appbenefits" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $appbenefits->id }}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                Select Language
                            </label>
                            <div class="col-md-4">
                                <select name="lang" class="form-control">
                                    <option value="">Select</option>
                                    <option value="es" @if($appbenefits->lang == "es") selected="selected" @endif>Spanish</option>
                                    <option value="fn" @if($appbenefits->lang == "fn") selected="selected" @endif>French</option>
                                    <option value="pt" @if($appbenefits->lang == "pt") selected="selected" @endif>Portugese</option>
                                </select>
                                
                                                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appbenefits.fields.description") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="description" value="{{$appbenefits->description}}" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3" style="text-align: left;">
                                <a href="/appbenefits/translations/{{$appbenefits->benefit_id}}" class="btn default">{{ trans('appbenefits.buttons.cancel') }}</a>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3" style="text-align: right;">
                                <button type="submit" class="btn green">{{ trans('appbenefits.buttons.update') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript_page')
<script>
    jQuery(document).ready(function($) {
        var app = new App();

        var rules = {
            lang: {
                required: true
            },
            description: {
                required: true
            }
        };

        var messages = {
            lang: {
                required: "<?php echo trans("appbenefits.validations.required") ?>"
            },
            description: {
                required: "<?php echo trans("appbenefits.validations.required") ?>"
            }
        };

        app.formValidate('#form_appbenefits', rules, messages);
    });
</script>
@stop