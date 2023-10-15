<?php

namespace Modules\Comment\Admin\Tabs;

use Modules\Admin\Ui\CiTab;
use Modules\Admin\Ui\CiTabs;
use Modules\User\Entities\User;

class CommentTabs extends CiTabs
{
    // public function make()
    // {
    //     $this->group('author_information', clean(trans('comment::comment.tabs.comment')))
    //         ->active()
    //         ->add($this->general());
    // }

    // private function general()
    // {
    //     return tap(new CiTab('comment', clean(trans('comment::comment.tabs.comment'))), function (CiTab $tab) {
    //         $tab->active();
    //         $tab->weight(5);
    //         $tab->fields(['name','extension','popular']);
    //         $tab->view('comment::admin.comment.tabs.general', [
    //             'users' => User::list(),

    //         ]);
    //     });
    // } 
    
    

}
