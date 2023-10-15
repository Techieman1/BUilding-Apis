<?php

namespace Modules\Comment\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Comment\Entities\Comment;
use Modules\Admin\Traits\HasDefaultActions;
use Modules\Comment\Http\Requests\SaveCommentRequest;

class CommentController extends Controller
{
    use HasDefaultActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'comment::comment.comment';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'comment::admin.comment';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveCommentRequest::class;
}
