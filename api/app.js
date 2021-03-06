$(function () {
    //adding book to database:
    $("#addBook").submit(function (e) {
        if ($('#name').val() !== '' && $('#author').val() !== '') { //check if felds are not empty
            var url = window.location.href + '/api/books.php'; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#addBook").serialize(), // serializes the form's elements.
                success: location.reload()
            });
        }
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });

    //loading all books from database:
    $.ajax({
        url: window.location.href + '/api/books.php',
        dataType: 'json'
    }).done(function (response) {

        var books = response;
        for (var i = 0; i < books.length; i++) {

            var bookDiv = $('<div>').addClass('book');
            var bookInf = $('<div>').addClass('bookInf').hide(); //empty div for book info

            // bookDiv.text(books[i]['name']);
            bookDiv.append('<span>' + books[i]['name'] + '</span>'); //generate span for book name
            bookDiv.append('<a href="' + window.location.href + 'api/books.php?id=' + books[i]['id'] + '"> Usuń książkę</a>'); //generates link to remove book (gboot can delete it...)
            bookDiv.data('id', books[i]['id']); //saves id to dataset
            var body = $('#books');
            body.append(bookDiv).append(bookInf);
        }

    }).fail(function (error) {
        console.log('Error!', error);
    });

// fades div with book info(title)
    $('#books').on('click', 'span', function () {
        var bookInfo = $(this).parent().next(); //saves div to variable bookInfo
        $.ajax({
            //Do adresu:
            url: window.location.href + '/api/books.php?id=' + $(this).parent().data('id'),
            dataType: 'json'
        }).done(function (response) {

            var info = response;
            bookInfo.text(info).fadeIn('slow'); //adding text to bookInfo div


        }).fail(function (error) {
            console.log('Error!', error);
        });

    });

//deletes book from database
    $('#books').on('click', 'a', function () {
        var url = $(this).attr("href"); //saves href address to variable url
        $.ajax({
            type: "DELETE",
            url: url,
            success: location.reload()
        });

        event.preventDefault();


    });
});
