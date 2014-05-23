	
 function Login() {
	 
 }
 		Login.prototype = {
				urlLogin:"",
				init: function() {
					this.setupEvents();
								
				},
 				setupEvents: function() {
 					var self = this;
 					//VERIFICA CAMPOS EN BLANCO!

 					$("#btnConfirmar").on("click",function(e) {
 					if ( ($("#user").val() == "") && ($("#pass").val() == "") )
 					{
 						alert("Ingrese usuario y contrasena");
 						return false;
 					}
 					else if ($("#user").val() == "")
 					{				
 						alert("Ingrese usuario");
 						return false;
 					}
 					else if ($("#pass").val() == "")
 					{
 						alert("Ingrese contrasena");
 						return false;
 					}

			});			
			
		}
						
				
				
			
		
}	
	
	
	

	

