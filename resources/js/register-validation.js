window.validateForm = function () {
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let restaurant_name = document.getElementById("restaurant_name").value;
    let address = document.getElementById("address").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("password-confirm").value;
    let pIva = document.getElementById("p_iva").value;
    let checkboxes = document.querySelectorAll(
        '#checkboxContainer input[type="checkbox"]'
    );
    let check = 0;
    let atLeastOneChecked = false;

    document.querySelectorAll(".error").forEach(function (element) {
        element.innerText = "";
    });

    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            atLeastOneChecked = true;
        }
    });

    if (!atLeastOneChecked) {
        document.getElementById("restaurant_types").innerText =
            "Select at least one restaurant type.";
    } else {
        check++;
    }

    // Controlla se il campo name è vuoto
    if (!name.trim()) {
        document.getElementById("nameError").innerText =
            "The name field is required.";
    } else {
        check++;
    }

    // Controlla se il campo name è vuoto
    if (!email.trim()) {
        document.getElementById("emailError").innerText =
            "The email field is required.";
    } else {
        check++;
    }

    // Controlla se il campo name è vuoto
    if (!restaurant_name.trim()) {
        document.getElementById("restaurantNameError").innerText =
            "The restaurant name field is required.";
    } else {
        check++;
    }

    // Controlla se il campo name è vuoto
    if (!address.trim()) {
        document.getElementById("addressError").innerText =
            "The address field is required.";
    } else {
        check++;
    }

    // Controlla se il campo p_iva è vuoto
    if (!pIva.trim()) {
        document.getElementById("pIvaError").innerText =
            "The VAT number field is required.";
    } else {
        check++;
    }

    // Effettua la validazione della lunghezza del campo p_iva
    if (pIva.length !== 11) {
        document.getElementById("pIvaError").innerText =
            "The VAT NUmber field must contain exactly 11 numbers.";
    } else {
        check++;
    }

    if (password !== confirmPassword) {
        document.getElementById("passwordError").innerText =
            "The password do not match.";
    } else if (password.length < 8 || password.length > 16) {
        document.getElementById("passwordError").innerText =
            "Your password must contain between 8 and 16 characters.";
    } else {
        check++;
    }

    if (check > 0 && check === 8) {
        document.getElementById("registration-form").submit(); // Invia il modulo solo se tutti i campi sono corretti
    }
};
