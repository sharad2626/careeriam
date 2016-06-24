jQuery(document).ready(function () {
      jQuery('#wpjobus-add-resume').validate({ // initialize the plugin
   errorElement: "div",
        rules: {
           fullName: {
                required: true
                
            } 
			

		},

		messages:{
              fullName: {
			  required:"Please enter full name"
              } 

        }
    });

});