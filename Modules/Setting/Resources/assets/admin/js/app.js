(function () {
    "use strict";
    
    $('.changeLogoHeaderColor').on('click', function(){
        $('.logo-header').attr('data-background-color', $(this).val());
    });
    $('.changeTopBarColor').on('click', function(){
        $('.main-header .navbar-header').attr('data-background-color',$(this).val());
    });
    $('.changeSideBarColor').on('click', function(){
        $('.sidebar').attr('data-background-color', $(this).val());
        if($(this).val()=='white'){
            $(".sidebar .nav").addClass('nav-primary');
        }else{
            $(".sidebar .nav").removeClass('nav-primary');
        }
            
    });

    $('.changeBackgroundColor').on('click', function(){
        $('body').attr('data-background-color', $(this).val());
    });
    
    $('.import').on('click',function (e) { 
        e.preventDefault();

        Swal.fire({
            title: CI.langs['admin::admin.dummy.confirmation'],
            text:  CI.langs['admin::admin.dummy.confirmation_message'],

            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: CI.langs['admin::admin.dummy.btn_import'],
            denyButtonText: CI.langs['admin::admin.dummy.btn_cancel'],
        }).then((result) => {
      
            if (result.isConfirmed) {
                $("#cover-spin").show();
                let _url = route('admin.settings.dummydata');
                window.location = _url;
                /* let redirect = window.route('admin.settings.edit').url();
                
                $.ajax({
                    type: "GET",
                    url: _url,
                    success: function (response) {
                        window.location = redirect;
                    }       
                }); */
            }
        })

    });
    $(document).on('click',function () {
        var comment = $("#enable_comment").val();

        if(comment == 'disqus_comment'){
          $("#disqus-comment").show();
        }else{
           $("#disqus-comment").hide();
        }
     });
     $(document).on('click',function () {
        var captchashow = $("#captcha_type").val();

        if(captchashow == 'invisible_captcha'){
          $("#recaptcha-show").show();
        }else{
           $("#recaptcha-show").hide();
        }
     });
})();
