@extends('layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('categories.titles.edit') }}
</h3>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"></div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <form action="/categories/langupdate" method="post" id="form_categories" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $categories->id }}">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                Select Language
                            </label>
                            <div class="col-md-4">
                                <select name="lang" class="form-control">
                                    <option value="">Select</option>
                                    <option value="es" @if($categories->lang == "es") selected="selected" @endif>Spanish</option>
                                    <option value="fn" @if($categories->lang == "fn") selected="selected" @endif>French</option>
                                    <option value="pt" @if($categories->lang == "pt") selected="selected" @endif>Portugese</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("categories.fields.name") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" value="{{$categories->name}}" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3" style="text-align: left;">
                                <a href="/categories/translations/{{$categories->category_id}}" class="btn default">{{ trans('categories.buttons.cancel') }}</a>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3" style="text-align: right;">
                                <button type="submit" class="btn green">{{ trans('categories.buttons.update') }}</button>
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
            active: {
                required: true
            }
        };

        var messages = {
            name: {
                required: "<?php echo trans("categories.validations.required") ?>"
            },
            active: {
                required: "<?php echo trans("categories.validations.required") ?>"
            }
        };

        app.formValidate('#form_categories', rules, messages);
    });
</script>
@stop