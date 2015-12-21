@extends('layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('appestablishments.titles.index') }}
</h3>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm grey" href="/appestablishments/create/{{$id}}/lang">
                            <i class="fa fa-plus"></i> {{ trans('appestablishments.titles.new') }} </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td style="text-align: center">{{ trans("appestablishments.fields.id") }}</td>
                        <td style="text-align: center">Language</td>
                        <td style="text-align: center">{{ trans("appestablishments.fields.name") }}</td>
                        <td style="text-align: center">{{ trans("appestablishments.fields.description") }}</td>
                        <td style="text-align: center">Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($appestablishments as $appestablishments)
                            <tr class="odd gradeX">
                                <td style="text-align: center; vertical-align: middle;">{{$appestablishments->id}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$appestablishments->lang}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$appestablishments->name}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$appestablishments->description}}</td>
<td style="text-align: center; vertical-align: middle; width: 90px !important; padding: 5px 0 5px 5px;">
                                    <a href="/appestablishments/translations/{{$appestablishments->id}}" class="btn btn-sm yellow" style="width: 35px;">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="/appestablishments/{{$appestablishments->id}}/langedit" class="btn btn-sm yellow" style="width: 35px;">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" data-id="{{$appestablishments->id}}" class="btn btn-sm red deleteModal" style="width: 35px;">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript_page')
<script>
    jQuery(document).ready(function($) {
        var app = new App();
        app.orderedTableInit('.table', 0, 'asc');

        $(".deleteModal").on("click", function(){
            app.throwConfirmationModal('<?php echo trans('appestablishments.titles.delete'); ?>','<?php echo trans('appestablishments.notifications.delete_confirmation'); ?>','/appestablishments/langdelete', $(this).data("id"));
        });
    });
</script>
@stop