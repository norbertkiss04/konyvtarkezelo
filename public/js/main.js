$(document).ready(function() {
    loadBooks()
})

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
    <div class="book-card">
        <img class="book-cover" src="${data.cover ? data.cover : 'https://via.placeholder.com/150x200?text=Nincs+Borító'}" alt="Book cover">
        <p class="book-title">${data.title}</p>
        <p class="book-author">${author}</p>
    </div>
  `);
}
