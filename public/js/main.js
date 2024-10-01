$(document).ready(function() {
    loadBooks();
    $('#showModalButton').click(function() {
        $('#newBook').modal('show');
    });
    $('#keywords').on('click', '.btn-outline-danger', function() {
        $(this).parent().remove();
    });
    $('#genres').on('click', '.btn-outline-danger', function() {
        $(this).parent().remove();
    });
    $('#createButton').click(function (e) {
        newBook(e);
    });

})

function newBook(e){
    e.preventDefault();

    let formData = new FormData();
    formData.append('title_hu', $('#title_hu').val());
    formData.append('title_en', $('#title_en').val());
    formData.append('author', $('#author').val());
    formData.append('publication_year', $('#publication_year').val());
    formData.append('description_hu', $('#description_hu').val());
    formData.append('description_en', $('#description_en').val());

    let keywords = [];
    $('#keywords .input-group').each(function () {
        let keyword_hu = $(this).find('input').eq(0).val();
        let keyword_en = $(this).find('input').eq(1).val();
        if (keyword_hu && keyword_en) {
            keywords.push({ hu: keyword_hu, en: keyword_en });
        }
    });
    if (keywords.length < 1) {
        alert("Minimum 1 keyword is required.");
        return;
    }
    formData.append('keywords', JSON.stringify(keywords));

    let genres = [];
    $('#genres .input-group').each(function () {
        let genre_hu = $(this).find('input').eq(0).val();
        let genre_en = $(this).find('input').eq(1).val();
        if (genre_hu && genre_en) {
            genres.push({ hu: genre_hu, en: genre_en });
        }
    });
    if (genres.length < 1) {
        alert("Minimum 1 category is required.");
        return;
    }
    formData.append('genres', JSON.stringify(genres));

    var cover_image = $('#cover_image')[0].files[0];
    if (cover_image) {
        formData.append('cover_image', cover_image);
    }

    $.ajax({
        url: '/api/newBook',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            alert('Book added successfully!');
            $('#newBook').modal('hide');
        },
        error: function (xhr) {
            console.log(xhr.responseText);
            alert('Error: Something went wrong.');
        }
    });
}

function loadBooks() {
    $.ajax({
        url: '/api/getBooks',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            for (let i = 0; i < data.length; ++i) {
                //get authors for the book
                let authorStr = "";
                for (let j = 0; j < data[i].authors.length; j++) {
                    if (j < data[i].authors.length - 1) {
                        authorStr += data[i].authors[j].name + ", ";
                    } else {
                        authorStr += data[i].authors[j].name;
                    }
                }

                let card = bookCardBuilder(data[i], authorStr);
                $('.card-container').append(card);
            }
        }
        //Fail eseten, alter popup
    })
}

function bookCardBuilder(data, author) {
    return $(`
    <a class="book-card" href="/book/${data.id}">
            <img class="book-cover" src="${data.cover_image ? "http://konyvtarkezelo.test/storage/"+data.cover_image : 'https://via.placeholder.com/150x200?text=Nincs+Borító'}" alt="Book cover">
        <p class="book-title">${data.title}</p>
        <p class="book-author">${author}</p>
    </a>
  `);
}

function addInput(type) {
    const newInput = $('<div class="input-group mb-1"></div>');
    newInput.html(`
            <input type="text" class="form-control" placeholder="${type} (magyar)">
            <input type="text" class="form-control" placeholder="${type} (angol)">
            <button class="btn btn-outline-danger" type="button">Törlés</button>
        `);
    $(`#${type === 'Kulcsszó' ? 'keywords' : 'genres'}`).append(newInput);
}
