$(function() {
	'use strict';
	// Form
	var companyForm = function() {
        jQuery.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg !== value;
        }, "Invalid symbol!");

        jQuery.validator.addMethod("start_date", function(value, element, params) {
            var startDate = new Date(value);
            var endDate = new Date($(params).val());
            var currentDate = new Date();

            // Check if start date is less than or equal to end date
            if (endDate.getTime() && startDate.getTime() > endDate.getTime()) {
                return false;
            }

            // Check if start date is in the future
            if (startDate.getTime() > currentDate.getTime()) {
                return false;
            }

            // Return true if the start date is valid
            return true;
        }, "Please enter a valid start date, less or equal than End Date, less or equal than current date");


        jQuery.validator.addMethod("end_date", function(value, element, params) {
            var endDate = new Date(value);
            var startDate = new Date($(params).val());
            var currentDate = new Date();

            // Check if end date is greater than or equal to start date
            if (startDate.getTime() && endDate.getTime() < startDate.getTime() ) {
                return false;
            }

            // Check if end date is in the future
            if (endDate.getTime() > currentDate.getTime()) {
                return false;
            }

            // Return true if the end date is valid
            return true;
        }, "Please enter a valid end date, greater or equal than Start Date, less or equal than current date");


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
                        start_date: "#end_date"
                    },
                    end_date: {
                        required: true,
                        end_date: "#start_date"
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
