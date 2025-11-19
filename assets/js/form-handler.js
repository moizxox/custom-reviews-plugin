document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('submit', function(e) {
        if (!e.target.matches('.cr-form form')) {
            return;
        }

        // console.log('form found');

        e.preventDefault();


        let form = e.target;

        
        let data = {
            rating: form.querySelector('input[name="form_fields[cr_rating]"]').value,
            author: form.querySelector('input[name="form_fields[cr_author]"]').value,
            review: form.querySelector('textarea[name="form_fields[cr_review]"]').value
        };

        console.log('form submitted', data);


        // fetch('/don-williams/wp-json/cr/v1/add-review', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/x-www-form-urlencoded',
        //     },
        //     body: new URLSearchParams(data)
        // })
        // .then(function(response) {
        //     if (response.ok) {
        //         alert('Review submitted!');
        //         form.reset();
        //         window.location.reload();
        //     }
        // })
        // .catch(function(error) {
        //     console.error('Error:', error);
        // });
    });
})
