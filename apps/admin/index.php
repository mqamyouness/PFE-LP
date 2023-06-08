<?php
    include("header.php");
    try {
        $sum_mensuel = 0;
        $sum_prix_annuel = 0; 
        $devoir_mensuel = select("SELECT SUM(prix_transport),SUM(prix_mensuel) FROM devoir_mensuel WHERE mois = ". Date("m"));
        if(count($devoir_mensuel)>0)
            $sum_mensuel = $devoir_mensuel[0][0]+$devoir_mensuel[0][1];
            
        $new_year = Date("Y");
        $last_year = Date("Y")-1;
        $devoir_prix_annuel = select("SELECT  SUM(p.prix_annuel),a.id FROM anneescolaire a INNER JOIN parcours p on p.id_anneeScolaire = a.id WHERE a.annee_debut = '$last_year' AND a.annee_fin = '$new_year'");
        if(count($devoir_prix_annuel)>0)
        {
            $sum_prix_annuel += $devoir_prix_annuel[0][0];
            $sum_mensuel_of_year = select("SELECT SUM(prix_transport),SUM(prix_mensuel) FROM devoir_mensuel WHERE id_anneeScolaire = ".$devoir_prix_annuel[0][1]);
            if(count($sum_mensuel_of_year)>0)
                $sum_prix_annuel += $sum_mensuel_of_year[0][0]+$sum_mensuel_of_year[0][1];
        }
        $count_inscription = select("SELECT COUNT(*) FROM inscription");
        $count_calls = select("SELECT COUNT(*) FROM calls");
        $chart_niveau = select("SELECT n.libelle,COUNT(p.id_etudiant) FROM niveau n 
                                LEFT JOIN classe c ON n.id = c.id_niveau 
                                LEFT JOIN groupe g ON g.id_classe = c.id 
                                LEFT JOIN parcours p ON g.id = p.id_groupe 
                                GROUP BY n.id LIMIT 3 ");//WHERE p.id_anneeScolaire in (SELECT id FROM anneescolaire WHERE annee_debut = '2020' AND annee_fin = '2021')
        $libelle = "";
        $data = "";
        if(count($chart_niveau)>0)
        {
            $total = $chart_niveau[0][1]+$chart_niveau[1][1]+$chart_niveau[2][1];
            $libelle = "'".$chart_niveau[0][0]."','".$chart_niveau[1][0]."','".$chart_niveau[2][0]."'";
            $data = (($chart_niveau[0][1]*100)/$total).','.(($chart_niveau[1][1]*100)/$total).','.(($chart_niveau[2][1]*100)/$total);
        }
        $_data_myAreaChart = select("SELECT d.mois,SUM(d.prix_mensuel),SUM(d.prix_transport) FROM devoir_mensuel d GROUP BY d.mois");
?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php
                include("small_header.php");
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            مداخيل (شهرية)
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sum_mensuel; ?> MAD</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            مداخيل (سنوية)
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sum_prix_annuel; ?> MAD</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            عدد التسجيلات المسبق  
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_inscription[0][0]; ?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> عدد طلبات موعد </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_calls[0][0]; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary" style="width:100%"> مداخيل شهر للموسم الدراسي</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <script>
                                        <?php $month = [9,10,11,12,1,2,3,4];
                                        echo 'var _data_myAreaChart = [';
                                             for ($i=0; $i < count($month); $i++) {
                                                echo ($_data_myAreaChart[$i][1]+$_data_myAreaChart[$i][2]);
                                                if(($i+1) < count($month))
                                                    echo ',';
                                             }
                                            echo ']'?>;
                                        var _data_libelle_month = ["شتنبر","أكتوبر","نونبر","دجنبر","يناير","فبراير","مارس","أبريل","ماي","يونيو"];
                                    </script>
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary" style="width:100%">المستويات</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <script>
                                        var _data_myPieChart = [<?php echo $data ?>];
                                        var _data_libelle_myPieChart = [<?php echo $libelle ?>];
                                    </script>
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i><?php echo $chart_niveau[2][0] ?>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> <?php echo $chart_niveau[1][0] ?>
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-info"></i> <?php echo $chart_niveau[0][0] ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById("dashboard").classList.add("active");
        </script>
<?php
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    include("footer.php");
?>
