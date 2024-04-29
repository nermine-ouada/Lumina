<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.html");
}
include ('../layouts/header.php');
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add new Promotion</h5>
            <div class="card-body">
                <form action="store.php" method="post">
                    <div class="row">
                        <div class="mb-3 w-50">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="mb-3 w-50">
                            <label class="form-label">Taux Reduction</label>
                            <input type="text" class="form-control" name="taux_reduction">
                        </div>
                        
                    </div>
               <div class="row">
                        <div class="mb-3 w-50">
                            <label class="form-label">Description</label>
                            <textarea type="text" class="form-control" name="description"></textarea>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>




<?php include ('../layouts/footer.php'); ?>