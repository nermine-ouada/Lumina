<?php include ('../layouts/header.php');

include ("../../../config.php");

$sql = 'select * from admin ';

$req = $conn->prepare($sql);
$req->execute();

?>
<div class="container-fluid">
    <div class="row">
        <div class="d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Admin Table</h5>
                        </div>
                        <div>
                            <a href="create.php" class="btn btn-primary">Add new admin</a>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name & poste</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">CIN</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Phone Number</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Id</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                    </th>
                                    <th class="border-bottom-0">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($req->rowCount() == 0) {
                                    ?>
                                    <tr><td>No data in the table</td></tr>
                                <?php } ?>
                                <?php while ($row = $req->fetch()) { ?>

                                    <tr>

                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">
                                                <?php echo $row["first_name"] ?>
                                                <?php echo $row["last_name"] ?>
                                            </h6>
                                            <span class="fw-normal">
                                                <?php echo $row["poste"] ?>
                                            </span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">
                                                <?php echo $row["email"] ?>
                                            </p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">
                                                <?php echo $row["cin"] ?>
                                            </p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">
                                                <?php echo $row["tel"] ?>
                                            </p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">
                                                <?php echo $row["admin_id"] ?>
                                            </h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="edit.php?admin_id=<?php echo $row["admin_id"] ?>"
                                                class="btn btn-outline-warning m-1">Update</a>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="delete.php?admin_id=<?php echo $row["admin_id"] ?>"
                                                class="btn btn-outline-danger m-1">Delete</a>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ('../layouts/footer.php'); ?>