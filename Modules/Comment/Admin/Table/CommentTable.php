<?php

namespace Modules\Comment\Admin\Table;
use Illuminate\Support\Facades\Config;

use Modules\Admin\Ui\AdminTable;
use Modules\User\Entities\User;
use Modules\Ebook\Entities\Ebook;

use Modules\Comment\Entities\Comment;
// use Laravelista\Comments\Commenter;
// use Laravelista\Comments\commentable;
use DB;

class CommentTable extends AdminTable
{
 /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = ['commenter_id','commentable_id'];

    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable();
       /*  ->editColumn('commenter_id', function ($comment) {
           return $comment->commenter->full_name ?? $comment->guest_name;
        })
        ->editColumn('commentable_id', function ($comment) {
         
         return  $comment->commentable->slug ?? $comment->commentable_id;
     
       }); */
           
    }
 
}
 