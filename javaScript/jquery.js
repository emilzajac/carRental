//Hide the password input if user already exists
$(document).ready(function () {
    $('#isRegistered').click(function () {
        var $this = $(this);
        if ($this.is(':checked')) {
            $('#gender_select').hide();
            $('#location_label').hide();
            $('#dateOfBirth_label').hide();

            $( "#gender_option" ).prop( "disabled", true );
            $( "#location_input" ).prop( "disabled", true );
            $( "#dateOfBirth_input" ).prop( "disabled", true );

        } else {
            $('#gender_select').show();
            $('#location_label').show();
            $('#dateOfBirth_label').show();

            $( "#gender_option" ).prop( "disabled", false );
            $( "#location_input" ).prop( "disabled", false );
            $( "#dateOfBirth_input" ).prop( "disabled", false );
        }
    });
});
