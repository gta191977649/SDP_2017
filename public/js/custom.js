function togglehidden() {
    $('.notebook-hidden').toggle();
}

$("#datepicker").datepicker();
$("a[data-modal='EJ']").click(function () {
    var this_id = $(this).attr('data-id');
    var this_text = $(this).attr('data-text');
    var base_url = 'notebooks/rename/';
    $.get(base_url + this_id , function (data) {
        $(data).appendTo( "body" );
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
    $.get(base_url , function (data) {
        $(data).appendTo( "body" );
        $('#createJournalModal').modal();
        $('#createJournalModal').on('shown.bs.modal', function () {
            $('#createJournalModal .load_modal').html(data);
        });
        $('#createJournalModal').on('hidden.bs.modal', function () {
            $('#createJournalModal .modal-body').data('');
        });
    });
});