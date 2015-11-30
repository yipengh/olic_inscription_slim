<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style type="text/css">
        .form-group label sup {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Informations personnelles</h3>
        <form id="form-inscription" method="post">
            <div class="form-group col-md-6">
                <label>Nom:</label>
                <input class="form-control" type="text" name="lastname" required>
            </div>
            <div class="form-group col-md-6">
                <label>Pr&eacute;nom:</label>
                <input class="form-control" type="text" name="firstname" required>
            </div>
            <div class="form-group col-md-12">
                <label>Affiliation:</label>
                <input class="form-control" type="text" name="affiliation" required>
            </div>
            <div class="form-group col-md-12">
                <label>Email:</label>
                <input class="form-control" type="email" name="email" required>
            </div>
            <div class="form-group col-md-12">
                <label>Date de naissance (jj/mm/aaaa):</label>
                <input class="form-control" type="text" pattern="(0[1-9]|1[0-9]|2[0-9]|3[0-1])/(0[1-9]|1[0-2])/(19[0-9][0-9])" name="birthday_day" required>
            </div>
            <div class="form-group col-md-12">
                <label>Lieu de naissance:</label>
                <input class="form-control" type="text" name="birthplace" required>
            </div>
            <div class="form-group col-md-12">
                <label>Adresse:</label>
                <input class="form-control" type="text" name="address" required>
            </div>
            <div class="form-group col-md-12">
                <label>Nationalit&eacute;:</label>
                <input class="form-control" type="text" name="nationality" required>
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-success">Valider</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        $('.form-group label').append('<sup>*</sup>');
    </script>
</body>
</html>
