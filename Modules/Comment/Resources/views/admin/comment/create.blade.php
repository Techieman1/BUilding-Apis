@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('admin::resource.create', ['resource' => trans('comment::comment.comment')])))
    
    <li class="nav-item"><a href="{{ route('admin.comment.index') }}">{{ clean(trans('comment::comment.comment')) }}</a></li>
    <li class="separator"><i class="flaticon-right-arrow"></i></li>
    <li class="nav-item">{{ clean(trans('admin::resource.create', ['resource' => trans('comment::comment.comment')])) }}</li>
@endcomponent

@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ route('admin.comment.store') }}" class="form-horizontal" id="author-create-form" novalidate>
            {{ csrf_field() }} 
            {!! $tabs->render(compact('comment')) !!}
        </form>
    </div>
</div>
@endsection
