$('#data_box').html(getDataMilk());

$('#thing_id').change(function() {
    var thing = this.value;
    if (thing === 'Milk') {
        $('#data_box').html(getDataMilk());
    }
    else if (thing === 'Nap') {
        $('#data_box').html('Minutes: <input type="text" id="data" name="data" />');
    }
    else if (thing === 'Pee') {
        $('#data_box').html(getDataHidden());
    }
    else if (thing === 'Poop') {
        $('#data_box').html(getDataHidden());
    }
});

function getDataHidden() {
    return '<input type="hidden" id="data" name="data" value="-1" />';
}

function getDataMilk() {
    return 'Ounces: <select id="data" name="data">'+
            '<option value="1">1</option>'+
            '<option value="2">2</option>'+
            '<option value="2">2</option>'+
            '<option value="3">3</option>'+
            '<option value="4">4</option>'+
            '<option value="5">5</option>'+
            '<option value="6">6</option>'+
            '<option value="7">7</option>'+
            '<option value="8">8</option>'+
            '<option value="9">9</option>'+
        '</select>';
}


$('#flashMessage').delay('5000').slideUp('slow', function() {
// Animation complete.
});