{{ Form::checkbox('cynoebook_inspired_by_your_browsing_history_section_enabled', clean(trans('cynoebook::attributes.section_status')), clean(trans('cynoebook::cynoebook.form.enable_inspired_by_your_browsing_history')), $errors, $settings) }}
{{ Form::text('translatable[cynoebook_inspired_by_your_browsing_history_section_title]', clean(trans('cynoebook::attributes.section_title')), $errors, $settings) }}
{{ Form::number('cynoebook_inspired_by_your_browsing_history_section_total_ebooks', clean(trans('cynoebook::attributes.total_ebooks')), $errors, $settings, ['min' => 0]) }}
    
