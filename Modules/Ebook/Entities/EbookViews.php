<?php

namespace Modules\Ebook\Entities;

use Illuminate\Support\Facades\Request;
use Modules\Base\Eloquent\Model;
use Modules\User\Entities\User;
use Modules\Ebook\Entities\Ebook;


class EbookViews extends Model
{
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'ebook_id',
    ];

    public static function findById($id)
    {
        return static::where('id', $id)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
	public function ebook()
    {
        return $this->belongsTo(Ebook::class)->withDefault();
    }

    
}
