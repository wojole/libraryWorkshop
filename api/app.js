$(function () {

    //Robimy zapytanie AJAX...
    $.ajax({
        //Do adresu:
        url: window.location.href + '/api/books.php', //znajduje scieżkę katalogu i plik
        //I oczekujemy w zamian JSON-a
        dataType: 'json'
    }).done(function (response) {
        //Po zakończeniu zapytania i otrzymaniu odpowiedzi, zostanie uruchomiona ta funkcja, a dane otrzymamy w `response`
        var books = response;
        for (var i = 0; i < books.length; i++) {
            var bookDiv = $('<div class="book">');
            var bookInf = $('<div class="bookInf">'); //pusty div na info o książce
            bookDiv.text(books[i]['name']);
            var body=$('#books');
            body.append(bookDiv).append(bookInf);

        }

    }).fail(function (error) {
        //Natomiast, jeżeli wystapi błąd, to zostanie uruchomiona ta funkcja, a w `error` otrzymamy info o błędzie
        console.log('Error!', error);
    });

});
