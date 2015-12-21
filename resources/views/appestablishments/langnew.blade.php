@extends('layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('appestablishments.titles.new') }}
</h3>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"></div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <form action="/appestablishments/langstore" method="post" id="form_appestablishments" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="establishment_id" value="{{ $id }}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                Select Language
                            </label>
                            <div class="col-md-4">
                                <select name="lang" class="form-control">
                                    <option value="">Select</option>
                                    <option value="es">Spanish</option>
                                    <option value="fn">French</option>
                                    <option value="pt">Portugese</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appestablishments.fields.name") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{Input::old("name")}}" class="form-control"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appestablishments.fields.description") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="description" value="{{Input::old("description")}}" class="form-control"/>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3" style="text-align: left;">
                                <a href="/appestablishments/translation/{{$id}}" class="btn default">{{ trans('appestablishments.buttons.cancel') }}</a>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3" style="text-align: right;">
                                <button type="submit" class="btn green">{{ trans('appestablishments.buttons.register') }}</button>
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
            name: {
                required: true
            },
            lang: {
                required: true
            },
            description: {
                required: true
            }
            
        };

        var messages = {
            name: {
                required: "<?php echo trans("appestablishments.validations.required") ?>"
            },
            description: {
                required: "<?php echo trans("appestablishments.validations.required") ?>"
            },
            lang: {
                required: "<?php echo trans("appestablishments.validations.required") ?>"
            }
        };

        app.formValidate('#form_appestablishments', rules, messages);
    });
</script>
@stop