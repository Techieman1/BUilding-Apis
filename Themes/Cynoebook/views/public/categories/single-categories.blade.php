@extends('public.layout')

@section('title', trans('cynoebook::categories.categories'))
@section('breadcrumb')
    <li><a href="{{ route('categories.index') }}">{{ clean(trans('cynoebook::categories.categories')) }}</a></li>
@endsection
@section('content')
    <section class="all-categories-wrap">
        <div class="container">
            <div class="all-categories">
                @forelse ($categories as $category)
                    <div class="single-category">
                        <h4 class="section-title-categories">
                        
                            <a  href="{{ $category->url() }}" title="{{ $category->name }}">
                                {{ $category->name }}
                            </a>
                        </h4>
                        @if ($category->items->isNotEmpty())
                            <ul class="list-inline single-category-list">

                                @foreach ($category->items as $subCategory)
                                    <li>

                                        <a  href="{{ $subCategory->url() }}" title="{{ $subCategory->name }}">
                                            {{ $subCategory->name }}
                                        </a>

                                        @include('public.categories.index.sub_category_items')
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @empty
                    @include('public.categories.index.empty_category')
                @endforelse
            </div>
        </div>
    </section>
@endsection
