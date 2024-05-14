<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.phpview/admin/layouts/message.php");
}
include ('../layouts/header.php');
require '../../../config.php';
?>

<div class="container-fluid">
<?php include ('../layouts/message.php'); ?>
    <div class="row">
        <form action="index.php" method="GET">
            <div class="d-sm-flex d-block align-items-center justify-content mb-9">
                <input type="text" class="form-control w-50" name="search" placeholder="Filter by search">
                <button type="submit" class="btn btn-outline-primary m-3">Filter</button>
                <?php if (isset($_GET["search"])) { ?>
                    <a href="index.php" class="btn btn-danger m-3">Undo search</a>
                <?php } ?>
            </div>
        </form>

        <div class="d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Formation Table</h5>
                        </div>

                        <div>
                            <a href="create.php" class="btn btn-primary">Add new formation</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Title & category</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Description</h6>
                                    </th>
                                 
                                    <th class="border-bottom-0">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!isset($_GET['search'])) {
                                    $sql = 'SELECT title, description, category_name, formation_id FROM formation 
                                    JOIN formation_category ON formation.formation_category_id = formation_category.formation_category_id';

                                    // Prepare and execute the statement
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
                                                <h6 class="mb-0 fw-semibold">
                                                    <?php $title = $row['title'];
                                                    echo $row["title"] ?>
                                                </h6> <span class="fw-normal"><?= $row["category_name"] ?></span>

                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">
                                                    <?php echo $row["description"] ?>
                                                </p>
                                            </td>
                                            

                                            <td class="border-bottom-0">
                                                <a onclick="return confirm('Are you sure you want to add a new module to <?php echo $title ?>?')"
                                                    href="../module_crud/create.php?formation_id=<?php echo $row["formation_id"] ?>"
                                                    class="btn btn-primary m-1">Add module</a>
                                            </td>
                                            if count(*) from module
                                            <td class="border-bottom-0">
                                                <a onclick="return confirm('Are you sure you want to add  <?php echo $title ?> to a new session?')"
                                                    href="../session_crud/create.php?formation_id=<?php echo $row["formation_id"] ?>"
                                                    class="btn btn-outline-primary m-1">Add to a session</a>
                                            </td>

                                            <td class="border-bottom-0">
                                                <a href="edit.php?formation_id=<?php echo $row["formation_id"] ?>"
                                                    class="btn btn-outline-warning m-1">Edit</a>
                                            </td>
                                            <td class="border-bottom-0">
                                                <a  onclick="return confirm('Are you sure you want to delete?')"  href="delete.php?formation_id=<?php echo $row["formation_id"] ?>"
                                                    class="btn btn-outline-danger m-1">Delete</a>
                                            </td>

                                        </tr>
                                    <?php }
                                } else if (isset($_GET["search"])) {
                                    $search = '%' . $_GET["search"] . '%';
                                    $sql = 'SELECT title, description, category_name, formation_id FROM formation 
                                            JOIN formation_category ON formation.formation_category_id = formation_category.formation_category_id  
                                  WHERE title LIKE ? 
                                        OR description LIKE ? 
                                        OR category_name LIKE ? 
                                        ';


                                    $req = $conn->prepare($sql);
                                    $req->execute([$search, $search, $search]);

                                    if ($req->rowCount() == 0) {
                                        ?>
                                            <tr>
                                                <td>No data found</td>
                                            </tr>
                                    <?php } ?>

                                    <?php while ($row = $req->fetch()) { ?>
                                            <tr>

                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">
                                                    <?php echo $row["title"] ?>
                                                    </p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">
                                                    <?php echo $row["description"] ?>
                                                    </p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">
                                                    <?php echo $row["category_name"] ?>
                                                    </p>
                                                </td>

                                                <td class="border-bottom-0">
                                                    <a href="edit.php?formation_id=<?php echo $row["formation_id"] ?>"
                                                        class="btn btn-outline-warning m-1">Edit</a>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <a onclick="return confirm('Are you sure you want to delete?')"
                                                        href="delete.php?formation_id=<?php echo $row["formation_id"] ?>"
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