<?php

include ('../layouts/header.php');
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add new admin</h5>
            <div class="card-body">
                <form action="store.php" method="post">

                    <div class="row">
                        <div class="mb-3 w-50">
                            <label for="exampleInputEmail1" class="form-label">First name</label>
                            <input type="text" class="form-control" name="first_name">
                        </div>
                        <div class="mb-3 w-50">
                            <label for="exampleInputEmail1" class="form-label">Last name</label>
                            <input type="text" class="form-control" name="last_name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="row">
                        <div class="mb-3 w-50">
                            <label for="exampleInputEmail1" class="form-label">Phone number</label>
                            <input type="tel" class="form-control" name="tel" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Enter only your phone number +216 ** *** ***

                            </div>
                        </div>
                        <div class="mb-3 w-50">
                            <label for="exampleInputEmail1" class="form-label">Adresse</label>
                            <input type="text" class="form-control" name="address">
                        </div>

                    </div>
            </div>
            <div class="row">

                <div class="mb-3  w-50">
                    <label for="exampleInputEmail1" class="form-label">CIN</label>
                    <input type="text" class="form-control" name="cin" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Enter your 8 digit CIN number.
                    </div>
                </div>

                <div class="mb-3 w-50">

                    <label for="exampleInputEmail1" class="form-label">Profession</label>
                    <Select name="profession" class="form-control">
                        <option></option>
                        <option value="Mobile App Developer">Mobile App Developer</option>
                        <option value="Data Scientist">Data Scientist </option>
                        <option value="UI/UX Designer">UI/UX Designer</option>
                        <option value="Cloud Architect">Cloud Architect</option>
                        <option value="Systems Administrator">Systems Administrator</option>

                    </Select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


    </div>
</div>

<?php include ('../layouts/footer.php'); ?>