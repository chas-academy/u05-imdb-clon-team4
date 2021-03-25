import axios from 'axios';
// // Import jQuery
// import $ from 'jquery';

// // Setup initial variables
// const searchField = $('#search-field');
// const searchResults = $('#search-results');
const searchField = document.querySelector('#search-field');
const searchResults = document.querySelector('#search-results');

// Handle search field input data
const searchFunction = async () => {
    // const searchInput = searchField.val();
    const searchInput = searchField.value;

    if (!searchInput) {
        // searchResults.html('');
        // searchResults.hide();
        searchResults.innerHTML = '';
        searchResults.style.display = 'none';
    } else {
        try {
            const options = {
                url: 'search',
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                    Accept: 'application/json',
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({
                    input: searchInput
                })
            };

            // Await response from request
            const request = await axios(options);

            // Success object
            const response = request.data;

            let results = '';
            for (let i = 0; i < response.length; i++) {
                const movie = response[i];
                results += `<div class="col-4"><h4>${movie.title}</h4><a href="/movie/${movie.id}"><img src="${movie.image}" alt="${movie.title}" style="max-width: 100%;" /></a></div>`;
            }

            searchResults.innerHTML = results;
            searchResults.style.display = '';
        } catch (error) {
            // Log out error
            console.log(error);
        }

        // $.ajax({
        //     method: 'post',
        //     url: 'search-component',
        //     data: JSON.stringify({
        //         input: searchInput
        //     }),
        //     headers: {
        //         'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        //         Accept: 'application/json',
        //         'Content-Type': 'application/json'
        //     },
        //     success: (data) => {
        //         let results = '';
        //         for (let i = 0; i < data.length; i++) {
        //             const movie = data[i];
        //             console.log(movie);

        //             results += `<div class="p3 bg-white border border-2 rounded"><p>${movie.title}</p></div>`;
        //         }

        //         searchResults.html(results);
        //         searchResults.show();
        //     }
        // });
    }
};

// Check events on search field
// searchField.on('change', searchFunction);
// searchField.on('keyup', searchFunction);
searchField.addEventListener('change', searchFunction);
searchField.addEventListener('keyup', searchFunction);
