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
    // const searchInput = searchField.val().toLowerCase();
    const searchInput = searchField.value.toLowerCase();

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
                results += `<a class="card my-2 mx-2 p-0" style="max-width: 30rem;" href="/movie/${movie.id}">
                    <div class="row g-0">
                    <div class="col-3">
                    <img src="${movie.image}" alt="${movie.title}" style="height: 7rem;"/>
                    </div>
                    <div class="col-9">
                    <div class="card-body">
                    <h2 class="card-title h5">${movie.title}</h2>
                    <h3 class="card-subtitle h6">${movie.year.substring(0, 4)}</h3>
                    </div>
                    </div>
                    </div>
                    </a>`;
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
