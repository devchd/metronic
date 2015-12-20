@extends('layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('appcodes.titles.edit') }}
</h3>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"></div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <form action="/appcodes/update" method="post" id="form_appcodes" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $appcodes->id }}">
                    <div class="form-body">
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appcodes.fields.number") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="number" value="{{$appcodes->number}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appcodes.fields.bar_code") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="bar_code" value="{{$appcodes->bar_code}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appcodes.fields.client") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="client" value="{{$appcodes->client}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appcodes.fields.single_use") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="single_use" value="{{$appcodes->single_use}}" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3" style="text-align: left;">
                                <a href="/appcodes" class="btn default">{{ trans('appcodes.buttons.cancel') }}</a>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3" style="text-align: right;">
                                <button type="submit" class="btn green">{{ trans('appcodes.buttons.update') }}</button>
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
            number: {
                required: true
            },
            bar_code: {
                required: true
            },
            client: {
                required: true
            }
        };

        var messages = {
            number: {
                required: "<?php echo trans("appcodes.validations.required") ?>"
            },
            bar_code: {
                required: "<?php echo trans("appcodes.validations.required") ?>"
            },
            client: {
                required: "<?php echo trans("appcodes.validations.required") ?>"
            }
        };

        app.formValidate('#form_appcodes', rules, messages);
    });
</script>
@stop