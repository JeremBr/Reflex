
function rebours (temps1,temps2)
{
var compteur=temps1; 
var min; 
var sec;
var rebours = setInterval(
function()
{
    var texte = document.getElementById("texte");
    texte.innerHTML = "Votre test débutera dans : ";
    texte.style.marginLeft = "20px";
    texte.style.marginBottom = "10px";
    texte.style.fontSize = "20px";

    var compte_a_rebours = document.getElementById("compte_a_rebours");
    compte_a_rebours.style.color = "red";
    compte_a_rebours.style.marginLeft = "20px";
    compte_a_rebours.style.padding = "20px";
    compte_a_rebours.style.fontSize = "40px";
    compte_a_rebours.style.border = "2px #333 solid";

   	console.log(compteur);
    min = Math.trunc(compteur/60);
    sec = compteur - min*60;
    if(sec<10)
        {
            compte_a_rebours.innerHTML = '0'+ min + " : " + '0' + sec; 
        }
        else
        {
            compte_a_rebours.innerHTML = '0'+ min + " : " + sec; 
        } 
    
    compteur--; 
    if(compteur==0)
    {
    	setTimeout(function() 
    	{
            console.log("START");
    		compte_a_rebours.innerHTML = "START !"; 
            compte_a_rebours.style.marginLeft = "20px";
            texte.innerHTML = "";
            
    	},1000);

        
        clearInterval(rebours);

        setTimeout(function()
        {
        var compteur1 = temps2;
        var min1; 
        var sec1;
        var chrono = setInterval(
        function()
        {
        
        var texte = document.getElementById("texte");
        texte.innerHTML = "Il vous reste : ";
        texte.style.marginLeft = "20px";
        texte.style.marginBottom = "10px";
        texte.style.fontSize = "20px";
        
        var compte_a_rebours = document.getElementById("compte_a_rebours");
    
        compte_a_rebours.style.color = "red";
        compte_a_rebours.style.marginLeft = "20px";
        compte_a_rebours.style.padding = "20px";
    
        compte_a_rebours.style.fontSize = "40px";
        compte_a_rebours.style.border = "2px #333 solid";
        console.log(compteur1);
        min1 = Math.trunc(compteur1/60);
        sec1 = compteur1 - min1*60;
        if(sec1<10)
        {
            compte_a_rebours.innerHTML = '0'+ min1 + " : " + '0' + sec1; 
        }
        else
        {
            compte_a_rebours.innerHTML = '0'+ min1 + " : " + sec1; 
        }
    
        compteur1--; 
        if(compteur1==0)
        {
        setTimeout(function() 
        {
            console.log("FINI");
            compte_a_rebours.style.marginLeft = "20px";
            compte_a_rebours.innerHTML = "FINI"; 
            texte.innerHTML = "";
            clearInterval(chrono);

        },1000);

        }
    
        },1000);

        },3000);
         
    }
    
},1000);



}

	
