<?php
session_start();

if (!isset ($_SESSION['admin'])) {
    header("location:../auth/login.php");
}
include ('../layouts/header.php');
require '../../../config.php';

$sql = 'select * from formateur where formateur_id=?';

$req = $conn->prepare($sql);
$req->execute([$_GET["formateur_id"]]);
$row = $req->fetch();

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add new Formateur</h5>
                <div class="card-body">
                    <form action="update.php" method="post">
                        <div class="row">
                            <input required type="text" class="form-control" name="formateur_id" style="visibility:hidden"
                                value="<?php echo $row['formateur_id'] ?>">

                            <div class="mb-3 w-50">
                                <label  class="form-label">First name</label>
                                <input required type="text" class="form-control" name="first_name"
                                    value="<?php echo $row['first_name'] ?>">
                            </div>
                            <div class="mb-3 w-50">
                                <label  class="form-label">Last name</label>
                                <input required type="text" class="form-control" name="last_name"
                                    value="<?php echo $row['last_name'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 w-50">
                            <label   class="form-label">Password</label>
                            <input required type="password" class="form-control" name="password"
                                value="<?php echo $row['password'] ?>">
                        </div>
                        <div class="mb-3 w-50">
                            <label   class="form-label">Email address</label>
                            <input required type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                        </div>
                        
</div>
                        <div class="row">
                            <div class="mb-3 w-50">
                                <label  class="form-label">Phone number</label>
                                <input required type="tel" class="form-control" name="tel" aria-describedby="emailHelp"
                                    value="<?php echo $row['tel'] ?>">
                                <div   class="form-text">Enter only your phone number +216 ** *** ***
                                </div>
                            </div>
                            <div class="mb-3 w-50">
                                <label  class="form-label">CIN</label>
                                <input required type="text" class="form-control" name="cin" aria-describedby="emailHelp"
                                    value="<?php echo $row['cin'] ?>">
                                <div   class="form-text">Enter your 8 digit CIN number.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 w-50">
                                <label  class="form-label">Rib</label>
                                <input required type="text" class="form-control" name="rib" 
                                    value="<?php echo $row['rib'] ?>">
                                </div>
                            </div>
                            <div class="mb-3 w-50">
                                <label  class="form-label">specialite</label>
                                <Select name="specialite" class="form-control"  value="<?php echo $row['specialite'] ?>">
                                <option value=""></option>
                                <option value="Mathematique">Mathematique</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="FrontEnd Web Developpement">FrontEnd Web Developpement</option>
                                <option value="BackEnd Web Developpement">BackEnd Web Developpement</option>
                                
                            </Select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Banque</label>
                            <Select name="banque" class="form-control" value="<?php echo $row['banque'] ?>">
                                <option value="STB">STB</option>
                                <option value="ATB">ATB</option>
                                <option value="BNA">BNA</option>
                                <option value="Zitouna">Zitouna</option>
                                <option value="Amen">Amen</option>
                                <option value="Wifek">Wifek</option>
                                <option value="BH">BH</option>
                            </Select>
                        </div>
                        <button onclick="return confirm('Are you sure you want to update?')" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    </div>
</div>

<?php include ('../layouts/footer.php'); ?>