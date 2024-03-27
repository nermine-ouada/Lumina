<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.html");
}
include ('../layouts/header.php');
require '../../../config.php';

$sql = 'select * from admin where admin_id=?';

$req = $conn->prepare($sql);
$req->execute([$_GET["admin_id"]]);
$row = $req->fetch();

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add new admin</h5>
            <div class="card-body">
                <form action="update.php" method="post">
                    <div class="row">
                        <input type="text" class="form-control" name="admin_id" style="visibility:hidden"
                            value="<?php echo $row['admin_id'] ?>">

                        <div class="mb-3 w-50">
                            <label class="form-label">First name</label>
                            <input type="text" class="form-control" name="first_name"
                                value="<?php echo $row['first_name'] ?>">
                        </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">Last name</label>
                            <input type="text" class="form-control" name="last_name"
                                value="<?php echo $row['last_name'] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password"
                            value="<?php echo $row['password'] ?>">
                    </div>
                    <div class="row">
                        <div class="mb-3 w-50">
                            <label class="form-label">Phone number</label>
                            <input type="tel" class="form-control" name="tel" aria-describedby="emailHelp"
                                value="<?php echo $row['tel'] ?>">
                            <div class="form-text">Enter only your phone number +216 ** *** ***
                            </div>
                        </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">CIN</label>
                            <input type="text" class="form-control" name="cin" aria-describedby="emailHelp"
                                value="<?php echo $row['cin'] ?>">
                            <div class="form-text">Enter your 8 digit CIN number.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Poste</label>
                        <Select name="poste" class="form-control">
                            <option value="Manager">Manager</option>
                            <option value="HR">HR</option>
                        </Select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ('../layouts/footer.php'); ?>