<?php
    include(".database.php");
    try {
        if (isset($_POST["niveau"]) && isset($_POST["cin"])  && isset($_POST["tele"]) && isset($_POST["email"])
            && isset($_POST["nom"]) && isset($_POST["prenom"])  && isset($_POST["naissance"]) && isset($_POST["adresse"])
            && isset($_POST["parent_name"]) && isset($_POST["parent_last_name"])  && isset($_POST["descr_parent"]) ){
            $nom = addslashes(htmlspecialchars($_POST["nom"]));
            $prenom = addslashes(htmlspecialchars($_POST["prenom"]));
            $adresse = addslashes(htmlspecialchars($_POST["adresse"]));
            $dateNs = addslashes(htmlspecialchars($_POST["naissance"]));
            $niveau = addslashes(htmlspecialchars($_POST["niveau"]));
            $email = addslashes(htmlspecialchars($_POST["email"]));
            $tele = addslashes(htmlspecialchars($_POST["tele"]));
            $parent_name = addslashes(htmlspecialchars($_POST["parent_name"]));
            $parent_last_name = addslashes(htmlspecialchars($_POST["parent_last_name"]));
            $sexe = addslashes(htmlspecialchars($_POST["sexe"]));
            $cin = addslashes(htmlspecialchars($_POST["cin"]));
            $descr_parent = addslashes(htmlspecialchars($_POST["descr_parent"]));
            $dateInsc = Date("Y-m-d");
            $requet = "INSERT INTO inscription (nom,prenom,sexe,parent_name,parent_last_name,datenaissance,dateInsc,adresse,tele,email,cin_parent,descr_parent, id_niveau) VALUES ('$nom','$prenom','$sexe','$parent_name','$parent_last_name','$dateNs','$dateInsc','$adresse','$tele','$email','$cin','$descr_parent',$niveau)";
            $db->exec($requet);
            header("Refresh:0; url=inscription.php");
            exit();
        }
        if (true) {
            $to = "mqamyouness1998@outlook.com";
            $subject = "HTML email";
            $message = "
                    <html>
                        <head>
                            <title>HTML email</title>
                        </head>
                        <body>
                            <p>This email contains HTML Tags!</p>
                        </body>
                    </html>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <mqamyouness18@gmail.com>' . "\r\n";
            $headers .= 'Cc: myboss@example.com' . "\r\n";
            mail($to,$subject,$message,$headers);
        }
    } catch (\Throwable $th) {
        
    }
?>
