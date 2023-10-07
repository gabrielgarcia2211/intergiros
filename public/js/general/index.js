function setTextBox(element = "", config = {}, validations = []) {
    $(element)
        .dxTextBox(config)
        .dxValidator({
            validationRules: validations,
        })
        .dxTextBox("instance");
}

function setTagBox(element = "", config = {}, validations = []) {
    $(element).dxTagBox(config).dxValidator({
        validationRules: validations,
    });
}

function setSelectBox(element = "", config = {}, validations = []) {
    $(element)
        .dxSelectBox(config)
        .dxValidator({
            validationRules: validations,
        })
        .dxSelectBox("instance");
}

function setRadioGroup(element = "", config = {}, validations = []) {
    $(element).dxRadioGroup(config).dxValidator({
        validationRules: validations,
    });
}

function setCheckBox(element = "", config = {}, validations = []) {
    $(element)
        .dxCheckBox(config)
        .dxValidator({
            validationRules: validations,
        })
        .dxCheckBox("instance");
}

function setFileUploader(element = "", config = {}, validations = []) {
    $(element).dxFileUploader(config).dxValidator({
        validationRules: validations,
    });
}

function setTextArea(element = "", config = {}, validations = []) {
    $(element).dxTextArea(config).dxValidator({
        validationRules: validations,
    });
}

function setNumberBox(element = "", config = {}, validations = []) {
    $(element)
        .dxNumberBox(config)
        .dxValidator({
            validationRules: validations,
        })
        .dxNumberBox("instance");
}
//END FIELDS

//BUTTONS
function setButton(element = "", config = {}) {
    $(element).dxButton(config).dxButton("instance");
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
                "El rol que tiene asignado, no tiene permiso para realizar la accion.",
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
        var formData = new FormData();
        formData.append("tasa", key);
        formData.append("monto", value);

        axios
            .post("/convertidor/form/tasa", formData)
            .then((response) => {
                resolve(response.data);
            })
            .catch((error) => {
                reject(error);
            });
    });
}
// END FORMATO DE MONEDAS

// FILTER DATA GRID
function setFilterFieldsDataGrid(result, callback) {
    if (result.sort != null) {
        result.sort.forEach((sort) => {
            sort.selector = callback(sort.selector);
        });
    }

    if (result.filter != null) {
        if (!Array.isArray(result.filter[0])) {
            result.filter[0] = callback(result.filter[0]);
        } else {
            for (var i = 0; i < result.filter.length; i += 2) {
                result.filter[i][0] = callback(result.filter[i][0]);
            }
        }
    }

    return result;
}
// END FILTER DATA GRID

// LOAD PANEL
function loadPanel(id) {
    return $(id)
        .dxLoadPanel({
            shadingColor: "rgba(0,0,0,0.4)",
            position: { my: "center", at: "center", of: window },
            visible: false,
            showIndicator: true,
            showPane: true,
            shading: true,
            hideOnOutsideClick: false,
            message: 'Cargando, por favor espere...',
        })
        .dxLoadPanel("instance");
}
// END LOAD PANEL
