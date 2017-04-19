<?php
    include_once 'header.php';
    include_once('functions.php');


    if (!empty($_POST) && isset($_POST['user_tags'])) {
        purgeUserTags();

        saveUserTags($_POST['user_tags']);
    }

    $userTags = getUserTagsIds();
?>

<section class="max-width">
    <h2>Profil</h2>
    <div class="create_event">
        <p class="title" style="margin-top:0;">Vos centres d'intérêts</p>
        <form id="user_tags_form" action="#" method="POST">
            <p>
                <?php foreach (getTags() as $tag) : ?>
                    <label for="tag_<?php echo $tag["id"] ?>"><?php echo $tag["label"] ?></label>
                    <input type="checkbox" name="user_tags[]" value="<?php echo $tag["id"] ?>" id="tag_<?php echo $tag["id"] ?>" <?php echo in_array($tag["id"], $userTags) ? 'checked="checked"' : '' ?>/>
                <?php endforeach; ?>

                    <br />
                <input type="submit" id="user_tags_form_submit" class="button" style="border: none; color: #ff4e00; margin-top: 30px;"/>
            </p>
        </form>
    </div>
</section>
<?php include_once 'footer.php'; ?>