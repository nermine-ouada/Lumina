<?php
session_start();

if (!isset($_SESSION['formateur'])) {
    header("location:../auth/login.html");
}
include ('../layouts/header.php');
include ("../../../config.php");

$sql = "SELECT session.title, session.description, session.start_date, session.end_date, session.niveau, 
            formation.title AS formation_title, promotion.title AS promotion_title, session.session_id as session_id
            FROM session 
            JOIN formation ON session.formation_id = formation.formation_id 
            JOIN promotion ON session.promotion_id = promotion.promotion_id
            WHERE session.session_id NOT IN (
                SELECT DISTINCT session_id FROM fiche_demande WHERE status = 'accepted'
            )";
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