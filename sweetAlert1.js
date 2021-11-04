/*var confirmed = false;
$("#boton1").on("submit", function(e) {
    var $this = $(this);
    if (!confirmed) {
        e.preventDefault();
        swal({
            title: $(this).data("swa-title"),
            text: $(this).data("swa-text"),
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#cc3f44",
            confirmButtonText: $(this).data("swa-btn-txt"),
            closeOnConfirm: true,
            html: false
        }, function() {
            confirmed = true;
            $this.submit();
        });
    }
});*/



function eliminar (indice){
  
	Swal.fire({
  title: 'Estas seguro de Eliminar?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Eliminar!'
}).then((result) => {
  if (result.isConfirmed) {
    var int=indice-1;
   document.forms[int].submit();
    Swal.fire(
      'Eliminado!',
      'Your file has been deleted.',
      'success'
    )
    
  }
})
}

function positvoEmpelado() {
  Swal.fire(
  'Buen trabajo!',
  'Se registro el empleado!',
  'success'
)
}
function positvoInspector() {
  Swal.fire(
  'Buen trabajo!',
  'Se registro al Inspector!',
  'success'
)
}