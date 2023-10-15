@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('ebook::reports.most_viewed_ebooks')))
    <li class="nav-item">{{ clean(trans('ebook::reports.reports')) }}</li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">{{ clean(trans('ebook::reports.most_viewed_ebooks')) }}</li>
@endcomponent

@section('content')
<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-header">
        <div class="card-head-row card-tools-still-right">
            <h4 class="card-title">{{ clean(trans("ebook::reports.most_viewed_ebooks")) }}</h4>
            
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive table-hover table-most_viewed_ebooks">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ clean(trans('ebook::ebooks.table.bookcover')) }}</th>
                                <th>{{ clean(trans('ebook::ebooks.table.title')) }}</th>
                                <th>{{ clean(trans('ebook::ebooks.table.views')) }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $inc=0;
                            @endphp
                            @foreach($records as $record)
                            @php 
                                
                                $inc++;
                            @endphp
                            
                            <tr>
                                <td>
                                {{ $inc }}
                                </td>
                                <td>
                                    <div class="avatar-holder">
                                    
                                        @if (is_null(optional($record->ebook->book_cover)->path))
                                            <i class="fas fa-image"></i>
                                        @else
                                            <img src="{{ $record->ebook->book_cover->path }}">
                                        @endif    
                                    </div>
                                </td>
                                <td>
                                    {{ $record->ebook->title  }}
                                </td>
                                <td>
                                    {{ $record->views  }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
    
@endsection
@push('scripts')
<link media="all" type="text/css" rel="stylesheet" href="{{ Module::asset('admin:js/dataTables-buttons//buttons.bootstrap.min.css') }}">
<script src="{{ Module::asset('admin:js/dataTables-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ Module::asset('admin:js/dataTables-buttons/buttons.bootstrap.min.js') }}"></script>
<script src="{{ Module::asset('admin:js/dataTables-buttons/jszip.min.js') }}"></script>
<script src="{{ Module::asset('admin:js/dataTables-buttons/vfs_fonts.js') }}"></script>
<script src="{{ Module::asset('admin:js/dataTables-buttons/buttons.html5.min.js') }}"></script>
<style>
.dataTables_wrapper .dt-buttons.btn-group .buttons-html5{    margin-left: 5px;}
#activity-table .dataTables_filter{display: inline-block;float: right;}
</style>
<script>
    (function () {
        "use strict";
        $(document).on("change","#filter-user",function(e){
            e.preventDefault();
            var url="{{ route('admin.reports.index') }}";
            if($(this).val()!=''){
                url=url+'?filter='+ $(this).val();
            }
            window.location.href =url;
         });
        $('.table-most_viewed_ebooks .table').dataTable({
            columns: [
                { orderable: false,searchable: false },
                { orderable: false,searchable: false},
                { orderable: true,searchable: true },
                { orderable: true,searchable: false },
            ],   
            "order": [[ 3, "desc" ]],
            dom: 'Bfrtip',
            buttons: [
                //'csv', 'excel',
                {
                    extend: 'excelHtml5',
                    title: 'most-viewed-ebooks',
                    exportOptions: {
                        columns: [0, 2, 3, ]
                    }
                },
                {
                    extend: 'csv',
                    title: 'most-viewed-ebooks',
                    exportOptions: {
                        columns: [0, 2, 3, ]
                    }
                }
            ]
            
        });
    })();  
</script>
@endpush
