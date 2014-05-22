/**
 * 
 */

function Home() {
}
	Home.prototype = {
		urlCambiarPagina: "",
		urlAgregar:"",
		urlEliminar:"",
		idCompra: 0,
		init: function() {
			this.setupEvents();
		},

		setupEvents: function() {
		var self = this;
			
					//EVENTOINICIO
					$("#primeraPagina").on("click",function(e) {
						e.preventDefault();
						
						//CATALOGO TBODY APPEND
						$.post(self.urlCambiarPagina,{pagina: 1})
						.done(function(result) {
//							var result = $.parseJSON(result);
							$("#Catalogo tbody tr").remove();
							$("#Catalogo tbody").append(parsearArrayArticulos(result));
						})
						.fail(function(result) {
							alert("Error en el servidor");
							return false;
						});
					});
					//EVENTOFIN
					$("#ultimaPagina").on("click",function(e) {
						e.preventDefault();
						
						//CATALOGO TBODY APPEND
						$.post(self.urlCambiarPagina,{pagina: $(this).attr("name")})
						.done(function(result) {
//							var result = $.parseJSON(result);
							$("#Catalogo tbody tr").remove();
							$("#Catalogo tbody").append(parsearArrayArticulos(result));
						})
						.fail(function(result) {
							alert("Error en el servidor");
							return false;
						});
					});

					
					//EVENTONUMEROS
					$(".pagina").on("click",function(e) {
					e.preventDefault();
					
					//CATALOGO TBODY APPEND
					$.post(self.urlCambiarPagina,{pagina: $(this).attr("id")})
					.done(function(result) {
						var result = result;
						$("#Catalogo tbody tr").remove();
						$("#Catalogo tbody").append(parsearArrayArticulos(result));
					})
					.fail(function(result) {
						alert("Error en el servidor");
						return false;
					});

						
			});

				
//	 			.agregar son los links
		
				// EVENTO PARA AGREGAR
					$("#Catalogo").on("click",".agregar", function(e) { 
					e.preventDefault();
					cantidadSolicitada = prompt("Ingrese cantidad");	
					$.post("../Controllers/AgregarController.php",{cantidad: cantidadSolicitada, id:$(this).siblings().val(), idCompra: idCompra})
					.done(function(result) {
						result = $.parseJSON(result);
						precioAgregar = result.cantidad * result.precio;
						$(".total").remove();		
						$("#Carrito tbody").append("<tr id='"+ idCompra++  +"' ><td>" + 
						result.nombre + 
						"</td><td>" + 
						result.cantidad + 
						"</td><td>" + 
						precioAgregar + 
						"</td><td>" +
						"<a href='#' class='eliminar'> Eliminar </a></td></tr>" +
						"<tr><td class='total' colspan='4'>" +
						result.total +
						"</td></tr>") ;
					})
					.fail(function(result) {
						alert("Error en el servidor");
						return false;
					});
				});
	//EVENTO PARA ELIMINAR
				$("#Carrito").on("click",".eliminar", function(e) {
					e.preventDefault();
					$.post("../Controllers/EliminarController.php",{ index:$(this).parent().parent().attr("id") })
					.done(function(result) {
					var result = $.parseJSON(result);
					//if(result.total == 0)
						//$("#Carrito tbody").empty();
					$(".total").remove();
					$("#" + result.index).remove();
					$("#Carrito tbody").append(
							"<tr><td class='total' colspan='4'>" +
							result.total +
							"</tr>") ;
					})
					.fail(function(result) {
						alert("Error en el servidor");
						return false;
					});		
			});
		
		
		
		
		
		
		
		
	}	
}