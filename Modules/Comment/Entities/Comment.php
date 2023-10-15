<?php

namespace Modules\Comment\Entities;

use Illuminate\Support\Facades\Cache;
use Modules\Base\Eloquent\Model;
use Modules\Comment\Admin\Table\CommentTable;
use Modules\Files\Eloquent\HasMedia;
use Illuminate\Support\Facades\Config;
use Laravelista\Comments\Commenter;
use Modules\Ebook\Entities\Ebook;
use Laravelista\Comments\Commentable;



class Comment extends Model
{
    use HasMedia,  Commenter, Commentable;

    protected $table= "comments";
    protected $with = [
        'commenter'
    ];

    protected $fillable = [
    'commenter_id',
    'commenter_type',
    'guest_name',
    'guest_email',
    'commentable_type',
    'commentable_id',
    'comment',
    'approved',
    'child_id',
];


    
    protected $casts = [
        'approved' => 'boolean',
      ];

      public function Pastes()
      {
          return $this->belongsTo(Ebook::class)->withDefault();
      }

      public function commenter()
      {
          return $this->morphTo();
      }

      public function commentable()
      {
          return $this->morphTo();
      }

      public function children()
      {
          return $this->hasMany(Config::get('comments.model'), 'child_id');
      }
  
    
      public function parent()
      {
          return $this->belongsTo(Config::get('comments.model'), 'child_id');
      }

    public function table($request)
    {
         $query = $this->newQuery()
         ->with('pastes')
         ->with('comments')
         ->with('commentable');


        return new CommentTable($query);
    }
    public function comments()
    {
        return $this->morphMany(Config::get('comments.model'), 'commentable');
    }

    /**
     * Returns only approved comments for this model.
     */
    public function approvedComments()
    {
        return $this->morphMany(Config::get('comments.model'), 'commentable')->where('approved', true);
    }

    

}
    
