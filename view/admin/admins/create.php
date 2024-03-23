<?php include ('../layouts/header.php'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add new admin</h5>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="mb-3 w-50">
                                <label for="exampleInputEmail1" class="form-label">First name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3 w-50">
                                <label for="exampleInputEmail1" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="row">
                            <div class="mb-3 w-50">
                                <label for="exampleInputEmail1" class="form-label">Phone number</label>
                                <input type="tel" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Enter only your phone number +216 ** *** ***
                                </div>
                            </div>
                            <div class="mb-3 w-50">
                                <label for="exampleInputEmail1" class="form-label">CIN</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Enter your 8 digit CIN number.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Poste</label>
                            <Select class="form-control">
                                <option value="">Manager</option>
                                <option value="">HR</option>
                            </Select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include ('../layouts/footer.php'); ?>