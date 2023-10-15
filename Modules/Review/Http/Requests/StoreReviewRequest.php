<?php

namespace Modules\Review\Http\Requests;

use Modules\Base\Http\Requests\Request;

class StoreReviewRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'review::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation= [
            'rating' => 'required|numeric',
            'reviewer_name' => 'required',
            'comment' => 'required',
            //'captcha' => 'required|captcha',
        ];
        
        if(setting('captcha_type','custom_captcha') == 'invisible_captcha'){
            $validation['g-recaptcha-response']='required';
        }else{
            $validation['captcha']='required|captcha';
        }

        return $validation;
        
    }
}
