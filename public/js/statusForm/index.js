var dataGrid = null;

$(document).ready(function () {
    function init() {
        dataGrid = $("#dataGrid")
            .dxDataGrid({
                dataSource: {
                    load: function (result) {
                        return axios
                            .get("/formulario/list/user")
                            .then((response) => response.data)
                            .catch((error) => {
                                handleErrors(error);
                            });
                    },
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
                    },
                    {
                        dataField: "id_estado",
                        caption: "Estado",
                        alignment: "center",
                        cellTemplate: function (container, options) {
                            var estado = options.data.id_estado;
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
                        },
                    },
                    {
                        dataField: "imagen_comprobante",
                        caption: "Comprobante",
                        alignment: "center",
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
                                    popupImage(options.data.imagen_comprobante);
                                }
                            });
                        },
                    },
                    {
                        dataField: "archivo",
                        caption: "Voucher",
                        alignment: "center",
                        cellTemplate: function (container, options) {
                            var hasInfo = options.data.archivo !== null;
                            var iconClass = hasInfo
                                ? "dx-icon-inserttable"
                                : "dx-icon-deletetable";

                            var iconTitle = hasInfo
                                ? "Gestion archivo"
                                : "Sin archivo";

                            var backgroundColor = hasInfo ? "green" : "red";

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
                                    popupImage(options.data.archivo);
                                }
                            });
                        },
                    },
                ],
                paging: {
                    pageSize: 5,
                },
                allowColumnResizing: true,
                showColumnsLines: true,
                showRowLines: true,
                showBorders: true,
                columnAutoWidth: true,
                rowAlternationEnabled: true,
            })
            .dxDataGrid("instance");
    }

    const popupStatusForm = setPopup("#popupStatusForm", {
        width: "90%",
        height: "auto",
        position: {
            offset: { x: 0, y: -100 },
        },
        visible: false,
        title: "Estado de peticiones",
        hideOnOutsideClick: true,
        showCloseButton: true,
    });

    setButton("#btn_status_form", {
        text: "Revisar Status",
        icon: "showpanel",
        elementAttr: {
            class: "boton-status",
        },
        onClick() {
            popupStatusForm.show();
            init();
        },
    });

    function popupImage(url) {
        var popupOptions = {
            contentTemplate: function (contentElement) {
                $("<img>")
                    .attr("src", url)
                    .css("max-width", "100%")
                    .appendTo(contentElement);
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
});
