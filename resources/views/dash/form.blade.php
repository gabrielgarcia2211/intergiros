<section id="detail" class="parallax-section">
    <div class="row" style="margin-right: 0px;">
        <div class="col">
            <!--  Wizard container  -->
            <div class="container" style="padding-right: 0px;">
                <div class="card-wiz wizard-card" data-color="blue" id="wizard">

                    <div class="wizard-navigation">
                        <ul>
                            <li>
                                <a href="#pedidos" data-toggle="tab">Pedidos Bolivares</a><i
                                    class="icon fa-sharp fa-solid fa-money-bill"></i>
                            </li>
                            {{-- <li>
                                <a href="#recarga_off" data-toggle="tab_off">Recarga de Saldo Paypal</a><i
                                    class="icon fa-brands fa-paypal"></i>
                            </li>
                            <li>
                                <a href="#recarga_skirll_off" data-toggle="tab_off">Recarga de Saldo Skirll</a><i
                                    class="icon fa-solid fa-dollar-sign"></i>
                            </li>
                            <li>
                                <a href="#recarga_bolivares_off" data-toggle="tab_off">Compramos tus Bolivares</a><i
                                    class="icon fa-sharp fa-solid fa-money-bill"></i>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="tab-content">
                        <!--PANEL 1-->
                        <div class="tab-pane" id="pedidos">
                            <form id="paymentsForm1">
                                @csrf
                                <div>
                                    <div class="col-sm-12">
                                        <h4 class="info-text">
                                            ¡Haz hoy tu pedido de Bolívares!
                                        </h4>
                                        <h4 class="description">
                                            Llena el siguiente formulario y haz tu pago con
                                            Paypal, Skrill, Bitcoin o USDT. Monto mínimo de envío:
                                            $5.
                                        </h4>
                                    </div>
                                </div>
                                <div class="containt-formu">
                                    <h4 class="info-text">
                                        FORMULARIO DE PEDIDO DE BOLÍVARES
                                        <p>
                                            Ingrese cuidadosamente sus datos para realizar su
                                            pedido de bolívares.
                                        </p>
                                    </h4>
                                    <div class="row">
                                        <h4 class="sub-descripction">
                                            DATOS DEL BENEFICIARIO:
                                        </h4>
                                        <div style="float: right; margin-right:20px; margin-bottom:20px">
                                            <div id="add-beneficiario"></div>
                                            <div id="list-beneficiario"></div>
                                            <div id="revert-beneficiario"></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div id="nombre_b_form1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div id="cedula_b_form1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div id="banco_b_form1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div id="nro_cuenta_form1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container" style="width: 100%; margin-top:20px">
                                        <div id="radio_label_form1"></div>
                                    </div>
                                    <div class="container" style="width: 100%; margin-top:20px">
                                        <div id="radio_type_form1"></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <p class="descripcion-formu">
                                                ¿Su cuenta bancaria tiene habilitada la opción de
                                                Pago Móvil?
                                            </p>
                                            <p class="descripcion-formu-content"
                                                style="width: 100%; text-align: justify;">
                                                En caso no tengamos disponibilidad en el banco que
                                                ha elegido y nos brinda sus datos de pago móvil, le
                                                realizaremos su transferencia por medio de este
                                                método.
                                            </p>
                                            <div id="radio_type_movil"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container col-sm-6" style="margin-top: 20px">
                                            <div id="movil_b_form1"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h4 class="sub-descripction">
                                            DATOS DEL DEPOSITANTE:
                                        </h4>
                                        <div style="float: right; margin-right:20px; margin-bottom:20px">
                                            <div id="check-cliente"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div id="nombre_d_form1"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div id="telefono_d_form1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div id="identificacion_d_form1"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div id="correo_d_form1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div id="pais_d_form1"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div id="pais_d_form1"></div>
                                            <div class="form-group">
                                                <div id="instagram_d_form1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h4 class="sub-descripction">DATOS DE ENVIÓ:</h4>
                                        <div class="col-sm-4 float-left">
                                            <div class="row">
                                                <a id="PayPal" onclick="capTypePay(id)"><img class="bg-pay"
                                                        src="{{ asset('template/images/paypal_b.png') }}"
                                                        align="center" /></a>
                                            </div>
                                            <div class="row">
                                                <a id="Skrill" onclick="capTypePay(id)"><img class="bg-pay"
                                                        src="{{ asset('template/images/skrill_b.png') }}"
                                                        align="center" /></a>
                                            </div>
                                            {{-- <div class="row">
                                                <a id="Bitcoin" onclick="capTypePay(id)"><img class="bg-pay"
                                                        src="{{ asset('template/images/bitcoin_b.png') }}"
                                                        align="center" /></a>
                                            </div> --}}
                                            <div class="row">
                                                <a id="Zinli" onclick="capTypePay(id)"><img class="bg-pay"
                                                        src="{{ asset('template/images/zinli.png') }}"
                                                        align="center" /></a>
                                            </div>
                                            <div class="row">
                                                <a id="Tehther" onclick="capTypePay(id)"><img class="bg-pay"
                                                        src="{{ asset('template/images/tehther_b.png') }}"
                                                        align="center" /></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 float-right" id="payments-view">
                                            <div class="form-group">
                                                <h4 class="sub-descripction-pay">MONTO A ENVIAR:</h4>
                                                <div id="monto_enviar_d_form1"></div>
                                            </div>
                                            <h4 class="sub-descripction-pay">MONTO A PAGAR:</h4>
                                            <div class="input-group">
                                                <span class="input-group-addon input-cant">$</span>
                                                <div id="monto_pagar_d_form1"></div>
                                            </div>
                                            <h4 class="sub-descripction-pay">MONTO A RECIBIR:</h4>
                                            <div class="input-group">
                                                <span class="input-group-addon input-cant">Bs</span>
                                                <div id="monto_recibir_d_form1"></div>
                                            </div>
                                            <div class="container-type-pay-info" style="margin-top: 20px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="container-type-pay">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--PANEL 2-->
                        <div class="tab-pane" id="recarga">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="info-text">
                                        ¡Recarga tu Saldo de PayPal!
                                    </h4>
                                    <h4 class="description">
                                        Llena el siguiente formulario y haz tu Recarga de PayPal. Comisión: 18%
                                        (asumimos la comisión de PayPal).
                                        Monto mínimo de recarga: $5.
                                    </h4>
                                </div>
                            </div>
                            <div class="containt-formu">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Nombre del Beneficiario:
                                        </h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id=""
                                                placeholder="BENEFICIARIO" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Cuenta de PayPal a Recargar:
                                        </h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id=""
                                                placeholder="DIRECCION EMAIL" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            País de donde realizará el pago de la recarga:
                                        </h4>
                                        <div class="form-group">
                                            <select class="form-control" id="select_payapl_pais"
                                                onchange="paypal_pais();">
                                                <option disabled="" selected="">
                                                    - SELECCIONAR PAIS -
                                                </option>
                                                <option value="paypal_venezuela">VENEZUELA</option>
                                                <option value="paypal_peru">PERÚ</option>
                                                <option value="paypal_ecuador">ECUADOR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5px !important;">
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Monto a recargar:
                                        </h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id=""
                                                placeholder="$ MONTO EN USD" />
                                        </div>
                                    </div>
                                    <div class="paypal-pais-view">

                                    </div>
                                </div>
                                <div class="row">
                                    <h4 class="sub-descripction">DATOS DEL SOLICITANTE:</h4>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Nombre del Solicitante:
                                        </h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id=""
                                                placeholder="SOLICITANTE" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Email del Solicitante:
                                        </h4>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id=""
                                                placeholder="DIRECCION EMAIL" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Teléfono del Solicitante
                                        </h4>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id=""
                                                placeholder="NRO TELEFONO" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <br>
                                        <p style="text-align: justify;"><i class="fa-solid fa-image"></i> Si ya
                                            Realizó el Pago Adjunte el Comprobante</p>
                                        <hr>
                                        <p style="text-align: left;">Tamaño maximo del archivo: 5.72 MB. | Tipo
                                            de archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de
                                            archivo: 1 | Cantidad minima de archivo: 1</p>
                                        <hr>
                                        <input type="file" class="form-control" id="customFile" />
                                    </div>
                                </div>
                                <div class="row">
                                    <br>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" style="width: 100%;">
                                            Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--PANEL 3-->
                        <div class="tab-pane" id="recarga_skirll">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="info-text">
                                        ¡Recarga tu Saldo de Skrill!
                                    </h4>
                                    <h4 class="description">
                                        Llena el siguiente formulario y haz tu Recarga de Skrill. Comisión: 18%
                                        (asumimos la comisión de Skrill). Monto mínimo de recarga: $5.
                                    </h4>
                                </div>
                            </div>
                            <div class="containt-formu">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Nombre del Beneficiario:
                                        </h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id=""
                                                placeholder="BENEFICIARIO" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Cuenta de Skrill a Recargar:
                                        </h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id=""
                                                placeholder="DIRECCION EMAIL" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            País de donde realizará el pago de la recarga:
                                        </h4>
                                        <div class="form-group">
                                            <select class="form-control" id="select_skirll_pais"
                                                onchange="skirll_pais();">
                                                <option disabled="" selected="">
                                                    - SELECCIONAR PAIS -
                                                </option>
                                                <option value="skirll_venezuela">VENEZUELA</option>
                                                <option value="skirll_peru">PERÚ</option>
                                                <option value="skirll_ecuador">ECUADOR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Monto a recargar:
                                        </h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id=""
                                                placeholder="$ MONTO EN USD" />
                                        </div>
                                    </div>
                                    <div class="skirll-pais-view">

                                    </div>
                                </div>
                                <div class="row">
                                    <h4 class="sub-descripction">DATOS DEL SOLICITANTE:</h4>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Nombre del Solicitante:
                                        </h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id=""
                                                placeholder="SOLICITANTE" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Email del Solicitante:
                                        </h4>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id=""
                                                placeholder="DIRECCION EMAIL" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            Teléfono del Solicitante
                                        </h4>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id=""
                                                placeholder="NRO TELEFONO" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <br>
                                        <p style="text-align: justify;"><i class="fa-solid fa-image"></i> Si ya
                                            Realizó el Pago Adjunte el Comprobante</p>
                                        <hr>
                                        <p style="text-align: left;">Tamaño maximo del archivo: 5.72 MB. | Tipo
                                            de archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de
                                            archivo: 1 | Cantidad minima de archivo: 1</p>
                                        <hr>
                                        <input type="file" class="form-control" id="customFile" />
                                    </div>
                                </div>
                                <div class="row">
                                    <br>
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" style="width: 100%;">
                                            Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--PANEL 4-->
                        <div class="tab-pane" id="recarga_bolivares">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="info-text">
                                        ¡Compramos tus Bolívares!
                                    </h4>
                                    <h4 class="description">
                                        Vende tus bolívares en Perú, Ecuador y Colombia. Te transferimos a tu
                                        cuenta bancaria en moneda local.
                                    </h4>
                                </div>
                            </div>
                            <div class="containt-formu">
                                <h4 class="info-text">
                                    FORMULARIO DE COMPRA DE BOLÍVARES
                                    <p class="warning">
                                        Ingrese cuidadosamente sus datos, compramos tus bolívares en Perú,
                                        Ecuador y Colombia.
                                    </p>
                                </h4>
                                <div class="row">
                                    <h4 class="sub-descripction">
                                        DATOS DEL BENEFICIARIO:
                                    </h4>
                                    <div class="col-sm-6">
                                        <h4 class="sub-descripction-label">
                                            NOMBRE COMPLETO
                                        </h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id=""
                                                placeholder="NOMBRE Y APELLIDO" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4 class="sub-descripction-label">
                                            DOCUMENTO
                                        </h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id=""
                                                placeholder="NUMERO DE DOCUMENTO" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="sub-descripction-label" style="margin-top: 2px !important;">
                                            TIPO DE IDENTIFICACION:
                                        </h4>
                                        <div class="form-check">
                                            <input class="form-check-input radio-p group-credencials"
                                                name="radioNoLabel" type="radio" value="check_dni"
                                                id="check_dni" />
                                            <label class="form-check-label" for="check_dni">
                                                DNI
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radio-p group-credencials"
                                                name="radioNoLabel" type="radio" value="check_cedula"
                                                id="check_cedula" />
                                            <label class="form-check-label" for="check_cedula">
                                                CEDULA
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radio-p group-credencials"
                                                name="radioNoLabel" type="radio" value="check_ce"
                                                id="check_ce" />
                                            <label class="form-check-label" for="check_ce">
                                                C.E
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radio-p group-credencials"
                                                name="radioNoLabel" type="radio" value="check_pass"
                                                id="check_pass" />
                                            <label class="form-check-label" for="check_pass">
                                                PASAPORTE
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radio-p group-credencials"
                                                name="radioNoLabel" type="radio" value="check_nit"
                                                id="check_nit" />
                                            <label class="form-check-label" for="check_nit">
                                                NIT
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radio-p group-credencials"
                                                name="radioNoLabel" type="radio" value="check_otro"
                                                id="check_otro" />
                                            <label class="form-check-label" for="check_otro">
                                                OTRO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 bolivares-otro-view">

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            PAIS
                                        </h4>
                                        <div class="form-group">
                                            <select class="form-control" id="select_box" onchange="info_pais();">
                                                <option disabled="" selected="">
                                                    - SELECCIONAR PAIS -
                                                </option>
                                                <option value="id_peru">PERÚ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            NUMERO DE DOCUMENTO
                                        </h4>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id=""
                                                placeholder="NRO DE DOCUMENTO" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="sub-descripction-label">
                                            BANCO
                                        </h4>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option disabled="" selected="">
                                                    - SELECCIONAR BANCO -
                                                </option>
                                                <option>BCP</option>
                                                <option>INTERBANK</option>
                                                <option>BBVA CONTINENTAL</option>
                                                <option>SCOTIABANK</option>
                                                <option>BANBIF</option>
                                                <option>BANCO PICHINCHA</option>
                                                <option>BANCO DE LA NACION</option>
                                                <option>OTRO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 group-bolivares-count">

                                    </div>
                                </div>
                                <div class="row group-bolivares-dolares">

                                </div>
                                <div class="row">
                                    <hr>
                                    <div class="col-sm-6">
                                        <h4 class="sub-descripction-label">
                                            NUMERO DE CUENTA
                                        </h4>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id=""
                                                placeholder="NRO DE CUENTA" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 group-bolivares-pais">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3 group-bolivares-pais-text" style="float: left;">

                                    </div>
                                    <div class="col-md-3" style="float: right;">
                                        <p style="padding: 10px;">Monto a Pagar en Bolívares:</p>
                                        </p>
                                        <div class="input-group">
                                            <span class="input-group-addon input-cant">$</span>
                                            <input type="text" class="form-control"
                                                aria-label="Amount (to the nearest dollar)">
                                            <span class="input-group-addon input-cant-fin">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p style="text-align: justify;padding: 5px;">
                                            Comuníquese a nuestras redes sociales mediante la mensajería directa
                                            para consultar por nuestros números de cuentas.
                                            <b style="background: yellow;">Si anteriormente ya usó este
                                                servicio, es importante que realice la consulta para confirmar
                                                la disponibilidad de la cuenta.</b>
                                            Nos encuentra en Facebook o Instagram como <b
                                                style="background: rgb(60, 235, 60); color: white;">@INTERRAPPI.oficial.</b>
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p style="text-align: justify;"><i class="fa-solid fa-image"></i> Subir
                                            Comprobante</p>
                                        <hr>
                                        <p style="text-align: left;">Tamaño maximo del archivo: 5.72 MB. | Tipo
                                            de archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de
                                            archivo: 1 | Cantidad minima de archivo: 1</p>
                                        <hr>
                                        <input type="file" class="form-control" id="customFile" />
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <br>
                                <hr>
                                <br>
                                <div class="row">
                                    <h4 class="sub-descripction">DATOS DEL SOLICITANTE:</h4>
                                    <div class="col-sm-3">
                                        <h4 class="sub-descripction-label">
                                            TU NOMBRE:
                                        </h4>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id=""
                                                placeholder="NOMBRE" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <h4 class="sub-descripction-label">
                                            CORREO ELECTRONICO:
                                        </h4>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id=""
                                                placeholder="EMAIL" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <h4 class="sub-descripction-label">
                                            TELEFONO
                                        </h4>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id=""
                                                placeholder="NRO TELEFONO" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <h4 class="sub-descripction-label">
                                            Teléfono del Solicitante
                                        </h4>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option disabled="" selected="">
                                                    - PAIS DONDE RESIDE -
                                                </option>
                                                <option>VENEZUELA</option>
                                                <option>COLOMBIA</option>
                                                <option>ECUADOR</option>
                                                <option>PERÚ</option>
                                                <option>PANAMÁ</option>
                                                <option>ARGENTINA</option>
                                                <option>CHILE</option>
                                                <option>BOLIVIA</option>
                                                <option>BRASIL</option>
                                                <option>URUGUAY</option>
                                                <option>PARAGUAY</option>
                                                <option>MEXICO</option>
                                                <option>USA</option>
                                                <option>ESPAÑA</option>
                                                <option>OTRO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row" style="justify-content: center;">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-danger">
                                            Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wizard container -->
    </div>
    </div>
</section>
