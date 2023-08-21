function setTextBox(element = "", config = {}, validations = []) {
    $(element).dxTextBox(config).dxValidator({
        validationRules: validations,
    });
}

function setTagBox(element = "", config = {}, validations = []) {
    $(element).dxTagBox(config).dxValidator({
        validationRules: validations,
    });
}

function setSelectBox(element = "", config = {}, validations = []) {
    $(element).dxSelectBox(config).dxValidator({
        validationRules: validations,
    });
}

function setRadioGroup(element = "", config = {}, validations = []) {
    $(element).dxRadioGroup(config).dxValidator({
        validationRules: validations,
    });
}

function setCheckBox(element = "", config = {}, validations = []) {
    $(element).dxCheckBox(config).dxValidator({
        validationRules: validations,
    }).dxCheckBox("instance");
}

function setTextArea(element = "", config = {}, validations = []) {
    $(element).dxTextArea(config).dxValidator({
        validationRules: validations,
    });
}
//END FIELDS

//BUTTONS
function setButton(element = "", config = {}) {
    $(element).dxButton(config);
}

function setButtonFloating(element = "", config = {}) {
    $(element).dxSpeedDialAction(config).dxSpeedDialAction("instance");
}
//END BUTTONS

//POPUP
function setPopup(element = "", config = {}) {
    return $(element).dxPopup(config).dxPopup("instance");
}
//END POPUP

//MESSAGE NOTIFICATION
function showMessageText(
    message = "",
    type = "success",
    time = 3000,
    width = 330,
    position = {
        my: "top",
        at: "top",
        of: "#container",
    }
) {
    DevExpress.ui.notify(
        {
            message,
            width,
            position,
        },
        type,
        time
    );
}

function showMessageHtml(
    html = "",
    type = "success",
    time = 3000,
    width = "80%",
    position = {
        my: "top",
        at: "top+20",
        of: "#container",
    }
) {
    DevExpress.ui.notify(
        {
            position,
            width,
            contentTemplate: (element) => {
                element.append(html);
            },
        },
        type,
        time
    );
}
//END MESSAGE NOTIFICATION

// GESTOR ERRORS
function handleErrors(error) {
    switch (error.response.status) {
        case 401:
            window.location.replace("/");
            break;
        case 403:
            showMessageText(
                "El rol que tiene asignado, no tiene permiso para crear o editar los roles.",
                "warning"
            );
            break;
        case 422:
            const errors = error.response.data.errors;
            const messages = Object.values(errors)
                .map((errorList) => `<li>${errorList[0]}</li>`)
                .join("");
            showMessageHtml(`<ul>${messages}</ul>`, "error");
            break;
        default:
            showMessageText(
                "Ocurrió un error inesperado, por favor vuelva a intentarlo.",
                "error"
            );
            break;
    }
}
// END GESTOR ERRORS

// FORMATO DE MONEDAS
function devFormatoMoneda(key, value) {
    return new Promise((resolve, reject) => {
        if (value < 5) {
            return;
        }

        var formData = new FormData();
        formData.append("tasa", key);
        formData.append("monto", value);

        axios.post("/convertidor/form/tasa", formData)
            .then((response) => {
                resolve(response.data);
            })
            .catch((error) => {
                reject(error);
            });
    });
}
// END FORMATO DE MONEDAS