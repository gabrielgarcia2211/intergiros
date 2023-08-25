$(document).ready(function () {
    setCalculate();

    function setCalculate() {
        setNumberBox("#monedaIn", {
            name: "moneda_in",
            showClearButton: true,
        });

        setNumberBox("#monedaOut", {
            name: "moneda_out",
            showClearButton: true,
        });
    }
});
