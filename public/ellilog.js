if ($('#edit').val() == 'false') {
    var data = [];
    data['start_time'] = '';
    data['end_time'] = '';
    data['data'] = '';
    $('#data_box').html(getDataBottle(0));
} else if ($('#edit').val() == 'true') {
    var thing = $('#thing').val();
    data = JSON.parse($('#data').val());

    if (thing === 'Nap') {
        if (data['end_time'] === 'Edit this on wake up') {
            data['end_time'] = makeDatetime();
        }
    }

    updateDatabox(thing, data);
}

$('#thing_id').change(function() {
    updateDatabox(this.value, data);
});

function updateDatabox(thing, data) {
    if (thing === 'Bottle') {
        $('#data_box').html(getDataBottle(data));
    }
    else if (thing === 'Nap') {
        if (data['end_time'] === '') {
            data['end_time'] = 'Edit this on wake up';
        }
        if (data['start_time'] === '') {
            // var date = new Date();
            // created_at = date.toLocaleTimeString();
            data['start_time'] = makeDatetime();
        }
        $('#data_box').html(
            '<label for="start_time">Start time:</label>'+
            '<input type="text" id="start_time" name="data[start_time]" value="' + data['start_time'] + '" class="form-control">'+
            '<br/>'+
            '<label for="end_time">End time:</label>'+
            '<input type="text" id="end_time" name="data[end_time]" value="' + data['end_time'] + '" class="form-control">'+
            '<input type="hidden" id="data" name="data[data]" value="" />'
        );
    }
    else if (thing === 'Nurse') {
        $('#data_box').html(getDataHidden());
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
    return '<input type="hidden" id="data" name="data[data]" value="" />';
}

function getDataBottle(ounces) {
    var option_string = '<label for="data">Ounces:</label><select id="data" name="data[data]" class="form-control">'+
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


function makeDatetime() {
    var date = new Date();
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    month = ('0' + month).slice(-2);
    var day = ('0' + date.getDate()).slice(-2);
    var hours = ('0' + date.getHours()).slice(-2);
    var minutes = ('0' + date.getMinutes()).slice(-2);
    var seconds = ('0' + date.getSeconds()).slice(-2);
    datetime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

    return datetime;
}


$('#flashMessage').delay('5000').slideUp('slow', function() {
// Animation complete.
});


$('tr.clickable').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});