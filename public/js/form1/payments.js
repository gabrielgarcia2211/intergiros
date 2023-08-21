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
    setTextBox(
        "#monto_enviar_d_form1",
        {
            name: "monto_enviar_d_form1",
            placeholder: "$ MONTO",
            mode: "number",
            onKeyUp: function (e) {
                devFormatoMoneda(key, e.event.target.value)
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
                        console.error(error);
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
        mode: "number",
        readOnly: true,
    });

    setTextBox("#monto_recibir_d_form1", {
        name: "monto_recibir_d_form1",
        mode: "number",
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
    

    $("#check_terminos").dxCheckBox({
        text: "Al enviar este formulario, usted está aceptando nuestros",
        value: false,
        onValueChanged: function(e) {
            isTerminosForm1 = e.value;
        },
        onContentReady: function (e) {
            var $textContainer = $("<div>")
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

function getSkrillContent(key) {
    if (key !== "Skrill") {
        return ["", "", ""];
    }

    var newHtml = `
        <div class="content">
            <p style="text-align: justify;">Adjunte el pago realizado a nuestra nueva cuenta Skrill:</p>
            <p style="text-align: justify;"><b>silfredocuetocoronado@gmail.com.</b></p>
            <p style="text-align: justify;"><i class="fa-solid fa-image"></i> Subir Comprobante</p>
            <hr>
            <p style="text-align: left;">Tamaño maximo del archivo: 5.72 MB. | Tipo de archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de archivo: 1 | Cantidad minima de archivo: 1</p>
            <hr>
            <input type="file" class="form-control" id="file_form1_b" name="file_form1_b"/>
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

function getBitcoinContent(key) {
    if (key !== "pay-bitcoin") {
        return ["", "", ""]; // Retorna un array vacío si el tipo de pago no es "pay-bitcoin"
    }

    var newHtml = `
        <div class="content">
            <p>Wallet ID a Pagar:</p>
            <p><b>13zsx55DfCQmFgMHQZzEVD4khUzxQEytLp</b></p>
            <img src="../template/images/pays/QRBTC.png" style="width: 16%; padding: 10px;">
            <p style="padding: 4px;background: yellow;text-align: center;color:black">Importante: El monto a cambiar será el monto recibido en nuestra cuenta. Además la transacción será validada una vez que tenga 3 confirmaciones en la blockchain.</p>
            <br>
            <p style="text-align: justify;"><i class="fa-solid fa-image"></i> Subir Comprobante</p>
            <p style="text-align: left;">Tamaño maximo del archivo: 5.72 MB. | Tipo de archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de archivo: 1 | Cantidad minima de archivo: 1</p>
            <hr>
            <input type="file" class="form-control" id="customFile" />
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

function getTehtherContent(key) {
    if (key !== "pay-tehther") {
        return ["", "", ""]; // Retorna un array vacío si el tipo de pago no es "pay-tehther"
    }

    var newHtml = `
        <div class="content">
            <p>Wallet ID a Pagar (TRC20):</p>
            <p><b>TDsZ9w4fSB2iHxnSC7deQc7KDrNhxXjRiU</b></p>
            <img src="../template/images/pays/QRBINANCE.png" style="width: 16%; padding: 10px;">
            <p style="text-align: center;color:black">Recuerde que TRC20 por lo general cobra 1 USDT por transacción.</p>
            <br>
            <p style="text-align: left;color:black">También puede pagar a través de Binance Pay y evitar pago de comisión:</p>
            <br>
            <img src="../template/images/pays/BinancePayQR.png" style="width: 40%;">
            <br>
            <br>
            <p style="text-align: justify;"><i class="fa-solid fa-image"></i> Subir Comprobante</p>
            <p style="text-align: left;">Tamaño maximo del archivo: 5.72 MB. | Tipo de archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de archivo: 1 | Cantidad minima de archivo: 1</p>
            <hr>
            <input type="file" class="form-control" id="customFile" />
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
