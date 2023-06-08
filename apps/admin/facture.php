<?php
    try {
        include("../../.database.php");
        if(isset($_GET["month"]) && isset($_GET["anneescolaire"])){
            $list = select("SELECT d.date_paiement,(d.prix_transport+d.prix_mensuel),a.annee_debut,a.annee_fin FROM devoir_mensuel d  JOIN anneescolaire a ON a.id = d.id_anneeScolaire WHERE a.id = ".$_GET["anneescolaire"]." AND d.mois = ".$_GET["month"]);
        }elseif(isset($_GET["anneescolaire"]))
        {
            $list = select("SELECT p.date_p,p.prix_annuel,a.annee_debut,a.annee_fin FROM parcours p JOIN anneescolaire a ON a.id = p.id_anneeScolaire WHERE a.id = ".$_GET["anneescolaire"]);
        }else{
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
                        <h4 style="margin: 0;">فاتورة</h4>
                    </div>
                    <div>
                        <h3>
                            <p>مجموعة مدارس
                                <br>الحكيم
                                <br>وجدة
                            </p>
                        </h3>
                        <h5><?php echo $list[0][3].'/'. $list[0][2]; ?> : السنة دراسية</h5>
                    </div>
                </header>
                <section width="100%">
                    <table border="2 solide" width="80%">
                        <tr>
                            <th>مبلغ</th>
                            <th>تاريخ</th>
                            <th>رقم</th>
                        </tr>
                        <?php $somme=0;for ($i=0; $i < count($list); $i++) { ?>
                        <tr>
                            <td><?php echo $list[$i][1]; $somme += $list[$i][1]; ?></td>
                            <td><?php echo $list[$i][0]; ?></td>
                            <td><?php echo $i+1; ?></td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td><?php echo $somme; ?></td>
                            <td colspan="2"> (درهم) مجموع</td>
                        </tr>
                    </table>
                </section>
                <footer>
                <p class="p-footer">  أوقف الفاتورة بمبلغ : <?php $f = new NumberFormatter("ar", NumberFormatter::SPELLOUT);echo $f->format( $somme); ?> درهم</p>
                    <p id="p-date">Fait le :<?php echo Date("d-m-Y");?></p>
                </footer>
            </section>
        </center>
    </body>
</html>
<?php
    } catch (\Throwable $th) {
        //throw $th;
    }
?>


