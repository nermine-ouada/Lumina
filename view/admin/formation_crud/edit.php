<?php
session_start();

if (!isset ($_SESSION['admin'])) {
    header("location:../auth/login.html");
}
include ('../layouts/header.php');
require '../../../config.php';

$sql = 'select * from formation where formation_id=?';

$req = $conn->prepare($sql);
$req->execute([$_GET["formation_id"]]);
$row = $req->fetch();

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">update formation</h5>
                <div class="card-body">
                    <form action="update.php" method="post">
                        <div class="row">
                            <input type="text" class="form-control" name="formation_id" style="visibility:hidden"
                                value="<?php echo $row['formation_id'] ?>">

                            <div class="mb-3 w-50">
                                <label  class="form-label">Title</label>
                                <input type="text" class="form-control" name="title"
                                    value="<?php echo $row['title'] ?>">
                            </div>
                            <div class="mb-3 w-50">
                                <label  class="form-label">Description</label>
                                <input type="text" class="form-control" name="description"
                                    value="<?php echo $row['description'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
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
                            
                         
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
    </div>
</div>

<?php include ('../layouts/footer.php'); ?>