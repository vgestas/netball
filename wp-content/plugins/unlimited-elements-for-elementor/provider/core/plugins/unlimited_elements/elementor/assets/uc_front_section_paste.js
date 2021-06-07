function UnlimitedElementsPasteSection(){
	
	var g_options = {};
	var g_objPupup, g_objButton;
	
	
	/**
	 * put paste html
	 */
	function putPasteHtml(){
		
		var html = "";
		html += "<div id='uc_paste_section_popup' class='uc-section-paste-popup'>";
		html += "	<input type='text' class='uc-section-paste-input'>";
		html += "	<a href='javascript:void(0)' class='uc-section-paste-button'>Paste Section</a>";
		html += "</div>";
		
		jQuery("body").append(html);
	}
	
	/**
	 * init events
	 */
	function initEvents(){
				
		trace("init events");
	}
	
	/**
	 * paste section init
	 */
	this.init = function(){
		
		if(typeof g_ucPasteSectionConfig == "undefined"){
			console.log("paste section error - no config found");
			return(false);
		}
		
		g_options = JSON.parse(g_ucPasteSectionConfig);
						
		putPasteHtml();
		
		g_objPopup = jQuery("#uc_paste_section_popup");
		
		if(g_objPopup.length == 0){
			console.log("paste section not created well");
			return(false);
		}
		
		g_objButton = g_objPopup.find(".uc-section-paste-button");
		
		
		initEvents();
	}
	
}


jQuery(document).ready(function(){
			
	var objPasteSection = new UnlimitedElementsPasteSection();
	objPasteSection.init();
	
});

