<?php

namespace Modules\Contact\Http\Requests;

use Modules\Base\Http\Requests\Request;

class ContactRequest extends Request
{
    protected $availableAttributes = 'contact::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation= [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'subject' => ['required'],
            'message' => ['required'],
            //'captcha' => ['required', 'captcha'],
        ];
        
        if(setting('captcha_type','custom_captcha') == 'invisible_captcha'){
            $validation['g-recaptcha-response']=['required'];
        }else{
            $validation['captcha']=['required', 'captcha'];
        }
        
    }
}
