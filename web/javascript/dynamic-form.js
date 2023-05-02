$(function() {
    $(document).on('click', '#add-record', function (e) {
        e.preventDefault();

        const recordsList = $('.container-fluid #records-list');
        const formRow = $('.container-fluid .form-row:first');

        const record = $(formRow.clone()).appendTo(recordsList);
        record.find('input').val('');

        recordsList.find('.form-row:first #clean-fields')
        .addClass('remove-record')
        .html('<i class="fas fa-minus"></i>');
    }).on('click', '.remove-record', function(e) {
        $(this).parents('.form-row:first').remove();
        e.preventDefault();

        return false;
    });

});