/**
 * 
 */

function ABM() {
	
}

ABM.prototype = {
		table : null,
		row: "",
		oTable: null,
		url: { actualizar: "" ,  eliminar: "", editLink:"" , deleteLink:"" },
		init: function() {
			this.configTable();
			this.setupEvents();

		},
		configTable: function() {
			var self = this;
			var editLink = "<a href='#' class='editar'>Editar</a><br>" ;
			var deleteLink = "<a href='#' class='eliminar'>Eliminar</a>" ;
			self.oTable = $("#abmCatalogo").dataTable( 
					{
				        "bJQueryUI": true,
				        "bLengthChange": false,
				        "bPaginate": true,
				        "iDisplayLength": 4,
				         "sPaginationType": "full_numbers",
				        "aoColumns": [
				        { "mData": "id" },
						{ "mData": "nombre", "sWidth": "40%",  "sClass" : "center" },
						{ "mData": "precio", "sWidth": "40%",  "sClass" : "center" },
						{ "mData": "cantidad", "sWidth": "40%",  "sClass" : "center" },
						{ 
							"mData": null, "bSortable": false, "sType": "html", "sWidth": "5%", "sClass" : "center", "mRender": function ( data, type, full )
							 { return editLink + deleteLink; }
				    	}
					
				        ],
						
					  	"bSort": true,
					  	"bAutoWidth":false,
					  	"bInfo":true,
					  	"oSearch": {"sSearch": ""},
					  	
					  	"aoColumnDefs": [
					  	               { "bSortable": false, "aTargets": [ 4 ] },
					  	               { "bSearchable": false, "aTargets": [ 4 ]},
					  	               { "bVisible": false, "aTargets":[ 0 ]}
					  	     			],
					  	 "oLanguage": {
					  	      "oPaginate": {
					  	        "sPrevious": "Anterior",
						  	    "sNext": "Siguiente",
						  	    "sFirst": "Primera",
						  	    "sLast": "Ultima"
					  	       },
					  		"sSearch": "Filtrar:"
					  	 },
					  	"aaData": self.table
					  	
					});
			
		},
		setupEvents: function() {
			var self = this;
				 $("#abmCatalogo").on("click",".editar",function(e) {
					e.preventDefault();
					self.row = $(this).closest("tr")[0];
					var fila = self.oTable.fnGetData( $(this).closest("tr") );
					$("#nombreArticulo").val(fila.nombre);
					$("#precioArticulo").val(fila.precio);
					$("#cantidad").val(fila.cantidad);
					$("#idArticulo").val(fila.id);


			  });

			  $("#abmCatalogo").on("click",".eliminar",function(e) {
					e.preventDefault();
					var fila = $(this).closest("tr")[0];
					var articulo = self.oTable.fnGetData(fila);
					var rownum = self.oTable.fnGetPosition(fila);
					$.post(self.url.eliminar,{ id: articulo.id })
					.done(function(result) {
						self.oTable.fnDeleteRow( rownum );				
			  		})
			  		.fail(function(result) {
						alert("Error en el servidor");
						return false;
					});
					
			  });

			  $("#btnNuevo").on("click",function(e) {
					e.preventDefault();
					$("#nombreArticulo").val("");
					$("#precioArticulo").val("");
					$("#cantidad").val("");
					$("#idArticulo").val("");
			  });

			  $("#btnGuardar").on("click",function(e) {
					e.preventDefault();
					if ($("#nombreArticulo").val() == "")
					{
						alert("Nombre en blanco por favor completelo");
						return false;		
					}
					else if ($("#precioArticulo").val() == "")
					{
						alert("Precio en blanco por favor completelo");
						return false;		
					}
					else if ($("#cantidad").val() == "")
					{
						alert("Cantidad en blanco por favor completela");
						return false;		
					}
					$.post(self.url.actualizar,{id:$("#idArticulo").val(),nombre:$("#nombreArticulo").val(),precio:$("#precioArticulo").val(),cantidad:$("#cantidad").val()})
					.done(function(result) {
//						var result = $.parseJSON(result);
						if (result.newID)
							self.oTable.fnAddData({id:$("#idArticulo").val(),nombre:$("#nombreArticulo").val(),precio:$("#precioArticulo").val(),cantidad:$("#cantidad").val()});
						else {
							self.oTable.fnUpdate({id:$("#idArticulo").val(),nombre:$("#nombreArticulo").val(),precio:$("#precioArticulo").val(),cantidad:$("#cantidad").val()},self.row);
						}

					})
					.fail(function(result) {
						alert("Error en el servidor");
						return false;
					});
			  });
		}
}
