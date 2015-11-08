if ($('#edit').val() == 'false') {
    $('#data_box').html(getDataBottle(0));
} else if ($('#edit').val() == 'true') {
    var thing = $('#thing').val();
    var data = $('#data').val();
    var created_at = $('#created_at').val();

    if (thing === 'Nap') {
        var date = new Date();
        var year = date.getFullYear();
        var month = date.getMonth() + 1;
        month = ('0' + month).slice(-2);
        var day = ('0' + date.getDate()).slice(-2);
        var hours = ('0' + date.getHours()).slice(-2);
        var minutes = ('0' + date.getMinutes()).slice(-2);
        var seconds = ('0' + date.getSeconds()).slice(-2);
        data = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    }

    updateDatabox(thing, data, created_at);
}

$('#thing_id').change(function() {
    updateDatabox(this.value, '', '');
});

function updateDatabox(thing, data, created_at) {
    if (thing === 'Bottle') {
        $('#data_box').html(getDataBottle(data));
    }
    else if (thing === 'Nap') {
        if (data === '') {
            data = 'Edit this on wake up'
        }
        if (created_at === '') {
            var date = new Date();
            created_at = date.toLocaleTimeString();
        }
        $('#data_box').html(
            '<label for="data">Start time:</label>'+
            '<input readonly="readonly" type="text" id="start_time" name="start_time" value="' + created_at + '" class="form-control">'+
            '<br/>'+
            '<label for="data">End time:</label>'+
            '<input type="text" id="data" name="data" value="' + data + '" class="form-control">'
        );
    }
    else if (thing === 'Pee') {
        $('#data_box').html(getDataHidden());
    }
    else if (thing === 'Poop') {
        $('#data_box').html(getDataHidden());
    }
    else if (thing === 'Comment') {
        $('#data_box').html(getDataHidden());
    }
}

function getDataHidden() {
    return '<input type="hidden" id="data" name="data" value="-1" />';
}

function getDataBottle(ounces) {
    var option_string = '<label for="data">Ounces:</label><select id="data" name="data" class="form-control">'+
            '<option value="Add later">Add later</option>';
    for (i = 1; i < 10; i++) {
        var selected = '';
        if (i == ounces) {
            selected = 'selected="selected"'
        }
        option_string += '<option value="' + i + '"' + selected + '>' + i + '</option>';
    }
    option_string += '</select>';

    return option_string;
}


$('#flashMessage').delay('5000').slideUp('slow', function() {
// Animation complete.
});


$('tr.clickable').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});