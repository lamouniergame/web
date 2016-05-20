$(document).ready(function(){
	$('#cploiro').mask('999.999.999-99');
});
$(document).ready(function(){
	$('#data').mask('99/99/9999');
});

function testDate(){
	var currVal = document.querySelector("#data").value;
 	if(currVal == '')
    	document.getElementById("alertdata").innerHTML = "Data Inválida";  
 	var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; 
    var dtArray = currVal.match(rxDatePattern); // is format OK?
	if (dtArray == null)
   		document.getElementById("alertdata").innerHTML = "Data Inválida";
 		dtDay = dtArray[1];
  		dtMonth= dtArray[3];
  		dtYear = dtArray[5];
  	if (dtMonth < 1 || dtMonth > 12)
     	document.getElementById("alertdata").innerHTML = "Data Inválida"; 
 	else if (dtDay < 1 || dtDay> 31)
     	document.getElementById("alertdata").innerHTML = "Data Inválida"; 
  	else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
    	document.getElementById("alertdata").innerHTML = "Data Inválida"; 
  	else if (dtMonth == 2)
  	{
    var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
     if (dtDay> 29 || (dtDay ==29 && !isleap))
         document.getElementById("alertdata").innerHTML = "Data Inválida"; 
  	}
 	return true;
}
