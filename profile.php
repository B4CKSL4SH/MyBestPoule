<?php
    include_once 'header.php';
    include_once('functions.php');

    if (!get_current_user_id()) {
        header('Location: login.php');
        exit;
    }


    if (!empty($_POST) && isset($_POST['user_tags'])) {
        purgeUserTags();

        saveUserTags($_POST['user_tags']);
        header('Location: index.php');
        exit;
    }

    $userTags = getUserTagsIds();
?>

    <section class="max-width">
        <h2>Salutation à toi Symbi'oseur</h2>
        <p>Dis-nous quels sont tes kiffes dans la vie :)</p>
        <div class="">
            <form id="user_tags_form" action="#" method="POST">
                <div class="row" >
                    <div class="column event">
                        <i class="fa fa-ticket" aria-hidden="true" style="background: #e9256a;"></i>
                        <label for="tag_5">Cinema</label>
                        <input type="checkbox" name="user_tags[]" value="5" id="tag_5" />
                    </div>
                    <div class="column event">
                        <i class="fa fa-music" aria-hidden="true" style=""></i>
                        <label for="tag_7">Concert</label>
                        <input type="checkbox" name="user_tags[]" value="7" id="tag_7" />
                    </div>
                    <div class="column event violet">
                        <i class="fa fa-picture-o" aria-hidden="true" style=""></i>
                        <label for="tag_6">Culture</label>
                        <input type="checkbox" name="user_tags[]" value="6" id="tag_6" checked="checked"/>
                    </div>
                    <div class="column event gold">
                        <i class="fa fa-trophy" aria-hidden="true" style=""></i>
                        <label for="tag_1">Escape Game</label>
                        <input type="checkbox" name="user_tags[]" value="1" id="tag_1" />
                    </div>

                    <div class="column event">
                        <i class="fa fa-gamepad" aria-hidden="true" style="background: #26bea7;"></i>
                        <label for="tag_2">Loisirs</label>
                        <input type="checkbox" name="user_tags[]" value="2" id="tag_2" />
                    </div>

                    <div class="column event">
                        <i class="fa fa-futbol-o" aria-hidden="true" style="background:  #f7c600;"></i>

                        <label for="tag_3">Sport</label>
                        <input type="checkbox" name="user_tags[]" value="3" id="tag_3" checked="checked"/>
                    </div>

                    <br />
                </div>
                <h2 style="margin-bottom:0;">et aussi...</h2>
                <center class="column event" style="margin:auto;width:20%;">
                    <i class="fa fa-question" aria-hidden="true" style="background:#fff;color:#e64215;"></i>
                    <label for="tag_3">Surprenez-moi !</label>
                    <input type="checkbox" name="user_tags[]" value="3" id="tag_" checked=""/>
                </center>

                <center style="width:70%;margin:20px auto 0;"><input type="submit" id="user_tags_form_submit" class="button" style="border: none; color: #ff4e00; margin-top: 30px;" value="Allons-y !"/></center>

            </form>
        </div>
    </section>
<?php include_once 'footer.php'; ?>