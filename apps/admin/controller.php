<?php
    include("../../.database.php");
    try {
        session_start();
        if(isset($_POST['niveau']) && isset($_POST['prix_annuel']) && isset($_POST['prix_mensuel'])){
            $libelle = $_POST['niveau'];
            $prix_annuel = $_POST['prix_annuel'];
            $prix_mensuel = $_POST['prix_mensuel'];
            $requet = "INSERT INTO niveau(libelle,prix_annuel,prix_mensuel) VALUES ('$libelle','$prix_annuel','$prix_mensuel')";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم اضافة مستوى بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في تنفيذ عملية','nonValide'];
            header('Location: niveau.php');
            exit();
        }
        if (isset($_POST['removeNiveau'])) {
            $niveau = $_POST['removeNiveau'];
            $requet = "DELETE FROM niveau WHERE id = $niveau ";
                if($db->exec($requet))
                $_SESSION["message"] = ['تم الحذف بنجاح','valide'];
            else
                $_SESSION["message"] = ['فشل في الحذف ','nonValide'];
            header('Location: niveau.php');
            exit();

        }
        if (isset($_POST['niveauEditLibelle']) && isset($_POST['niveauEdit']) && isset($_POST['prix_annuelEdit']) && isset($_POST['prix_mensuelEdit']) ){
            $niveau = $_POST['niveauEdit'];
            $prix_annuel = $_POST['prix_annuelEdit'];
            $prix_mensuel = $_POST['prix_mensuelEdit'];
            $libelle =  addslashes(htmlspecialchars($_POST['niveauEditLibelle']));
            $requet = "UPDATE niveau SET libelle = '$libelle' , prix_annuel = '$prix_annuel' , prix_mensuel = '$prix_mensuel'  WHERE id = $niveau ";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم تغيير معلومات  بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في تنفيذ عملية','nonValide'];
            header('Location: niveau.php');
            exit();
        }
        if(isset($_POST['niveau']) && isset($_POST['classe'])){
            $libelle =  addslashes(htmlspecialchars($_POST['classe']));
            $niveau = $_POST['niveau'];
            $requet = "INSERT INTO classe(libelle,id_niveau) VALUES ('$libelle',$niveau)";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم اضافة مستوى بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في تنفيذ عملية','nonValide'];
            header('Location: classe.php');
            exit();
        }
        if (isset($_POST['removeClasse'])) {
            $classe = $_POST['removeClasse'];
            $requet = "DELETE FROM classe WHERE id = $classe ";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم الحذف بنجاح','valide'];
            else
                $_SESSION["message"] = ['فشل في الحذف ','nonValide'];
            header('Location: classe.php');
            exit();
        }
        if (isset($_POST['classeEditLibelle']) && isset($_POST['classeEdit'])) {
            $classe = $_POST['classeEdit'];
            $libelle =  addslashes(htmlspecialchars($_POST['classeEditLibelle']));
            $requet = "UPDATE classe SET libelle = '$libelle' WHERE id = $classe ";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم تغيير معلومات  بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في تنفيذ عملية','nonValide'];
            header('Location: classe.php');
            exit();
        }
        if(isset($_POST['niveau']) && isset($_POST['classe']) && isset($_POST['groupe']) ){
            $libelle = $_POST['groupe'];
            $classe = $_POST['classe'];
            $requet = "INSERT INTO groupe(libelle,id_classe) VALUES ('$libelle',$classe)";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم اضافة  بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في تنفيذ عملية','nonValide'];
            header('Location: groupe.php');
            exit();
        }
        if (isset($_POST['removeGroupe'])) {
            $groupe = $_POST['removeGroupe'];
            $requet = "DELETE FROM groupe WHERE id = $groupe ";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم الحذف بنجاح','valide'];
            else
                $_SESSION["message"] = ['فشل في الحذف ','nonValide'];
            header('Location: groupe.php');
            exit();
        }
        if (isset($_POST['groupeEditLibelle']) && isset($_POST['groupeEdit'])) {
            $groupe = $_POST['groupeEdit'];
            $libelle =  addslashes(htmlspecialchars($_POST['groupeEditLibelle']));
            $requet = "UPDATE groupe SET libelle = '$libelle' WHERE id = $groupe ";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم تغيير معلومات  بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في تنفيذ عملية','nonValide'];
            header('Location: groupe.php');
            exit();
        }
        if (isset($_POST['removeCall'])) {
            $call = $_POST['removeCall'];
            $requet = "DELETE FROM calls WHERE id = $call ";
                if($db->exec($requet))
                $_SESSION["message"] = ['تم الحذف بنجاح','valide'];
            else
                $_SESSION["message"] = ['فشل في الحذف ','nonValide'];
            header('Location: calls.php');
            exit();
        }
        if (isset($_POST['removePaimentOfManth_etudiant']) && isset($_POST['removePaimentOfManth_anneeScolaire']) &isset($_POST['removePaimentOfManth_mois'])) {
            $etudiant = $_POST['removePaimentOfManth_etudiant'];
            $anneescolaire = $_POST['removePaimentOfManth_anneeScolaire'];
            $mois = $_POST['removePaimentOfManth_mois'];
            $requet = "DELETE FROM devoir_mensuel WHERE id_etudiant = $etudiant AND id_anneeScolaire = $anneescolaire AND mois = $mois ";
            echo $requet;
            if($db->exec($requet))
                $_SESSION["message"] = ['تم الحذف بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في الحذف ','nonValide'];
            header('Location: tablePaiement.php');
            exit();
        }
        if (isset($_POST['removeNewsLetter'])) {
            $email = $_POST['removeNewsLetter'];
            $requet = "DELETE FROM newsletter WHERE email = '$email' ";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم الحذف بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في الحذف ','nonValide'];
            header('Location: newsletter.php');
            exit();
        }
        if(isset($_POST["nameAdmin"]) && isset($_POST["lastnameAdmin"])  && isset($_POST["emailAdmin"]) && isset($_POST["teleAdmin"]) && isset($_POST["usernameAdmin"]) )
        {
            $name =  addslashes(htmlspecialchars($_POST["nameAdmin"]));
            $lastname =  addslashes(htmlspecialchars($_POST["lastnameAdmin"]));
            $email =  addslashes(htmlspecialchars($_POST["emailAdmin"]));
            $username =  addslashes(htmlspecialchars($_POST["usernameAdmin"])); 
            $tele =  addslashes(htmlspecialchars($_POST["teleAdmin"]));
            $pass = "";
            if(isset($_POST["passwordAdmin"])){
                $password = $_POST["passwordAdmin"];
                $password =  md5($password);
                $pass = ", password = '$password'";
            }
        
            $requet = "UPDATE administrateur SET nom = '$lastname' , prenom = '$name', tele = '$tele' , email = '$email' , username = '$username' $pass WHERE id = " . $_SESSION["admin"]["id"];
            if($db->exec($requet))
                $_SESSION["message"] = ['تم حفظ التغييرات بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في تنفيذ عملية','nonValide'];
            $_SESSION["admin"] = select("SELECT * FROM administrateur WHERE id = ". $_SESSION["admin_SESSION"])[0];
            header('Location: profile.php');
            exit();
        }
        if (isset($_POST['removePhoto'])) {
            $photo = $_POST['removePhoto'];
            $requet = "DELETE FROM galerie WHERE id = $photo ";
            $db->exec($requet);
            if($db->exec($requet))
                $_SESSION["message"] = ['تم الحذف بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في الحذف','nonValide'];
            exit();
        }
        if(isset($_POST['upload'])){
            $uploaddir = '../.asset/upload/._imgs/';
            $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
            $imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
                $photo = addslashes(htmlspecialchars($_FILES['photo']['name']));
                $date = Date("Y-m-d");
                $requet = "INSERT INTO galerie(link, dataUpload, visibility) VALUES ('$photo','$date',1)";
            }
            $db->exec($requet);
            header('Location: galerie.php');
            exit();
        }
        if(isset($_POST['add']) && isset($_POST['title']) && isset($_POST['text'])){
            $uploaddir = '../.asset/upload/._imgs/';
            $uploadfile = $uploaddir . basename($_FILES['img']['name']);
            $imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                $img = addslashes(htmlspecialchars($_FILES['img']['name']));
                $title = addslashes(htmlspecialchars($_POST['title']));
                $text = addslashes(htmlspecialchars($_POST['text']));
                $date = Date("Y-m-d");
                $requet = "INSERT INTO activity(img, data_pub, visibility, title, content) VALUES ('$img','$date',1,'$title', '$text')";
            }
            if($db->exec($requet))
                $_SESSION["message"] = ['تم اضافة النشاط بنجاح','valide'];
            else
                $_SESSION["message"] = ['فشل في تحميل النشاط  ...!','nonValide'];
            header("Refresh:0; url=activity.php");
            exit();
        }/********go here */
        if(isset($_POST['update']) && isset($_POST['titleUpdate']) && isset($_POST['textUpdate']) && isset($_POST["updateActivity"])){
            $uploaddir = '../.asset/upload/._imgs/';
            $uploadfile = $uploaddir . basename($_FILES['img']['name']);
            $imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                $img = addslashes(htmlspecialchars($_FILES['img']['name']));
                $requet = "UPDATE activity SET  img = '$img' WHERE id = $activity";
                $db->exec($requet);
            }
            $activity = $_POST['updateActivity'];
            $title = addslashes(htmlspecialchars($_POST['title']));
            $text = addslashes(htmlspecialchars($_POST['text']));
            $requet = "UPDATE activity SET  title = '$title', content ='$text' WHERE id = $activity";
            $db->exec($requet);
            header("Refresh:0; url=activity.php");
            exit();
        }
        if(isset($_POST['uploadAds'])){
            $uploaddir = '../.asset/upload/._imgs/';
            $uploadfile = $uploaddir . basename($_FILES['imgAds']['name']);
            $imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES['imgAds']['tmp_name'], $uploadfile)) {
                $photo = addslashes(htmlspecialchars($_FILES['imgAds']['name']));
                $date = Date("Y-m-d");
                $requet = "INSERT INTO ads(date_pub,img) VALUES ('$date','$photo')";
            }
            echo $requet;
            if($db->exec($requet))
                $_SESSION["message"] = ['تم تحميل بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في تحميل الاعلان ','nonValide'];
            header("Refresh:0; url=ads.php");
            exit();
        }
        if (isset($_POST['removeAds'])) {
            $ads = $_POST['removeAds'];
            $requet = "DELETE FROM ads WHERE id = $ads ";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم حذف اعلان بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في الحذف اعلان','nonValide'];
            header("Refresh:0; url=ads.php");
            exit();
        }
        if (isset($_POST['removeActivity'])) {
            $activity = $_POST['removeActivity'];
            $requet = "DELETE FROM activity WHERE id = $activity ";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم الحذف بنشاط نجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في الحذف','nonValide'];
            header("Refresh:0; url=activity.php");
            exit();
        }
        if (isset($_POST['removeStudent'])) {
            $id = $_POST['removeStudent'];
            $requet = "DELETE FROM etudiant WHERE id = $id ";
            if($db->exec($requet))
                $_SESSION["message"] = ['تم الحذف بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في الحذف','nonValide'];
        }
        if (isset($_POST["prenomEt"]) && isset($_POST['famille']) && isset($_POST['cneEt']) && isset($_POST['sexeEt']) && isset($_POST["date_naissanceEt"])
            && isset($_POST['prix_mensuelEt'])  && isset($_POST['prix_annuelEt']) && isset($_POST["groupeEt"]) && isset($_POST["school_yearEt"]) ) {
            $famille = select("SELECT id,nom_pere,prenom_pere,nom_mere,prenom_mere,cin_pere,cin_mere FROM famille WHERE id = ".$_POST['famille']);
            $dateInsc = Date("Y-m-d");
            $myObj  = new stdClass();
            $myObj->nom = $famille[0]['nom_pere'];
            $myObj->prenom_pere = $famille[0]['prenom_pere'];
            $myObj->cin_pere = $famille[0]['cin_pere'];
            $myObj->nom_mere = $famille[0]['nom_mere'];
            $myObj->prenom_mere = $famille[0]['prenom_mere'];
            $myObj->cin_mere = $famille[0]['cin_mere'];
            $myObj->enfants = array();
            $enf = array();            
            $id_famille = $famille [0]['id'];
            $nom =  addslashes(htmlspecialchars($famille[0]['nom_pere']));
            $prenom =  addslashes(htmlspecialchars($_POST['prenomEt']));
            $sexe = $_POST['sexeEt'];
            $datenaissance = $_POST['date_naissanceEt'];
            $CNE =  addslashes(htmlspecialchars($_POST['cneEt']));
            $dateInsc = Date("Y-m-d");
            $requet = "INSERT INTO etudiant(nom, prenom, datenaissance, sexe, CNE,dateInsc,id_famille) VALUES ('$nom', '$prenom', '$datenaissance', '$sexe','$CNE', '$dateInsc',$id_famille)";
            if(!$db->exec($requet)){
                $_SESSION["message"] = ['!... فشل في التسجيل ','nonValide']; 
            } 
            $etudiant = select("SELECT id FROM etudiant ORDER BY id DESC LIMIT 1");
            $etudiant = $etudiant[0][0];
            $groupe = $_POST['groupeEt'];
            $school_year = $_POST['school_yearEt'];
            $prix_annuel = $_POST['prix_annuelEt'];
            $prix_mensuel = $_POST['prix_mensuelEt'];
            $requet = "INSERT INTO parcours(id_groupe,id_etudiant,id_anneeScolaire,prix_annuel,prix_mensuel) VALUES ($groupe,$etudiant,$school_year,$prix_annuel,$prix_mensuel)";
            $db->exec($requet);
            $enfant =  new stdClass();
            $enfant->prenom = $prenom;
            $enfant->sexe = $sexe;
            $enfant->CNE = $CNE;
            $enfant->classe = $_POST["classeEt"];
            $enfant->niveau = $_POST["niveauEt"];
            $enfant->prix_annuel = $prix_annuel;
            $enfant->prix_mensuel = $prix_mensuel;
            $enfant->dateInsc = $dateInsc;
            $schoolyear = select("SELECT annee_debut,annee_fin FROM anneescolaire WHERE id = $school_year");
            $enfant->school_year = $schoolyear[0][0]."/".$schoolyear[0][1];
            array_push($enf,$enfant);
            $myObj->enfants = $enf;
            $_SESSION["etudiant"] = $myObj;
            header("Refresh:0; url=inscription.php");
            exit();
        }
        if(isset($_POST['cost']) && isset($_POST['prix'])){
            $prix = $_POST['prix'];
            $cost = $_POST['cost'];
            $requet = "UPDATE costs SET  prix = $prix WHERE id LIKE '$cost'";
            $db->exec($requet);        
            header("Refresh:0; url=index.php");
            exit();
        }
        if ( isset($_POST['nom_pere']) && isset($_POST["prenom_pere"]) && isset($_POST["nom_mere"]) && isset($_POST["prenom_mere"]) 
            && isset($_POST["tele_mere"]) && isset($_POST["tele_pere"]) && isset($_POST["cin_mere"]) && isset($_POST["cin_pere"]) ) {
            $nom = $_POST['nom_pere'];
            $nom_pere = $_POST['nom_pere'];
            $adresse = $_POST['adresse'];
            $email = $_POST['email'];
            $tele_mere = $_POST['tele_mere'];
            $tele_pere = $_POST['tele_pere'];
            $cin_mere = $_POST['cin_mere'];
            $cin_pere = $_POST['cin_pere'];
            $prenom_pere = $_POST['prenom_pere'];
            $nom_mere = $_POST['nom_mere'];
            $prenom_mere = $_POST['prenom_mere'];
            $requet = "INSERT INTO famille(nom_pere, prenom_pere, nom_mere, prenom_mere, adresse, email, tele_mere, tele_pere, cin_pere, cin_mere) VALUES ('$nom_pere', '$prenom_pere', '$nom_mere', '$prenom_mere', '$adresse', '$email', '$tele_mere', '$tele_pere', '$cin_pere', '$cin_mere')";
            $db->exec($requet);
            $famille = select("SELECT id FROM famille ORDER BY id DESC LIMIT 1 ");
            $dateInsc = Date("Y-m-d");
            $myObj  = new stdClass();
            $myObj->nom = $nom;
            $myObj->prenom_pere = $prenom_pere;
            $myObj->cin_pere = $cin_pere;
            $myObj->nom_mere = $nom_mere;
            $myObj->prenom_mere = $prenom_mere;
            $myObj->cin_mere = $cin_mere;
            $myObj->enfants = array();
            $enf = array();
            if (isset($_POST["prenomList"])  && isset($_POST['sexeList']) && isset($_POST["date_naissanceList"]) && isset($_POST["groupeList"]) && isset($_POST["school_yearList"])) {
                $id_famille = $famille [0][0];
                $prenomList = $_POST['prenomList'];
                $sexeList = $_POST['sexeList'];
                $date_naissanceList = $_POST['date_naissanceList'];
                $CNEList = $_POST['cneList'];
                for ($i=0; $i < count($prenomList); $i++) { 
                    $requet = "INSERT INTO etudiant(nom, prenom, datenaissance, sexe, CNE,dateInsc,id_famille) VALUES ('$nom', '$prenomList[$i]', '$date_naissanceList[$i]', '$sexeList[$i]','$CNEList[$i]', '$dateInsc',$id_famille)";
                    $db->exec($requet);
                    $etudiant = select("SELECT id FROM etudiant ORDER BY id DESC LIMIT 1");
                    $etudiant = $etudiant[0][0];
                    $groupeList = $_POST['groupeList'];
                    $school_yearList = $_POST['school_yearList'];
                    $prix_annuelList = $_POST['prix_annuelList'];
                    $prix_mensuelList = $_POST['prix_mensuelList'];
                    $requet = "INSERT INTO parcours(id_groupe,id_etudiant,id_anneeScolaire,prix_annuel,prix_mensuel) VALUES ($groupeList[$i],$etudiant,$school_yearList[$i],$prix_annuelList[$i],$prix_mensuelList[$i])";
                    $db->exec($requet);
                    $enfant =  new stdClass();
                    $enfant->prenom = $prenomList[$i];
                    $enfant->date_naissance = $date_naissanceList[$i];
                    $enfant->sexe = $sexeList[$i];
                    $enfant->CNE = $CNEList[$i];
                    $enfant->classe = $_POST["classeList"][$i];
                    $enfant->niveau = $_POST["niveauList"][$i];
                    $enfant->prix_annuel = $prix_annuelList[$i];
                    $enfant->dateInsc = $dateInsc;
                    $enfant->prix_mensuel = $prix_mensuelList[$i];
                    $schoolyear = select("SELECT annee_debut,annee_fin FROM anneescolaire WHERE id = $school_yearList[$i]");
                    $enfant->school_year = $schoolyear[0][0]."/".$schoolyear[0][0];
                    array_push($enf,$enfant);
                }
            } elseif( isset($_POST["prenom"])  && isset($_POST['sexe']) && isset($_POST["date_naissance"]) && isset($_POST["_groupe"]) && isset($_POST["school_year"]) ) {
                $id_famille = $famille [0][0];
                $prenom = $_POST['prenom'];
                $sexe = $_POST['sexe'];
                $datenaissance = $_POST['date_naissance'];
                $CNE = $_POST['cne'];
                $dateInsc = Date("Y-m-d");
                $requet = "INSERT INTO etudiant(nom, prenom, datenaissance, sexe, CNE,dateInsc,id_famille) VALUES ('$nom', '$prenom', '$datenaissance', '$sexe','$CNE', '$dateInsc',$id_famille)";
                $db->exec($requet);
                $etudiant = select("SELECT id FROM etudiant ORDER BY id DESC LIMIT 1");
                $etudiant = $etudiant[0][0];
                $groupe = $_POST['_groupe'];
                $school_year = $_POST['school_year'];
                $prix_annuel = $_POST['prix_annuel'];
                $prix_mensuel = $_POST['prix_mensuel'];
                $requet = "INSERT INTO parcours(id_groupe,id_etudiant,id_anneeScolaire,prix_annuel,prix_mensuel) VALUES ($groupe,$etudiant,$school_year,$prix_annuel,$prix_mensuel)";
                $db->exec($requet);
                $enfant =  new stdClass();
                $enfant->prenom = $prenom;
                $enfant->sexe = $sexe;
                $enfant->CNE = $CNE;
                $dataInfo = select("SELECT n.libelle,c.libelle FROM niveau n INNER JOIN classe c ON c.id_niveau = n.id WHERE c.id = ".$_POST["_classe"]);
                $enfant->classe = $dataInfo[0][1];
                $enfant->niveau = $dataInfo[0][0];
                $enfant->prix_annuel = $prix_annuel;
                $enfant->prix_mensuel = $prix_mensuel;
                $enfant->dateInsc = $dateInsc;
                $schoolyear = select("SELECT annee_debut,annee_fin FROM anneescolaire WHERE id = $school_year");
                $enfant->school_year = $schoolyear[0][0]."/".$schoolyear[0][1];
                array_push($enf,$enfant);
            }
            $myObj->enfants = $enf;
            $_SESSION["etudiant"] = $myObj;
            header("Refresh:0; url=inscription.php");
            exit();
        }
        if (isset($_POST['removeParcour_etudiant']) && isset($_POST['removeParcour_anneescolaire']) && isset($_POST['removeParcour_groupe'])) {
            $etudiant = $_POST['removeParcour_etudiant'];
            $ranneescolaire = $_POST['removeParcour_anneescolaire'];
            $groupe = $_POST['removeParcour_groupe'];
            $requet = "DELETE FROM parcours WHERE id_etudiant = $etudiant  AND id_anneeScolaire = $ranneescolaire  AND id_groupe = $groupe ";
            echo $requet;
            if($db->exec($requet))
                $_SESSION["message"] = ['تم الحذف بنجاح','valide'];
            else
                $_SESSION["message"] = ['!... فشل في الحذف','nonValide'];
            header("Refresh:0; url=profile_student.php?student=$etudiant");
            exit();
        }
        if ( isset($_POST['nom_pere_update']) && isset($_POST["prenom_pere_update"]) && isset($_POST["nom_mere_update"]) && isset($_POST["prenom_mere_update"]) && isset($_POST["famille_update"])
        && isset($_POST["tele_mere_update"]) && isset($_POST["tele_pere_update"]) && isset($_POST["cin_mere_update"]) && isset($_POST["cin_pere_update"])&& isset($_POST["etudiant_update"]) && 
        isset($_POST["lastname_update"])  && isset($_POST['cne_update']) && isset($_POST["date_naissance_update"]) && isset($_POST['email_update']) && isset($_POST["adresse_update"]) ) {
            $nom_pere = $_POST['nom_pere_update'];
            $adresse = $_POST['adresse_update'];
            $email = $_POST['email_update'];
            $tele_mere = $_POST['tele_mere_update'];
            $tele_pere = $_POST['tele_pere_update'];
            $cin_mere = $_POST['cin_mere_update'];
            $cin_pere = $_POST['cin_pere_update'];
            $prenom_pere = $_POST['prenom_pere_update'];
            $nom_mere = $_POST['nom_mere_update'];
            $prenom_mere = $_POST['prenom_mere_update'];
            $famille = $_POST["famille_update"]; 
            $etudiant = $_POST["etudiant_update"]; 
            $requet = "UPDATE famille SET nom_pere='$nom_pere',prenom_pere='$prenom_pere',nom_mere='$nom_mere',prenom_mere ='$prenom_mere',adresse='$adresse',email='$email',tele_mere='$tele_mere',tele_pere='$tele_pere',cin_pere='$cin_pere', cin_mere='$cin_mere' WHERE id= $famille";
            echo $requet;
            if($db->exec($requet))
            {
                $prenom = $_POST['lastname_update'];
                $datenaissance = $_POST['date_naissance_update'];
                $CNE = $_POST['cne_update'];
                $requet = "UPDATE etudiant SET nom='$nom_pere',prenom='$prenom',datenaissance='$datenaissance',CNE='$CNE' WHERE id = $etudiant";
                echo $requet;
                if($db->exec($requet))
                    $_SESSION["message"] = [' تم تغيير معلومات  بنجاح','valide'];
                else
                    $_SESSION["message"] = ['!... فشل في تغيير معلومات الشخصية','nonValide'];
            }
            else
                $_SESSION["message"] = ['!... فشل في تغيير معلومات العائلية','nonValide'];
            header("Refresh:0; url=profile_student.php?student=$etudiant");
            exit();
        }
        if(isset($_POST['reInsc_etudiant']) && isset($_POST['reInsc_school_year']) && isset($_POST["reInsc_groupe"]) && isset($_POST["reInsc_prix_mensuel"]) && isset($_POST['reInsc_prix_annuel'])){
            $etudiant = $_POST['reInsc_etudiant'];
            $school_year = $_POST['reInsc_school_year'];
            $groupe = $_POST["reInsc_groupe"];
            $prix_mensuel = $_POST["reInsc_prix_mensuel"];
            $prix_annuel = $_POST['reInsc_prix_annuel'];
            $requet = "INSERT INTO parcours(id_groupe,id_etudiant,id_anneeScolaire,prix_annuel,prix_mensuel) VALUES ($groupe,$etudiant,$school_year,$prix_annuel,$prix_mensuel)";
            if($db->exec($requet)){
                $requet = "SELECT e.nom,f.prenom_pere,f.cin_pere,f.nom_mere,f.prenom_mere,f.cin_mere,e.prenom,e.CNE,e.sexe,e.dateInsc ,n.libelle AS 'niveau' ,p.prix_annuel,p.prix_mensuel, c.libelle AS 'classe',annee_debut, annee_fin FROM famille f 
                            INNER JOIN etudiant e ON f.id = e.id_famille 
                            INNER JOIN parcours p ON p.id_etudiant = e.id 
                            INNER JOIN groupe g ON p.id_groupe = g.id 
                            INNER JOIN classe c ON c.id = g.id_classe 
                            INNER JOIN niveau n ON n.id = c.id_niveau
                            INNER JOIN anneescolaire a ON p.id_anneeScolaire = a.id
                            WHERE p.id_anneeScolaire = $school_year AND e.id = $etudiant";
                            $object = select($requet);
                $myObj  = new stdClass();
                $myObj->nom = $object[0]['nom'];
                $myObj->prenom_pere = $object[0]['prenom_pere'];
                $myObj->cin_pere = $object[0]['cin_pere'];
                $myObj->nom_mere = $object[0]['nom_mere'];
                $myObj->prenom_mere = $object[0]['prenom_mere'];
                $myObj->cin_mere = $object[0]['cin_mere'];
                $myObj->enfants = array();
                $enf = array();
                for ($i=0; $i < count($object); $i++) { 
                    $enfant =  new stdClass();
                    $enfant->prenom = $object[$i]['prenom'];
                    $enfant->sexe = $object[$i]['sexe'];
                    $enfant->CNE = $object[$i]['CNE'];
                    $enfant->classe = $object[$i]["classe"];
                    $enfant->niveau = $object[$i]["niveau"];
                    $enfant->prix_annuel = $object[$i]['prix_annuel'];
                    $enfant->prix_mensuel = $object[$i]['prix_mensuel'];
                    $enfant->dateInsc = $object[0]['dateInsc'];
                    $enfant->school_year = $object[$i]['annee_debut']."/".$object[$i]['annee_fin'];
                    array_push($enf,$enfant);
                }
                $myObj->enfants = $enf;
                $_SESSION["etudiant"] = $myObj;
            }
            else
                $_SESSION["message"] = ['!... فشل في تنفيذ عملية','nonValide'];
            header("Refresh:0; url=profile_student.php?student=$etudiant");
            exit();
        }

    } catch (Exception $e) {
        print $e->getMessage();
    }