<?php

    $array = array("email" => "", "name" => "", "firstname" => "", "object" => "", "message" => "", "firstnameError" => "", "nameError" => "", "emailError" => "", "objectError" => "", "messageError" => "", "isSuccess" => false);
    $emailTo = "InfiniteMeasures@mail.com";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $array["email"] = test_input($_POST["email"]);
        $array["name"] = test_input($_POST["name"]);
        $array["firstname"] = test_input($_POST["firstname"]);
        
        
        $array["object"] = test_input($_POST["object"]);
        $array["message"] = test_input($_POST["message"]);
        $array["isSuccess"] = true; 
        $emailText = "";
        
        if (empty($array["firstname"]))
        {
            $array["firstnameError"] = "Saisissez votre prénom.";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Firstname: {$array['firstname']}\n";
        }

        if (empty($array["name"]))
        {
            $array["nameError"] = "Saisissez votre nom.";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Name: {$array['name']}\n";
        }

        // if(!isEmail($array["email"])) 
        // {
        //     $array["emailError"] = "Veuillez rentrer un mail conforme.";
        //     $array["isSuccess"] = false; 
        // } 
        // else
        // {
        //     $emailText .= "Email: {$array['email']}\n";
        // }


        if (empty($array["object"]))
        {
            $array["objectError"] = "Veuillez saisir l'objet de votre message.";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Object: {$array['object']}\n\n";
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
            // $headers = "From: {$array['firstname']} {$array['name']} <{$array['email']}>\r\nReply-To: {$array['email']}";
            $headers = "From: Infinite Measures <{$emailTo}>\r\nReply-To: {$emailTo}";
            // mail($emailTo, "Un message de votre site", $emailText, $headers);
            mail($array['email'], $array["object"], $emailText, $headers);
        }
        
        echo json_encode($array);
        
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

    // function isPhone($phone) 
    // {
    //     return preg_match("/^[0-9 ]*$/",$phone);
    // }
 
?>


