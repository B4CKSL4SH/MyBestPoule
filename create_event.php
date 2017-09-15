    <section class="max-width">
        <a class="close ico" href="#">&times;</a>
        <form method="POST" action="/">

            <div class="column form">
                <h2 style="margin-top:0;">Proposer un nouveau groupe</h2>
                <div>
                    <label for="categories" style="display:inline-block;vertical-align: middle;">Type du Groupe* :</label>&nbsp;

                    <select style="display:inline-block;vertical-align: middle;" name="cat">
                        <option name="categories[]" value="1" id="tag_1">Coaching</option>
                        <option name="categories[]" value="2" id="tag_2">Cours à domicile</option>
                        <option name="categories[]" value="4" id="tag_4">Dépannage</option>
                        <option name="categories[]" value="3" id="tag_3">Consultation juridique</option>
                        <option name="categories[]" value="5" id="tag_5">Consulation médicale</option>
                        <option name="categories[]" value="6" id="tag_6">Autre</option>
                    </select>
                </div>
                <br /><br />

                <div style="margin-top:22px;display:flex;flex-direction: row;">
                    <div style="margin-right:50px;">
                        <label for="title">Titre du Groupe* :</label>
                        <input type="text" name="title" placeholder="Ex : Super Hackathon de dev ;)" required="required" />
                    </div>
                    <div>
                        <label for="price">Prix* :</label>
                        <input type="number" name="price" placeholder="00" style="min-width:0!important;width:70px;display:inline-block;"/> €
                    </div>
                </div>
                <div class="row">
                    <div style="margin-right:60px;">
                        <label for="date_start_at">Date & heure* :</label>
                        <div class="row">
                            <input type="date" min="2017-04-19" name="date_start_at" placeholder="20/10/2017" required="required" style="margin:0 5px 0 0;min-width:0!important;width:100px;display:inline-block;vertical-align: middle;"/>
                            <span style="display:inline-block;padding:7px;">à partir de</span>
                            <input type="time" name="time_start_at" placeholder="10h" style="min-width:0!important;width:50px;margin:0 5px;display:inline-block;vertical-align: middle;"/>
                        </div>
                    </div>
                </div>
                <div style="margin-top:22px;">
                    <label for="location">Localisation* :</label>
                    <input type="text" name="location" placeholder="Ex : 12 rue de Penthievre, 75008 Paris" required="required" style="width:500px;"/>
                </div>
                <div>
                    <label for="description">Description* :</label>
                    <textarea name="description" placeholder="Décrivez le besoin de votre groupe..."></textarea>
                </div>
                <br/>
                <a href="" title="" style="font-size:12px;">+ Ajouter Une photo au Groupe</a>
                <!--<div style="margin-right:30px;">
                <img src="includes/img/effeil.jpg" alt="" width="220" />
                <br /><a href="" title="" style="font-size:12px;">Changer la photo du Groupe</a>
            </div>-->
                <br />
                <div style="flex-direction: row;text-align: right">
                    <a href="#" class="close secondary">Annuler</a>
                    &nbsp;&nbsp;
                    <button type="submit" name="create_event" class="button" style="border:0;">Créer le groupe</button>
                </div>
            </div>


        </form>

    </section>