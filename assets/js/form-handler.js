jQuery(function($) {
    $(document).on('submit', '.cr-form', function(e) {
        e.preventDefault();

        let form = $(this);

        let data = {
            rating: form.find('[name="rating"]').val(),
            author: form.find('[name="author"]').val(),
            review: form.find('[name="review"]').val()
        };

        $.ajax({
            url: '/wp-json/cr/v1/add-review',
            method: 'POST',
            data: data,
            success: function() {
                alert('Review submitted!');
                form.trigger('reset');
            }
        });
    });
});
