@if(setting('enable_comment','disable')=='custom_comment')
    <div id="comments" class="comments tab-pane fade in clearfix {{ request()->has('comment') || comment_form_has_error($errors) ? 'active' : '' }}">
        <div class="row p-t-15">
            <div class="col-lg-12 ">
                @comments([
                    'model' => $ebook,
                    'approved' => true,
                    'perPage' => 20
                ])
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        (function () {
            "use strict";
            $( document ).ready(function() {
                var hash = window.location.hash.substr(1);
                if(hash.indexOf('comment-') != -1){
                    console.log(hash);
                    $("#comment-tab a").trigger('click');
                    $('html, body').animate({
                        scrollTop: $("#comment-tab").offset().top
                    }, 'slow');
                }
            });
        })();
        </script>
    @endpush
@endif
@if(setting('enable_comment','disable')=='disqus_comment')
    <div id="comments" class="comments tab-pane fade in clearfix">
        <div class="row p-t-15">
            <div class="col-lg-12 ">
                <?php 
                    $disqus_title=$ebook->title;
                    $disqus_url= LaravelLocalization::getNonLocalizedURL(route('ebooks.show',$ebook->slug)); //route('ebooks.show',$ebook);
                    $disqus_identifier=$ebook->slug;
                ?>
                
                
                <Disqus shortname='{{setting('disqus_comment_code')}}' :page-config="{ title: '{{$disqus_title}}', url: '{{$disqus_url}}',identifier: '{{$disqus_identifier}}' }" lang="{{locale()}}"  />
                
            </div>
        </div>
    </div>
@endif

