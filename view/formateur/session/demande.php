<?php
session_start();

if (!isset($_SESSION['formateur'])) {
    header("location:../auth/login.html");
}
include ('../layouts/header.php');
include ("../../../config.php");

$sql = 'select * from session where session_id=?';

$req = $conn->prepare($sql);
$req->execute([$_GET["session"]]);
$row = $req->fetch();

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Demande session (<?php echo $row['title'] ?>)</h5>
            <div class="card-body">
                <form action="submit.php" onsubmit="return validateForm();" method="post">
                    <input required type="hidden" class="form-control" name="session_id"
                        value="<?php echo $row['session_id'] ?>">
                    <input required type="hidden" class="form-control" name="formation_id"
                        value="<?php echo $row['formation_id'] ?>">
                    <div class="mb-3">
                        <label class="form-label">Session</label>
                        <input required class="form-control" value="<?php echo $row['title']; ?>" readonly>
                        <div class="form-text">This is the session selected.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Module</label>
                        <?php
                        $req = $conn->prepare("select * from module where formation_id=?");
                        $req->execute([$row['formation_id']]);

                        while ($row = $req->fetch()) {
                            ?>
                            <div class="mb-3 form-check">

                                <input type="checkbox" class="form-check-input" name="module_id"
                                    id="<?php echo $row['title'] ?>">
                                <label class="form-check-label"
                                    for="<?php echo $row['title'] ?>"><?php echo $row['title'] ?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>



                    <button onclick="return confirm('Are you sure you want to submit?')" type="submit"
                        class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function validateForm() {
    const form = document.querySelector('form');
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    let checkedCount = 0;
    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            checkedCount++;
        }
    });
    
    if (checkedCount < 3 || checkedCount > 5) {
        alert('Please select between 3 and 5 checkboxes.');
        return false; // Prevent form submission
    } else {
        return true; // Allow form submission
    }
}
</script>
<?php include ('../layouts/footer.php'); ?>