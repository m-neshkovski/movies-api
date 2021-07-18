require('./bootstrap');

if($('#welcome').length > 0) {

    var api_token = $('meta[name="api_token"]').attr('content');

    $.get(`/api/v1/categories?api_token=${api_token}`)
    .then(function(data) {
        data.data.forEach(cat => {
            $('#category').append(`<option value="${cat.slug}">${cat.name}</option>`)            
        });
    })

    function refreshCards(arr) {
        if(arr.length > 0) {
            $('#movie-cards').html('')
            arr.forEach(movie => {
                $('#movie-cards').append(`
                <div class="col-md-4">
                    <div class="card mx-1 mb-4">
                        <img src="${movie.img_url}" class="card-img-top img-fluid" alt="movie cover image">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">${movie.title}</h5>
                            <ul>
                                <li>Regerene code: <span class="badge badge-primary text-white">${movie.reference_code}</span></li>
                                <li>Category: <span class="badge badge-primary text-white">${movie.category.name}</span></li>
                                <li>Year released: <span class="badge badge-primary text-white">${movie.release_year}</span></li>
                            </ul>
                            <div class="text-right">
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary details" data-toggle="modal" data-target="#detailsModal" data-slug="${movie.slug}">Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                `)            
            });
        } else {
            $('#movie-cards').html(`
                <p class="text-center">No search resaults.</p>
            `)
        }

        return true
    }

    $.get('/api/v1/movies?api_token=' + api_token)
    .then(function(data) {
        refreshCards(data.data)
    })
    
    $('#filter').on('submit', function(e) {
        e.preventDefault();
    })

    $('#search_title').on('keyup', function(e) {
        e.preventDefault();
        let search_title = $(e.target).val()
        let category = $('#category').val()
        $.get(`/api/v1/movies?search_title=${search_title}&category=${category}&api_token=${api_token}`)
        .then(function(data) {
            refreshCards(data.data)
        })
    })
    
    $('#filter').on('change', function(e) {
        e.preventDefault();
        let category = $(e.target).val()
        let search_title = $('#search_title').val()
        $.get(`/api/v1/movies?search_title=${search_title}&category=${category}&api_token=${api_token}`)
        .then(function(data) {
            refreshCards(data.data)
        })
    })

    $(document).on('click', '.details', function(e) {
        e.preventDefault()
        $.get(`/api/v1/movies/${$(e.target).attr('data-slug')}?api_token=${api_token}`)
        .then(function(data) {
            $('#detailsModalLabel').text('Movie: ' + data.data.title)
            $('#modal-img').attr('src', data.data.img_url)
            $('#modal-details').html(`
                <h3>Details:</h3>
                <ul>
                    <li class="h4">Regerene code: <span class="font-weight-bold">${data.data.reference_code}</span></li>
                    <li class="h4">Category: <span class="font-weight-bold">${data.data.category.name}</span></li>
                    <li class="h4">Year released: <span class="font-weight-bold">${data.data.release_year}</span></li>
                </ul>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis aliquid excepturi beatae unde rem corrupti. Expedita ut numquam ex harum sapiente, magni, rerum nisi vero quo illo molestias, repudiandae esse!</p>
            `)
        })
    })

}