<?php
include '../lib/bpconn.php';
include '../lib/config-details.php';
check_admin_auth();
extract($_REQUEST);

// Define site URL
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);


$limit = 20;

if (isset($_GET["page"])) {

    $pn = $_GET["page"];
} else {

    $pn = 1;
};

$startFrom = ($pn - 1) * $limit;

$model = fetch_all($db, "SELECT * FROM `group_chat` ORDER BY id DESC LIMIT $startFrom, $limit");

if (isset($_POST['message_send'])) {
    $message_type = $_POST['send_type'];
    $message_id = $_POST['message_id'];

    $messageModal = $_POST['message'];
    

    if (sendGroupChatWP($db, $user_ids, $message_type, $message_id, $messageModal)) {
        header("location: group-chat-all.php?alert=success&msg=Message send to " . $message_type . " successfully");
    } else {
        header("location: group-chat-all.php?alert=danger&msg=Internal server error");
    }
}


$chemicalModel = get_chemical_list($db);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Group Chat - <?= BRANDNAME ?> Admin Panel</title>

    <!-- Custom Head -->
    <?php include './comman/head.php'; ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include './comman/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include './comman/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Chat Management</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-12 d-flex justify-content-between">
                            <a href="./index.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-solid fa-arrow-left"></i>
                                Back
                            </a>

                            <a href="./group-chat-add.php" class="btn btn-success btn-sm">
                                <i class="fas fa-solid fa-plus"></i>
                                Add
                            </a>
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



                    <div class="row">


                        <div class="col-12" style="width:100%;overflow: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Post</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Time</th>

                                
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (count($model) > 0) {
                                        $j = 1;
                                        foreach ($model as $key => $val) {
                                            $chatValue = (object) $val;
                                            $userModel = fetch_object($db, "SELECT * FROM `user` WHERE `id`='{$chatValue->uid}'");
                                    ?>

                                            <tr>
                                                <td>
                                                    <a href="group-chat-update.php?id=<?= $chatValue->id ?>" class="mx-1 my-1 btn btn-sm btn-primary text-nowrap">
                                                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Edit
                                                    </a>

                                                    <a data-toggle="modal" data-target="#deleteModal" href="#" data-url="group-chat-delete.php?id=<?= $chatValue->id ?>" class="mx-1 my-1 btn btn-sm btn-danger image-delete-btn text-nowrap">
                                                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Delete
                                                    </a>


                                                    <a data-toggle="modal" onclick="sendModal('<?= $chatValue->id ?>','<?= get_html_to_text($chatValue->message); ?>')" class="mx-1 my-1 btn btn-sm btn-success text-nowrap">
                                                        <i class="fas fa-paper-plane fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Send
                                                    </a>
   
    <!-- Dropdown for Status -->
    <div class="dropdown d-inline-block">
    <a class="mx-1 my-1 btn btn-sm btn-success text-nowrap dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-paper-plane fa-sm fa-fw mr-2 text-gray-400"></i>
        Status
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <!-- If the status is 'approved', show the 'Reject' option -->
        <?php if ($chatValue->status == 'approved'): ?>
            <a class="dropdown-item" href="#" onclick="updateStatus(<?= $chatValue->id ?>, 'rejected')">Reject</a>

        <!-- If the status is not 'approved', show the 'Approve' option -->
        <?php else: ?>
            <a class="dropdown-item" href="#" onclick="updateStatus(<?= $chatValue->id ?>, 'approved')">Approve</a>
<a class="dropdown-item" href="#" onclick="updateStatus(<?= $chatValue->id ?>, 'rejected')">Reject</a>

        <?php endif; ?>
    </div>
</div>


    

                                                </td>

                                                <td scope="row">

                                                    <?php echo ($pn > 1) ? (20 * ($pn - 1) + $j) : $j; ?>

                                                </td>
                                                <td><?= $userModel->name; ?></td>
                                                <td><a target="_blank" href="http://wa.me/<?= $userModel->mobile; ?>"><?= $userModel->mobile; ?></a></td>
                                                <td><?= $chatValue->message; ?></td>
                                                <td><?= $chatValue->dont_post; ?></td>
                                                <td><?= $chatValue->status; ?></td>
                                                <td><?= dateFormat($chatValue->created_at); ?></td>

                                            </tr>
                                        <?php $j++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">No Message found!</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-sm">
                                    <?php

                                    $sql = "SELECT COUNT(*) FROM group_chat";
                                    $rs_result = mysqli_query($db, $sql);
                                    $row = mysqli_fetch_row($rs_result);
                                    $total_records = $row[0];

                                    $total_pages = ceil($total_records / $limit);
                                    $pagLink = "";
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $pn) {
                                            $pagLink .= "<li class='page-item disabled active'><a class='page-link' href='group-chat-all.php?page="

                                                . $i . "'>" . $i . "</a></li>";
                                        } else {
                                            $pagLink .= "<li class='page-item'><a class='page-link' href='group-chat-all.php?page=" . $i . "'>

                                                " . $i . "</a></li>";
                                        }
                                    };

                                    echo $pagLink;
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include './comman/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include './comman/logout-modal.php' ?>

    <!-- Delete Modal-->
    <?php include './comman/delete-modal.php' ?>

    <!-- Comman JS Scripts -->
    <?php include './comman/scripts.php'; ?>
    <script src="./js/deleteModal.js"></script>
    <script src="./js/sendModal.js"></script>

    <style>
        #filterable-wrapper {
            height: 250px;
            overflow: auto;
        }

        .form-check-label {
            display: block;
        }
    </style>

</body>

</html>


<div class="modal fade" id="sendModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="sendModalLabel">Send Message To</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="../inc/group-chat/group-chat-send-email.php" method="post">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">

                                <div class="col-md-12 m-1">
                                    <label for="rfq">Company:</label>
                                    <input type="text" placeholder="RFQ No." id="rfq" name="message[rfq]" class="form-control" required>
                                </div>

                                <!-- <div class="col-md-12 m-1">
                                    <label for="email">Email Address</label>
                                    <input type="email" placeholder="Email Address" id="email" name="message[email]" class="form-control">
                                </div> -->

                                <div class="col-md-12 m-1">
                                    <label for="chemical_name">Name:</label>
                                    <input type="text" placeholder="Chemical Name" id="chemical_name" name="message[chemical]" class="form-control" required>
                                </div>

                                <div class="col-md-12 m-1">
                                    <label for="country_name2">Country:</label>
                                    <input type="text" placeholder="Country Name" id="country_name2" name="message[country2]" class="form-control" required>
                                </div>

                                <div class="col-md-12 m-1">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" placeholder="Quantity" id="quantity" name="message[min_order_quantity]" class="form-control" required>
                                </div>

                                <div class="col-md-12 m-1">
                                    <label for="destination">Destination</label>
                                    <input type="text" placeholder="Destination" id="destination" name="message[destination]" class="form-control" required>
                                </div>

                                <div class="col-md-12 m-1">
                                    <label for="target_price">Target Price</label>
                                    <input type="text" placeholder="Target Price" id="target_price" name="message[targetprice]" class="form-control" required>
                                </div>

                                <div class="col-md-12 m-1 mb-0">
                                    <label for="inquiry_details">Message:</label>
                                    <textarea placeholder="Inquiry Details" id="inquiry_details" name="message[details]" class="form-control" rows="3" required></textarea>
                                </div>

                                <input type="hidden" name="type" value="buy"> <!-- or "sell" if needed -->
                                <input type="hidden" name="message[redirect_url]" value="<?= SITE_URL ?>/index.php">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <select class="form-control" aria-label="Send To" id="send_type" name="send_type" onchange="userTypeChange()" required>
                                        <option value="">Select</option>
                                        <option value="all">All</option>
                                        <option value="buyer">Buyers</option>
                                        <option value="supplier">Suppliers</option>
                                        <option value="send_specific">Send Specific</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <select class="form-control" id="country_filter" name="country_filter" onchange="userTypeChange()">
                                        <option value="">Select Country</option>
                                        <?php
                                        $countries = fetch_all($db, "SELECT DISTINCT country FROM user WHERE country != '' ORDER BY country ASC");
                                        foreach ($countries as $country) {
                                            echo "<option value='" . htmlspecialchars($country['country']) . "'>" . htmlspecialchars($country['country']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <select class="form-control" id="chemical_filter" name="chemical_filter" onchange="userTypeChange()">
                                        <option value="">Select Chemical</option>
                                        <?php
                                        $chemicals = fetch_all($db, "SELECT DISTINCT chemical_name FROM chemical");
                                        foreach ($chemicals as $chemical) {
                                            echo "<option value='" . htmlspecialchars($chemical['chemical_name']) . "'>" . htmlspecialchars($chemical['chemical_name']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div id="all-user-wrapper"></div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" name="message_send" class="btn btn-success d-block w-100">
                                        <i class="fas fa-paper-plane fa-sm fa-fw mr-2 text-gray-400"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary w-100" type="button" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<script>
    function updateStatus(chatId, status) {
       console.log("Chat ID: " + chatId);   // Debugging: check if it's passed correctly
       console.log("Status: " + status);    // Debugging: check if it's passed correctly
        
        $.ajax({
            url: 'update-status.php', // PHP script to handle status update
            type: 'POST',
            data: { chat_id: chatId, status: status },
            success: function(response) {
              console.log(response); // Check the response
                location.reload();  // Reload the page to reflect the new status
            },
            error: function() {
              console.log('An error occurred while updating the status');
            }
        });
    }
</script>
