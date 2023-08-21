var radioData = [
    { id: "check_h_si", text: "SI" },
    { id: "check_h_no", text: "NO" },
];

var isTerminosForm1 = false;

$("#payments-view").hide();

$(document).ready(function () {
    initForm1();

    function initForm1() {
        // DATOS DEL BENEFICIARIO
        setButton("#add-beneficiario", {
            icon: "plus",
            elementAttr: {
                class: "icon-custom-style",
            },
            onClick() {
                viewBeneficiario();
            },
        });

        setTextBox(
            "#nombre_b_form1",
            {
                name: "nombre_b_form1",
                placeholder: "NOMBRE DEL BENEFICIARIO",
            },
            [
                {
                    type: "required",
                    message: "Este campo es obligatorio",
                },
            ]
        );

        setTextBox(
            "#cedula_b_form1",
            {
                name: "cedula_b_form1",
                placeholder: "CEDULA",
                mode: "number",
            },
            [
                {
                    type: "required",
                    message: "Este campo es obligatorio",
                },
            ]
        );

        setSelectBox(
            "#banco_b_form1",
            {
                dataSource: [
                    "- SELECCIONAR BANCO -",
                    "BANESCO",
                    "MERCANTIL",
                    "BBVA PROVINCIAL",
                    "BANCO DE VENEZUELA",
                    "BANCO BICENTENARIO",
                    "BANPLUS",
                    "100% BANCO",
                    "BANCO NACIONAL DE CREDITO",
                    "BANCARIBE",
                    "BANCO EXTERIOR",
                    "BANCO DEL TESORO",
                    "OTRO",
                ],
                placeholder: "- SELECCIONAR BANCO -",
                name: "banco_b_form1",
            },
            [
                {
                    type: "required",
                    message: "Seleccione un banco de la lista",
                },
            ]
        );

        setTextBox(
            "#nro_cuenta_form1",
            {
                name: "nro_cuenta_form1",
                placeholder: "NRO DE CUENTA",
                mode: "number",
            },
            [
                {
                    type: "required",
                    message: "Este campo es obligatorio",
                },
            ]
        );

        setRadioGroup(
            "#radio_label_form1",
            {
                items: [
                    { text: "V", value: "V" },
                    { text: "E", value: "E" },
                    { text: "J", value: "J" },
                    { text: "P", value: "P" },
                ],
                valueExpr: "value",
                layout: "horizontal",
                name: "tipo_persona_form1",
            },
            [
                {
                    type: "required",
                    message: "Seleccione un tipo de identificación",
                },
            ]
        );

        setRadioGroup(
            "#radio_type_form1",
            {
                items: [
                    { text: "AHORROS", value: "AHORROS" },
                    { text: "CORRIENTE", value: "CORRIENTE" },
                ],
                valueExpr: "value",
                layout: "horizontal",
                name: "tipo_cuenta_form1",
            },
            [
                {
                    type: "required",
                    message: "Seleccione un tipo de cuenta",
                },
            ]
        );

        setRadioGroup("#radio_type_movil", {
            dataSource: radioData,
            displayExpr: "text",
            valueExpr: "id",
            layout: "horizontal",
            onValueChanged: function (e) {
                if (e.value === "check_h_si") {
                    movilInput.option("visible", true);
                } else {
                    movilInput.option("visible", false);
                }
            },
        });

        var movilInput = $("#movil_b_form1")
            .dxNumberBox({
                placeholder: "Ingrese un número",
                name: "movil_b_form1",
                visible: false,
                showClearButton: true,
                showSpinButtons: true,
                min: 0,
                value: null,
                validationRules: [
                    { type: "required", message: "Ingrese un número" },
                ],
            })
            .dxNumberBox("instance");

        // DATOS DEL DEPOSITANTE
        setTextBox(
            "#nombre_d_form1",
            {
                name: "nombre_d_form1",
                placeholder: "TU NOMBRE",
            },
            [
                {
                    type: "required",
                    message: "Este campo es obligatorio",
                },
            ]
        );

        setTextBox(
            "#telefono_d_form1",
            {
                name: "telefono_d_form1",
                placeholder: "TU TELEFONO",
                mode: "number",
            },
            [
                {
                    type: "required",
                    message: "Este campo es obligatorio",
                },
            ]
        );

        setTextBox(
            "#correo_d_form1",
            {
                name: "correo_d_form1",
                placeholder: "TU CORREO ELECTRONICO",
                mode: "email",
            },
            [
                {
                    type: "required",
                    message: "Este campo es obligatorio",
                },
            ]
        );

        setSelectBox(
            "#pais_d_form1",
            {
                dataSource: [
                    "VENEZUELA",
                    "COLOMBIA",
                    "ECUADOR",
                    "PERÚ",
                    "PANAMÁ",
                    "ARGENTINA",
                    "CHILE",
                    "BOLIVIA",
                    "BRASIL",
                    "URUGUAY",
                    "PARAGUAY",
                    "MEXICO",
                    "USA",
                    "ESPAÑA",
                    "OTRO",
                ],
                placeholder: "- SELECCIONAR UN PAIS -",
                name: "pais_d_form1",
            },
            [
                {
                    type: "required",
                    message: "Seleccione un pais de la lista",
                },
            ]
        );

        setTextBox(
            "#identificacion_d_form1",
            {
                name: "identificacion_d_form1",
                placeholder: "TU IDENTIFICACION",
                mode: "number",
            },
            [
                {
                    type: "required",
                    message: "Este campo es obligatorio",
                },
            ]
        );

        setTextBox("#instagram_d_form1", {
            name: "instagram_d_form1",
            placeholder: "INSTAGRAM (opcional)",
        });
    }

    const popupBeneficiario = setPopup("#popupBeneficiario", {
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
});

function cap_type_pay(key) {
    // Elementos DOM
    const gridSpaces = document.querySelector(".container-type-pay");
    const gridInfo = document.querySelector(".container-type-pay-info");

    // Limpiar campos
    $("#monto_enviar_d_form1").val(null);
    $("#monto_pagar_d_form1").val(null);
    $("#monto_recibir_d_form1").val(null);

    // Definición de HTML y variables comunes
    var newHtml = "";
    var infoHtml = "";
    var tempcHtml = "";
    var cHtml = `
    <div class="form-check">
            <div id="check_terminos"></div>
        </div> 
    </div>
    <div class="row" style="margin-top: 80px">`;

    // Configuración según el tipo de pago
    if (key == "PayPal") {
        [newHtml, tempcHtml, infoHtml] = getPaypalContent(key);
    } else if (key == "Skrill") {
        [newHtml, tempcHtml, infoHtml] = getSkrillContent(key);
    } else if (key == "pay-bitcoin") {
        [newHtml, tempcHtml, infoHtml] = getBitcoinContent(key);
    } else if (key == "pay-tehther") {
        [newHtml, tempcHtml, infoHtml] = getTehtherContent(key);
    }

    cHtml = cHtml + tempcHtml;

    // Combinar HTML y configuración
    newHtml = newHtml + cHtml;

    // Actualizar elementos DOM
    gridSpaces.innerHTML = newHtml;
    gridInfo.innerHTML = infoHtml;

    // Configuración botones extra
    if (key == "PayPal") {
        getPaypalButtons(key, gridSpaces);
    } else if (key == "Skrill") {
    } else if (key == "pay-bitcoin") {
    } else if (key == "pay-tehther") {
    }

    $("#payments-view").show();

    var rows = document.querySelectorAll(".bg-pay");
    rows.forEach(function (row) {
        row.classList.remove("pay-selected");
    });
    var clickedRow = document.getElementById(key);
    clickedRow.querySelector(".bg-pay").classList.add("pay-selected");
    sendForm1(key);
}

function sendForm1(key) {
    $("#paymentsForm1").off("submit");
    $("#paymentsForm1").on("submit", function (e) {
        e.preventDefault();
        var formulario = $("#paymentsForm1")[0];
        var formData = new FormData(formulario);
        formData.append("tasa", key);

        if (!isTerminosForm1) {
            showMessageText(
                "Debe aceptar los terminos y condiciones",
                "warning"
            );
            return;
        }
        axios
            .post("/formulario/store/", formData)
            .then((response) => {
                showMessageText(response.data.message);
            })
            .catch((error) => {
                handleErrors(error);
            });
    });
}
