<form id="form-inscription" method="post">
    <fieldset>
        <legend><strong>Informations personnelles</strong></legend>
        <div class="alert alert-info">
            Les champs marqu&acute;s par <span class="mandat">*</span> sont obligatoires
        </div>
        <div class="form-group col-md-6">
            <label>Nom:<sup>*</sup></label>
            <input class="form-control" type="text" name="lastname" required>
        </div>
        <div class="form-group col-md-6">
            <label>Pr&eacute;nom:<sup>*</sup></label>
            <input class="form-control" type="text" name="firstname" required>
        </div>
        <div class="form-group col-md-12">
            <label>Affiliation:<sup>*</sup></label>
            <input class="form-control" type="text" name="affiliation" required>
        </div>
        <div class="form-group col-md-12">
            <label>Adresse professionelles:</label>
            <input class="form-control" type="text" name="address" required>
        </div>
        <div class="form-group col-md-12">
            <label>Email:<sup>*</sup></label>
            <input class="form-control" type="email" name="email" required>
        </div>
        <div class="form-group col-md-6">
            <label>Date de naissance (jj/mm/aaaa):<sup>*</sup></label>
            <input class="form-control" type="text" pattern="(0[1-9]|1[0-9]|2[0-9]|3[0-1])/(0[1-9]|1[0-2])/(19[0-9][0-9])" name="birthday" required>
        </div>
        <div class="form-group col-md-6">
            <label>Lieu de naissance:<sup>*</sup></label>
            <input class="form-control" type="text" name="birthplace" required>
        </div>
        <div class="form-group col-md-12">
            <label>Nationalit&eacute;:<sup>*</sup></label>
            <input class="form-control" type="text" name="nationality" required>
        </div>
    </fieldset>
    <fieldset>
        <legend><strong>Participation aux &eacute;v&eacute;nements</strong></legend>
        <div class="alert alert-info">
            S&eacute;lectionnez les &eacute;v&eacute;nements auxquels vous voulez assister
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="events[]" value="0">
                Participation &agrave; la sesson des pr&eacute;sentations le matin
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="events[]" value="1">
                Participation au d&eacute;jeuner
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="events[]" value="2">
                Participation &agrave; la table ronde dans l'apr&egrave;s-midi
            </label>
        </div>
    </fieldset>
    <fieldset>
        <legend><strong>Informations optionnelles</strong></legend>
        <div class="alert alert-info">
            Pouvez-vous nous dire en quelques mots pourquoi vous &ecirc;tes int&eacute;ress&eacute;(e) par cette journ&eacute;e ?
        </div>
        <div class="form-group">
            <textarea class="form-control" name="interest" rows="3"></textarea>
        </div>
    </fieldset>
    <div class="form-group col-md-12">
        <button class="btn btn-success">Valider</button>
    </div>
</form>
