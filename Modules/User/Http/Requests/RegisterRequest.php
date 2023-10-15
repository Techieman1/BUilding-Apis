<?php

namespace Modules\User\Http\Requests;

use Modules\Base\Http\Requests\Request;

class RegisterRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'user::attributes.users';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $validation= [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|alpha_dash|unique:users,username',
            'password' => 'required|confirmed|min:6',
            //'captcha' => 'required|captcha',
            // 'g-recaptcha-response' => 'required|captcha',
            'privacy_policy' => 'accepted',
        ];

        if(setting('captcha_type','custom_captcha') == 'invisible_captcha'){
            $validation['g-recaptcha-response']='required';
        }else{
            $validation['captcha']='required|captcha';
        }

        return $validation;
    }
}
