@extends('public.layout')

@section('title')
    @if (request()->has('query'))
        {{ clean(trans('cynoebook::ebooks.search_results_for')) }}: "{{ request('query') }}"
    @else
        {{ clean(trans('cynoebook::ebooks.ebooks')) }}
    @endif
@endsection


@section('breadcrumb')
    @if (request()->has('query') || request()->has('category'))
        <li><a href="{{ route('ebooks.index') }}">{{ clean(trans('cynoebook::ebooks.ebooks')) }}</a></li>
        
        @if(request()->has('category'))
            @if(request()->has('query'))
                <li><a href="{{ route('ebooks.index', ['category' => request('category')]) }}">{{ request('category') }}</a></li>
            @else
                <li class="active">{{ request('category') }}</li>
            @endif
        @endif
        
        @if(request()->has('query'))
            <li class="active">{{clean(trans('cynoebook::ebooks.search_results_for')) }}:{{ request('query') }}</li>
        @endif
        
    @else
        <li class="active">{{ clean(trans('cynoebook::ebooks.ebooks')) }}</li>
    @endif
    
    
    
@endsection


@section('content')
    <section class="ebook-list">
        <div class="row">
            @include('public.ebooks.partials.filter')
            <div class="col-md-9 col-sm-12">
                @if (setting('cynoebook_ad1_section_enabled'))
                    @include('public.home.sections.advertisement',['ad'=>setting('cynoebook_ad_1')])
                @endif 
                
                <div class="ebook-list-header clearfix">
                    <div class="search-result-title pull-left">
                        @if (request()->has('query'))
                            <h3>{{ clean(trans('cynoebook::ebooks.search_results_for')) }}: "{{ request('query') }}"</h3>
                        @else
                            <h3>{{ clean(trans('cynoebook::ebooks.ebooks')) }}</h3>
                        @endif

                    </div>                                
                </div>
            </div>
        </div>
    </section>
@endsection