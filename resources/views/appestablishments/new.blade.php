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
                <form action="/appestablishments/store" method="post" id="form_appestablishments" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-body">
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
                                {{ trans("appestablishments.fields.image") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="image" value="{{Input::old("image")}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appestablishments.fields.category") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <select name="category" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($category as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                
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
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appestablishments.fields.address") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="address" value="{{Input::old("address")}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appestablishments.fields.lat") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lat" value="{{Input::old("lat")}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appestablishments.fields.lon") }} <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lon" value="{{Input::old("lon")}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appestablishments.fields.site") }} 
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="site" value="{{Input::old("site")}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                {{ trans("appestablishments.fields.phone") }} 
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="phone" value="{{Input::old("phone")}}" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3" style="text-align: left;">
                                <a href="/appestablishments" class="btn default">{{ trans('appestablishments.buttons.cancel') }}</a>
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
            image: {
                required: true
            },
            category: {
                required: true
            },
            description: {
                required: true
            },
            address: {
                required: true
            },
            lat: {
                required: true
            },
            lon: {
                required: true
            },
        };

        var messages = {
            name: {
                required: "<?php echo trans("appestablishments.validations.required") ?>"
            },
            image: {
                required: "<?php echo trans("appestablishments.validations.required") ?>"
            },
            category: {
                required: "<?php echo trans("appestablishments.validations.required") ?>"
            },
            description: {
                required: "<?php echo trans("appestablishments.validations.required") ?>"
            },
            address: {
                required: "<?php echo trans("appestablishments.validations.required") ?>"
            },
            lat: {
                required: "<?php echo trans("appestablishments.validations.required") ?>"
            },
            lon: {
                required: "<?php echo trans("appestablishments.validations.required") ?>"
            }
        };

        app.formValidate('#form_appestablishments', rules, messages);
    });
</script>
@stop