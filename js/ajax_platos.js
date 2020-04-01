$(document).ready(function(){
	$('#lista_tipos').val("Entrantes");
	recargarLista();

	$('#lista_tipos').change(function(){
		recargarLista();
	});
})
function recargarLista(){
	$.ajax({
		type:"POST",
		url:"../php/models/m_ajax_platos.php",
		data:"tipo=" + $('#lista_tipos').val(),
		success:function(r){
			$('#lista_platos').html(r);
		}
	});
}
