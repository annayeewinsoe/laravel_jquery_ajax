const $ = require('jquery');

$(document).ready(function() {
    const alert = $('#alert').hide();
    // 
    function refresh_members_list(response) {
        $('#members_list').load(location.href + ' #members_list');
        $('#add_member').val('');
        console.log(response);
    }
    //
    function member_name_empty() {
        alert.text('Member name can\'t be empty!');
        alert.show('slow');
        setTimeout(function () {
            alert.hide('slow');
        }, 2000);
    }

    // add click event to each member
    $(document).on('click', '.member', function() {
        $(this).css({ cursor: 'pointer' })
        let name = $(this).find('#member_name').text();
        let id = $(this).find('#member_id').val();
        $('#edit_member_name').val(name);
        $('#edit_member_id').val(id);
    });

    // add member
    $('#add_member_btn').on('click', function() {
        let member_name = $('#add_member').val();
        if(!member_name) {
            member_name_empty();
            return false;
        }
        $.ajax({
            url: '/api/member',
            type: 'POST',
            data: {
                name: member_name
            },
            success: function(response) {
                refresh_members_list(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, ':', errorThrown);
            }
        });
    });

    // delete member
    $('#del_member_btn').on('click', function() {
        let id = $('#edit_member_id').val();
        $.ajax({
            url: '/api/member/' + id,
            type: 'DELETE',
            data: {
                id: id
            },
            success: function(response) {
                refresh_members_list(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, ':', errorThrown);
            }
        });
    });

    // edit member
    $('#edit_member_btn').on('click', function() {
        let name = $('#edit_member_name').val();
        let id = $('#edit_member_id').val();
        if(!name) {
            member_name_empty();
            return false;
        }
        $.ajax({
            url: '/api/member/' + id,
            type: 'PATCH',
            data: {
                id: id,
                name: name
            },
            success: function(response) {
                refresh_members_list(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, ':', errorThrown);
            }
        });
    });

    // search member
    $('#search_member').on('submit', function(e) {
        e.preventDefault();
        let term = $(this).find('input').val().trim();
        if(!term) {
            member_name_empty();
            return false;
        }
        $('.member').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(term) > -1);
        });
    });
});