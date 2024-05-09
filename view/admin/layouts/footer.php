</div>
</div>
<script>
    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var errorMessage = "";

        if (password !== confirmPassword) {
            errorMessage += "Passwords do not match.\n";
            // Issue: Incorrectly resetting value
            confirmPassword.value = "";
        }
        if (password.length > 8) {
            // Issue: Incorrectly resetting value
            password.value = "";
            errorMessage += "Password must be 8 characters or less.\n";
        }
        return errorMessage;
    }

    function validatePhoneNumber() {
        var phoneNumber = document.getElementById("tel").value;
        var errorMessage = "";

        if (phoneNumber.length !== 8) {
            // Issue: Incorrectly resetting value
            phoneNumber.value = "";
            errorMessage += "Please enter a valid phone number.\n";
        }
        return errorMessage;
    }
  function validateRib() {
        var rib = document.getElementById("rib").value;
        var errorMessage = "";

        if (rib.length !== 24) {
            // Issue: Incorrectly resetting value
            // rib.value = "";
            errorMessage += "Please enter a valid RIB.\n";
        }
        return errorMessage;
    }

    // Function to validate the CIN (Customer Identification Number)
    function validateCIN() {
        var cin = document.getElementById("cin").value;
        var errorMessage = "";

        if (cin.length !== 8) {
            // Issue: Incorrectly resetting value
            // cin.value = "";
            errorMessage += "Please enter a valid 8-digit CIN number.\n";
        }
        return errorMessage;
    }

    // Function to validate dates
    function validateDates() {
        var startDate = new Date(document.getElementById("start_date").value);
        var endDate = new Date(document.getElementById("end_date").value);
        var errorMessage = "";

        if (endDate <= startDate) {
            errorMessage += "End date must be after start date.\n";
        }
        return errorMessage;
    }

    // Function to validate the entire form
    function onSubmitForm() {
        var errorMessage = validatePassword() + validatePhoneNumber() + validateCIN() + validateRib() + validateDates();

        if (errorMessage) {
            alert(errorMessage);
            return false;
        } else {
            return true;
        }
    }
    // Similar functions for validateRib(), validateCIN(), and validateDates() follow...

    function onSubmitForm() {
        var errorMessage = validatePassword() + validatePhoneNumber() + validateCIN() + validateRib() + validateDates();

        if (errorMessage) {
            alert(errorMessage);
            return false;
        } else {
            return true;
        }
    }
</script>


<script src="../../../assets/dashboard/libs/jquery/dist/jquery.min.js"></script>
<script src="../../../assets/dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../../assets/dashboard/js/sidebarmenu.js"></script>
<script src="../../../assets/dashboard/js/app.min.js"></script>
<script src="../../../assets/dashboard/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../../../assets/dashboard/libs/simplebar/dist/simplebar.js"></script>
<script src="../../../assets/dashboard/js/dashboard.js"></script>
</body>

</html>