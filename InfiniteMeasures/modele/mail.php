<?php

    $array = array("emailTo" => "", "object" => "", "message" => "", "emailError" => "", "objectError" => "", "messageError" => "", "isSuccess" => false);
    
    // $email = $bdd->query('SELECT mail FROM utilisateur WHERE idUtilisateur="' . $_COOKIE['idUtilisateur'].'"');

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 

        $array["emailTo"] = test_input($_POST["emailTo"]);
        $array["object"] = test_input($_POST["object"]);
        $array["message"] = test_input($_POST["message"]);

        $array["isSuccess"] = true; 
        $emailText = "";
        

        if(!isEmail($array["emailTo"])) 
        {
            $array["emailError"] = "Veuillez rentrer un mail conforme.";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "De : {$array['emailTo']}\n";
        }


        if (empty($array["object"]))
        {
            $array["objectError"] = "Veuillez saisir l'objet de votre message.";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Objet: {$array['object']}\n\n";
        }

        if (empty($array["message"]))
        {
            $array["messageError"] = "Veuillez saisir votre message.";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Message: \n\n{$array['message']}\n";
        }
        
        if($array["isSuccess"]) 
        {
        
            $headers = "From: Infinite Measures <{$userinfo['mail']}>\r\nReply-To: {$userinfo['mail']}";
            
            mail($array["emailTo"], $array["object"], $emailText, $headers);
        }
        
    }




    function isEmail($email) 
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


 
?>