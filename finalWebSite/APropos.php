<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';

?>


<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8" />
        <link href="css/APropos.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <title>A Propos - Reflex</title>
    </head>

    <body>

        <?php include("includes/header.php"); ?>


        <section>
            <h1>À Propos</h1>
              
           <br/>
               <h4> Qui sommes nous ? </h4>
               <article>    <br/>  Infinite Measures est un installateur de solutions «clé en main» pour les centres d’évaluation psychotechniques. Nous développons les tests qui prouve que vous êtes capable de conduire!
                <br/> 
            </article><br/><br/>


            <h4> Que faisons nous ?  </h4>
            <br/>
            <article>
                Les tests que nous produisons permettent déterminer l'aptiptude ou non d'un conducteur à repasser le code après que ce dernier le lui ait été retiré. 
                Pour cela notre solution va évaluer à partir de cinq épreuves, sous la surveillance d'un gestionnaire, les compétences du conducteur dans divers domaines. 
                A partir des résultats de ces tests, le gestionnaire sera en mesure de fournir une interprétation à la capacité, ou non, du conducteur à repasser le permis. 
            </article> <br/><br/>

                <h4> Au service de l'humain </h4>
               <br/><article>
                Le souhait d'Infinite Measures est de toujours améliorer la sécurité et la liberté des conducteurs. Nos tests reconnu par les médecins vous aident à pouvoir retrouver la liberté de mouvements que vous méritez.  <br/>
                </article><br/><br/>


                <h4> Les conducteurs sont nos amis<br/></h4>
                <article>    
                <br/>
                Nous avons conçu ce test avec pour objectif de fournir une vision la plus précise possible du niveau actuel de l'utilisateur et afin qu'il puisse passer le permis en toute sérénité. 
                Dans le cas où le conducteur était déterminé inapte à repasser le permis, nos épreuves fournissent un résultats suffisament fin et précis pour permettre au gestionnaire de correctement guider le condcuteur sur le chemin de la réussite.<br/>
            </article><br/><br/>
       
        </section>

        <?php include("includes/footer.php"); ?>
        
    </body>
</html>