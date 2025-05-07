(function () {
    // initial load
    $(document).ready(function() {
        const value = $("#source").val();

        updateSourceAnotherColumnByValue(value);
    });

    // edit field
    $(document).ready(function () {
        const oldHandleSave = window.handleSave;
        window.handleSave = function(field, id, module, type)
        {
            let newValue = getInputValue(field, type);
            oldHandleSave(field, id, module, type);

            updateSourceAnotherColumnByValue(newValue);
        }
    })

    function updateSourceAnotherColumnByValue(value)
    {
        if (value === "another")
            $("[data-field='source_another']").show();
        else
            $("[data-field='source_another']").hide();
    }
})()
