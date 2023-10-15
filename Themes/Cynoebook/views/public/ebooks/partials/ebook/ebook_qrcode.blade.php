<div class="right-actions" id="share">
    <div class="title">{{ clean(trans('cynoebook::ebook.share')) }}</div>
    <div class="action-content">
        <div id="action-movefile">
                {{ csrf_field() }}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="form-group row {{ $errors->has('reason') ? 'has-error' : '' }}" >
                        <div class="breadcrumb">
                            <ul class="list-inline">
                              <li><i class="fa fa-home"></i><a href="{{ route('ebooks.index') }}" style="font-size:15px;">{{ clean(trans('cynoebook::ebooks.ebooks')) }}</a></li>
                              <li class="active">{{ $ebook->title }}</li>
                            </ul>
                        </div>

                        <div class="col-md-12 p-0">
                           <div class="text-center"> 
                                {!! QrCode::size(150)->generate(route('ebooks.show', $ebook->slug)) !!}
                            
                           </div>
                        </div>    
                    </div>
                </div> 
          </div>
     </div>
    <div class="action-toggle">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
</div>