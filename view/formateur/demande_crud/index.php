<?php
session_start();

if (!isset ($_SESSION['formateur'])) {
    header("location:../auth/login.html");
}
include ('../layouts/header.php');
include ("../../../config.php");
?>

<div class="container-fluid">
    <div class="row">
        <form action="index.php" method="GET">
            <div class="d-sm-flex d-block align-items-center justify-content mb-9">
                <input type="text" class="form-control w-50" name="search" placeholder="Filter by search">
                <button type="submit" class="btn btn-outline-primary m-3">Filter</button>
                <?php if (isset ($_GET["search"])) { ?>
                    <a href="index.php" class="btn btn-danger m-3">Undo search</a>
                    <?php } ?>
            </div>
        </form>

        <div class="d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Trainer Table</h5>
                        </div>

                        <div>
                            <a href="create.php" class="btn btn-primary">Add new Trainer</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name </h6>
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
                                        <h6 class="fw-semibold mb-0">Specialite</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Banque</h6>
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
                                <?php
                                if (!isset ($_GET['search'])) {
                                    $sql = 'select * from formateur ';

                                    $req = $conn->prepare($sql);
                                    $req->execute();
                                    if ($req->rowCount() == 0) {
                                        ?>
                                        <tr>
                                            <td>No data in the table</td>
                                        </tr>
                                    <?php } ?>

                                    <?php while ($row = $req->fetch()) { ?>

                                        <tr>

                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">
                                                    <?php echo $row["first_name"] ?>
                                                    <?php echo $row["last_name"] ?>
                                                </h6>
                                                
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
                                                <p class="mb-0 fw-normal">
                                                    <?php echo $row["specialite"] ?>
                                                </p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">
                                                    <?php echo $row["banque"] ?>
                                                </p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">
                                                    <?php echo $row["formateur_id"] ?>
                                                </h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <a href="edit.php?formateur_id=<?php echo $row["formateur_id"] ?>"
                                                    class="btn btn-outline-warning m-1">Edit</a>
                                            </td>
                                            <td class="border-bottom-0">
                                                <a href="delete.php?formateur_id=<?php echo $row["formateur_id"] ?>"
                                                    class="btn btn-outline-danger m-1">Delete</a>
                                            </td>

                                        </tr>
                                        <?php }
                                } else if (isset ($_GET["search"])) {
                                    $sql = 'select * from formateur where first_name like ?  or last_name like ? or email like ? ';

                                    $req = $conn->prepare($sql);
                                    $req->execute([$_GET["search"], $_GET["search"], $_GET["search"]]);
                                    if ($req->rowCount() == 0) {
                                        ?>
                                            <tr>
                                                <td>No data found</td>
                                            </tr>
                                    <?php } ?>

                                    <?php while ($row = $req->fetch()) { ?>

                                            <tr>

                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">
                                                    <?php echo $row["first_name"] ?>
                                                    <?php echo $row["last_name"] ?>
                                                    </h6>
                                                    
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
                                                    <p class="mb-0 fw-normal">
                                                    <?php echo $row["specialite"] ?>
                                                    </p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">
                                                    <?php echo $row["banque"] ?>
                                                    </p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">
                                                    <?php echo $row["formateur_id"] ?>
                                                    </h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <a href="edit.php?formateur_id=<?php echo $row["formateur_id"] ?>"
                                                        class="btn btn-outline-warning m-1">Edit</a>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <a href="delete.php?formateur_id=<?php echo $row["formateur_id"] ?>"
                                                        class="btn btn-outline-danger m-1">Delete</a>
                                                </td>

                                            </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ('../layouts/footer.php'); ?>