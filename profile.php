<?php
    include_once 'header.php';
    include_once('functions.php');
?>

<h1>Choix de vos centres d'intérêts</h1>

<form id="user_tags_form" action="#" method="POST">
    <p>
        <?php foreach (getTags() as $tag) : ?>
            <label for="tag_<?php echo $tag["id"] ?>"><?php echo $tag["label"] ?></label>
            <input type="checkbox" name="user_tags" value="<?php echo $tag["id"] ?>" id="tag_<?php echo $tag["id"] ?>" />
        <?php endforeach; ?>

            <br />
        <input type="submit" id="user_tags_form_submit"
    </p>
</form>



<?php include_once 'footer.php'; ?>