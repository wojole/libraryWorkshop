<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Książki</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <!-- Zawartość kontenera -->
    <div class="row">
        <div class="col-sm-12">
            <!-- Tytuł -->
            <h1>Książki</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <!-- Formularz -->
            <h2>Dodaj książkę</h2>

            <form class="form-inline" action="/action_page.php" id="addBook">
                <div class="form-group">
                    <label for="name">Tytuł:</label>
                    <input type="text" class="form-control" id="name" placeholder="Wpisz tytuł" name="name">
                </div>
                <div class="form-group">
                    <label for="author">Autor:</label>
                    <input type="text" class="form-control" id="author" placeholder="Wpisz autora" name="author">
                </div>
                <button type="submit" class="btn btn-default">Dodaj do bazy</button>
            </form>
        </div>
    </div>

</div>
<div class="row">

    <div class="col-sm-12" id="books">
        <!-- Treść -->

    </div>
</div>
</div>

<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
       integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>

<script src="api/app.js" type="text/javascript"></script>
</body>
</html>
