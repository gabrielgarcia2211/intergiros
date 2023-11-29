var buttonsPaypal = false;

function getPaypalContent(key) {
    if (key !== "PayPal") {
        return ["", "", ""];
    }

    newHtml = `
        <div class="content">
            <h4 class="sub-descripction-pay" style="font-size: 15px !important;">Email de Paypal:</h4>
            <p style="text-align: left;">Email de su cuenta de Paypal desde donde realizará el pago:</p>
            <div class="form-group">
                <div id="email_d_form1"></div>
            </div>
        </div>
    `;

    cHtml = `
        <button type="button" class="btn btn-primary" style="margin-top:20px">
            Enviar
        </button>
    </div>`;

    infoHtml = `
        <p style="text-align: justify;">Una vez que des clic en el botón ENVIAR <b>se le redirigirá a una nueva página de pago donde deberá pagar el valor exacto de su cambio.</b> Si tiene dudas por favor <b>comuníquese antes con nosotros</b> y le ayudaremos con mucho gusto <b>a guiarle en completar este proceso de pago.</b></p>
    `;

    return [newHtml, cHtml, infoHtml];
}

function getPaypalButtons(key, gridSpaces) {
    setNumberBox(
        "#monto_enviar_d_form1",
        {
            name: "monto_enviar_d_form1",
            placeholder: "$ MONTO",
            onKeyUp: function (e) {
                let value = e.event.target.value;
                if (value < 5) {
                    return;
                }
                devFormatoMoneda(key, value)
                    .then((response) => {
                        let monto_calculado = response.data;
                        $("[name='monto_recibir_d_form1']").val(
                            monto_calculado["monto_a_recibir"]
                        );
                        $("[name='monto_pagar_d_form1']").val(
                            monto_calculado["monto_a_pagar"]
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
                    if (value < 5) {
                        return false;
                    }
                    return true;
                },
                message: "El valor debe ser igual o mayor que 5",
            },
        ]
    );

    setTextBox("#monto_pagar_d_form1", {
        name: "monto_pagar_d_form1",
        readOnly: true,
    });

    setTextBox("#monto_recibir_d_form1", {
        name: "monto_recibir_d_form1",
        readOnly: true,
    });

    setTextBox(
        "#email_d_form1",
        {
            name: "email_d_form1",
            mode: "email",
        },
        [
            {
                type: "required",
                message: "Este campo es obligatorio",
            },
        ]
    );

    setCheckBox("#check_terminos", {
        text: "Al enviar este formulario, usted está aceptando nuestros",
        value: false,
        onValueChanged: function (e) {
            isTerminosForm1 = e.value;
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

            $("<span>").text(" y otros textos aquí.").appendTo($textContainer);
        },
    });

    setButton(gridSpaces.querySelector("button"), {
        elementAttr: {
            class: "boton-primary",
        },
        useSubmitBehavior: true,
    });

    buttonsPaypal = true;
}

function getSkrillContent(key) {
    if (key !== "Skrill") {
        return ["", "", ""];
    }

    var newHtml = `
        <div class="row">
            <p>Adjunte el pago realizado a nuestra nueva cuenta Skrill:</p>
            <p><b>silfredocuetocoronado@gmail.com.</b></p>
            <p><i class="fa-solid fa-image"></i> Subir Comprobante</p>
            <hr>
            <p>Tamaño maximo del archivo: 5.72 MB. | Tipo de archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de archivo: 1 | Cantidad minima de archivo: 1</p>
            <hr>
        </div>
        <div class="row">
            <div id="file_b_form1"></div>
        </div>
        <br>
    `;

    var cHtml = `
        <button type="button" class="btn btn-primary" style="margin-top:20px">
            Enviar
        </button>
    </div>`;

    var infoHtml = "";

    return [newHtml, cHtml, infoHtml];
}

function getSkrillButtons(key, gridSpaces) {
    setNumberBox(
        "#monto_enviar_d_form1",
        {
            name: "monto_enviar_d_form1",
            placeholder: "$ MONTO",
            onKeyUp: function (e) {
                let value = e.event.target.value;
                if (value < 5) {
                    return;
                }
                devFormatoMoneda(key, value)
                    .then((response) => {
                        let monto_calculado = response.data;
                        $("[name='monto_recibir_d_form1']").val(
                            monto_calculado["monto_a_recibir"]
                        );
                        $("[name='monto_pagar_d_form1']").val(
                            monto_calculado["monto_a_pagar"]
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
                    if (value < 5) {
                        return false;
                    }
                    return true;
                },
                message: "El valor debe ser igual o mayor que 5",
            },
        ]
    );

    setTextBox("#monto_pagar_d_form1", {
        name: "monto_pagar_d_form1",
        readOnly: true,
    });

    setTextBox("#monto_recibir_d_form1", {
        name: "monto_recibir_d_form1",
        readOnly: true,
    });

    setFileUploader(
        "#file_b_form1",
        {
            width: "100%",
            labelText:
                "Arrastra un archivo aquí o haz clic para seleccionar uno",
            selectButtonText: "Seleccionar archivo",
            accept: "*/*",
            uploadMode: "useForm",
            name: "file_b_form1",
        },
        [
            {
                type: "required",
                message: "Se necesita el comprobante para continuar",
            },
        ]
    );

    setCheckBox("#check_terminos", {
        text: "Al enviar este formulario, usted está aceptando nuestros",
        value: false,
        onValueChanged: function (e) {
            isTerminosForm1 = e.value;
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

            $("<span>").text(" y otros textos aquí.").appendTo($textContainer);
        },
    });

    setButton(gridSpaces.querySelector("button"), {
        elementAttr: {
            class: "boton-primary",
        },
        useSubmitBehavior: true,
    });
}

function getBitcoinContent(key) {
    if (key !== "Bitcoin") {
        return ["", "", ""]; // Retorna un array vacío si el tipo de pago no es "Bitcoin"
    }

    var newHtml = `
        <div class="content">
            <p>Wallet ID a Pagar:</p>
            <p><b>13zsx55DfCQmFgMHQZzEVD4khUzxQEytLp</b></p>
            <img src="../template/images/pays/QRBTC.png" style="width: 16%; padding: 10px;">
            <p style="padding: 4px;background: yellow;text-align: center;color:black">Importante: El monto a cambiar será el monto recibido en nuestra cuenta. Además la transacción será validada una vez que tenga 3 confirmaciones en la blockchain.</p>
            <br>
            <p"><i class="fa-solid fa-image"></i> Subir Comprobante</p>
            <p style="text-align: left;">Tamaño maximo del archivo: 5.72 MB. | Tipo de archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de archivo: 1 | Cantidad minima de archivo: 1</p>
            <hr>
            <div class="row">
                <div id="file_b_form1"></div>
            </div>
        </div>
    `;

    var cHtml = `
        <button type="button" class="btn btn-primary" style="margin-top:20px">
            Enviar
        </button>
    </div>`;

    var infoHtml = "";

    return [newHtml, cHtml, infoHtml];
}

function getBitcoinButtons(key, gridSpaces) {
    setNumberBox(
        "#monto_enviar_d_form1",
        {
            name: "monto_enviar_d_form1",
            placeholder: "$ MONTO",
            onKeyUp: function (e) {
                let value = e.event.target.value;
                if (value < 5) {
                    return;
                }
                devFormatoMoneda(key, value)
                    .then((response) => {
                        let monto_calculado = response.data;
                        $("[name='monto_recibir_d_form1']").val(
                            monto_calculado["monto_a_recibir"]
                        );
                        $("[name='monto_pagar_d_form1']").val(
                            monto_calculado["monto_a_pagar"]
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
                    if (value < 5) {
                        return false;
                    }
                    return true;
                },
                message: "El valor debe ser igual o mayor que 5",
            },
        ]
    );

    setTextBox("#monto_pagar_d_form1", {
        name: "monto_pagar_d_form1",
        readOnly: true,
    });

    setTextBox("#monto_recibir_d_form1", {
        name: "monto_recibir_d_form1",
        readOnly: true,
    });

    setFileUploader(
        "#file_b_form1",
        {
            width: "100%",
            labelText:
                "Arrastra un archivo aquí o haz clic para seleccionar uno",
            selectButtonText: "Seleccionar archivo",
            accept: "*/*",
            uploadMode: "useForm",
            name: "file_b_form1",
        },
        [
            {
                type: "required",
                message: "Se necesita el comprobante para continuar",
            },
        ]
    );

    setCheckBox("#check_terminos", {
        text: "Al enviar este formulario, usted está aceptando nuestros",
        value: false,
        onValueChanged: function (e) {
            isTerminosForm1 = e.value;
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

            $("<span>").text(" y otros textos aquí.").appendTo($textContainer);
        },
    });

    setButton(gridSpaces.querySelector("button"), {
        elementAttr: {
            class: "boton-primary",
        },
        useSubmitBehavior: true,
    });
}

function getTehtherContent(key) {
    if (key !== "Tehther") {
        return ["", "", ""]; // Retorna un array vacío si el tipo de pago no es "Tehther"
    }

    var newHtml = `
        <div class="content">
            <p>Wallet ID a Pagar (TRC20):</p>
            <p><b>TDsZ9w4fSB2iHxnSC7deQc7KDrNhxXjRiU</b></p>
            <img src="../template/images/pays/QRBINANCE.png" style="width: 16%; padding: 10px;">
            <p style="text-align: center;color:black">Recuerde que TRC20 por lo general cobra 1 USDT por transacción.</p>
            <br>
            <p style="color:black">También puede pagar a través de Binance Pay y evitar pago de comisión:</p>
            <br>
            <img src="../template/images/pays/BinancePayQR.png" style="width: 40%;">
            <br>
            <br>
            <p><i class="fa-solid fa-image"></i> Subir Comprobante</p>
            <p style="text-align: left;">Tamaño maximo del archivo: 5.72 MB. | Tipo de archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de archivo: 1 | Cantidad minima de archivo: 1</p>
            <hr>
            <div class="row">
                <div id="file_b_form1"></div>
            </div>
        </div>
    `;

    var cHtml = `
        <button type="button" class="btn btn-primary" style="margin-top:20px">
            Enviar
        </button>
    </div>`;

    var infoHtml = "";

    return [newHtml, cHtml, infoHtml];
}

function getTehtherButtons(key, gridSpaces) {
    setNumberBox(
        "#monto_enviar_d_form1",
        {
            name: "monto_enviar_d_form1",
            placeholder: "$ MONTO",
            onKeyUp: function (e) {
                let value = e.event.target.value;
                if (value < 5) {
                    return;
                }
                devFormatoMoneda(key, value)
                    .then((response) => {
                        let monto_calculado = response.data;
                        $("[name='monto_recibir_d_form1']").val(
                            monto_calculado["monto_a_recibir"]
                        );
                        $("[name='monto_pagar_d_form1']").val(
                            monto_calculado["monto_a_pagar"]
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
                    if (value < 5) {
                        return false;
                    }
                    return true;
                },
                message: "El valor debe ser igual o mayor que 5",
            },
        ]
    );

    setTextBox("#monto_pagar_d_form1", {
        name: "monto_pagar_d_form1",
        readOnly: true,
    });

    setTextBox("#monto_recibir_d_form1", {
        name: "monto_recibir_d_form1",
        readOnly: true,
    });

    setFileUploader(
        "#file_b_form1",
        {
            width: "100%",
            labelText:
                "Arrastra un archivo aquí o haz clic para seleccionar uno",
            selectButtonText: "Seleccionar archivo",
            accept: "*/*",
            uploadMode: "useForm",
            name: "file_b_form1",
        },
        [
            {
                type: "required",
                message: "Se necesita el comprobante para continuar",
            },
        ]
    );

    setCheckBox("#check_terminos", {
        text: "Al enviar este formulario, usted está aceptando nuestros",
        value: false,
        onValueChanged: function (e) {
            isTerminosForm1 = e.value;
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

            $("<span>").text(" y otros textos aquí.").appendTo($textContainer);
        },
    });

    setButton(gridSpaces.querySelector("button"), {
        elementAttr: {
            class: "boton-primary",
        },
        useSubmitBehavior: true,
    });
}

function getZinliContent(key) {
    if (key !== "Zinli") {
        return ["", "", ""]; // Retorna un array vacío si el tipo de pago no es "Zinli"
    }

    var newHtml = `
        <div class="content">
            <p>Haz el pago Zinli escaneando el siquiente código QR:</p>
            <img src="../template/images/pays/QR-Zinli-AR.jpg" style="width: 16%; padding: 10px;">
            <p>A nombre de: <b>Anagabriela Rujano</b></p>
            <br>
            <p style="padding: 4px;background: yellow;text-align: center;color:black">
            Importante: Al realizar el pago no colocar nada referente a cambio de divisas.
            <br>
            Luego de realizar el pago guarda el comprobante para adjuntarlo.</p>
            <br>
            <p"><i class="fa-solid fa-image"></i> Subir Comprobante</p>
            <p style="text-align: left;">Tamaño maximo del archivo: 5.72 MB. | Tipo de archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de archivo: 1 | Cantidad minima de archivo: 1</p>
            <hr>
            <div class="row">
                <div id="file_b_form1"></div>
            </div>
        </div>
    `;

    var cHtml = `
        <button type="button" class="btn btn-primary" style="margin-top:20px">
            Enviar
        </button>
    </div>`;

    var infoHtml = "";

    return [newHtml, cHtml, infoHtml];
}

function getZinliButtons(key, gridSpaces) {
    setNumberBox(
        "#monto_enviar_d_form1",
        {
            name: "monto_enviar_d_form1",
            placeholder: "$ MONTO",
            onKeyUp: function (e) {
                let value = e.event.target.value;
                if (value < 5) {
                    return;
                }
                devFormatoMoneda(key, value)
                    .then((response) => {
                        let monto_calculado = response.data;
                        $("[name='monto_recibir_d_form1']").val(
                            monto_calculado["monto_a_recibir"]
                        );
                        $("[name='monto_pagar_d_form1']").val(
                            monto_calculado["monto_a_pagar"]
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
                    if (value < 5) {
                        return false;
                    }
                    return true;
                },
                message: "El valor debe ser igual o mayor que 5",
            },
        ]
    );

    setTextBox("#monto_pagar_d_form1", {
        name: "monto_pagar_d_form1",
        readOnly: true,
    });

    setTextBox("#monto_recibir_d_form1", {
        name: "monto_recibir_d_form1",
        readOnly: true,
    });

    setFileUploader(
        "#file_b_form1",
        {
            width: "100%",
            labelText:
                "Arrastra un archivo aquí o haz clic para seleccionar uno",
            selectButtonText: "Seleccionar archivo",
            accept: "*/*",
            uploadMode: "useForm",
            name: "file_b_form1",
        },
        [
            {
                type: "required",
                message: "Se necesita el comprobante para continuar",
            },
        ]
    );

    setCheckBox("#check_terminos", {
        text: "Al enviar este formulario, usted está aceptando nuestros",
        value: false,
        onValueChanged: function (e) {
            isTerminosForm1 = e.value;
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

            $("<span>").text(" y otros textos aquí.").appendTo($textContainer);
        },
    });

    setButton(gridSpaces.querySelector("button"), {
        elementAttr: {
            class: "boton-primary",
        },
        useSubmitBehavior: true,
    });
}
