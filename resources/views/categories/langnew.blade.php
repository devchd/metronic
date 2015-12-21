@extends('layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('categories.titles.new') }}
</h3>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"></div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <form action="/categories/langstore" method="post" id="form_categories" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="category_id" value="{{$id}}">
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
                                Translated Name 
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{Input::old("name")}}" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3" style="text-align: left;">
                                <a href="/categories" class="btn default">{{ trans('categories.buttons.cancel') }}</a>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3" style="text-align: right;">
                                <button type="submit" class="btn green">{{ trans('categories.buttons.register') }}</button>
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
            }
        };

        var messages = {
            name: {
                required: "<?php echo trans("categories.validations.required") ?>"
            },
            lang: {
                required: "<?php echo trans("categories.validations.required") ?>"
            }
        };

        app.formValidate('#form_categories', rules, messages);
    });
</script>
@stop