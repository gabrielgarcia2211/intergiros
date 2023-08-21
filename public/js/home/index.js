$(document).ready(function () {
    setCalculate();

    function setCalculate() {
        setTextBox("#monedaIn", {
            name: "moneda_in",
            showClearButton: true,
            mode: "number",
        });

        setTextBox("#monedaOut", {
            name: "moneda_out",
            showClearButton: true,
            mode: "number",
        });
    }
});
