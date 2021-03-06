$(document).ready(function(){
    $('.pending_task').live('click', function(){
        var o = $(this);
        $.ajax({
            url : base_url + 'ajax/complete_task',
            type: 'post',
            dataType: 'json',
            data: 'id='+$(this).attr('rel'),
            success: function(data) {
                var html = '<li><span class="quiet"><input type="checkbox" checked="checked" class="completed_task" rel="'+data.id+'"> '+ data.name+'</span></li>';
                $('#completed_tasks').append(html);
                o.parent().parent().remove();
                $('span#gold').html(data.gold);
            }
        });
    })
    $('.completed_task').live('click', function(){
        var o = $(this);
        $.ajax({
            url : base_url + 'ajax/uncomplete_task',
            type: 'post',
            dataType: 'json',
            data: 'id='+$(this).attr('rel'),
            success: function(data) {
                var html = '<li><span class="loud"><input type="checkbox" class="pending_task" rel="'+ data.id +'"> '+data.name+'</span></li>';;
                $('#pending_tasks').append(html);
                o.parent().parent().remove();
                $('span#gold').html(data.gold);
            }
        });
    })
    $('#share_docket').click(function(){
        $.ajax({
            url : base_url + 'ajax/toggle_docket_sharing',
            type: 'post',
            dataType: 'json',
            data: 'id='+$(this).attr('rel'),
            success: function(data) {
                $('#share_docket').html(data.status);
            }
        });
    })

    /*$('.tasks li').live('mouseover', function(){
        $('.edit_link' , this).css('display', 'inline');
    }).live('mouseout', function(){
        $('.edit_link' , this).css('display', 'none');
    });

    $('.edit_link').live('click',function(){
        alert('as');
    });*/

    Date.firstDayOfWeek = 0;
    Date.format = 'dd-mm-yyyy';
    $('#due').datePicker();

})