<?php
    include("header.php");
?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php
            include("small_header.php");
        ?>
        <div class="container-fluid"> 
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800" style="width: 100%;">قائمة التسجيلات</h1>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary" style="width: 100%;">قائمة </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"  >
                            <thead>
                                <tr>
                                    <th>الاعدادات</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>المستوى</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الهاتف</th>
                                    <th>تاريخ الازدياد</th>
                                    <th>الاسم الشخصي</th>
                                    <th>الاسم العائلي</th>
                                    <th>رقم</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $inscription = select("SELECT i.id,i.nom,i.prenom,i.datenaissance,i.tele,i.email,n.libelle,i.dateInsc FROM inscription i inner join niveau n on n.id = i.id_niveau");
                            for ($i=0; $i < count($inscription); $i++) { ?>
                                <tr>
                                    <td>
                                        <a href="profile_student.php?student=<?php echo $inscription[$i][1]; ?>" class="btn btn-info btn-circle">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </td>
                                    <td><?php echo $inscription[$i][7]; ?></td>
                                    <td><?php echo $inscription[$i][6]; ?></td>
                                    <td><?php echo $inscription[$i][5]; ?></td>
                                    <td><?php echo $inscription[$i][4]; ?></td>
                                    <td><?php echo $inscription[$i][3]; ?></td>
                                    <td><?php echo $inscription[$i][2]; ?></td>
                                    <td><?php echo $inscription[$i][1]; ?></td>
                                    <td><?php echo $i+1 ?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("listInscriptionsPage").classList.add("active");
    </script>
<?php
        include("footer.php");
?>