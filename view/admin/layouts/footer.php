</div>
</div>
<script>
    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var errorMessage = ""; // Initialize an empty string to store error messages

        // Check if the passwords match
        if (password !== confirmPassword) {
            errorMessage += "Passwords do not match.\n";
        }
        // Check if the password is more than 8 characters
        if (password.length > 8) {
            errorMessage += "Password must be 8 characters or less.\n";
        }
        return errorMessage; // Return the concatenated error message
    }

    function validatePhoneNumber() {
        var phoneNumber = document.getElementById("phone_number").value;
        var errorMessage = ""; // Initialize an empty string to store error messages

        // Check if the phone number is not empty and not equal to 10 digits
        if (phoneNumber.length !== 8) {
            errorMessage += "Please enter a valid phone number.\n";
        }
        return errorMessage; // Return the concatenated error message
    }

    function validateCIN() {
        var cin = document.getElementById("cin").value;
        var errorMessage = ""; // Initialize an empty string to store error messages

        // Check if the CIN is not empty and not equal to 8 digits
        if (cin.length !== 8) {
            errorMessage += "Please enter a valid 8-digit CIN number.\n";
        }
        return errorMessage; // Return the concatenated error message
    }

    function onSubmitForm() {
        // Call each validation function and concatenate the error messages
        var errorMessage = validatePassword() + validatePhoneNumber() + validateCIN();

        // Check if the error message is not empty (indicating validation failure)
        if (errorMessage) {
            alert(errorMessage); // Display the concatenated error message
            return false; // Prevent form submission
        } else {
            return true; // Proceed with form submission
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