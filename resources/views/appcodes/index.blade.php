@extends('layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('appcodes.titles.index') }}
</h3>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm grey" href="/appcodes/create/{{$benefit_id}}">
                            <i class="fa fa-plus"></i> {{ trans('appcodes.titles.new') }} </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td style="text-align: center">{{ trans("appcodes.fields.id") }}</td>
                        <td style="text-align: center">{{ trans("appcodes.fields.benefit_id") }}</td>
                        <td style="text-align: center">{{ trans("appcodes.fields.number") }}</td>
                        <td style="text-align: center">{{ trans("appcodes.fields.bar_code") }}</td>
                        <td style="text-align: center">{{ trans("appcodes.fields.status") }}</td>
                        <td style="text-align: center">{{ trans("appcodes.fields.client") }}</td>
                        <td style="text-align: center">{{ trans("appcodes.fields.single_use") }}</td>
                        <td style="text-align: center">Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($appcodes as $appcodes)
                            <tr class="odd gradeX">
                                <td style="text-align: center; vertical-align: middle;">{{$appcodes->id}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$appcodes->benefit_id}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$appcodes->number}}</td>
                                <td style="text-align: center; vertical-align: middle;"><img src="{{$appcodes->bar_code}}" width="40" /></td>
                                <td style="text-align: center; vertical-align: middle; width: 50px;"><a href="{{$appcodes->status ? '/appcodes/'.$appcodes->id.'/deactive' : '/appcodes/'.$appcodes->id.'/active'}}" class="btn btn-sm {{$appcodes->status ? "green" : "red"}}" style="width: 35px; margin-right: 0px;"><i class="fa {{$appcodes->status ? "fa-check" : "fa-times"}}"></i></a></td>
                                <td style="text-align: center; vertical-align: middle;">{{$appcodes->client}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$appcodes->single_use}}</td>
                                <td style="text-align: center; vertical-align: middle; width: 90px !important; padding: 5px 0 5px 5px;">
                                    <a href="/appcodes/{{$appcodes->id}}/edit" class="btn btn-sm yellow" style="width: 35px;">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" data-id="{{$appcodes->id}}" class="btn btn-sm red deleteModal" style="width: 35px;">
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
            app.throwConfirmationModal('<?php echo trans('appcodes.titles.delete'); ?>','<?php echo trans('appcodes.notifications.delete_confirmation'); ?>','/appcodes/delete', $(this).data("id"));
        });
    });
</script>
@stop