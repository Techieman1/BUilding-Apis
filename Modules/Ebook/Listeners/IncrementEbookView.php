<?php

namespace Modules\Ebook\Listeners;

use Modules\Ebook\Events\EbookViewed;
use Modules\Ebook\Entities\EbookViews;

class IncrementEbookView
{
    /**
     * Handle the event.
     *
     * @param \Modules\ebook\Events\EbookViewed $event
     * @return void
     */
    public function handle(EbookViewed $event)
    {
        $event->ebook->increment('viewed');
        if(auth()->user())
        {
            $ebookViews=EbookViews::where(['user_id'=>auth()->user()->id,'ebook_id'=>$event->ebook->id])->count();
            if(!$ebookViews){
                EbookViews::create(['user_id'=>auth()->user()->id,'ebook_id'=>$event->ebook->id]);
            }
            
        }
        
    }
}
