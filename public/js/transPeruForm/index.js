var radioData = [
    { id: "check_h_si", text: "SI" },
    { id: "check_h_no", text: "NO" },
];

var tipoMoneda;
var isTerminosForm;
var datosUsuario = JSON.parse(localStorage.getItem("usuario"));
var datosBeneficiario = JSON.parse(localStorage.getItem("beneficiario"));

$("#label_movil_b").hide();
$("#group-view-moneda").hide();

$(document).ready(function () {
    initTransPeruForm();

    function initTransPeruForm() {
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
            "#nombre_b_transPeruForm",
            {
                name: "nombre_b_transPeruForm",
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
            "#cedula_b_transPeruForm",
            {
                name: "cedula_b_transPeruForm",
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

        setTextBox(
            "#nro_cuenta_transPeruForm",
            {
                name: "nro_cuenta_transPeruForm",
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
            "#radio_label_transPeruForm",
            {
                items: [
                    { text: "V", value: "VENEZOLANO" },
                    { text: "E", value: "ENTIDAD" },
                    { text: "J", value: "JURIDICA" },
                    { text: "P", value: "PASAPORTE" },
                ],
                valueExpr: "value",
                layout: "horizontal",
                name: "radio_label_transPeruForm",
            },
            [
                {
                    type: "required",
                    message: "Seleccione un tipo de identificación",
                },
            ]
        );

        setSelectBox(
            "#banco_b_transPeruForm",
            {
                dataSource: [
                    "Banesco Banco Universal",
                    "Banco de Venezuela",
                    "Banco Provincial",
                    "Banco Mercantil",
                    "Banco Occidental de Descuento",
                    "Bancaribe",
                    "Banco Exterior",
                    "Venezolano de Crédito",
                    "Banco Central de Venezuela",
                    "Banco Industrial de Venezuela",
                    "Banco Caroní",
                    "Banco Sofitasa",
                    "Banco Plaza Banco Universal",
                    "Banco de la Gente Emprendedora",
                    "Banco del Pueblo Soberano",
                    "Banco Fondo Común",
                    "100% Banco",
                    "DelSur Banco Universal",
                    "Banco del Tesoro",
                    "Banco Agrícola de Venezuela",
                    "Bancrecer, Banco Microfinanciero",
                    "Mi Banco Banco Microfinanciero",
                    "Banco Activo",
                    "Bancamiga Banco Microfinanciero",
                    "Banco Internacional de Desarrollo",
                    "Banplus Banco Universal",
                    "Banco Bicentenario Banco Universal",
                    "Banco Espirito Santo",
                    "Banco de la Fuerza Armada Nacional Bolivariana",
                    "Citibank",
                    "Banco Nacional de Crédito",
                    "Instituto Municipal de Crédito Popular",
                ],
                placeholder: "- SELECCIONAR BANCO -",
                name: "banco_b_transPeruForm",
            },
            [
                {
                    type: "required",
                    message: "Seleccione un banco de la lista",
                },
            ]
        );

        setRadioGroup(
            "#radio_type_transPeruForm",
            {
                items: [
                    { text: "AHORROS", value: "AHORROS" },
                    { text: "CORRIENTE", value: "CORRIENTE" },
                ],
                valueExpr: "value",
                layout: "horizontal",
                name: "tipo_persona_transPeruForm",
            },
            [
                {
                    type: "required",
                    message: "Seleccione un tipo de cuenta",
                },
            ]
        );

        setRadioGroup(
            "#radio_moneda_transPeruForm",
            {
                items: [
                    { text: "SOLES", value: "5", key: "PeruSol" },
                    { text: "DOLARES", value: "6", key: "PeruDolar" },
                ],
                valueExpr: "value",
                layout: "horizontal",
                name: "tipo_cuenta_transPeruForm",
                onValueChanged: function (e) {
                    var selectedValue = e.value;
                    var selectedItem = this.option("items").find(function (
                        item
                    ) {
                        return item.value === selectedValue;
                    });
                    if (selectedItem) {
                        sendtransPeruForm(selectedItem.key);
                    }
                    tipoMoneda = e;
                    var monedaInput = $("#moneda_b_transPeruForm").dxTextBox(
                        "instance"
                    );
                    $("#valor_b_transPeruForm").html(null);
                    monedaInput.option("visible", true);
                    monedaInput.option("value", "");
                    $("#group-view-moneda").show();
                },
            },
            [
                {
                    type: "required",
                    message: "Seleccione un tipo de moneda",
                },
            ]
        );

        setTextBox(
            "#moneda_b_transPeruForm",
            {
                placeholder: "Ingrese un valor",
                name: "moneda_b_transPeruForm",
                visible: false,
                showClearButton: true,
                showSpinButtons: true,
                min: 0,
                value: null,
                mode: "number",
                onKeyUp: function (e) {
                    devFormatoMoneda(tipoMoneda.value, e.event.target.value)
                        .then((response) => {
                            $("#valor_b_transPeruForm").html(
                                response.data.monto_a_recibir
                            );
                        })
                        .catch((error) => {
                            handleErrors(error);
                        });
                },
            },
            [
                {
                    type: "required",
                    message: "Este campo es obligatorio",
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
                    $("#label_movil_b").show();
                } else {
                    movilInput.option("visible", false);
                    $("#label_movil_b").hide();
                }
            },
        });

        var movilInput = $("#movil_b_transPeruForm")
            .dxNumberBox({
                placeholder: "Ingrese un número",
                name: "movil_b_transPeruForm",
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
            "#nombre_d_transPeruForm",
            {
                name: "nombre_d_transPeruForm",
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
            "#telefono_d_transPeruForm",
            {
                name: "telefono_d_transPeruForm",
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
            "#correo_d_transPeruForm",
            {
                name: "correo_d_transPeruForm",
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

        setTextBox(
            "#identificacion_d_transPeruForm",
            {
                name: "identificacion_d_transPeruForm",
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

        setFileUploader(
            "#file_b_transPeruForm",
            {
                width: "100%",
                labelText:
                    "Arrastra un archivo aquí o haz clic para seleccionar uno",
                selectButtonText: "Seleccionar archivo",
                accept: "*/*",
                uploadMode: "useForm",
                name: "file_b_transPeruForm",
            },
            [
                {
                    type: "required",
                    message: "Se necesita el comprobante para continuar",
                },
            ]
        );

        $("#check_terminos").dxCheckBox({
            text: "Al enviar este formulario, usted está aceptando nuestros",
            value: false,
            onValueChanged: function (e) {
                isTerminosForm = e.value;
            },
            onContentReady: function (e) {
                var $textContainer = $("<div style='line-height: 1.5'>")
                    .addClass("custom-checkbox-text")
                    .appendTo(e.element);

                $("<a>")
                    .attr("href", "../sites/politicas")
                    .attr("target", "_blank")
                    .text("Terminos y Condiciones")
                    .appendTo($textContainer);

                $("<span>")
                    .text(" y otros textos aquí.")
                    .appendTo($textContainer);
            },
        });

        setButton("#btn_send_transPeruForm", {
            text: "Enviar",
            elementAttr: {
                class: "boton-primary",
            },
            useSubmitBehavior: true,
        });
    }
});

function setTextsBeneficiario(data, read) {
    $("#nombre_b_transPeruForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.nombre : null,
            readOnly: read,
        });

    $("#cedula_b_transPeruForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.cedula : null,
            readOnly: read,
        });

    $("#nro_cuenta_transPeruForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.cuenta : null,
            readOnly: read,
        });
}

function setTextsUsuario(data, read) {
    $("#nombre_d_transPeruForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.name : null,
            readOnly: read,
        });

    $("#telefono_d_transPeruForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.telefono : null,
            readOnly: read,
        });

    $("#correo_d_transPeruForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.email : null,
            readOnly: read,
        });

    $("#identificacion_d_transPeruForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.identificacion : null,
            readOnly: read,
        });
}

function sendtransPeruForm(key) {
    $("#paymentstransPeruForm").off("submit");
    $("#paymentstransPeruForm").on("submit", function (e) {
        e.preventDefault();
        var formulario = $("#paymentstransPeruForm")[0];
        var formData = new FormData(formulario);
        formData.append("tasa", key);
        formData.append("id_moneda", "Bolivar");

        if (!isTerminosForm) {
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
