<?php

namespace Themes\Cynoebook\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Ui\Facades\TabManager;
use Themes\Cynoebook\Http\Requests\SaveCynoebookRequest;
use Modules\Setting\Entities\Setting;


class CynoebookController extends Controller
{
    
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = setting()->all();
        $tabs = TabManager::get('cynoebook');

        return view('admin.cynoebook.edit', compact('settings', 'tabs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SaveCynoebookRequest $request)
    {
        
        if(!$request->has('meta_keywords')){
            $request->merge(['meta_keywords' => []]);
            
        }
        
        //setting(clean($request->except('_token', '_method')));
        setting($request->except('_token', '_method'));

        return back()->withSuccess(clean(trans('admin::messages.saved_message', ['resource' => trans('setting::settings.settings')])));
    }
    public function metadata($meta)
    {
        
        $setting = Setting::where('meta', $meta)->firstOrFail();

        return view('public.home.index', compact('setting'));
    }
}
