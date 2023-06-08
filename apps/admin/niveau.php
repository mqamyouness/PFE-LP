<?php
    include("header.php");
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<div id="content">
    <?php
        include("small_header.php");
    ?>
    <div class="container-fluid"> 
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal_niveau">
                <i class="fas fa-plus-circle fa-sm text-white-50"></i>  اضافة مستوى</a>
            <h1 class="h3 mb-0 text-gray-800">المستويات</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">: جدول</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>اعدادات</th>
                                <th>الواجب الشهري</th>
                                <th>الواجب السنوي</th>
                                <th>المستوى</th>
                                <th>رقم</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $list = select("SELECT id,libelle,prix_annuel,prix_mensuel FROM niveau");
                            for ($i=0; $i < count($list); $i++) { 
                        echo '<tr>'.
                                '<td>'.
                                '   <a data-toggle="modal" data-target="#removeModal" class="btn btn-danger btn-circle" data="'.$list[$i][0].'" onclick="removeNiveau(this)">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a data-toggle="modal" data-target="#modal_edit_niveau" class="btn btn-warning btn-circle" data="'.$list[$i][0].'"  onclick="updateNiveau(this)">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>'.
                                '<td>'.$list[$i][3].'</td>'.
                                '<td>'.$list[$i][2].'</td>'.
                                '<td>'.$list[$i][1].'</td>'.
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
                    <h2>?  هل تريد أن تحذف المستوى</h2> 
	                <input type="number" style="display:none;" id="contentRemove" name="removeNiveau"> 
	            </div>
	            <div class="modal-footer">
	                <button class="btn btn-secondary" type="button" data-dismiss="modal">إلغاء</button>
	                <button type="submit" class="btn btn-primary">حذف</button>
	            </div>
			</form>
        </div>
    </div>
</div>
<script>
    document.getElementById("niveauPage").classList.add("active");
    document.getElementById("drow1").classList.add("active");
    document.getElementById("collapseTwo").classList.add("show");
    function updateNiveau(params) {
        document.getElementById("niveauEdit").setAttribute("value",params.getAttribute("data"));
        document.getElementById("niveauEditLibelle").setAttribute("value", params.parentElement.parentElement.childNodes[3].innerHTML);
        document.getElementById("prix_annuelEdit").setAttribute("value", params.parentElement.parentElement.childNodes[2].innerHTML);
        document.getElementById("prix_mensuelEdit").setAttribute("value", params.parentElement.parentElement.childNodes[1].innerHTML);
    }
    function removeNiveau(params) {
        document.getElementById("contentRemove").value=params.getAttribute("data");
    }
</script>
<!--End Remove Modal-->
<?php
    include("footer.php");
?>