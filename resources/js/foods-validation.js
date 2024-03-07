window.foodsValidation = function () {
    let name = document.getElementById("name").value;
    let description = document.getElementById("description").value;
    let file = document.getElementById("file").value;
    let price = document.getElementById("price").value;
    let vegetarian_yes = document.getElementById("vegetarian_yes").value;
    let vegetarian_no = document.getElementById("vegetarian_no").value;
    let visible_yes = document.getElementById("visible_yes").value;
    let visible_no = document.getElementById("visible_no").value;
    let check = 0;

    document.querySelectorAll(".error").forEach(function (element) {
        element.innerText = "";
    });

    // Controlla se il campo name è vuoto
    if (!name.trim()) {
        document.getElementById("nameError").innerText = "Inserisci un nome.";
    } else {
        check++;
    }

    // Controlla se il campo description è vuoto
    if (!description.trim()) {
        document.getElementById("descriptionError").innerText =
            "Inserisci una descrizione.";
    } else {
        check++;
    }

    // Controlla se il campo image è vuoto
    if (!file) {
        document.getElementById("fileError").innerText =
            "Inserisci un'immagine.";
    } else {
        check++;
    }

    // Controlla se il campo price è vuoto
    if (!price.trim()) {
        document.getElementById("priceError").innerText =
            "Seleziona un prezzo.";
    } else {
        check++;
    }

    // Controlla se il campo is_vegetarian è vuoto
    if (!vegetarian_yes && !vegetarian_no) {
        document.getElementById("is_vegetarianError").innerText =
            "Indica se il cibo è vegetariano o no.";
    } else {
        check++;
    }

    // Controlla se il campo is_visible è vuoto
    if (!visible_yes && !visible_no) {
        document.getElementById("is_visibleError").innerText =
            "Indica se il cibo deve essere visibile o no.";
    } else {
        check++;
    }

    if (check > 0 && check === 6) {
        document.getElementById("foods-form").submit(); // Invia il modulo solo se tutti i campi sono corretti
    }
};
