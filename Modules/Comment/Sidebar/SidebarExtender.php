<?php

namespace Modules\Comment\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Base\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(clean(trans('ebook::sidebar.ebooks')), function (Group $group) {

            $group->authorize(
                   $this->auth->hasAccess('admin.comment.index') 
            );
            $group->weight(40);
            $group->item(clean(trans('comment::sidebar.comment')), function (Item $item) {
                $item->weight(40);
                $item->icon('fas fa-comments');
                $item->route('admin.comment.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.comment.index')
                );
            });
        });
    }
}
