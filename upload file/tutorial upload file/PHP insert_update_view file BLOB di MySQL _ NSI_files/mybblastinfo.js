jQuery(document).ready(function() {
	
jQuery("#mybbinfoaccordion section h1").parents().siblings("section").addClass("ac_hidden");
  jQuery("#mybbinfoaccordion section h1").click(function(e) {
   jQuery(this).parents().siblings("section").addClass("ac_hidden");
    jQuery(this).parents("section").removeClass("ac_hidden");
    e.preventDefault();
  });
  
  
  
});