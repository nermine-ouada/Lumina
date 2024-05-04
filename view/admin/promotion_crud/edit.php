<?php
session_start();

if (!isset ($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
include ('../layouts/header.php');
require '../../../config.php';

$sql = 'select * from promotion where promotion_id=?';

$req = $conn->prepare($sql);
$req->execute([$_GET["promotion_id"]]);
$row = $req->fetch();

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add new Promotion</h5>
                <div class="card-body">
                    <form action="update.php" method="post">
                        <div class="row">
                            <input required type="text" class="form-control" name="promotion_id" style="visibility:hidden"
                                value="<?php echo $row['promotion_id'] ?>">

                            <div class="mb-3 ">
                                <label  class="form-label">Title</label>
                                <input required type="text" class="form-control" name="title"
                                    value="<?php echo $row['title'] ?>">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 ">
                            <label   class="form-label">Taux_Reduction</label>
                            <input required type="text" class="form-control" name="taux_reduction"
                                value="<?php echo $row['taux_reduction'] ?>">
                        </div>
                        
                        
</div>
                        <div class="row">
                           <div class="mb-3 ">
                                <label  class="form-label">Description</label>
                                <textarea required type="text" class="form-control" name="description"><?php echo $row['description']; ?></textarea>
                            </div>
                        </div>
                      
                      
                        <button onclick="return confirm('Are you sure you want to update?')" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    </div>
</div>

<?php include ('../layouts/footer.php'); ?>