<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
include ('../layouts/header.php');
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add new admin</h5>
            <div class="card-body">
                <form action="store.php" onsubmit="return onSubmitForm();" method="post">
                    <div class="row">
                        <div class="mb-3 w-50">
                            <label class="form-label">First name</label>
                            <input required type="text" class="form-control" name="first_name" placeholder="Enter your first name">
                           
                        </div>


                        <div class="mb-3 w-50">
                            <label class="form-label">Last name</label>
                            <input required type="text" class="form-control" name="last_name" placeholder="Enter your last name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input required type="email" class="form-control" name="email">
                        <div class="form-text">Enter your email address with the '@' symbol included</div>

                    </div>
                    <div class="row">

                        <div class="mb-3 w-50">
                            <label class="form-label">Password</label>
                            <input required type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                        </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">Confirm assword</label>
                            <input required type="password" class="form-control" name="password" id="confirmPassword" placeholder="Confirm password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 w-50">
                            <label class="form-label">Phone number</label>
                            <input required type="tel" class="form-control" name="tel" aria-describedby="emailHelp"
                                id="tel">
                            <div class="form-text">Enter only your phone number +216 ** *** ***
                            </div>

                        </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">CIN</label>
                            <input required type="number" class="form-control" name="cin" aria-describedby="emailHelp"
                                id="cin">
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
                        <div class="form-text">Choose your job title from the list.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>
<?php include ('../layouts/footer.php'); ?>