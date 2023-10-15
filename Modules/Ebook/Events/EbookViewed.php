<?php

namespace Modules\Ebook\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cookie;

class EbookViewed
{
    use SerializesModels;

    /**
     * The ebook entity.
     *
     * @var \Modules\Ebook\Entities\Ebook
     */
    public $ebook;

    /**
     * Create a new event instance.
     *
     * @return void
     */



    public function __construct($ebook)
    {
    
            $cookieBooks=[];
            if(Cookie::get('EbookViewed') !== null){
                $cookieValue= Cookie::get('EbookViewed'); 
                $cookieValue=json_decode($cookieValue,true);            
                $cookieBooks=$cookieValue;
            }
            array_unshift($cookieBooks , $ebook->id);
            $cookieBooks=array_unique($cookieBooks);
            $data=json_encode($cookieBooks);
            Cookie::queue('EbookViewed',$data);
            $this->ebook = $ebook; 
    }
}
