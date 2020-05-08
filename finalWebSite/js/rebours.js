
var compteur=30; 
var rebours = setInterval(
function()
{
    var compte_a_rebours = document.getElementById("compte_a_rebours");
    
    compte_a_rebours.style.color = "red";
    compte_a_rebours.style.marginLeft = "20px";
    compte_a_rebours.style.padding = "20px";
    
    compte_a_rebours.style.fontSize = "40px";
    compte_a_rebours.style.border = "2px #333 solid";
   	console.log(compteur);
    compte_a_rebours.innerHTML = '00 : ' + compteur; 
    
    compteur--; 
    if(compteur==0)
    {
    	setTimeout(function() 
    	{
    		console.log("START");
    		compte_a_rebours.innerHTML = "START !"; 
            compte_a_rebours.style.marginLeft = "20px";
    		clearInterval(rebours);
    	},1000);
    }
    
},1000);


	
