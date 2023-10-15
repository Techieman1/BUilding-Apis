
{{ Form::text('meta_title', clean(trans('meta::attributes.meta_title')), $errors, $settings) }}

<div class="form-group row ">
    <label for="meta-keywords" class="col-md-4 text-left">
        {{ clean(trans('meta::attributes.meta_keywords')) }}
    </label>
    <div class="col-md-8 p-0">
    
        <select name="meta_keywords[]" class="form-control select2" data-tags="true" id="meta-keywords" multiple $errors>
                
                @if(isset($settings['meta_keywords']))
                    @foreach($settings['meta_keywords'] as $meta_keywords)
                        <option selected value="{{ $meta_keywords }}">{{ $meta_keywords }}</option>
                    @endforeach
                
                @endif
        </select>
    </div>
</div>
{{ Form::textarea('meta_description', clean(trans('meta::attributes.meta_description')), $errors, $settings,['rows'=>6]) }}
