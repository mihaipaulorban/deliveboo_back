let myToastEl = document.getElementById("liveToast");

if (myToastEl) {
    setTimeout(function () {
        myToastEl.classList.remove("show");
    }, 3000);
}
