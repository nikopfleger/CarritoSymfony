	
 function Login() {
	 
 }
 		Login.prototype = {
				urlLogin:"",
				urlHome:"",
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
// 					$.post(self.urlLogin,{user: $("#user").val(), pass: $("#pass").val()})
// 					.done(function(result) {
////					var result = $.parseJSON(result);
// 					if (result == 1)
// 						$.post(self.urlHome);
// 					else
// 						alert("datos incorrectos"); 																	
// 					})
// 					.fail(function (result) {
// 				
//					alert("error en el servidor");
//					return false;
// 					});
			});			
			
		}
						
				
				
			
		
}	
	
	
	

	

