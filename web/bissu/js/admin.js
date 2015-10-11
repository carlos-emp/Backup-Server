$(document).ready(function() {

});

var finalMail='';

var app=ons.bootstrap('Administrador',['onsen']);
app.controller('PendientesController',function($scope,$http){

  $('#loading').fadeIn();
  $scope.inactivas=[];
  $scope.cargar=function(){
  $http.get('ws/users/getUnactiveUsers.php').
  success(function(data){

      $('#loading').fadeOut();
    $scope.inactivas=data.detail;
  });
};
$scope.cargar();
  $scope.confirmar=function(inactiva){
    if(inactiva.correo.indexOf('@') != -1){
    var finalMail=inactiva.correo.replace(/,|;/gi, '');
     finalNombre=inactiva.nombre;
    var finalPass=inactiva.pass;
    $scope.ons.notification.confirm({ buttonLabels:  ["Cancelar", "Envíar"], title: 'Confirmar Envío', messageHTML: '<div>Se enviará un correo elecrónico a '+inactiva.correo+'</div>', callback: function(answer) {
      // Do something here.
      switch (answer) {
        case 1:
          $.ajax({
            url: 'http://www.empowerlabs.com/proyectos/trackersAPI/sendMail.php',
            type: 'POST',
            data: {
            to: ''+finalMail,
            pass:''+finalPass,
            nombre: ''+finalNombre
          }
          })
          .done(function(data) {
            console.log("success");
            $scope.ons.notification.alert({message: 'Mail enviado! '+data});
            $.ajax({
              url: 'ws/users/update.php',
              type: 'POST',
              data: {campo: 'activo',valor: 'si',target:''+finalMail}
            })
            .done(function(data) {
              console.log("success"+data);
              $scope.cargar();
            })
            .fail(function(err) {
              console.log("error"+err);
            })
            .always(function() {
              console.log("complete");
            });

          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });


          break;
        default:

      }
    } });
  }else{
    $scope.ons.notification.alert({message: 'Este cliente no cuenta con correo electrónico. Solicítelo!'});
  }
  };
});
