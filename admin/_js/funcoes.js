//FUNCAO PARA LIMITAR CARACTERES EM TEXTAREA

var max=5000;
var ancho=300;

function progreso_tecla(obj,permitido,limite) {
  var progreso = document.getElementById(limite);  
  if (obj.value.length < permitido) {
       
    progreso.style.backgroundImage = "url(textarea.png)";    
   //progreso.style.color = "#E5E4E4";
    var pos = ancho-parseInt((ancho*parseInt(obj.value.length))/permitido);
    progreso.style.backgroundPosition = "-"+pos+"px 0px";
  } else {
    //progreso.style.backgroundColor = "#E5E4E4";    
    progreso.style.backgroundImage = "url()";    
   // progreso.style.color = "#E5EEA1";
  } 
  progreso.innerHTML = "("+obj.value.length+" / "+permitido+")";
}

function limitaText( p_objCampo, p_permitido ) {

   if (  p_objCampo.value.length > p_permitido ) {
         p_objCampo.value =  p_objCampo.value.substr( 0, p_permitido )

      if ( p_objCampo.value.length > p_permitido )  
         p_objCampo.value =  p_objCampo.value.substr( 0, p_permitido-1 )
   }
  
}


	function inativo(id,pagina,page) {	
		if( confirm( 'Tem certeza que deseja deixar desativado o registro?\n') ) {     
				
			var campo1 = pagina;
				var campo2 = "?id="+id+"&status=inativo&page="+page+"" ;
					location.href=campo1+campo2;
		   alert( 'Registro alterado com sucesso!\n');
		}
		 return false;
	}


	function publicar(id,pagina,page) {	
		if( confirm( 'Tem certeza que deseja ativar o registro?\n') ) {     
				
				var campo1 = pagina;
				var campo2 = "?id="+id+"&status=publicado&page="+page+"" ;
					location.href=campo1+campo2;
		   alert( 'Registro alterado com sucesso!\n');
		}
		 return false;
	}

	function lixo(id,pagina,page) {	
		if( confirm( 'Tem certeza que deseja enviar para a lixeira o registro?\n') ) {     
				
				var campo1 = pagina;
				var campo2 = "?id="+id+"&status=lixo" ;
					location.href=campo1+campo2;
		   alert( 'Registro alterado com sucesso!\n');
		}
		 return false;
	}
	
	function restaurar(id,pagina,page) {	
		if( confirm( 'Ao restaurar o registro ele voltará para o status de Desativado.\nTem certeza que deseja restaurar o registro?\n') ) {     
				
				var campo1 = pagina;
				var campo2 = "?id="+id+"&status=restaurar" ;
					location.href=campo1+campo2;
		   alert( 'Registro alterado com sucesso!\n');
		}
		 return false;
	}
	
	function deletar(id,pagina,page) {	
		if( confirm( 'O registro será excluido e após a confirmação não será possível recuperar.\nTem certeza excluir o registro?\n') ) {     
				
				var campo1 = pagina;
				var campo2 = "?id="+id+"&status=deletar" ;
					location.href=campo1+campo2;
		   alert( 'Registro alterado com sucesso!\n');
		} 
		 return false;
	}

//seleção de todos os checklist
$(document).ready(function() {
	$('#selectAll').click(function() {
		if(this.checked == true){
			$("input[type=checkbox]").each(function() { 
				this.checked = true; 
			});
		} else {
			$("input[type=checkbox]").each(function() { 
				this.checked = false; 
			});
		}
	});	
	
	// Botão de excluir registro padrão, desde que ele esteja dentro de um formulário ele funcionará com o action normal.
	$("#bnt_excluir").click(function() {
    if( confirm( 'Tem certeza que deseja excluir?\n O Registro será movido para a lixeira.') ) {
      var parentForm = $(this).parents('form:first');
      
      // Ignora todos os campos
      $("input,select,textarea").addClass('ignore');
	  
	  // Altera o action para delete
      $('#opt', parentForm).val('deletar');
	  
      // Submit no formulário
      parentForm.submit();
    }
    return false;
  });	
	
	
		$('#selectAll').click(function() {
		if(this.checked == true){
			$("input[type=checkbox]").each(function() { 
				this.checked = true; 
			});
		} else {
			$("input[type=checkbox]").each(function() { 
				this.checked = false; 
			});
		}
	});
	
	jQuery('#aplicar').click(
                 function()
	      {			 
		  
			  
			var selectedItems = new Array();
			$("input[@name='id[]']:checked").each(function() {
				selectedItems.push($(this).val());}
			); 
			
			if (selectedItems .length == 0 || $("#status").val() == '0' )  { 
				alert("Selecione alguma opção");
					return false;
			} else
			
		  var olink = selectedItems;
		  var opcao = $("#status").val();
		  var type = $("#type").val();
		 
		  jQuery.ajax(
		  {
		  	
			method: "get",
			
			url: type+"/action.php",
			
			data: "id="+olink+"&status="+opcao+"&opcao=1",
			
			beforeSend: function(){
			  
			 	jQuery("#status_operacao").show("fast");
			},
			
			complete: function(){
			
			jQuery("#status_operacao").hide("slow");
			},
			
			success: function(conteudo){
				
				location.href='principal.php?type='+type+'';
				
			}
		  }
		);	    
		return false;
	  }
	);
	
});	

//mostra as opções para editar o post
function posts(idpost) {
		$('.opcoes_post'+idpost).removeAttr('style');	
}
//mostra as opções para editar o post
function posts_out(idpost) {
		$('.opcoes_post'+idpost).attr('style','display:none');	
}