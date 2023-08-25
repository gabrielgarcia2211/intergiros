$(document).ready(function () {
    initForm();
    getCantForms();

    function initForm() {
        dataGrid = $("#dataGrid")
            .dxDataGrid({
                dataSource: {
                    load: function (result) {
                        return axios
                            .post(
                                "/formulario/list",
                                setFilterFieldsDataGrid(result, relationsTable)
                            )
                            .then((response) => response.data)
                            .catch((error) => {
                                handleErrors(error);
                            });
                    },
                },
                remoteOperations: {
                    filtering: true,
                    paging: true,
                    sorting: true,
                },
                columns: [
                    {
                        dataField: "nombre_beneficiario",
                        caption: "Nombre Beneficiario",
                        alignment: "center",
                    },
                    {
                        dataField: "cedula_beneficiario",
                        caption: "Cedula Beneficiario",
                        alignment: "center",
                    },
                    {
                        dataField: "telefono_beneficiario",
                        caption: "Telefono Beneficiario",
                        alignment: "center",
                    },
                    {
                        dataField: "created_at",
                        caption: "Creado",
                        alignment: "center",
                        allowFiltering: false,
                    },
                    {
                        dataField: "nro_cuenta",
                        caption: "Nro Cuenta",
                        alignment: "center",
                    },
                    {
                        dataField: "user.name",
                        caption: "Nombre del Depositante",
                        alignment: "center",
                    },
                    {
                        dataField: "user.identificacion",
                        caption: "Cedula del Depositante",
                        alignment: "center",
                    },
                    {
                        dataField: "user.telefono",
                        caption: "Telefono del Depositante",
                        alignment: "center",
                    },
                    {
                        dataField: "user.email",
                        caption: "Correo del Depositante",
                        alignment: "center",
                    },
                    {
                        dataField: "tipo_persona",
                        caption: "Tipo Persona",
                        alignment: "center",
                    },
                    {
                        dataField: "tipo_cuenta",
                        caption: "Tipo de Cuenta",
                        alignment: "center",
                    },
                    {
                        dataField: "monto_enviar",
                        caption: "Monto a Enviar",
                        alignment: "center",
                    },
                    {
                        dataField: "email_comprobante",
                        caption: "Email Comprobante",
                        alignment: "center",
                    },
                    {
                        dataField: "pais",
                        caption: "Pais",
                        alignment: "center",
                    },
                    {
                        dataField: "tipo_moneda.tipo",
                        caption: "Tipo Moneda",
                        alignment: "center",
                    },
                    {
                        dataField: "tipo_entidad.descripcion",
                        caption: "Tipo Entidad",
                        alignment: "center",
                    },
                    {
                        dataField: "tipo_formulario.descripcion",
                        caption: "Tipo Formulario",
                        alignment: "center",
                    },
                    {
                        dataField: "id_estado",
                        caption: "Estado",
                        alignment: "center",
                        allowFiltering: false,
                        cellTemplate: function (container, options) {
                            var estado = options.data.id_estado;
                            var dataForm = options.data;
                            var backgroundColor = "";
                            var iconClass = "";
                            var title = "";

                            if (estado === "PENDIENTE") {
                                backgroundColor = "orange";
                                iconClass = "dx-icon-clock";
                                title = "Pendiente";
                            } else if (estado === "EN PROCESO") {
                                backgroundColor = "blue";
                                iconClass = "dx-icon-preferences";
                                title = "En Proceso";
                            } else if (estado === "ENTREGADO") {
                                backgroundColor = "green";
                                iconClass = "dx-icon-check";
                                title = "Entregado";
                            } else if (estado === "CANCELADO") {
                                backgroundColor = "red";
                                iconClass = "dx-icon-close";
                                title = "Cancelado";
                            } else {
                                backgroundColor = "gray"; // Estado desconocido
                                iconClass = "dx-icon-question";
                                title = "Desconocido";
                            }

                            var $button = $("<div>")
                                .css("background-color", backgroundColor)
                                .addClass("boton-status-icons")
                                .appendTo(container);

                            $("<div>")
                                .addClass("dx-icon")
                                .addClass(iconClass)
                                .attr("title", title)
                                .appendTo($button);

                            $button.on("click", function () {
                                popupCheckForm.show();
                                setStatus(estado, dataForm);
                            });
                        },
                    },
                    {
                        dataField: "imagen_comprobante",
                        caption: "Comprobante",
                        alignment: "center",
                        allowFiltering: false,
                        cellTemplate: function (container, options) {
                            var hasInfo =
                                options.data.imagen_comprobante !== null;
                            var iconClass = hasInfo
                                ? "dx-icon-eyeopen"
                                : "dx-icon-eyeclose";
                            var backgroundColor = hasInfo ? "green" : "red";

                            var $button = $("<button>")
                                .addClass("boton-status-icons")
                                .css("background-color", backgroundColor)
                                .appendTo(container);

                            $("<div>")
                                .addClass("dx-icon")
                                .addClass(iconClass)
                                .appendTo($button);

                            $button.on("click", function () {
                                if (hasInfo) {
                                    popupImage(
                                        options.data.imagen_comprobante,
                                        options.data.id
                                    );
                                }
                            });
                        },
                    },
                    {
                        dataField: "archivo",
                        caption: "Voucher",
                        alignment: "center",
                        allowFiltering: false,
                        cellTemplate: function (container, options) {
                            var hasInfo = options.data.archivo !== null;
                            var iconClass = hasInfo
                                ? "dx-icon-edittableheader"
                                : "dx-icon-inserttable";

                            var iconTitle = hasInfo
                                ? "Gestion archivo"
                                : "Cargar archivo";

                            var backgroundColor = hasInfo ? "blue" : "green";

                            var $inputFile = $("<input>")
                                .attr("type", "file")
                                .css("display", "none")
                                .appendTo(container);

                            var $button = $("<button>")
                                .addClass("boton-status-icons")
                                .css("background-color", backgroundColor)
                                .appendTo(container);

                            $("<div>")
                                .attr("title", iconTitle)
                                .addClass("dx-icon")
                                .addClass(iconClass)
                                .appendTo($button);

                            $button.on("click", function () {
                                if (hasInfo) {
                                    popupImage(
                                        options.data.archivo,
                                        options.data.id,
                                        true
                                    );
                                } else {
                                    $inputFile.click();
                                }
                            });

                            $inputFile.on("change", function (event) {
                                var file = event.target.files[0];
                                if (file) {
                                    sendFileForm(options.data.id, file, false);
                                }
                            });
                        },
                    },
                ],
                paging: {
                    pageSize: 10,
                },
                filterRow: {
                    visible: true,
                    applyFilter: "auto",
                },
                allowColumnResizing: true,
                showColumnsLines: true,
                showRowLines: true,
                rowAlternationEnabled: true,
                columnAutoWidth: true,
                columnAutoHeight: true,
                showBorders: true,
                scrolling: {
                    columnRenderingMode: "virtual",
                },
            })
            .dxDataGrid("instance");
    }

    async function getCantForms() {
        const response = await axios.get("/formulario/status");

        if (!response.data) {
            return;
        }

        const statusMap = {
            PENDIENTE: "#cant_pendientes",
            "EN PROCESO": "#cant_en_proceso",
            ENTREGADO: "#cant_entregado",
            CANCELADO: "#cant_cancelado",
        };

        response.data.forEach((item) => {
            const status = item["id_estado"];
            const count = item["count"];
            const targetSelector = statusMap[status];

            if (targetSelector) {
                $(targetSelector).html(count);
            }
        });
    }

    const popupCheckForm = setPopup("#popupCheckForm", {
        width: 400,
        height: "auto",
        position: {
            offset: { x: 0, y: -100 },
        },
        visible: false,
        title: "Gestion de Formulario",
        hideOnOutsideClick: true,
        showCloseButton: true,
    });

    async function setStatus(status, dataForm) {
        const listStatus = await getStatusForms();
        setSelectBox(
            "#estadoGestion",
            {
                dataSource: new DevExpress.data.ArrayStore({
                    data: listStatus,
                    key: "id",
                }),
                displayExpr: "descripcion",
                valueExpr: "id",
                value: listStatus.find((item) => item.descripcion === status)
                    .id,
                name: "id_estado",
            },
            [
                {
                    type: "required",
                    message: "Estado es requerido",
                },
            ]
        );

        setButton("#btn_send_gestionForm", {
            text: "Guardar",
            type: "success",
            useSubmitBehavior: true,
        });

        sendGestionForm(dataForm.id);
    }

    async function getStatusForms() {
        try {
            const response = await axios.get("/estado/list");
            return response.data;
        } catch (error) {
            handleErrors(error);
        }
    }

    function popupImage(url, id, edit) {
        var popupOptions = {
            contentTemplate: function (contentElement) {
                $("<img>")
                    .attr("src", url)
                    .css("max-width", "100%")
                    .appendTo(contentElement);

                if (edit) {
                    $("<button>")
                        .text("Eliminar")
                        .addClass("btn btn-danger btn-block mt-3")
                        .appendTo(contentElement)
                        .on("click", function () {
                            sendFileForm(id, "", true);
                            popupInstance.hide();
                        });
                }
            },
            height: "auto",
            width: "auto",
            showCloseButton: true,
            hideOnOutsideClick: true,
        };

        popupOptions.maxWidth = 500;

        var popupInstance = $("<div>")
            .appendTo("body")
            .dxPopup(popupOptions)
            .dxPopup("instance");

        popupInstance.show();

        return popupInstance;
    }

    function sendFileForm(key, file, status) {
        var formData = new FormData();
        formData.append("archivo", file);
        formData.append("is_delete", status);

        var config = {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        };

        axios
            .post("/formulario/update/" + key, formData, config)
            .then((response) => {
                $("#dataGrid").dxDataGrid("instance").refresh();
                showMessageText(response.data.message);
            })
            .catch((error) => {
                handleErrors(error);
            });
    }

    function sendGestionForm(key) {
        $("#gestionForm").off("submit");
        $("#gestionForm").on("submit", function (e) {
            e.preventDefault();
            var formulario = $("#gestionForm")[0];
            var formData = new FormData(formulario);
            axios
                .post("/formulario/update/" + key, formData)
                .then((response) => {
                    $("#dataGrid").dxDataGrid("instance").refresh();
                    showMessageText(response.data.message);
                    getCantForms();
                })
                .catch((error) => {
                    handleErrors(error);
                });
        });
    }

    function relationsTable(selector) {
        switch (selector) {
            case "tipo_moneda.tipo":
                return "tipo_moneda.tipo";
            case "tipo_entidad.descripcion":
                return "tipo_entidad.descripcion";
            case "tipo_formulario.descripcion":
                return "tipo_formulario.descripcion";
            case "user.name":
                return "users.name";
            case "user.identificacion":
                return "users.identificacion";
            case "user.telefono":
                return "users.telefono";
            case "user.email":
                return "users.email";
            default:
                return selector;
        }
    }
});

function generateCsv() {
    axios
        .get("/formulario/report", { responseType: "blob" })
        .then(function (response) {
            const blob = new Blob([response.data], {
                type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            });
            const contentDisposition = response.headers["content-disposition"];
            const matches = contentDisposition.match(
                /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/
            );
            const fileName = matches[1].replace(/['"]/g, "");
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement("a");
            a.style.display = "none";
            a.href = url;
            a.download = fileName;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        })
        .catch(function (error) {
            handleErrors(error);
        });
}
