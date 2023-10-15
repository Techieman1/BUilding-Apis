{{ Form::select('captcha_type', clean(trans('setting::settings.tabs.captcha')), $errors, clean(trans('setting::settings.form.captcha')), $settings) }}

<div id="recaptcha-show">
{{ Form::text('invisible_captcha_site_key', clean(trans('setting::attributes.invisible_captcha_site_key')), $errors, $settings, ['required' => true]) }}
{{ Form::text('invisible_captcha_secret_Key', clean(trans('setting::attributes.invisible_captcha_secret_Key')), $errors, $settings, ['required' => true]) }}
</div>