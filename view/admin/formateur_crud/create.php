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
            <h5 class="card-title fw-semibold mb-4">Add new Trainer</h5>
            <div class="card-body">
                <form action="store.php" method="post">
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
                    <div class="row">
                        <div class="mb-3 w-50">
                            <label class="form-label">Email address</label>
                            <input required type="email" class="form-control" name="email">
                            <div class="form-text">Enter your email address with the '@' symbol included</div>
                        </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">Phone number</label>
                            <input required type="tel" class="form-control" name="tel" aria-describedby="emailHelp">
                            <div class="form-text">Enter only your phone number +216 ** *** ***
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 w-50">
                            <label class="form-label">Password</label>
                            <input required type="password" class="form-control" name="password" placeholder="Enter your password">
                           
                        </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">Confirm password</label>
                            <input required type="password" class="form-control" name="password" id="confirmPassword" placeholder="Confirm Password">
                        </div>

                    </div>

                    <div class="row">
                        <div class="mb-3 w-50">
                            <label class="form-label">CIN</label>
                            <input required type="text" class="form-control" name="cin" aria-describedby="emailHelp">
                            <div class="form-text">Enter your 8 digit CIN number.
                            </div>
                        </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">specialite</label>
                            <Select name="specialite" class="form-control" >
                                <option value=" " selected ></option>
                                <option value="Mathematique">Mathematique</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="FrontEnd Web Developpement">FrontEnd Web Developpement</option>
                                <option value="BackEnd Web Developpement">BackEnd Web Developpement</option>
                            </Select>
                            <div class="form-text">Select your speciality</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 w-50">
                            <label class="form-label">Banque</label>
                            <Select name="banque" class="form-control">
                            <option value=" " selected ></option>
                                <option value="STB"  >STB</option>
                                <option value="ATB">ATB</option>
                                <option value="BNA">BNA</option>
                                <option value="Zitouna">Zitouna</option>
                                <option value="Amen">Amen</option>
                                <option value="Wifek">Wifek</option>
                                <option value="BH">BH</option>
                            </Select>
                            <div class="form-text">Pick your bank from the list</div>
                        </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">Rib</label>
                            <input required type="text" class="form-control" name="rib">
                            <div class="form-text">Enter your bank account number (RIB)</div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>




<?php include ('../layouts/footer.php'); ?>