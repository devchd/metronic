@extends('layout.base')

@section('view')
<h3 class="page-title">
    {{ trans('appbenefits.titles.index') }}
</h3>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm grey" href="/appbenefits/create">
                            <i class="fa fa-plus"></i> {{ trans('appbenefits.titles.new') }} </i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <td style="text-align: center">{{ trans("appbenefits.fields.id") }}</td>
                        <td style="text-align: center">{{ trans("appbenefits.fields.establishment_id") }}</td>
                        <td style="text-align: center">{{ trans("appbenefits.fields.category") }}</td>
                        <td style="text-align: center">{{ trans("appbenefits.fields.description") }}</td>
                        <td style="text-align: center">{{ trans("appbenefits.fields.status") }}</td>
                        <td style="text-align: center">{{ trans("appbenefits.fields.single_use") }}</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($appbenefits as $appbenefits)
                            <tr class="odd gradeX">
                                <td style="text-align: center; vertical-align: middle;">{{$appbenefits->id}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$appbenefits->establishment_id}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$appbenefits->category}}</td>
                                <td style="text-align: center; vertical-align: middle;">{{$appbenefits->description}}</td>
                                <td style="text-align: center; vertical-align: middle; width: 50px;"><a href="{{$appbenefits->status ? '/appbenefits/'.$appbenefits->id.'/deactive' : '/appbenefits/'.$appbenefits->id.'/active'}}" class="btn btn-sm {{$appbenefits->active ? "green" : "red"}}" style="width: 35px; margin-right: 0px;"><i class="fa {{$appbenefits->status ? "fa-check" : "fa-times"}}"></i></a></td>
                                <td style="text-align: center; vertical-align: middle;">{{$appbenefits->single_use}}</td>
                                <td style="text-align: center; vertical-align: middle; width: 90px !important; padding: 5px 0 5px 5px;">
                                    <a href="/appbenefits/{{$appbenefits->id}}/edit" class="btn btn-sm yellow" style="width: 35px;">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" data-id="{{$appbenefits->id}}" class="btn btn-sm red deleteModal" style="width: 35px;">
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
            
            app.throwConfirmationModal('<?php echo trans('appbenefits.titles.delete'); ?>','<?php echo trans('appbenefits.notifications.delete_confirmation'); ?>','/appbenefits/delete', $(this).data("id"));
        });
    });
</script>
@stop