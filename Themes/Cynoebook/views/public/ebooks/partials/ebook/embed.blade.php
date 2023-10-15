<div class="right-actions" id="embed">
    <div class="title">{{ clean(trans('cynoebook::ebook.embed')) }}</div>
    <div class="action-content">
        <div id="action-movefile">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="form-group row" >
                    <label for="reason" class="col-md-12 text-left">{{ clean(trans('cynoebook::ebook.embed')) }}</label>
                    <div class="col-md-12 p-0">
                        <textarea class="form-control" cols="10" id="embed_code"><iframe src="{{url('embed/'.$ebook->slug)}}" style="border:none;width:100%;min-height:400px;"></iframe>
                        </textarea>
                    </div>    
                </div>
                <div class="form-group text-left">
                    <button type="submit" id="embedcopy" class="btn btn-primary btn-lg">{{ clean(trans('cynoebook::ebook.copy')) }}</button>
                </div>
            </div> 
        </div>
     </div>
    <div class="action-toggle">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
</div>
@push('scripts')
<script>
    
    (function () {
        "use strict";
        $(document).on('click','#embedcopy',function(){
            let textarea = document.getElementById("embed_code");
            textarea.select();
            document.execCommand("copy");
        }); 
    })();     
    
</script>
@endpush