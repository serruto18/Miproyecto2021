/Swal.fire({
	title: "Bienvenido!",
	text: "Espero que te guste mi pagina web"
});/

function alertaEliminar(){
	Swal.fire({
	  title: '¿Estas seguro de ELIMINAR?',
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'SI'
	}).then((result) => {
	  if (result.isConfirmed) {
	    Swal.fire(
	      'Eliminado!',
	      'success'
	    )
	  }
	})
}
alertaEliminar();