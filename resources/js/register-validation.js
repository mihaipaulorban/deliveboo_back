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
            "Seleziona almeno una tipologia di ristorante.";
    } else {
        check++;
    }

    // Controlla se il campo name è vuoto
    if (!name.trim()) {
        document.getElementById("nameError").innerText =
            "Il campo name è obbligatorio.";
    } else {
        check++;
    }

    // Controlla se il campo name è vuoto
    if (!email.trim()) {
        document.getElementById("emailError").innerText =
            "Il campo email è obbligatorio.";
    } else {
        check++;
    }

    // Controlla se il campo name è vuoto
    if (!restaurant_name.trim()) {
        document.getElementById("restaurantNameError").innerText =
            "Il campo restaurant name è obbligatorio.";
    } else {
        check++;
    }

    // Controlla se il campo name è vuoto
    if (!address.trim()) {
        document.getElementById("addressError").innerText =
            "Il campo address è obbligatorio.";
    } else {
        check++;
    }

    // Controlla se il campo p_iva è vuoto
    if (!pIva.trim()) {
        document.getElementById("pIvaError").innerText =
            "Il campo VAT number è obbligatorio.";
    } else {
        check++;
    }

    // Effettua la validazione della lunghezza del campo p_iva
    if (pIva.length !== 11) {
        document.getElementById("pIvaError").innerText =
            "Il campo VAT number deve essere lungo 11 caratteri.";
    } else {
        check++;
    }

    if (password !== confirmPassword) {
        document.getElementById("passwordError").innerText =
            "Le password non corrispondono.";
    } else if (password.length < 8 || password.length > 16) {
        document.getElementById("passwordError").innerText =
            "La password deve contenere tra 8 e 16 caratteri.";
    } else {
        check++;
    }

    if (check > 0 && check === 8) {
        document.getElementById("registration-form").submit(); // Invia il modulo solo se tutti i campi sono corretti
    }
};
