$(document).ready(function(){
    var img = $('<img />').attr('src', base_uri + 'web/statics/images/loading.gif').attr('class', 'progress');
    $('.pending_task').live('click', function(){
        var o = $(this);
        $(this).attr('disabled', 'disabled').parent().parent().append(img);
        $.ajax({
            cache: false,
            url : base_url() + 'ajax/complete_task',
            type: 'post',
            dataType: 'json',
            data: 'id='+$(this).attr('rel'),
            success: function(data) {
                var html = '<li><span class="quiet"><input type="checkbox" checked="checked" class="completed_task" rel="'+data.id+'"> '+ data.name+' <span class="quiet small">('+data.due+')</span></span></li>';
                $('#completed_tasks').append(html);
                o.parent().parent().remove();
                $('span#gold').html(data.gold);
            }
        });
    })
    $('.completed_task').live('click', function(){
        var o = $(this);
        $(this).attr('disabled', 'disabled').parent().parent().append(img);
        $.ajax({
            cache: false,
            url : base_url() + 'ajax/uncomplete_task',
            type: 'post',
            dataType: 'json',
            data: 'id='+$(this).attr('rel'),
            success: function(data) {
                var html = '<li><span class="loud"><input type="checkbox" class="pending_task" rel="'+ data.id +'"> '+data.name+' <span class="quiet small">('+data.due+')</span></span></li>';
                ;
                $('#pending_tasks').append(html);
                o.parent().parent().remove();
                $('span#gold').html(data.gold);
            }
        });
    })
    $('#share_docket').click(function(){
        $(this).html(img);
        $.ajax({
            cache: false,
            url : base_url() + 'ajax/toggle_docket_sharing',
            type: 'post',
            dataType: 'json',
            data: 'id='+$(this).attr('rel'),
            success: function(data) {
                $('#share_docket').html(data.status);
            }
        });
    })

    $('#due').dateinput({
        format: 'yyyy-mm-dd'
    });
	
    $('a#email_send').fancybox({

        'autoScale' : true,
        'transitionIn'  : 'none',
        'transitionOut' : 'none',
        'type'  : 'ajax'
    });
        
    $('a#delete_docket').fancybox({

        'autoScale' : true,
        'transitionIn'  : 'none',
        'transitionOut' : 'none',
        'type'  : 'ajax'
    });
})