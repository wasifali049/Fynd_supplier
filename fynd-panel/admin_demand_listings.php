<?php
include('../lib/bpconn.php');
include('../lib/config-details.php');
$conn = new mysqli("localhost", "root", "", "fynd");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM purchase_inquiries");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Buyer - <?= BRANDNAME ?> Admin Panel</title>

    <!-- Custom Head -->
    <?php include('./comman/head.php'); ?>
    <style>
    table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  border: 1px solid #ccc;
  padding: 8px;
}
th {
  background: #f4f4f4;
}

</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('./comman/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('./comman/navbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

<table border="1">
  <tr>
    <th>Chemical Name</th>
    <th>Country</th>
    <th>Submitted By</th>
    <th>Status</th>
    <th>Date Submitted</th>
    <th>Contact Info</th>
    <th>Actions</th>
  </tr>

  <?php while($row = $result->fetch_assoc()): ?>
    <tr id="row-<?= $row['id'] ?>">
    <td><?= $row['product_name'] ?></td>
    <td><?= $row['preferred_location'] ?></td>
    <td><?= $row['contact_name'] ?></td>
    <td><?= $row['verified_status'] ?></td>
    <td><?= date("d M", strtotime($row['created_at'])) ?></td>
    <td>
      Email: <?= $row['contact_info'] ?><br>
      Phone: <?= $row['phone'] ?>
    </td>
    <td>
    <a href="#" class="btn btn-sm btn-primary text-nowrap openEditModal" data-id="<?= $row['id'] ?>">Edit</a> |
 <a href="delete_listing.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this entry?')" class="btn btn-sm btn-danger image-delete-btn text-nowrap"> 
                                                       Delete</a> |
      <?php if ($row['verified_status'] != 'Approved'): ?>
        <a href="approve_demand_listing.php?id=<?= $row['id'] ?>"  class="mx-1 my-1 btn btn-sm btn-success text-nowrap">
                                                        Approve</a>
      <?php endif; ?>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
 <!-- /.container-fluid -->
<!-- Edit Listing Modal -->
<div class="modal fade" id="editListingModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body" id="editModalBody">
        <div class="text-center p-5">Loading...</div>
      </div>
    </div>
  </div>
</div>

 </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('./comman/footer.php'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include('./comman/logout-modal.php') ?>

    <!-- Delete Modal-->
    <?php include('./comman/delete-modal.php') ?>

    <!-- Comman JS Scripts -->
    <?php include('./comman/scripts.php'); ?>
    <script src="./js/deleteModal.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).on('click', '.openEditModal', function(e) {
    e.preventDefault();

    var inquiryId = $(this).data('id');

    $('#editModalBody').html('<div class="text-center p-5">Loading...</div>'); // show loading
    $('#editListingModal').modal('show');

    $.ajax({
        url: 'admin_edit_listing.php', // your PHP page that returns the form
        type: 'GET',
        data: { id: inquiryId },
        success: function(response) {
            $('#editModalBody').html(response); // load the form into modal
        },
        error: function() {
            $('#editModalBody').html('<div class="text-danger text-center">Failed to load form.</div>');
        }
    });
});
</script>
<script>
$(document).on('submit', '#editInquiryForm', function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    var actionUrl = $(this).attr('action');

    $.ajax({
        url: actionUrl,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(updated) {
            // Build updated row
            var newRow = `
                <td>${updated.product_name}</td>
                <td>${updated.preferred_location}</td>
                <td>${updated.contact_name}</td>
                <td>${updated.verified_status}</td>
                <td>${updated.created_at}</td>
                <td>Email: ${updated.contact_info}<br>Phone: ${updated.phone ?? '-'}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary text-nowrap openEditModal" data-id="${updated.id}">Edit</a>
                    <a href="delete_listing.php?id=${updated.id}" onclick="return confirm('Delete this entry?')" class="btn btn-sm btn-danger text-nowrap">Delete</a>
                    ${updated.verified_status !== 'Approved' ? `<a href="approve_demand_listing.php?id=${updated.id}" class="mx-1 my-1 btn btn-sm btn-success text-nowrap">Approve</a>` : ''}
                </td>
            `;
            $("#row-" + updated.id).html(newRow);
            $('#editListingModal').modal('hide');
        },
        error: function(xhr) {
            alert("Update failed: " + xhr.responseText);
        }
    });
});
</script>


</body>

</html>