//$(document).ready( function(){ 
	function tambah(){  
	  $(".table-common").append('<tr id="item"><td><input type="text" class="auto" name="anggota[]"></td></tr>').children(':last');
	  
	  $(".auto").autocomplete({ 
	  minLength:1, 
	  source: 
	  function(req, add){ 
	   $.ajax({ 
	   url:"c_lookup/lookup", 
	  dataType:'json', 
	  type:'POST', 
	  data: req, 
	  success: 
	   function(data){ 
	  // alert(data.message);
	   if(data.response =="true"){ 
	   add(data.message); 
	   } 
	   }, 
	   }); 
	  }, 
	  select: 
	  function(event, ui){ 
	  $("#result").append( 
	  "<li>"+ ui.item.id +"</li>" 
	 ); 
	 
	  }, 
	 }); 
}
//}); 



// function tambah(){
// $(".table-common").append('<tr id="item"><td><input type="text" class="auto" name="anggota[]"></td></tr>').children(':last');
// }

function hapus(){
 $(".table-common tr:last-child").remove();
 }
