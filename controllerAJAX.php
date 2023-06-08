<?php
    include(".database.php");
    try {
        if(isset($_GET["option"])){
            switch ($_GET["option"]) {
                case 'getClasseOfNiveau':
                    if ( isset($_GET["niveauAcs"])) {
                        $requet = "SELECT id,libelle FROM classe WHERE id_niveau = " . $_GET["niveauAcs"];
                        $classe = select($requet);
                        echo json_encode($classe);
                    }
                    break;
                case 'getGroupeOfClasse':
                        if (isset($_GET["classeAcs"])) {
                            $requet = "SELECT id,libelle FROM groupe WHERE id_classe = " . $_GET["classeAcs"];
                            $classe = select($requet);
                            echo json_encode($classe);
                        }
                    break;
                case 'getListNomEtudiant':
                        if (isset($_GET["id"]) && isset($_GET["condition"])) {
                            $requet = "SELECT DISTINCT e.id_famille ,e.nom FROM etudiant e INNER JOIN parcours p on p.id_etudiant = e.id ";
                            switch ($_GET["condition"]) {
                                case 'groupe':
                                    $requet .= " WHERE p.id_groupe = " . $_GET["id"] ;
                                    break;
                                case 'classe':
                                    $requet .= " INNER JOIN groupe g on p.id_groupe = g.id WHERE  g.id_classe = " . $_GET["id"] ;
                                    break;
                                case 'niveau':
                                    $requet .= " INNER JOIN groupe g on p.id_groupe = g.id
                                                    INNER JOIN classe c on g.id_classe = c.id
                                                    WHERE  c.id_niveau = " . $_GET["id"] ;
                                    break;
                                case 'anneeScolaire':
                                    $requet .= " WHERE p.id_anneeScolaire = " . $_GET["id"] ;
                                break;
                                default:
                                    $requet.= "SELECT e.id_famille ,e.nom FROM etudiant e ";
                                    break;
                            }
                            if(isset($_GET["anneeScolaire"]))
                                $requet .= " AND p.id_anneeScolaire = ". $_GET["anneeScolaire"];
                            $list = select($requet);
                            echo json_encode($list);
                        }
                    break;

                case 'getEtudiantByFamille':
                        if ( isset($_GET["famille"])) {
                            $requet = "SELECT e.id,e.prenom FROM etudiant e INNER JOIN parcours p on p.id_etudiant = e.id WHERE id_famille = " . $_GET["famille"];
                            if(isset($_GET["anneeScolaire"]))
                                $requet .= " AND p.id_anneeScolaire =".$_GET["anneeScolaire"];
                            $list = select($requet);
                            echo json_encode($list);
                        }
                    break;
                case 'getEtudiant':
                    if ( isset($_GET["etudiant"])) {
                        $requet = "SELECT e.id,e.nom,e.prenom,n.libelle as 'niveau' , c.libelle as 'classe',p.prix_mensuel,a.annee_debut,a.annee_fin FROM etudiant e 
                                        INNER JOIN parcours p ON e.id = p.id_etudiant 
                                        INNER JOIN groupe g ON g.id = p.id_groupe 
                                        INNER JOIN classe c ON c.id = g.id_classe 
                                        INNER JOIN niveau n ON n.id = c.id_niveau 
                                        INNER JOIN anneescolaire a ON a.id = p.id_anneeScolaire 
                                        WHERE e.id = " . $_GET["etudiant"];
                        $list = select($requet);
                        echo json_encode($list);
                    }
                break;
                case 'getListEtudiant':
                    $requet = "SELECT e.id,e.nom,e.prenom,e.CNE,g.id,g.libelle,c.libelle ,n.libelle,a.annee_debut,a.annee_fin FROM etudiant e 
                        INNER JOIN parcours p on e.id = p.id_etudiant 
                        INNER JOIN  groupe g on p.id_groupe = g.id 
                        INNER JOIN classe c on c.id = g.id_classe 
                        INNER JOIN niveau n on n.id = c.id_niveau
                        INNER JOIN anneescolaire a on a.id = p.id_anneeScolaire";
                    if (isset($_GET["groupe"])){
                            $requet .= " WHERE g.id = ". $_GET["groupe"];}
                    if (isset($_GET["classe"])){
                            $requet .= " WHERE c.id = ". $_GET["classe"];}
                    if (isset($_GET["niveau"])){
                            $requet .= " WHERE n.id = ". $_GET["niveau"];}
                    if(count($_GET) == 3)
                        $requet .= " AND ";
                    elseif (count($_GET) == 2 && isset($_GET["anneeScolaire"]))
                        $requet .= " WHERE ";
                    if (isset($_GET["anneeScolaire"])) 
                                $requet .= "a.id = ". $_GET["anneeScolaire"];
                    $list = select($requet);
                    echo json_encode($list);
                break;
                case 'getResuInscription':
                        if ( isset($_GET["anneeScolaire"])) {
                            $anneeScolaire = $_GET["anneeScolaire"];
                            $requet = "SELECT e.nom,f.prenom_pere,f.cin_pere,f.nom_mere,f.prenom_mere,f.cin_mere,e.prenom,e.CNE,e.sexe,e.dateInsc ,n.libelle AS 'niveau' ,p.prix_annuel,p.prix_mensuel, c.libelle AS 'classe',annee_debut, annee_fin FROM famille f 
                                        INNER JOIN etudiant e ON f.id = e.id_famille 
                                        INNER JOIN parcours p ON p.id_etudiant = e.id 
                                        INNER JOIN groupe g ON p.id_groupe = g.id 
                                        INNER JOIN classe c ON c.id = g.id_classe 
                                        INNER JOIN niveau n ON n.id = c.id_niveau
                                        INNER JOIN anneescolaire a ON p.id_anneeScolaire = a.id
                                        WHERE p.id_anneeScolaire = $anneeScolaire AND ";
                            if (isset($_GET["famille"]))
                                $requet .=  "f.id = " . $_GET["famille"];
                            elseif(isset($_GET["etudiant"]))
                                $requet .=  "e.id = " . $_GET["etudiant"];
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
                            echo json_encode($myObj);
                        }
                    break;
                case 'getResuPaiement':
                    if ( isset($_GET["anneeScolaire"]) && isset($_GET["monthList"])) {
                        $anneeScolaire = $_GET["anneeScolaire"];
                        $monthList = json_decode($_GET["monthList"],true);
                        if(isset($_GET["etudiantList"]))
                            $etudiantList = json_decode($_GET["etudiantList"],true);
                        $data_resu = [];
                        $c = "";
                        if (isset($_GET["famille"]))
                            $c =  "e.id_famille = " . $_GET["famille"];
                        for ($i=0; $i < count($monthList); $i++) { 
                            if(isset($_GET["etudiantList"]))
                                $c =  " e.id = " . $etudiantList[$i];
                            $requet = "SELECT e.id,e.nom,e.prenom,n.libelle as 'niveau' ,p.prix_mensuel,a.annee_debut,a.annee_fin,d.mois,d.prix_transport,d.date_paiement ,d.method_paiement FROM etudiant e 
                                INNER JOIN parcours p ON e.id = p.id_etudiant 
                                INNER JOIN groupe g ON g.id = p.id_groupe 
                                INNER JOIN classe c ON c.id = g.id_classe 
                                INNER JOIN niveau n ON n.id = c.id_niveau 
                                INNER JOIN anneescolaire a ON a.id = p.id_anneeScolaire 
                                INNER JOIN devoir_mensuel d ON d.id_etudiant = e.id AND d.id_anneeScolaire = a.id
                                WHERE a.id = $anneeScolaire AND " . $c ." AND d.mois = $monthList[$i] ";
                            $data = select($requet);
                            array_push($data_resu,$data[0]);
                        }
                        echo json_encode($data_resu);
                    }
                break;
                case 'getListEtudiantOfGroupeAndAnnescolaire':
                    if ( isset($_GET["groupe"]) && isset($_GET["anneescolaire"])) {
                        $groupe = $_GET["groupe"];
                        $anneescolaire = $_GET["anneescolaire"];
                        $requet = "SELECT e.id,e.nom,e.prenom FROM etudiant e INNER JOIN parcours p ON p.id_etudiant = e.id WHERE p.id_groupe = $groupe AND p.id_anneeScolaire = $anneescolaire ";
                        $list = select($requet);
                        echo json_encode($list);
                        }
                    break;
                case 'getMontOfEtudiant':
                        if ( isset($_GET["etudiant"]) && isset($_GET["anneescolaire"])) {
                            $etudiant = $_GET["etudiant"];
                            $anneescolaire = $_GET["anneescolaire"];
                            $requet = "SELECT mois FROM devoir_mensuel WHERE id_etudiant = $etudiant AND id_anneeScolaire = $anneescolaire ";
                            $list = select($requet);
                            echo json_encode($list);
                        }
                    break;
                case 'addclientnewsletter':
                    if(!empty($_POST["email"])){
                        $email = addslashes(htmlspecialchars($_POST["email"]));
                        $date = Date("Y-m-d");
                        $requet = "INSERT INTO newsletter (email,date_abonne,blocked) VALUES ('$email','$date',0)";
                        $requetPrepare = $db->prepare($requet);
                        if($requetPrepare->execute())
                            echo true;
                    }
                break;
                case 'getFamille':
                    if(isset($_GET["frereCNE"])){
                        $CNE = $_GET["frereCNE"];
                        $requet = "SELECT f.id,f.nom_pere,f.prenom_pere,f.nom_mere,f.prenom_mere,f.cin_pere,f.cin_mere FROM famille f JOIN etudiant e ON e.id_famille = f.id WHERE e.CNE LIKE '$CNE'";
                        $list = select($requet);
                        echo json_encode($list);
                    }
                break;
                case 'addrequestCall':
                    if(isset($_POST["nom"]) && isset($_POST["phoneNumbre"])){
                        $nom = addslashes(htmlspecialchars($_POST["nom"]));
                        $tele = addslashes(htmlspecialchars($_POST["phoneNumbre"]));
                        $date = Date("Y-m-d");
                        $requet = "INSERT INTO calls (date_demand,tele,nom) VALUES ('$date','$tele','$nom')";
                        $requetPrepare = $db->prepare($requet);
                        if($requetPrepare->execute())
                            echo true;
                    }
                break;
                case 'blockRequetNewsLetter':
                    if (isset($_POST["clientnewsletter"]) && isset($_POST["blocked"]) ) {
                        $email = $_POST["clientnewsletter"];
                        $blocked = $_POST["blocked"];
                        $requet = "UPDATE newsletter SET blocked = $blocked WHERE email = '$email' ";
                        if($db->exec($requet))
                            echo true;
                    }
                break;
                case 'visibilityPhoto':
                    if (isset($_POST["photo"]) && isset($_POST["visibility"]) ) {
                        $photo = $_POST["photo"];
                        $visibility = $_POST["visibility"];
                        $requet = "UPDATE galerie SET visibility = $visibility WHERE id = $photo ";
                        if($db->exec($requet))
                            echo true;
                    }
                break;
                case 'visibilityActivity':
                    if (isset($_POST["activity"]) && isset($_POST["visibility"]) ) {
                        $photo = $_POST["activity"];
                        $visibility = $_POST["visibility"];
                        $requet = "UPDATE activity SET visibility = $visibility WHERE id = $photo ";
                        if($db->exec($requet))
                            echo true;
                    }
                break;
                default:
                    echo "Option null";
                    break;
            }
        }
    } catch (\Throwable $th) {
    }
?>