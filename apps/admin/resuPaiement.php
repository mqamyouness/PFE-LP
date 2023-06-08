<?php
    try {
        if(isset($_GET["datasources"]))
        {
            $data = json_decode($_GET["datasources"], true);
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
            <section style="min-height: 49vh;" id="org">
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
                        <h3 style="margin: 0;">إيصال الأداء الشهري</h3>
                    </div>
                    <div>
                        <h3>
                            <p>مجموعة مدارس
                                <br>الحكيم
                                <br>وجدة
                            </p>
                        </h3>
                        <h5>contact@groupe-alhakim.com : البريد الإلكتروني</h5>
                    </div>
                </header>
                <section width="100%">
                    <table border="2 solide" width="80%">
                        <tr>
                            <th>النقل</th>
                            <th>الواجب الشهري</th>
                            <th>الشهر</th>
                            <th>تاريخ</th>
                            <th>طريقة الدفع</th>
                            <th>المستوى</th>
                            <th>التلميذ</th>
                        </tr>
                        <?php $somme_prix_mensuel=0;$somme_transport=0; for ($i=0; $i < count($data); $i++) { ;?>
                        <tr>
                            <td><?php echo $data[$i]['prix_transport']; $somme_transport += $data[$i]['prix_transport']; ?></td>
                            <td><?php echo $data[$i]['prix_mensuel']; $somme_prix_mensuel += $data[$i]['prix_mensuel'];?></td>
                            <td><?php echo $data[$i]['mois']; ?></td>
                            <td><?php echo $data[$i]['date_paiement'];  ?></td>
                            <td><?php echo $data[$i]['method_paiement'];  ?></td>
                            <td><?php echo $data[$i]['niveau']; ?></td>
                            <td><?php echo $data[$i]['nom']." ".$data[$i]['prenom']; ?></td>
                        </tr>
                        <?php }?>
                        <tr> 
                            <td colspan="2"><?php echo $somme_transport + $somme_prix_mensuel; ?></td>
                            <td colspan="5">مجموع</td>
                        </tr>
                    </table>
                </section>
                <footer>
                    <p class="p-footer">  أوقف الفاتورة بمبلغ : <?php $f = new NumberFormatter("ar", NumberFormatter::SPELLOUT);echo $f->format($somme_transport + $somme_prix_mensuel); ?> درهم</p>
                    <p id="p-date">Fait le :<?php echo Date("d-m-Y");?></p>
                </footer>
            </section>
            <hr id="line">
            <section style="min-height: 49vh;" id="double">
                
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