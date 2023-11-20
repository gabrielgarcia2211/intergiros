$(document).ready(function () {
    initTasas();

    async function initTasas() {
        const listTasas = await getTasasForms();
        setSelectBox("#listTasas", {
            dataSource: new DevExpress.data.ArrayStore({
                data: listTasas,
                key: "id",
            }),
            displayExpr: "tipo_entidad.descripcion",
            valueExpr: "id",
            name: "",
            value: null,
            showClearButton: true,
            itemTemplate(item) {
                return `<div class='product-name'>${item.tipo_formulario.descripcion} - ${item.tipo_entidad.descripcion} </div>`;
            },
            onSelectionChanged(e) {
                initField(e.selectedItem);
            },
        });
    }

    function initField(item) {
        setNumberBox(
            "#oldTasa",
            {
                label: "Tasa Actual",
                value: item.valor,
                readOnly: true,
            },
            [
                {
                    type: "required",
                    message: "Este campo es obligatorio",
                },
            ]
        );

        setNumberBox(
            "#newTasa",
            {
                name: "valor",
                label: "Nueva Tasa",
            },
            [
                {
                    type: "required",
                    message: "Este campo es obligatorio",
                },
                {
                    type: "custom",
                    validationCallback: function (params) {
                        if (params.value <= 0) {
                            return false;
                        }
                        return true;
                    },
                    message: "La tasa debe ser mayor a cero",
                },
            ]
        );

        setButton("#btn_send_tasaForm", {
            text: "Guardar",
            elementAttr: {
                class: "boton-primary",
            },
            useSubmitBehavior: true,
        });

        sendTasaForm(item.id);
    }

    async function getTasasForms() {
        try {
            const response = await axios.get("/tasacambio/list");
            return response.data;
        } catch (error) {
            handleErrors(error);
        }
    }

    function sendTasaForm(key) {
        $("#tasasForm").off("submit");
        $("#tasasForm").on("submit", function (e) {
            e.preventDefault();
            var formulario = $("#tasasForm")[0];
            var formData = new FormData(formulario);

            axios
                .post("/tasacambio/update/" + key, formData)
                .then((response) => {
                    showMessageText(response.data.message);
                    $("#oldTasa").dxNumberBox("instance").dispose();
                    $("#newTasa").dxNumberBox("instance").dispose();
                    $("#listTasas").dxSelectBox("instance").dispose();
                    initTasas();
                })
                .catch((error) => {
                    handleErrors(error);
                });
        });
    }
});
