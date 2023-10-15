{{ Form::text('title', clean(trans('ebook::attributes.title')), $errors, $ebook, ['required' => true]) }}
{{ Form::select('user_id', clean(trans('ebook::attributes.user')), $errors, $users, $ebook, ['required' => true,'class'=>'select2']) }}
{{ Form::select('categories', clean(trans('ebook::attributes.categories')), $errors, $categories, $ebook, ['class' => 'select2', 'multiple' => true,'required' => true,]) }}
{{ Form::select('authors', clean(trans('ebook::attributes.authors')), $errors, $authors, $ebook, ['required' => true,'multiple' => true,'class'=>'select2 csselect2','data-tags'=>"true",'help'=>clean(trans('ebook::ebooks.form.author_add_help_text'))]) }}

{{ Form::text('key_word', clean(trans('ebook::attributes.key_word')), $errors, $ebook, []) }}
{{ Form::text('target_reader', clean(trans('ebook::attributes.target_reader')), $errors, $ebook, []) }}
{{ Form::text('publisher', clean(trans('ebook::attributes.publisher')), $errors, $ebook, []) }}
{{ Form::text('publication_year', clean(trans('ebook::attributes.publication_year')), $errors, $ebook, []) }}
{{ Form::text('password', clean(trans('ebook::attributes.password')), $errors, $ebook, []) }}
{{ Form::text('isbn', clean(trans('ebook::attributes.isbn_number')), $errors, $ebook, []) }}
{{ Form::text('book_edition', clean(trans('ebook::attributes.book_edition')), $errors, $ebook, []) }}
{{ Form::text('price', clean(trans('ebook::attributes.price')), $errors, $ebook, []) }}
{{ Form::text('country_origin', clean(trans('ebook::attributes.country_origin')), $errors, $ebook, []) }}
{{ Form::text('book_language', clean(trans('ebook::attributes.book_language')), $errors, $ebook, []) }}
{{ Form::text('number_of_pages', clean(trans('ebook::attributes.number_of_pages')), $errors, $ebook, []) }}
{{ Form::text('buy_url', clean(trans('ebook::attributes.buy_url')), $errors, $ebook, []) }}
{{ Form::checkbox('is_featured', clean(trans('ebook::attributes.is_featured')), clean(trans('ebook::ebooks.form.feature_the_ebook')), $errors, $ebook) }}
{{ Form::checkbox('is_private', clean(trans('ebook::attributes.is_private')), clean(trans('ebook::ebooks.form.private_the_ebook')), $errors, $ebook) }}
{{ Form::checkbox('is_active', clean(trans('ebook::attributes.is_active')), clean(trans('ebook::ebooks.form.enable_the_ebook')), $errors, $ebook) }}
        
    