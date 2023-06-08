<?php
    try {
        if(isset($_GET["datasources"]))
        {
            $data = json_decode($_GET["datasources"], true) ;
        }else
        {
            header("Location: error.php");
                    exit();
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <style>
            header > div {
                width: 25%;
                margin : 0;
                display: inline-block;
            }
            .logo{
                width : 100px;
            }
            .content {
                max-width: 1020px;
                margin: auto;
            }
            .p-footer{
                font-family: Arial Black ;
                font-size: 18px;
            }
            #p-date{
                text-align: end;
                margin-right: 10%;
                margin-bottom: 5%;
            }
            td{
                text-align: center;
            }
            p{
                margin: 1%;
            }
            @page 
            {
                size: auto;   
                margin: 0mm; 
            }
        </style>
    </head>
    <body class="content">
        <center>
            <section style="min-height: 50vh;" id="org">
                <header>
                    <div>
                        <h3>
                            <p>
                                Groupe Scolaire
                                <br>Al Hakim
                                <br>Oujda
                            </p>
                        </h3>
                        <h5>0536504660 : الهاتف</h5>
                    </div>
                    <div>
                        <img src="../../asset/imgs/logo.jpg" id="img-right" class="logo">
                        <h4 style="margin: 0;">أولي - إبتدائي - ثانوي إعدادي</h4>
                        <h3 style="margin: 0;">إيصال التسجيل</h3>
                    </div>
                    <div>
                        <h3>
                            <p>مجموعة مدارس
                                <br>الحكيم
                                <br>وجدة
                            </p>
                        </h3>
                        <h5><?php echo $data['enfants'][0]['school_year']; ?> : السنة دراسية</h5>
                    </div>
                </header>
                <section width="100%">
                    <p >
                        <b>Bénéficier</b>
                        Enfants Scolarisés de Monsieur: <b><?php echo $data['nom']; ?>&nbsp;&nbsp;<?php echo $data['prenom_pere']; ?> CIN : <?php echo $data['cin_pere']; ?> .</b>
                        et Madame: <b><?php echo $data['nom_mere']; ?>&nbsp;&nbsp;<?php echo $data['prenom_mere']; ?> CIN : <?php echo $data['cin_mere']; ?> .</b>
                    <p>
                    <p>
                        Frais annules de scolarisation concernant : 
                    </p>
                    <table border="2 solide" width="80%">
                        <tr>
                            <th>الواجب السنوي</th>
                            <th>تاريخ</th>
                            <th>الموسم الدراسي</th>
                            <th>القسم</th>
                            <th>المستوى</th>
                            <th>كود الطالب الوطني</th>
                            <th>التلميذ</th>
                        </tr>
                        <?php $somme_prix_mensuel=0;$somme_prix_annuel=0; for ($i=0; $i < count($data['enfants']); $i++) { $enf = $data['enfants'][$i];?>
                        <tr>
                            <td><?php echo $enf['prix_annuel']; $somme_prix_annuel += $enf['prix_annuel']; ?></td>
                            <td><?php echo $enf['dateInsc']; ?></td>
                            <td><?php echo $enf['school_year']; ?></td>
                            <td><?php echo $enf['classe']; ?></td>
                            <td><?php echo $enf['niveau']; ?></td>
                            <td><?php if($enf['CNE']!="") echo $enf['CNE']; else echo "<b>--<b>"; ?></td>
                            <td><?php echo $data['nom']." ".$enf['prenom']; ?></td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td><?php echo $somme_prix_annuel; ?></td>
                            <td colspan="6"> (درهم) مجموع</td>
                        </tr>
                    </table>
                </section>
                <footer>
                <p class="p-footer">  أوقف الفاتورة بمبلغ : <?php $f = new NumberFormatter("ar", NumberFormatter::SPELLOUT);echo $f->format( $somme_prix_annuel); ?> درهم</p>
                    <p id="p-date">Fait le :<?php echo Date("d-m-Y");?></p>
                </footer>
            </section>
            <hr id="line">
            <section style="min-height: 50vh;" id="double">
                
            </section>
        </center>
    </body>
    <script>

        <?php if (isset($_GET["double"])) {
            if ($_GET["double"] == "true")
               echo 'document.getElementById("double").innerHTML = document.getElementById("org").innerHTML;';
            else
                echo 'document.getElementById("line").style.display = "none"';
        }else
            echo 'document.getElementById("line").style.display = "none"'; ?>
    </script>
</html>
<?php
    } catch (\Throwable $th) {
        //throw $th;
    }
?>


