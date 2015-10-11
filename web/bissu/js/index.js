

$(document).ready(function(){
$("#imprime").submit(function(){
	window.location="login.php";
});
$("#senseInput").on('input',function() {
  if($("#senseInput").val()===""){
  	$("#sense").fadeOut();
		editando=0;
	$("#agregar").addClass("disabled");
	$("#cantidadInput").val('');
  }
  else{
  	$("#sense").fadeIn();
  }
});
});
var editando=0;
var selectedArticulo={};
var app= angular.module('Cotizador',[]);
app.controller('UsersController',function($scope,$http){
$scope.name='';
$scope.items={};
	$scope.iva=0;
	$scope.mihtml2='';
	$scope.counter=1;
	$scope.totalCol=0;
	$scope.totalfinol=0;
   $http.get('ws/products/getProductos.php').success(function(data){
$scope.items=data;
});
$scope.completar=function(item){
	selectedArticulo=item;
	$("#senseInput").val(item.ARTiCULO);
	$("#cantidadInput").val(0);
	$("#sense").fadeOut();
	$("#agregar").removeClass("disabled");
	editando=1;
};
$scope.agregarFila=function(){
	if(editando===1){
	$scope.actualPrecio=selectedArticulo.PRECIO_SUGERIDO_BISSU;
	if(parseInt($("#cantidadInput").val())>=parseInt(selectedArticulo.PIEZAS_POR_CAJA)){
		$scope.actualPrecio=selectedArticulo.PRECIO_POR_CAJA;
	}
	//alert(''+$scope.actualPrecio);
	$scope.totalRow=parseFloat($("#cantidadInput").val())*parseFloat($scope.actualPrecio);
	if(parseFloat($scope.totalRow)>=5000.0){
		$scope.actualPrecio=selectedArticulo.MAYOREO_5000;
		$scope.totalRow=parseFloat($("#cantidadInput").val())*parseFloat($scope.actualPrecio);
	}
	$('#tabla').append("<tr class='row'><td class='col s1'>"+$scope.counter+
	"</td><td class='col s4'>"+selectedArticulo.ARTiCULO+
	"</td><td class='col s2'>"+$scope.actualPrecio+
	"</td><td class='col s3'>"+$("#cantidadInput").val()+
	"</td><td class='col s2'>"+$scope.totalRow+
	"</td></tr>");
	if(parseInt($scope.counter)>2){
		$scope.iva=16;
	}
	$scope.totalCol=parseFloat($scope.totalCol)+parseFloat($scope.totalRow);
	$scope.uno=parseFloat($scope.totalCol)/100.0;
	$scope.sub=parseFloat($scope.uno)*parseFloat($scope.iva);
	$scope.totalFinal=parseFloat($scope.totalCol)+parseFloat($scope.sub);
	$scope.mihtml2+="+"+$scope.counter+
	"-"+selectedArticulo.ARTiCULO+
	"-"+$scope.actualPrecio+
	"-"+$("#cantidadInput").val()+
	"-"+$scope.totalRow+
	"_";
	$('#mihtml').val($scope.mihtml2);
	$('#mtotales').val("+ Sub Total: "+$scope.totalCol+" - Sub Total: "+$scope.sub+" - Total: "+$scope.totalFinal+"_");

	$scope.counter++;}
};
$scope.reset=function(){

$scope.name='';
	editando=0;
	selectedArticulo={};
	$scope.iva=0;
	$scope.mihtml2='';
	$scope.sub=0;
	$scope.totalFinal=0;
	$scope.counter=1;
	$scope.totalCol=0;
	$scope.totalfinol=0;
	$("#agregar").addClass("disabled");
	$('#tabla').html('');
};
});
