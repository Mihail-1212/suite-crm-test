(function() {
    // On init field
    $(document).ready(function() {
        const value = $("select[name='source']").val();

        updateSourceAnotherColumnByValue(value);
    });
    
    // On edit field
    $(document).ready(function() {
        $("select[name='source']").on("change", function() {
            const value = $( this ).val();

            updateSourceAnotherColumnByValue(value);
        });
    });

    function updateSourceAnotherColumnByValue(value)
    {
        if (value === "another")
            $("[data-field='source_another']").show();
        else
            $("[data-field='source_another']").hide();
    }
})()