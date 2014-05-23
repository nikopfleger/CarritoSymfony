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
		parsearArrayArticulos: function(result) { 
			 var string = "";
					for (var i=0; i<result.articulos.length;i++)
					{
						string = string + "<tr><td>" +
						result.articulos[i].nombre + 
						"</td><td>" + result.articulos[i].precioUnitario +
						"</td><td><a href='#' class='agregar'>Agregar</a>" + 
						"<input type='hidden' name='id' value='" + 
						result.articulos[i].id + "'> </td></tr>";
					}
					return string;
		},
		setupEvents: function() {
		var self = this;
			
					//EVENTOINICIO
					$("#primeraPagina").on("click",function(e) {
						e.preventDefault();
						
						//CATALOGO TBODY APPEND
						$.post(self.urlCambiarPagina,{pagina: 1})
						.done(function(result) {
							$("#Catalogo tbody tr").remove();
							$("#Catalogo tbody").append(self.parsearArrayArticulos(result));
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
							$("#Catalogo tbody tr").remove();
							$("#Catalogo tbody").append(self.parsearArrayArticulos(result));
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
						$("#Catalogo tbody").append(self.parsearArrayArticulos(result));
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
					$.post(self.urlAgregar,{cantidad: cantidadSolicitada, id:$(this).siblings().val(), idCompra: self.idCompra})
					.done(function(result) {
//						result = $.parseJSON(result);
						precioAgregar = result.cantidad * result.precio;
						$(".total").remove();		
						$("#Carrito tbody").append("<tr id='"+ self.idCompra++  +"' ><td>" + 
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
					$.post(self.urlEliminar,{ index:$(this).closest("tr").attr("id") })
					.done(function(result) {
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