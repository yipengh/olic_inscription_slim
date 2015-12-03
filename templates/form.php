<form id="form-inscription" method="post">
    <fieldset>
        <legend><strong>Informations personnelles</strong></legend>
        <div class="alert alert-info">
            Les champs marqu&eacute;s par <span class="mandat">*</span> sont obligatoires
        </div>
        <div class="panel panel-default" style="padding:10px;text-align:justify;">
            <em style="font-size:0.85em;">
            Les informations recueillies font l'objet d'un traitement informatique 
            destin&eacute; &agrave; la gestion g&eacute;n&eacute;rale du colloque par les diff&eacute;rents 
            organisateurs. En aucun cas les informations vous concernant ne seront 
            transmises &agrave; des tiers. Dans le cadre de colloques organis&eacute;s par 
            l'Universit&eacute;, le pr&eacute;sident est alors le responsable du traitement de ces 
            donn&eacute;es. Les destinataires des donn&eacute;es sont : les gestionnaires du 
            colloque. Conform&eacute;ment &agrave; la loi "Informatique et Libert&eacute;s", vous 
            b&eacute;n&eacute;ficiez d'un droit d'acc&egrave;s et de rectification aux informations qui 
            vous concernent. Si vous souhaitez exercer ce droit et obtenir 
            communication des informations vous concernant, veuillez vous adresser 
            au responsable du colloque.
            </em>
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
            <label>Adresse professionelle:</label>
            <input class="form-control" type="text" name="address">
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
                Participation &agrave; la session des pr&eacute;sentations le matin
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
