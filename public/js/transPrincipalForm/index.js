var radioData = [
    { id: "check_h_si", text: "SI" },
    { id: "check_h_no", text: "NO" },
];

var isTerminosForm1 = false;
var initFields = false;
var datosUsuario = JSON.parse(localStorage.getItem("usuario"));
var datosBeneficiario = JSON.parse(localStorage.getItem("beneficiario"));

$("#payments-view").hide();

$(document).ready(function () {
    initForm1();

    function initForm1() {
        // DATOS DEL BENEFICIARIO
        setButton("#add-beneficiario", {
            icon: "plus",
            hint: "Añadir",
            elementAttr: {
                class: "icon-custom-add",
            },
            onClick() {
                viewBeneficiario();
            },
        });

        setButton("#list-beneficiario", {
            icon: "bulletlist",
            hint: "Listar",
            elementAttr: {
                class: "icon-custom-list",
            },
            onClick() {
                listBeneficiario();
            },
        });

        setButton("#revert-beneficiario", {
            icon: "revert",
            hint: "Limpiar",
            elementAttr: {
                class: "icon-custom-revert",
            },
            onClick() {
                localStorage.removeItem("beneficiario");
                setTextsBeneficiario(null, false);
            },
        });

        // DATOS DEL USUARIO
        setButton("#check-cliente", {
            icon: datosUsuario ? "selectall" : "unselectall",
            hint: "Limpiar",
            elementAttr: {
                class: "icon-custom-select",
            },
            async onClick() {
                var options = $("#check-cliente").dxButton("instance");
                var currentIcon = options.option("icon");
                var newIcon;

                if (currentIcon === "unselectall") {
                    newIcon = "selectall";
                    var data = await getUser();
                    setTextsUsuario(data[0], true);
                } else {
                    newIcon = "unselectall";
                    setTextsUsuario(null, false);
                }

                options.option({
                    icon: newIcon,
                });
            },
        });

        setTextBox(
            "#nombre_b_form1",
            {
                name: "nombre_b_form1",
                placeholder: "NOMBRE DEL BENEFICIARIO",
                value: datosBeneficiario ? datosBeneficiario.nombre : null,
                readOnly: datosBeneficiario ? true : false,
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
                value: datosBeneficiario ? datosBeneficiario.cedula : null,
                readOnly: datosBeneficiario ? true : false,
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
                value: datosBeneficiario ? datosBeneficiario.cuenta : null,
                readOnly: datosBeneficiario ? true : false,
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
                    { text: "V", value: "VENEZOLANO" },
                    { text: "E", value: "ENTIDAD" },
                    { text: "J", value: "JURIDICA" },
                    { text: "P", value: "PASAPORTE" },
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
});

function setTextsBeneficiario(data, read) {
    $("#nombre_b_form1")
        .dxTextBox("instance")
        .option({
            value: data ? data.nombre : null,
            readOnly: read,
        });

    $("#cedula_b_form1")
        .dxTextBox("instance")
        .option({
            value: data ? data.cedula : null,
            readOnly: read,
        });

    $("#nro_cuenta_form1")
        .dxTextBox("instance")
        .option({
            value: data ? data.cuenta : null,
            readOnly: read,
        });
}

function setTextsUsuario(data, read) {
    $("#nombre_d_form1")
        .dxTextBox("instance")
        .option({
            value: data ? data.name : null,
            readOnly: read,
        });

    $("#telefono_d_form1")
        .dxTextBox("instance")
        .option({
            value: data ? data.telefono : null,
            readOnly: read,
        });

    $("#correo_d_form1")
        .dxTextBox("instance")
        .option({
            value: data ? data.email : null,
            readOnly: read,
        });

    $("#identificacion_d_form1")
        .dxTextBox("instance")
        .option({
            value: data ? data.identificacion : null,
            readOnly: read,
        });
}

function capTypePay(key) {
    var gridSpaces = null;
    var gridInfo = null;

    // Limpiamos contenido previo
    if (initFields) {
        $("#monto_recibir_d_form1").dxTextBox("instance").dispose();
        $("#monto_pagar_d_form1").dxTextBox("instance").dispose();
        $("#monto_enviar_d_form1").dxNumberBox("instance").dispose();
    }
    if ($("#check_terminos").dxCheckBox("instance")) {
        $("#check_terminos").dxCheckBox("instance").dispose();
    }
    if ($("#email_d_form1").dxTextBox("instance")) {
        $("#email_d_form1").dxTextBox("instance").dispose();
    }
    if ($("#file_b_form1").dxFileUploader("instance")) {
        $("#file_b_form1").dxFileUploader("instance").dispose();
    }

    // Elementos DOM
    gridSpaces = document.querySelector(".container-type-pay");
    gridInfo = document.querySelector(".container-type-pay-info");
    isTerminosForm1 = false;

    // Definición de HTML y variables comunes
    var newHtml = "";
    var infoHtml = "";
    var tempcHtml = "";
    var cHtml = `
    <div class="form-check">
        <div id="check_terminos"></div>
    </div>
    <div class="row" style="margin-top: 80px">`;

    // Configuración según el tipo de pago
    if (key == "PayPal") {
        [newHtml, tempcHtml, infoHtml] = getPaypalContent(key);
    } else if (key == "Skrill") {
        [newHtml, tempcHtml, infoHtml] = getSkrillContent(key);
    } else if (key == "Bitcoin") {
        [newHtml, tempcHtml, infoHtml] = getBitcoinContent(key);
    } else if (key == "Tehther") {
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
        getPaypalButtons(1, gridSpaces);
    } else if (key == "Skrill") {
        getSkrillButtons(2, gridSpaces);
    } else if (key == "Bitcoin") {
        getBitcoinButtons(3, gridSpaces);
    } else if (key == "Tehther") {
        getTehtherButtons(4, gridSpaces);
    }

    $("#payments-view").show();

    var rows = document.querySelectorAll(".bg-pay");
    rows.forEach(function (row) {
        row.classList.remove("pay-selected");
    });
    var clickedRow = document.getElementById(key);
    clickedRow.querySelector(".bg-pay").classList.add("pay-selected");
    initFields = true;
    sendForm1(key);
}

function sendForm1(key) {
    $("#paymentsForm1")
        .off("submit")
        .on("submit", function (e) {
            e.preventDefault();
            var formulario = $("#paymentsForm1")[0];
            var formData = new FormData(formulario);
            formData.append("tasa", key);
            formData.append("id_moneda", "Bolivar");
            formData.append(
                "monto_convertido",
                $("[name='monto_recibir_d_form1']").val()
            );

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
