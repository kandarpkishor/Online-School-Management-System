
//Instent User Cheaker With Php
$(document).ready(function()
{
$("#usernm").keyup(function()
	{
		var id=$("#usernm").val();
		var dataString = 'id='+ id;
		$.ajax
		({
			type: "POST",
			url: "cheakuser.php",
			data: dataString,
			cache: false,
			success: function (response) {
				$( '#p1' ).html(response);
				   if(response=="OK")	
				   {
					return true;	
				   }
				   else
				   {
					return false;	
				   }
			  }
			//(html)
			//{
				//$("p").html(html);
				//$("#usernm").val("");
				
			//} 
		});
	});
	
});
//close Instent User cheaker

//Password and Reentered password cheaker
$(document).ready(function()
{
$("#pass2").keyup(function()
	{
		var pass1=$("#pass1").val();
		var pass2=$("#pass2").val();
		if(pass2!="")
		{
			if(pass1==pass2)
			{
				$("#p2").css({"color":"green", "font-weight":"bold"});
				$("#p2").text("Pasword matched.");
			}
			else
			{
				$("#p2").css({"color":"red", "font-weight":"bold"});
				$("#p2").text("Pasword does not matched.");
			}
		}
		else
		{
			$("#p2").text("");
		}
	});
	
});
//close passeord and reentered password cheaker

//passeord strength cheaker
$(document).ready(function()
{
$("#pass1").keyup(function(){
	$("#pas_span").html(checkStrength($("#pass1").val()))
});
function checkStrength(pass1){
	var strength=0;
	if (pass1.length<6)
	{
		$("#pas_span").css({"background":"red", "width":"25%"} );
		return '';
	}
	if(pass1.length>7)
	{
		strength +=1;
	}
	if(pass1.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
	{
		strength +=1;
	}
	if(pass1.match(/([a-zA-Z])/)&& pass1.match(/([0-9])/))
	{
		strength +=1;
	}
	if(pass1.match(/([!,@,#,$,%,^,&,*,_,~,?])/))
	{
		strength=strength+1;
	}
	if(pass1.match(/(.*[!,@,#,$,%,^,&,*,_,~,?].*[!,@,#,$,%,^,&,*,_,~,?])/))
	{
		strength=strength+1;
	}
	if(strength<2)
	{
		$("#pas_span").css({"background":"orange","width":"50%"} );
		
		//return 'Week';
	}
	else if(strength==2)
	{
		$("#pas_span").css({"background":"blue" ,"width":"75%"} );
		//return 'Good';
	}
	else
	{
		$("#pas_span").css({"background":"green", "width":"100%"} );
		//return 'Strong';
	}
}	
});
<script>
								function sameAs() {
							  // Get the checkbox
							  var checkBox = document.getElementById("sameas");
							  // Get the output text
							  

							  // If the checkbox is checked, display the output text
							  if (checkBox.checked == true){
								var p_add = document.getElementById("p_add").value;
								var p_dis = document.getElementById("p_dis").value;
								var p_stat = document.getElementById("p_stat").value;
								var p_pin = document.getElementById("p_pin").value;
								var p_mob = document.getElementById("p_mob").value;
								var p_mob2 = document.getElementById("p_mob2").value;
								document.getElementById("c_add").value = p_add;
								document.getElementById("c_add").disabled = true;
								document.getElementById("c_dis").value = p_dis;
								document.getElementById("c_dis").disabled = true;
								document.getElementById("c_stat").value = p_stat;
								document.getElementById("c_stat").disabled = true;
								document.getElementById("c_pin").value = p_pin;
								document.getElementById("c_pin").disabled = true;
								document.getElementById("c_mob").value = p_mob;
								document.getElementById("c_mob").disabled = true;
								document.getElementById("c_mob2").value = p_mob2;
								document.getElementById("c_mob2").disabled = true;
							  
							  
							} else {
								document.getElementById("c_add").value ='';
								document.getElementById("c_add").disabled = false;
								document.getElementById("c_dis").value ='';
								document.getElementById("c_dis").disabled =false;
								document.getElementById("c_stat").value = '';
								document.getElementById("c_stat").disabled = false;
								document.getElementById("c_pin").value = '';
								document.getElementById("c_pin").disabled = false;
								document.getElementById("c_mob").value = '';
								document.getElementById("c_mob").disabled = false;
								document.getElementById("c_mob2").value = '';
								document.getElementById("c_mob2").disabled = false;
							  
							  }
							}
							function openText() {
							  // Get the checkbox
							  var checkBox = document.getElementById("transport");
							  // Get the output text
							  var text_transport = document.getElementById("stopage_id");

							  // If the checkbox is checked, display the output text
							  if (checkBox.checked == true){
								text_transport.style.display = "inline";
								text_transport.setAttribute("required", "required");
							  } else {
								text_transport.style.display = "none";
								
							  }
							}
							
							
			</script>




//close password strength cheaker