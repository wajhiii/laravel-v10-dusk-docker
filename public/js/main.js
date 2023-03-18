$(function() {

	'use strict';
	// Form
	var companyForm = function() {
        jQuery.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg !== value;
        }, "Invalid symbol!");

		if ($('#companyForm').length > 0 ) {
			$( "#companyForm" ).validate( {
				rules: {
                    symbol: {
                        valueNotEquals: " "
                    },
					email: {
						required: true,
						email: true
					},
                    start_date: {
                        required: true,
                    },
                    end_date: {
                        required: true,
                    },
				},
				messages: {
					email: "Please enter a valid email address",
				},
			} );
		}
	};
    $("#start_date").datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: new Date(),
        onSelect: function(selected) {
            $("#end_date").datepicker("option", "minDate", selected)
        }
    });
    $("#end_date").datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: new Date(),
        onSelect: function(selected) {
            $("#start_date").datepicker("option", "maxDate", selected)
        }
    });
	companyForm();

});
