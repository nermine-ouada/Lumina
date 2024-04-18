<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.html");
}
include ('../layouts/header.php');

require '../../../config.php';

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add new formation</h5>
            <div class="card-body">
                <form action="store.php" method="post">
                    <div class="row">
                        <div class="mb-3 w-50">
                            <label  class="form-label">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-3 w-50">
                            <label  class="form-label">Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Category</label>
                        <Select name="formation_category_id" class="form-control">
                            <?php
                            $req = $conn->prepare("select * from formation_category");
                            $req->execute();
                            while ($row = $req->fetch()) {
                                ?>
                                <option value="<?php echo $row['formation_category_id']; ?>">
                                    <?php echo $row['category_name']; ?>
                                </option>

                                <?php
                            }
                            ?>

                        </Select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include ('../layouts/footer.php'); ?>