<?php

include('./lib/bpconn.php');
include('./lib/config-details.php');

check_auth();

if ( ! is_premium_member( $db ) ) {
    header('location:' . get_root());
}

extract($_REQUEST);

$id = get_user_id();
$userModel = fetch_object($db, "SELECT * FROM `user` WHERE id='{$id}'");


$search_limit = 20;

if (isset($_GET["page"])) {

    $spn  = $_GET["page"];
} else {

    $spn = 1;
};

$search_startFrom = ($spn - 1) * $search_limit;


$searchModal = "SELECT * FROM `search_modal` WHERE `status`=1 AND `buy`='I Want To Buy' ORDER BY id DESC LIMIT $search_startFrom, $search_limit";
$searchModalModel = fetch_all($db, $searchModal);

?>

<!doctype html>
<html lang="en">

<head>

    <title><?= $userModel->name ?> Profile - Oilfiled Chemical</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include('./common/head.php') ?>

    <link rel="stylesheet" href="./assets/css/profile.css">

</head>

<body>
    <?php include('./common/header.php') ?>

    <main>

        <section class="section profile-section site-bg">
            <div class="container">
                <div class="row">

                    <?php if (is_premium_member($db)) {

                    ?>

                        <div class="col-md-12" id="buyer-inquiry">
                            <div class="card custom-card main-content-body-profile">

                                <div class="card-header custom-card-header rounded-bottom-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-title mb-0 ">Buyer Inquiries</h6>
                                        <?php /*<a href="./chemical-add" class="oc-btn">Add Chemical</a>*/ ?>
                                    </div>
                                </div>

                                <div class="card-body tab-content h-100">
                                    <div class="w-100" style="overflow:auto;height:500px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Want</th>
                                                    <th scope="col">Chemical</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Mobile</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Message</th>
                                                    <th scope="col">Inquiry From</th>
                                                    <th scope="col">Attachment</th>
                                                    <th scope="col">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                if (count($searchModalModel) > 0) {
                                                    $j = 1;
                                                    foreach ($searchModalModel as $searchModalKey => $searchModalVal) {
                                                        $searchModalValue = (object) $searchModalVal;
                                                ?>
                                                        <tr>
                                                            <td><?= $searchModalValue->buy ?></td>
                                                            <td><?= $searchModalValue->chemical ?></td>
                                                            <td><?= $searchModalValue->name ?></td>
                                                            <td><a target="_blank" href="http://wa.me/<?= $searchModalValue->mobile ?>"><?= $searchModalValue->mobile ?></a></td>
                                                            <td><?= $searchModalValue->email ?></td>
                                                            <td><?= $searchModalValue->message ?></td>
                                                            <td><?= $searchModalValue->page ?></td>
                                                            <td>
                                                                <?php if (!empty($searchModalValue->attachment)) { ?>
                                                                    <a target="_blank" class="btn btn-primary" href="<?= get_root() ?>assets/img/search/<?= $searchModalValue->attachment ?>">View</a>
                                                                <?php } ?>
                                                            </td>
                                                            <td><?= date("d/m/y h:m:s a", strtotime($searchModalValue->created_at)) ?></td>
                                                        </tr>
                                                    <?php $j++;
                                                    }
                                                } else { ?>
                                                    <tr>
                                                        <td colspan="4">No Inquiry found!</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm">
                                    <?php

                                    $search_sql = "SELECT COUNT(*) FROM search_modal WHERE `status`=1 AND `buy`='I Want To Buy'";
                                    $srs_result = mysqli_query($db, $search_sql);
                                    $srow = mysqli_fetch_row($srs_result);
                                    $stotal_records = $srow[0];

                                    $stotal_pages = ceil($stotal_records / $search_limit);
                                    $spagLink = "";
                                    for ($si = 1; $si <= $stotal_pages; $si++) {
                                        if ($si == $spn) {
                                            $spagLink .= "<li class='page-item disabled active'><a class='page-link' href='profile?page=". $si . "#buyer-inquiry'>" . $si . "</a></li>";
                                        } else {
                                            $spagLink .= "<li class='page-item'><a class='page-link' href='profile?page=" . $si . "#buyer-inquiry'>" . $si . "</a></li>";
                                        }
                                    };

                                    echo $spagLink;
                                    ?>
                                </ul>
                            </nav>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </section>


    </main>

    <?php include('./common/footer.php') ?>
    <?php include('./common/social-link.php') ?>
    <?php include('./common/modal.php') ?>

    <?php include('./common/script.php') ?>
    <!-- javascript -->
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="./assets/js/pages/user-edit.js"></script>

</body>

</html>