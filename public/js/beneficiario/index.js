var popupBeneficiario;
var popupBeneficiarioList;

$(document).ready(function () {
    /** Visuliazar beneficiarios */
    popupBeneficiario = setPopup("#popupBeneficiario", {
        width: 350,
        height: "auto",
        position: {
            offset: { x: 0, y: -100 },
        },
        visible: false,
        title: "Gestion de Beneficiarios",
        hideOnOutsideClick: true,
        showCloseButton: true,
    });

    /** Listar beneficiarios */
    popupBeneficiarioList = setPopup("#popupBeneficiarioList", {
        width: 350,
        height: "auto",
        position: {
            offset: { x: 0, y: -100 },
        },
        visible: false,
        title: "Seleccionar Beneficiario",
        hideOnOutsideClick: true,
        showCloseButton: true,
    });
});

function viewBeneficiario() {
    popupBeneficiario.show();

    var formBeneficiario = $("#formBeneficiario")
        .dxForm({
            formData: {},
            colCount: 1,
            labelLocation: "top",
            items: [
                {
                    dataField: "nombre",
                    label: { text: "Nombre beneficiario" },
                    editorOptions: {
                        value: "",
                        onValueChanged: function (e) {
                            formBeneficiario.option(
                                "formData.nombreBeneficiario",
                                e.value
                            );
                        },
                    },
                    validationRules: [
                        {
                            type: "required",
                            message: "El campo es requerido",
                        },
                    ],
                },
                {
                    dataField: "cedula",
                    label: { text: "Cedula" },
                    editorOptions: {
                        value: "",
                        mode: "number",
                        onValueChanged: function (e) {
                            formBeneficiario.option(
                                "formData.cedulaBeneficiario",
                                e.value
                            );
                        },
                    },
                    validationRules: [
                        {
                            type: "required",
                            message: "El campo es requerido",
                        },
                    ],
                },
                {
                    dataField: "cuenta",
                    label: { text: "Nro. cuenta" },
                    editorOptions: {
                        value: "",
                        mode: "number",
                        onValueChanged: function (e) {
                            formBeneficiario.option(
                                "formData.cuentaBeneficiario",
                                e.value
                            );
                        },
                    },
                    validationRules: [
                        {
                            type: "required",
                            message: "El campo es requerido",
                        },
                    ],
                },
                {
                    itemType: "button",
                    horizontalAlignment: "left",
                    buttonOptions: {
                        id: "button_save",
                        width: "100%",
                        text: "Guardar",
                        type: "success",
                        onClick: function () {
                            if (formBeneficiario.validate().isValid) {
                                setBeneficiario();
                            }
                        },
                    },
                },
                {
                    itemType: "button",
                    horizontalAlignment: "left",
                    buttonOptions: {
                        id: "button_cancel",
                        width: "100%",
                        text: "Cancelar",
                        onClick: function () {
                            popupBeneficiario.hide();
                        },
                    },
                },
            ],
        })
        .dxForm("instance");
}

function setBeneficiario() {
    var formulario = $("#formBeneficiario")[0];
    var formData = new FormData(formulario);

    axios
        .post("/beneficiario/store/", formData)
        .then((response) => {
            showMessageText(response.data.message);
            popupBeneficiario.hide();
        })
        .catch((error) => {
            handleErrors(error);
        });
}

async function listBeneficiario() {
    popupBeneficiarioList.show();
    var listBeneficiario = await getBeneficiario();

    $("#formBeneficiarioList")
        .dxForm({
            formData: {},
            colCount: 1,
            labelLocation: "top",
            items: [
                {
                    dataField: "beneficiario",
                    editorType: "dxSelectBox",
                    editorOptions: {
                        dataSource: listBeneficiario,
                        displayExpr: "nombre",
                        valueExpr: "id",
                        placeholder: "Seleccionar beneficiario",
                        showClearButton: true,
                        searchEnabled: true,
                        onValueChanged: async function (e) {
                            // Buscar y eliminar campos anteriores por clase CSS
                            $(".custom-field").remove();

                            var details = await showBeneficiario(e.value);

                            if (details.data.id != null) {
                                // Agregar nuevos campos
                                $(
                                    "<div class='custom-field' style='margin-top:20px'>"
                                )
                                    .dxTextBox({
                                        value: details.data.nombre,
                                        readOnly: true,
                                        label: "Nombre",
                                    })
                                    .appendTo("#formBeneficiarioList");

                                $(
                                    "<div class='custom-field' style='margin-top:10px'>"
                                )
                                    .dxTextBox({
                                        value: details.data.cedula,
                                        readOnly: true,
                                        label: "Cedula",
                                    })
                                    .appendTo("#formBeneficiarioList");

                                $(
                                    "<div class='custom-field' style='margin-top:10px'>"
                                )
                                    .dxTextBox({
                                        value: details.data.cuenta,
                                        readOnly: true,
                                        label: "Nro Cuenta",
                                    })
                                    .appendTo("#formBeneficiarioList");

                                $(
                                    "<div class='custom-field' style='margin-top:20px; display: flex; gap: 10px;'>"
                                )
                                    .appendTo("#formBeneficiarioList")
                                    .append(
                                        $("<div style='flex: 1;'>").dxButton({
                                            text: "Marcar",
                                            type: "success",
                                            onClick: function () {
                                                // Almacenar los datos en el localStorage
                                                localStorage.setItem(
                                                    "beneficiario",
                                                    JSON.stringify(details.data)
                                                );
                                                setTextsBeneficiario(
                                                    details.data,
                                                    true
                                                );
                                                popupBeneficiarioList.hide();
                                            },
                                        })
                                    )
                                    .append(
                                        $("<div style='flex: 1;'>").dxButton({
                                            text: "Eliminar",
                                            type: "danger",
                                            onClick: function () {
                                                deleteBeneficiario(
                                                    details.data.id
                                                );
                                            },
                                        })
                                    );
                            }
                        },
                    },
                },
            ],
        })
        .dxForm("instance");
}

function getBeneficiario() {
    return new Promise(async (resolve, reject) => {
        try {
            const response = await axios.get("/beneficiario/get/");
            resolve(response.data);
        } catch (error) {
            handleErrors(error);
            reject(error);
        }
    });
}

function showBeneficiario(id) {
    return new Promise(async (resolve, reject) => {
        try {
            const response = await axios.get("/beneficiario/show/" + id);
            resolve(response.data);
        } catch (error) {
            handleErrors(error);
            reject(error);
        }
    });
}

function deleteBeneficiario(id) {
    axios
        .get("/beneficiario/destroy/" + id)
        .then((response) => {
            showMessageText(response.data.message);
            $(".custom-field").remove();
            popupBeneficiarioList.hide();
        })
        .catch((error) => {
            handleErrors(error);
        });
}

function getUser() {
    return new Promise(async (resolve, reject) => {
        try {
            const response = await axios.get("/users/get/");
            resolve(response.data);
        } catch (error) {
            handleErrors(error);
            reject(error);
        }
    });
}
