<?php

namespace Modules\Ebook\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Base\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(clean(trans('ebook::sidebar.ebooks')), function (Group $group) {
            $group->weight(15);
            $group->authorize(
                   $this->auth->hasAccess('admin.ebooks.index') || $this->auth->hasAccess('admin.reportedebooks.index')
            );
            $group->item(clean(trans('ebook::sidebar.ebooks')), function (Item $item) {
                $item->weight(10);
                $item->icon('fas fa-book');
                $item->route('admin.ebooks.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.ebooks.index')
                );
            });
            $group->item(clean(trans('ebook::sidebar.reportedebooks')), function (Item $item) {
                $item->weight(15);
                $item->icon('fas fa-flag');
                $item->route('admin.reportedebooks.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.reportedebooks.index')
                );
            });
            
        });

        // $menu->group(clean(trans('ebook::sidebar.reports')), function (Group $group) {
        //     $group->weight(100);
        //     $group->authorize(
        //            $this->auth->hasAccess('admin.reports.index') 
        //     );
        //     $group->item(clean(trans('ebook::sidebar.most_viewed_ebooks')), function (Item $item) {
        //         $item->weight(10);
        //         $item->icon('fas fa-chart-bar');
        //         $item->route('admin.reports.index');
        //         $item->authorize(
        //             $this->auth->hasAccess('admin.reports.index')
        //         );
        //     });
        //     $group->item(clean(trans('ebook::sidebar.pre_book_visitor')), function (Item $item) {
        //         $item->weight(10);
        //         $item->icon('fas fa-chart-bar');
        //         $item->route('admin.reports.pre_book_visitor');
        //         $item->authorize(
        //             $this->auth->hasAccess('admin.reports.index')
        //         );
        //     });
        // });

        
    }
}
