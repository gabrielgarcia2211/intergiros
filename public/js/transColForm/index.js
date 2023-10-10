var isFormKey = {
    key: 7,
    value: "ColombiaBolivar",
};
var isTerminosForm = false;
var datosUsuario = JSON.parse(localStorage.getItem("usuario"));
var datosBeneficiario = JSON.parse(localStorage.getItem("beneficiario"));
var montoRecibirTransColForm = "";
var popupPanel = "";

$(document).ready(function () {
    initTransColForm();

    popupPanel = loadPanel("#loadpanel");

    function initTransColForm() {
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
            "#nombre_b_transColForm",
            {
                name: "nombre_b_transColForm",
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
            "#cedula_b_transColForm",
            {
                name: "cedula_b_transColForm",
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
            "#nro_cuenta_transColForm",
            {
                name: "nro_cuenta_transColForm",
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
            "#radio_label_transColForm",
            {
                items: [
                    { text: "V", value: "VENEZOLANO" },
                    { text: "E", value: "ENTIDAD" },
                    { text: "J", value: "JURIDICA" },
                    { text: "P", value: "PASAPORTE" },
                ],
                valueExpr: "value",
                layout: "horizontal",
                name: "radio_label_transColForm",
            },
            [
                {
                    type: "required",
                    message: "Seleccione un tipo de identificación",
                },
            ]
        );

        setSelectBox(
            "#banco_b_transColForm",
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
                name: "banco_b_transColForm",
            },
            [
                {
                    type: "required",
                    message: "Seleccione un banco de la lista",
                },
            ]
        );

        setRadioGroup(
            "#radio_type_transColForm",
            {
                items: [
                    { text: "AHORROS", value: "AHORROS" },
                    { text: "CORRIENTE", value: "CORRIENTE" },
                ],
                valueExpr: "value",
                layout: "horizontal",
                name: "radio_type_transColForm",
            },
            [
                {
                    type: "required",
                    message: "Seleccione un tipo de cuenta",
                },
            ]
        );

        // DATOS DEL DEPOSITANTE
        setTextBox(
            "#nombre_d_transColForm",
            {
                name: "nombre_d_transColForm",
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
            "#telefono_d_transColForm",
            {
                name: "telefono_d_transColForm",
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
            "#correo_d_transColForm",
            {
                name: "correo_d_transColForm",
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
            "#identificacion_d_transColForm",
            {
                name: "identificacion_d_transColForm",
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

        setNumberBox(
            "#monto_enviar_d_transColForm",
            {
                name: "monto_enviar_d_transColForm",
                placeholder: "$ MONTO",
                onKeyUp: function (e) {
                    let value = e.event.target.value;
                    if (value < 10000) {
                        return;
                    }
                    devFormatoMoneda(isFormKey.key, value)
                        .then((response) => {
                            montoRecibirTransColForm = response.data.monto_a_recibir;
                            $("#conversion_transColForm").html(
                                "$" + response.data.monto_a_recibir
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
                {
                    type: "custom",
                    validationCallback: function (options) {
                        const value = options.value;
                        if (value < 10000) {
                            return false;
                        }
                        return true;
                    },
                    message:
                        "Por favor ingrese un valor mayor o igual a 10000.",
                },
            ]
        );

        setFileUploader(
            "#file_b_transColForm",
            {
                width: "100%",
                labelText:
                    "Arrastra un archivo aquí o haz clic para seleccionar uno",
                selectButtonText: "Seleccionar archivo",
                accept: "*/*",
                uploadMode: "useForm",
                name: "file_b_transColForm",
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

        setButton("#btn_send_transColForm", {
            text: "Enviar",
            elementAttr: {
                class: "boton-primary",
            },
            useSubmitBehavior: true,
        });

        sendtransColForm(isFormKey.value);
    }
});

function setTextsBeneficiario(data, read) {
    $("#nombre_b_transColForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.nombre : null,
            readOnly: read,
        });

    $("#cedula_b_transColForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.cedula : null,
            readOnly: read,
        });

    $("#nro_cuenta_transColForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.cuenta : null,
            readOnly: read,
        });
}

function setTextsUsuario(data, read) {
    $("#nombre_d_transColForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.name : null,
            readOnly: read,
        });

    $("#telefono_d_transColForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.telefono : null,
            readOnly: read,
        });

    $("#correo_d_transColForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.email : null,
            readOnly: read,
        });

    $("#identificacion_d_transColForm")
        .dxTextBox("instance")
        .option({
            value: data ? data.identificacion : null,
            readOnly: read,
        });
}

function sendtransColForm(key) {
    $("#paymentstransColForm").off("submit");
    $("#paymentstransColForm").on("submit", function (e) {
        e.preventDefault();
        popupPanel.show();
        var formulario = $("#paymentstransColForm")[0];
        var formData = new FormData(formulario);
        formData.append("tasa", key);
        formData.append("id_moneda", "Bolivar");
        formData.append("monto_convertido", montoRecibirTransColForm);

        if (!isTerminosForm) {
            showMessageText(
                "Debe aceptar los terminos y condiciones",
                "warning"
            );
            popupPanel.hide();
            return;
        }
        axios
            .post("/formulario/store", formData)
            .then((response) => {
                showMessageText(response.data.message);
                popupPanel.hide();
            })
            .catch((error) => {
                handleErrors(error);
                popupPanel.hide();
            });
    });
}
