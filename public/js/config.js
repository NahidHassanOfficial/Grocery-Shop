function showLoader() {
    document.getElementById("loader").classList.remove("d-none");
}
function hideLoader() {
    document.getElementById("loader").classList.add("d-none");
}

function successToast(msg) {
    Toastify({
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
            background: "rgb(9,147,9)"
        },
    }).showToast();
}

function errorToast(msg) {
    Toastify({
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        text: msg,
        className: "mb-5",
        style: {
             background: "rgb(255, 82, 82)"

        },
    }).showToast();
}
