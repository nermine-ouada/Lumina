<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
include ('../layouts/header.php');
require '../../../config.php';

$sql = 'select * from session where session_id=?';

$req = $conn->prepare($sql);
$req->execute([$_GET["session_id"]]);
$row = $req->fetch();

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">update session</h5>
            <div class="card-body">
                <form action="update.php" onsubmit="return onSubmitForm();" method="post">
                    <div class="row">
                        <input required type="text" class="form-control" name="session_id" style="visibility:hidden"
                            value="<?php echo $row['session_id'] ?>">

                        <div class="mb-3 w-50">
                            <label class="form-label">Title</label>
                            <input required type="text" class="form-control" name="title" value="<?php echo $row['title'] ?>">
                        </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">Description</label>
                            <input required type="text" class="form-control" name="description"
                                value="<?php echo $row['description'] ?>">
                        </div>


                        <div class="row">
                            <div class="mb-3 w-50">
                                <label class="form-label">Start_Date</label>
                                <input required type="datetime-local" class="form-control" name="start_date" id="start_date"
                                    value="<?php echo $row['start_date'] ?>">
                            </div>
                            <div class="mb-3 w-50">
                                <label class="form-label">End_Date</label>
                                <input required type="datetime-local" class="form-control" name="end_date" id="end_date"
                                    value="<?php echo $row['end_date'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">Niveau</label>
                            <select name="niveau"  class="form-control">
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Formation</label>
                            <Select name="formation_id" class="form-control">
                                 <option value="nopromo">
                                No discount </option>
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



                        <button onclick="return confirm('Are you sure you want to update?')" type="submit"
                            class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
 function validateDates() {
        var startDate = new Date(document.getElementById("start_date").value);
        var endDate = new Date(document.getElementById("end_date").value);
        var errorMessage = "";

        if (endDate <= startDate) {
            errorMessage = "End date must be after start date.";
        }
        return errorMessage;
    }
    function onSubmitForm() {
        var errorMessage =validateDates();

        if (errorMessage) {
            alert(errorMessage);
            return false;
        } else {
            return true;
        }
    }
</script>
<?php include ('../layouts/footer.php'); ?>