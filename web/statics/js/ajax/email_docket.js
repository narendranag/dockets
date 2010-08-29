$(document).ready(function(){
    $("form[name=email_docket]").live('submit' , function(){
        $("form[name=email_docket] #send_email").attr('disabled' , 'disabled');
        $.post(base_url() + 'ajax/email_docket/' + $('#id').val(),{
            email: $('#email').val()
            }, function(data) {
            $('#fancybox-inner').html(data);
            $.fancybox.resize();
      });
        return false;
    })
})