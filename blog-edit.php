<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');
check_auth();
extract($_REQUEST);

$uid = get_user_id();

$userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$uid}'");

$model = fetch_object($db, "SELECT * FROM `blog` WHERE id='{$id}'");

$supplier = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `user` WHERE `user_type`='supplier'"));

$countryModel = get_country_list($db);
$chemicalModel = get_chemical_list($db);


$targetDir = get_root() . 'assets/img/profile/';

$target_dir3 = get_root() . "assets/img/blog/";
$target_dir3 = "./assets/img/blog/";

if (isset($_POST['submit'])) {
    extract($_REQUEST);

    $user_id = get_user_id();
    $updated_at = date('Y-m-d H:i:s', time());

    $title = mysqli_real_escape_string($db, $title);
    $meta_description = mysqli_real_escape_string($db, $meta_description);
    $meta_keyword = mysqli_real_escape_string($db, $meta_keyword);
    $content = mysqli_real_escape_string($db, $content);
    //$image = mysqli_real_escape_string($db, $image);
    $token1 = rand(1234, 6789);
    $iName1 = '';
    $true = 1;


    if (!empty($_FILES["image1"]["name"])) {

        $target_file1 = $target_dir3 . basename($token1 . $_FILES["image1"]["name"]);
        $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
        $check1 = getimagesize($_FILES["image1"]["tmp_name"]);
        $kb_5 = 600000;

        if ($check1 !== false) {
            if ($_FILES["image1"]["size"] <= $kb_5) {
                if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file1)) {
                    $iName1 = htmlspecialchars(basename($token1 . $_FILES["image1"]["name"]));
                    $true = 1;
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                    $true = 0;
                }
            } else {
                $error = "home image Image size should not be more than 600 KB";
                $true = 0;
            }
        } else {
            $error = "Home Image, File is not an image.";
            $true = 0;
        }
    }

    if ($true == 1) {

        if (!empty($iName1)) {
            unlink($target_dir3 . $model->image);
        }


        $iName1 = (empty($iName1)) ? $model->image : $iName1;

        $s = "UPDATE `blog` SET 
        `image`='" . $iName1 . "',
        `title`='" . $title . "',
        `meta_description`='" . $meta_description . "',
        `meta_keyword`='" . $meta_keyword . "',
        `content`='" . $content . "',
        `updated_at`='" . $updated_at . "',
        `updated_by`='" . $updated_by . "' WHERE id='" . $edit_id . "'";

        if (mysqli_query($db, $s)) {
            $error .= "Blog post successfully";
            $lastId = mysqli_insert_id($db);
            header('location: blog-panel?msg=' . $error . '&alert=success');
        } else {
            $error .= "Internal Server Error.";
            header('location: blog-post?msg=' . $error . '&alert=danger');
        }
    } else {
        header('location: blog-post?msg=' . $error . '&alert=danger');
    }
}

?>

<!doctype html>
<html lang="en">

<head>

    <title>Blog Post - Oilfiled Chemical</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include('./common/head.php') ?>
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?= get_root() ?>assets/css/profile.css">

</head>

<body>
    <?php include('./common/header.php') ?>

    <main>

        <section class="section profile-section site-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body text-center">
                                <div class="main-profile-overview widget-user-image text-center">
                                    <div class="main-img-user">
                                        <img alt="avatar" src="<?= $targetDir . $userModel->profile_photo ?>">
                                    </div>
                                </div>
                                <div class="item-user pro-user">
                                    <h4 class="pro-user-username text-dark mt-2 mb-0"><?= $userModel->name ?></h4>
                                    <p class="pro-user-desc text-muted mb-1">(<?= $userModel->user_type ?>)</p>
                                </div>
                            </div>
                        </div>

                        <div class="card custom-card">
                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div>
                                    <h6 class="card-title mb-0">Contact Information</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="main-profile-contact-list main-profile-work-list">
                                    <div class="media">
                                        <div class="media-logo bg-light text-dark"> <i class="bi bi-phone"></i> </div>
                                        <div class="media-body"> <span>Mobile</span>
                                            <div> <?= $userModel->mobile ?> </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-logo bg-light text-dark"> <i class="bi bi-envelope"></i> </div>
                                        <div class="media-body"> <span>Email</span>
                                            <div> <?= $userModel->email ?> </div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-logo bg-light text-dark"> <i class="bi bi-globe"></i> </div>
                                        <div class="media-body"> <span>Country</span>
                                            <div> <?= $userModel->country ?> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card custom-card">
                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div>
                                    <h6 class="card-title mb-0">Navigation</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if ($userModel->user_type == 'supplier') { ?>
                                    <a href="<?= get_root() ?>inquiry-panel" class="oc-btn">Inquiry Panel</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-8 col-md-12">

                        <div class="card custom-card main-content-body-profile">

                            <div class="card-header custom-card-header rounded-bottom-0">
                                <div>
                                    <h6 class="card-title mb-0 ">Update Blog</h6>
                                </div>
                            </div>

                            <?php if (!empty($alert) && !empty($msg)) { ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-<?= $alert ?> alert-dismissible fade show" role="alert">
                                            <strong><?= ucfirst(($alert == 'danger') ? 'Error' : $alert) ?>!</strong> <?= $msg ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="card-body tab-content h-100">

                                <form class="form-horizontal" id="EditForm" method="post" action="" enctype="multipart/form-data">

                                    <div class="my-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" id="title" class="form-control" name="title" placeholder="Title" value="<?= $model->title ?>" required />
                                    </div>

                                    <div class="my-3">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea id="meta_description" class="form-control" name="meta_description" placeholder="Meta Description" cols="10" rows="3" required><?= $model->meta_description ?></textarea>
                                    </div>

                                    <div class="my-3">
                                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                        <textarea id="meta_keyword" class="form-control" name="meta_keyword" placeholder="Meta Keyword" cols="10" rows="3" required><?= $model->meta_keyword ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <div>
                                            <label for="formFile1" class="form-label">Image (Recommend: 900X768 PX)</label>
                                            <input class="form-control" type="file" id="formFile1" name="image1" style="height:100%;padding:0.275rem 0.275rem">
                                        </div>

                                        <?php

                                        echo "<img width='100px' src='" . $target_dir3 . $model->image . "' class='mt-1 img-responsive edit-avt-img img-thumbnail'>";

                                        ?>
                                    </div>

                                    <div class="my-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea id="content1" class="form-control" name="content" placeholder="Enter Content" cols="30" rows="10"><?= $model->content ?></textarea>
                                    </div>
                                    <input type="hidden" name="edit_id" value="<?= $model->id ?>">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary btn-block w-100" name="submit" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
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
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="<?= get_root() ?>assets/js/pages/user-edit.js"></script>



    <script src="https://cdn.tiny.cloud/1/2zispgsi9t6oj6rci9l5oy0k8hbggycfdg7zxbufa9mirfaq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#content1',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | spellcheckdialog | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

</body>

</html>