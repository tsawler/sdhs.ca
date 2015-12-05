@extends('vcms5::base')

<?php
$active = ['<span class="text-danger">Inactive</span>', '<span class="text-success">Active</span>'];
?>

@section('top-white')
    <h1>All Galleries</h1>
@stop

@section('content-title')
Galleries
@stop

@section('content')
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Posts</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">
            <table id="itable" class="table table-compact table-striped table-hover">
                <thead>
                    <tr>
                        <th>Gallery</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allgalleries as $gallery)
                        <tr>
                            <td><a href="/admin/galleries/gallery?id={!! $gallery->id!!}">{!! $gallery->gallery_name !!}</a></td>
                            <td>{!! $gallery->created_at !!}</td>
                            <td>{!! $gallery->updated_at !!}</td>
                            <td>{!! $active[$gallery->active] !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('bottom-js')
<script>
$(document).ready(function() {
    $('#itable').dataTable({
        responsive: true,
        stateSave: true
    });
});
</script>
@stop