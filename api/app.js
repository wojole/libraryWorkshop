$(function () {
    // this is the id of the form
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
    // Robimy zapytanie AJAX...
    $.ajax({
        //Do adresu:
        url: window.location.href + '/api/books.php', //znajduje scieżkę katalogu i plik
        //I oczekujemy w zamian JSON-a
        dataType: 'json'
    }).done(function (response) {
        //Po zakończeniu zapytania i otrzymaniu odpowiedzi, zostanie uruchomiona ta funkcja, a dane otrzymamy w `response`
        var books = response;
        for (var i = 0; i < books.length; i++) {
            var bookDiv = $('<div>').addClass('book');
            var bookInf = $('<div>').addClass('bookInf').hide(); //pusty div na info o książce
            bookDiv.text(books[i]['name']);
            bookDiv.data('id', books[i]['id']); //zapisuje id do datasetu
            var body = $('#books');
            body.append(bookDiv).append(bookInf);
        }

    }).fail(function (error) {
        //Natomiast, jeżeli wystapi błąd, to zostanie uruchomiona ta funkcja, a w `error` otrzymamy info o błędzie
        console.log('Error!', error);
    });

    $('#books').on('click', '.book', function () {
        var bookInfo = $(this).next(); //zapamiętuje diva do zmiennej bookInfo
        $.ajax({
            //Do adresu:
            url: window.location.href + '/api/books.php?id=' + $(this).data('id'),
            //I oczekujemy w zamian JSON-a
            dataType: 'json'
        }).done(function (response) {

            var info = response;
            bookInfo.text(info).fadeIn('slow'); //wywołuje zmienną i dodaje do niej tekst
            console.log(info)

        }).fail(function (error) {
            console.log('Error!', error);
        });

    });

});
