<?php

namespace Modules\Ebook\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Ebook\Entities\Ebook;
use Modules\User\Entities\User;
use Modules\Ebook\Entities\EbookViews;
use Illuminate\Http\Request;
use DB;

class ReportsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     */
    public function index(Request $request)
    {
        $ebookViews=EbookViews::with('ebook')->groupBy('ebook_id')
                            ->select('ebook_id', DB::raw('count(*) as views'))
                            ->orderBy('views','DESC')
                            ->orderBy('ebook_id', 'ASC')->get();
        $users=User::list();
		return view('ebook::admin.reports.most-views-ebooks', ['records'=>$ebookViews]);
        
        
    }
    public function pre_book_visitor(Request $request)
    {
        $sUser=0;
        if($request->has('filter')){
            $sUser=$request->filter;
        }

        $ebookViews=EbookViews::with(['ebook','user'])
                            ->when(! is_null($request->filter) && $request->filter !== 'null', function ($query) use ($request) {
                                $query->where('user_id', $request->filter);
                            })
                            ->get();
        $users=User::list();
		return view('ebook::admin.reports.pre-book-visitor', ['records'=>$ebookViews,'users'=>$users,'sUser'=>$sUser]);
        
        
    }

    
}
