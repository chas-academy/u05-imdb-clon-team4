import axios from 'axios';

// // Setup initial variables
const searchField = document.querySelector('#search-field');
const searchResults = document.querySelector('#search-results');

// Handle search field input data
const searchFunction = async () => {
    const searchInput = searchField.value.toLowerCase();

    if (!searchInput) {
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
    }
};

// Check events on search field
searchField.addEventListener('change', searchFunction);
searchField.addEventListener('keyup', searchFunction);
