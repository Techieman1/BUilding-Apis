@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('comment::comment.comment')))
    <li class="nav-item">{{ clean(trans('comment::comment.comment')) }}</li>
@endcomponent

@component('admin::include.page.table')
    @slot('title', clean(trans('comment::comment.comment')))
    {{-- @slot('buttons', ['create']) --}}
    @slot('resource', 'comment')
    @slot('name', clean(trans('comment::comment.comment')))
    @slot('noedit', 1)
     @slot('thead')
        <tr>
            @include('admin::include.table.select-all',["name"=>trans('comment::comment.comment')])
            <th>{{ clean(trans('comment::comment.table.eBook')) }}</th>
            <th>{{ clean(trans('comment::comment.table.comment')) }}</th>
            <th>{{ clean(trans('comment::comment.table.user')) }}</th>
            <th data-sort>{{ clean(trans('admin::admin.table.created')) }}</th>
        </tr>
    @endslot 
@endcomponent

@push('scripts')
    <script>
        new DataTable('#comment-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'commentable.title', name: 'commentable.slug', searchable: true, defaultContent: '' },
                { data: 'comment', name: 'comment', orderable: false, defaultContent: '' },
                { data: 'commenter.full_name', name: 'commenter.first_name', searchable: true },
                
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush  
