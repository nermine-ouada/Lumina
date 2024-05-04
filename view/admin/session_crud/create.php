<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
include ('../layouts/header.php');

require '../../../config.php';

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add new session</h5>
            <div class="card-body">
                <form action="store.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                   
                    <div class="row">
                    <div class="mb-3 w-50">
                        <label class="form-label">Start_Date</label>
                        <input type="datetime-local" class="form-control" name="start_date">
                    </div>

                    <div class="mb-3 w-50">
                        <label class="form-label">End_Date</label>
                        <input type="datetime-local" class="form-control" name="end_date">
                    </div></div>
                    <div class="mb-3">
                        <label class="form-label">Niveau</label>
                        <input type="text" class="form-control" name="niveau">
                    </div>
                    
                   
                    <div class="mb-3">
                        <label class="form-label">Formation</label>
                        <Select name="formation_id" class="form-control">
                            <?php
                            $req = $conn->prepare("select * from formation");
                            $req->execute();
                            while ($row = $req->fetch()) {
                                ?>
                                <option value="<?php echo $row['formation_id']; ?>">
                                    <?php echo $row['title']; ?>
                                </option>

                                <?php
                            }
                            ?>

                        </Select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Promotion</label>
                        <Select name="promotion_id" class="form-control">
                            <?php
                            $req = $conn->prepare("select * from promotion");
                            $req->execute();
                            while ($row = $req->fetch()) {
                                ?>
                                <option value="<?php echo $row['promotion_id']; ?>">
                                    <?php echo $row['title']; ?>
                                </option>

                                <?php
                            }
                            ?>

                        </Select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description"></textarea>
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include ('../layouts/footer.php'); ?>