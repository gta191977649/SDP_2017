
$('#searchCollapse').hide();

function showsearch() {
    $('#searchCollapse').slideToggle(500, function () {
        if ($('#searchCollapse').is(":visible"))
        {
            $('#slideBtn').innerHTML = '<i id="slideIcon" class="fa fa-caret-up" aria-hidden="true"></i>';
        } else {
            $('#slideBtn').innerHTML = '<i id="slideIcon" class="fa fa-caret-down" aria-hidden="true"></i>';
        }
    });

}

$(function () {
    $( ".datepicker" ).datepicker();
    $(".datepicker").datepicker("option", "dateFormat", 'dd/mm/yy');
});

$("a[data-modal='EJ']").click(function () {
    var this_id = $(this).attr('data-id');
    var this_text = $(this).attr('data-text');
    var base_url = 'notebooks/rename/';
    $.get(base_url + this_id, function (data) {
        $(data).appendTo("body");
        $('#myModal').modal();
        $('#myModal').on('shown.bs.modal', function () {
            $('#myModal .load_modal').html(data);
        });
        $('#myModal').on('hidden.bs.modal', function () {
            $('#myModal .modal-body').data('');
        });
    });
});

$("button[data-modal='CJ']").click(function () {
    var base_url = 'notebooks/create';
    $.get(base_url, function (data) {
        $(data).appendTo("body");
        $('#createJournalModal').modal();
        $('#createJournalModal').on('shown.bs.modal', function () {
            $('#createJournalModal .load_modal').html(data);
        });
        $('#createJournalModal').on('hidden.bs.modal', function () {
            $('#createJournalModal .modal-body').data('');
        });
    });
});

$(document).ready(function () {
    // Check if body height is higher than window height :)

    if (($("body").height() > $(window).height())) {
        $("footer").addClass("static");
    }

    $('.notebook-hidden').hide();

});

var hidden = true;
$('#hideToggle').click(function(){

    showElementF('.hidden-notebook-section');

    if(hidden){
        $('#hideToggle').text("Hide Hidden");
        $('#hideToggle').prop('value', 'Hide Hidden');
    }else{
        $('#hideToggle').text("Show Hidden") ;
        $('#hideToggle').prop('value', 'Show Hidden');
    }
    hidden=!hidden;
});

function submitForm(form){
    event.preventDefault();
    document.getElementById(form).submit();
}

function showElement(element) {
    $(element).slideToggle();
}

function showElementF(element) {
    $(element).fadeToggle();
}
