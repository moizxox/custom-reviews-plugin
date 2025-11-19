document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('submit', function(e) {
        if (!e.target.matches('.cr-form form')) {
            return;
        }

        e.preventDefault();

        let form = e.target;

        let data = {
            rating: form.querySelector('#cr_rating').value,
            author: form.querySelector('#cr_author').value,
            review: form.querySelector('#cr_review').value
        };

        fetch('/wp-json/cr/v1/add-review', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams(data)
        })
        .then(function(response) {
            if (response.ok) {
                alert('Review submitted!');
                form.reset();
                window.location.reload();
            }
        })
        .catch(function(error) {
            console.error('Error:', error);
        });
    });
});
