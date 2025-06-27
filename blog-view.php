<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

$slug = mysqli_real_escape_string($db, $_REQUEST['slug']);
$slug = str_replace(".php", "", $slug);

$blogModel = fetch_object($db, "SELECT * FROM `blog` WHERE slug='{$slug}' ORDER BY id DESC");
if(empty($blogModel)){
    die();
}
$userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$blogModel->uid}'");

$commentModel = fetch_all($db, "SELECT * FROM `blog_comment` WHERE bid='{$blogModel->id}' ORDER BY id DESC");

$targetDir = get_root().'assets/img/profile/';

?>

<!doctype html>
<html lang="en">

<head>

    <title><?= $blogModel->title ?></title>

    <?php include('./common/head.php') ?>
    <!-- Owl Stylesheets -->

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <?= showBlogSEOTag($db, $blogModel, get_main_url()) ?>


</head>

<body>
    <?php include('./common/header.php') ?>

    <main>

        <section class="section latest-blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <img src="<?= get_root() ?>assets/img/blog/<?= $blogModel->image ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h2 class="text-left"><?= $blogModel->title ?></h2>
                                <small class="card-title">
                                    <?= date("d/m/Y h:m A", strtotime($blogModel->created_at)) ?>
                                </small>

                                <small class="card-title">
                                    <p>Post by <?= $userModel->name ?></p>
                                </small>
                                <br><br>
                                <p class="card-text">
                                    <?= $blogModel->content ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-center my-3">

                        <div class="card">
                            <div class="card-body">
                                <?php if (is_login()) { ?>
                                    <a href="<?= get_root() ?>blog-post" class="oc-btn">Write a Blog</a>
                                <?php } else { ?>
                                    <a class="oc-btn" onclick="checkMessageEligibility()">Write a Blog</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if (is_login()) { ?>

                                    <form method="post" id="blogCommentForm" action="<?= get_root() ?>inc/blog/comment-add.php">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-lg-1 col-2">
                                                <img alt="avatar" style="width:100%" src="<?= $targetDir . $userModel->profile_photo ?>">
                                            </div>

                                            <div class="col-lg-9 col-10">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="comment" name="comment" rows="2" placeholder="Comment...."></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-sm-12">
                                                <input type="hidden" name="bid" value="<?= $blogModel->id ?>">
                                                <input type="hidden" name="uid" value="<?= get_user_id() ?>">
                                                <div class="form-group mt-1">
                                                    <button class="btn btn-primary d-block w-100" type="submit" name="commentSubmit">Post</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>



                                <?php } else { ?>

                                    <a class="oc-btn" onclick="checkMessageEligibility()">Write Comment</a>

                                <?php } ?>
                            </div>
                        </div>
                    </div>




                    <?php foreach ($commentModel as $commentKey => $commentVal) {
                        $commentValue = (object) $commentVal;
                        $commentUser = fetch_object($db, "SELECT * FROM `user` WHERE `id` = '{$commentValue->uid}'");
                    ?>

                        <div class="col-md-12 my-2">
                            <div class="card">
                                <div class="card-body p-1 m-0">

                                    <div class="row d-flex align-items-center">
                                        <div class="col-2">
                                            <img alt="avatar" style="width:100%" src="<?= $targetDir . $commentUser->profile_photo ?>">
                                            <p class="text-truncate text-center m-0 p-0"><b><?= $commentUser->name ?></b></p>
                                        </div>

                                        <div class="col-10">
                                            <div class="form-group">
                                                <p class="m-0 p-0 text-mute"><?= $commentValue->comment ?></p>
                                                <P style="font-size:10px"><?=dateFormat($commentValue->created_at)?></P>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>



                </div>
            </div>
        </section>

    </main>

    <?php include('./common/footer.php') ?>
    <?php include('./common/social-link.php') ?>
    <?php include('./common/modal.php') ?>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script> -->


    <?php include('./common/script.php') ?>
    <!-- javascript -->
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="<?= get_root() ?>assets/js/pages/user-check.js"></script>
    <script src="<?= get_root() ?>assets/js/pages/blog-comment.js"></script>

</body>

</html>