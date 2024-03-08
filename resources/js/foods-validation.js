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
        document.getElementById("nameError").innerText =
            "Please insert your item name.";
    } else {
        check++;
    }

    // Controlla se il campo description è vuoto
    if (!description.trim()) {
        document.getElementById("descriptionError").innerText =
            "Please enter a description of the item.";
    } else {
        check++;
    }

    // Controlla se il campo image è vuoto
    if (!file) {
        document.getElementById("fileError").innerText =
            "Please insert an image for your item.";
    } else {
        check++;
    }

    // Controlla se il campo price è vuoto o negativo
    if (!price.trim() || parseFloat(price) < 0) {
        document.getElementById("priceError").innerText =
            "Please enter a price in this format: ##.##.";
    } else {
        check++;
    }

    // Controlla se il campo is_vegetarian è vuoto
    if (!vegetarian_yes && !vegetarian_no) {
        document.getElementById("is_vegetarianError").innerText =
            "Please specify if the dish is vegetarian or not.";
    } else {
        check++;
    }

    // Controlla se il campo is_visible è vuoto
    if (!visible_yes && !visible_no) {
        document.getElementById("is_visibleError").innerText =
            "Please tell us if the dish is visible in your listing.";
    } else {
        check++;
    }

    if (check > 0 && check === 6) {
        document.getElementById("foods-form").submit(); // Invia il modulo solo se tutti i campi sono corretti
    }
};
