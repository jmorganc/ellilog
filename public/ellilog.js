honeypot();

var editing = $('#edit').val();

if (editing === 'false') {
    editing = false;
    var data = [];
    data['start_time'] = '';
    data['end_time'] = '';
    data['data'] = '';
    $('#data_box').html(getDataBottle(0));
} else if (editing === 'true') {
    editing = true;
    var thing = $('#thing').val();
    var created_at = $('#created_at').val();
    data = JSON.parse($('#data').val());

    // if (thing === 'Bottle' || thing === 'Nurse') {
    if (data['start_time'] === '' || !('start_time' in data)) {
        data['start_time'] = created_at;
    }
    // }

    if (thing === 'Nap') {
        if (data['end_time'] === 'Edit this on wake up') {
            data['end_time'] = makeDatetime();
        }
    }

    updateDatabox(thing, data, true);
}

$('#thing_id').change(function() {
    updateDatabox(this.value, data, editing);
});


function updateDatabox(thing, data, editing) {
    if (editing === false) {
        data['start_time'] = makeDatetime();
    }

    if (thing === 'Bottle') {
        $('#data_box').html(getDataBottle(data));
        if (editing === true) {
            if (data['end_time'] === '' || !('end_time' in data)) {
                data['end_time'] = makeDatetime();
            }
            $('#data_box').append(getStartEndInputs(data));
        }
    }
    else if (thing === 'Nap') {
        if (data['end_time'] === '') {
            data['end_time'] = 'Edit this on wake up';
        }
        $('#data_box').html(getStartEndInputs(data) + getDataHidden());
    }
    else if (thing === 'Nurse') {
        $('#data_box').html(getDataHidden());
        if (editing === true) {
            if (data['end_time'] === '' || !('end_time' in data)) {
                data['end_time'] = makeDatetime();
            }
            $('#data_box').append(getStartEndInputs(data));
        }
    }
    else if (thing === 'Pee') {
        $('#data_box').html(getDataHidden());
        if (editing === true) {
            if (data['end_time'] === '' || !('end_time' in data)) {
                data['end_time'] = makeDatetime();
            }
            $('#data_box').append(getStartEndInputs(data));
        }
    }
    else if (thing === 'Poop') {
        $('#data_box').html(getDataHidden());
        if (editing === true) {
            if (data['end_time'] === '' || !('end_time' in data)) {
                data['end_time'] = makeDatetime();
            }
            $('#data_box').append(getStartEndInputs(data));
        }
    }
    else if (thing === 'Comment') {
        $('#data_box').html(getDataHidden());
        if (editing === true) {
            if (data['end_time'] === '' || !('end_time' in data)) {
                data['end_time'] = makeDatetime();
            }
            $('#data_box').append(getStartEndInputs(data));
        }
    }
}


function getStartEndInputs(data) {
    return '<p><label for="start_time">Start time:</label>'+
            '<input type="text" id="start_time" name="data[start_time]" value="' + data['start_time'] + '" class="form-control"><p>'+
            '<p><label for="end_time">End time:</label>'+
            '<input type="text" id="end_time" name="data[end_time]" value="' + data['end_time'] + '" class="form-control"></p>';
}


function getDataBottle(ounces) {
    var option_string = '<p><label for="data">Ounces:</label><select id="data" name="data[data]" class="form-control">'+
            '<option value="Add later">Add later</option>';
    for (i = 1; i < 10; i++) {
        var selected = '';
        if (i == ounces) {
            selected = 'selected="selected"'
        }
        option_string += '<option value="' + i + '"' + selected + '>' + i + '</option>';
    }
    option_string += '</select></p>';

    return option_string;
}


function getDataHidden() {
    return '<input type="hidden" id="data" name="data[data]" value="" />';
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


function honeypot() {
    $('div.required').hide();
}