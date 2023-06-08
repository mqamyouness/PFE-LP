<?php
    include("header.php");
?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php
            include("small_header.php");
        ?>
        <div class="container-fluid"> 
            <div class="d-sm-flex  mb-2">
                <a href="paiement.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="margin-right:10px;">
                    <i class="fa fa-arrow-circle-left  text-white-50"></i>  رجوع</a>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal_getFactuer">
                    <i class="fas fa-plus-circle fa-sm text-white-50"></i>  استطلاع على مداخل الأداء الشهري</a>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">: لائحة دفعات</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>حذف</th>
                                    <th>النقل</th>
                                    <th>الواجب الشهري</th>
                                    <th>الشهر</th>
                                    <th>تاريخ</th>
                                    <th>طريقة الدفع</th>
                                    <th>التلميذ</th>
                                    <th>رقم</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $list = select("SELECT d.id_etudiant,d.id_anneeScolaire,d.mois,d.method_paiement,d.prix_mensuel,d.prix_transport,d.date_paiement,e.nom,e.prenom,a.annee_debut,a.annee_fin FROM devoir_mensuel d 
                                                        INNER JOIN etudiant e ON e.id = d.id_etudiant 
                                                        INNER JOIN anneescolaire a ON a.id = d.id_anneeScolaire");
                                for ($i=0; $i < count($list); $i++) { 
                            echo '<tr>'.
                                    '<td>'.
                                    '   <a data-toggle="modal" data-target="#removeModal" class="btn btn-danger btn-circle" 
                                        data-etudiant="'.$list[$i]['id_etudiant'].'"
                                        data-anneeScolaire="'.$list[$i]['id_anneeScolaire'].'"
                                        data-mois="'.$list[$i]['mois'].'" onclick="removeNiveau(this)"><i class="fas fa-trash"></i></a></td>'.
                                    '<td>'.$list[$i]['prix_transport'].' DH</td>'.
                                    '<td>'.$list[$i]['prix_mensuel'].' DH</td>'.
                                    '<td>'.$list[$i]['mois'].'</td>'.
                                    '<td>'.$list[$i]['date_paiement'].'</td>'.
                                    '<td>'.$list[$i]['method_paiement'].'</td>'.
                                    '<td>'.$list[$i]['prenom'].' '.$list[$i]['nom'].'</td>'.
                                    '<td>'.($i+1).'</td>'.
                                '</tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Modal Niveau -->
    <div class="modal fade" id="modal_niveau" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="NiveauleModalLabel">اضافة مستوى</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="controller.php" method="POST">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">: المستوى</label>
                    <input type="text" class="form-control" name="niveau">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">: الواجب السنوي</label>
                    <div class="input-group col-ms">
                        <input type="text" class="form-control" name="prix_annuel">
                        <span class="input-group-text">DH</span>
                        <span class="input-group-text">0.00</span>&nbsp; 
                    </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">: الواجب الشهري</label>
                    <div class="input-group col-ms">
                        <input type="text" class="form-control" name="prix_mensuel">
                        <span class="input-group-text">DH</span>
                        <span class="input-group-text">0.00</span>&nbsp; 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-primary">اضافة</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- End Modal Niveau -->
    <!-- Modal Edit Niveau -->
    <div class="modal fade" id="modal_edit_niveau" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="NiveauleModalLabel">تحديث مستوى</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="controller.php" method="POST">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">: المستوى</label>
                    <input type="text" class="form-control" name="niveauEditLibelle" required id="niveauEditLibelle">
                    <input type="text" class="form-control" name="niveauEdit" style="Display:none;" id="niveauEdit">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">: الواجب السنوي</label>
                    <input type="text" class="form-control" name="prix_annuelEdit" id="prix_annuelEdit">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">: الواجب الشهري</label>
                    <input type="text" class="form-control" name="prix_mensuelEdit" id="prix_mensuelEdit">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- end Modal Edit Niveau -->
    <!-- Remove Modal-->
    <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="controller.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">حذف  </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body" id="msg_body">
                        <h2>? هل تريد أن تحذف دفعة</h2>
                        <input type="number" style="display:none;" id="etudiant" name="removePaimentOfManth_etudiant"> 
                        <input type="number" style="display:none;" id="anneeScolaire" name="removePaimentOfManth_anneeScolaire"> 
                        <input type="number" style="display:none;" id="mois" name="removePaimentOfManth_mois"> 
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_getFactuer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="controller.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">استطلاع على مداخل الأداء الشهري</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body" >
                        <div class="col-sm">
                            <h5 for="month" class="form-label">اشهر الدراسية</h5>
                            <select class="form-control bg-white border-2 small"  id="month">
                                <option selected disabled value="null">اختار</option>
                                <option value="9">9 - شتنبر</option>
                                <option value="10">10 - أكتوبر</option>
                                <option value="11">11 - نونبر</option>
                                <option value="12">12 - دجنبر</option>
                                <option value="1">1 - يناير</option>
                                <option value="2">2 - فبراير</option>
                                <option value="3">3 - مارس</option>
                                <option value="4">4 - أبريل</option>
                                <option value="5">5 - ماي</option>
                                <option value="6">6 - يونيو</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="school_year" class="form-label">الموسم الدراسي</label>
                            <select class="form-control bg-white border-2 small" id="school_year">
                                <option value="null" disabled selected>اختار</option>
                                <?php $anneeScolaire = select("SELECT id,annee_debut,annee_fin FROM anneeScolaire");
                                for ($i=0; $i < count($anneeScolaire); $i++) { 
                                    echo'<option value="'.$anneeScolaire[$i][0].'">'.$anneeScolaire[$i][1].'/'.$anneeScolaire[$i][2].'</option>';
                                }?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">إلغاء</button>
                        <button type="button" class="btn btn-primary" id="getFacture">كشف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Imprimer" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">استطلاع على مداخل الأداء الشهري</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="facture.php" style="height: 75vh !important;" width="100%" title="Iframe Example" id="ImpIframeFacture"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                <button type="button" class="btn btn-primary" onclick="Print()">اطبع وثيقة</button>
            </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("paiementPage").classList.add("active");
        document.getElementById("drow2").classList.add("active");
        document.getElementById("collapseUtilities").classList.add("show");
        function removeNiveau(params) {
            document.getElementById("etudiant").value = params.getAttribute("data-etudiant");
            document.getElementById("anneeScolaire").value = params.getAttribute("data-anneeScolaire");
            document.getElementById("mois").value=params.getAttribute("data-mois");
        }
        function Print()
        {
            var frm = document.getElementById("ImpIframeFacture").contentWindow;
            frm.focus();
            frm.print();
                return false;
        }
        $(document).ready(function () {
            $("#getFacture").click(function() {
                var anneescolaire = $("#school_year option:selected").val();
                var month = $("#month option:selected").val();
                if(anneeScolaire != "null" && month != "null")
                {
                    $("#ImpIframeFacture").attr("src","facture.php?anneescolaire="+anneescolaire+"&month="+month);
                    $("#Imprimer").modal("show");
                }
            });
        });
    </script>
    <!--End Remove Modal-->
<?php
    include("footer.php");
?>