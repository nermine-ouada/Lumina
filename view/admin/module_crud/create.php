<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.html");
}
include ('../layouts/header.php');
include ('../../../config.php');
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add new admin</h5>
            <form action="store.php" method="post">
                <div class="mb-3 ">
                    <label class="form-label">Module Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="row">

                    <div class="mb-3 w-50">
                        <label class="form-label">Formation</label>
                        <select name="formation_id" class="form-control">
                            <?php
                            $req = $conn->prepare("select * from formation");
                            $req->execute();
                            while ($row = $req->fetch()) {
                                ?>
                            <option value="<?php echo $row['title']; ?>">
                                <?php echo $row['title']; ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3 w-50">
                        <label class="form-label">Volume TD</label>
                        <input type="number" class="form-control" name="volume_td" aria-describedby="emailHelp">
                        <div class="form-text">Enter only number.</div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 w-50">
                        <label class="form-label">Volume Cours</label>
                        <input type="number" class="form-control" name="volume_cours" aria-describedby="emailHelp">
                        <div class="form-text">Enter only number.</div>
                    </div>
                    <div class="mb-3 w-50">
                        <label class="form-label">Volume TP</label>
                        <input type="number" class="form-control" name="volume_tp" aria-describedby="emailHelp">
                        <div class="form-text">Enter only number.</div>
                    </div>
                </div>


                <div class="row">

                    <div class="mb-3 ">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php include ('../layouts/footer.php'); ?>