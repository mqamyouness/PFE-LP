<?php
    include("header.php");
?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
    <?php
        include("small_header.php");
    ?>
    <div class="container-fluid"> 
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal_classe">
                <i class="fas fa-plus-circle fa-sm text-white-50"></i>  اضافة قسم</a>
            <h1 class="h3 mb-0 text-gray-800">الاقسام</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">جدول</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>اعدادات</th>
                                <th>القسم</th>
                                <th>المستوى</th>
                                <th>رقم</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $list = select("SELECT c.id,c.libelle,n.libelle FROM classe c INNER JOIN niveau n  on n.id = c.id_niveau");
                            for ($i=0; $i < count($list); $i++) { 
                        echo '<tr>'.
                                '<td>'.
                                '   <a href="#" data-toggle="modal" data-target="#removeModal" class="btn btn-danger btn-circle" data="'.$list[$i][0].'" onclick="removeClasse(this)">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#modal_edit_classe" class="btn btn-warning btn-circle" data="'.$list[$i][0].'" onclick="updateClasse(this)">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>'.
                                '<td>'.$list[$i][1].'</td>'.
                                '<td>'.$list[$i][2].'</td>'.
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
<!-- Modal Classe -->
<div class="modal fade" id="modal_classe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ClasseleModalLabel">اضافة قسم</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="controller.php" method="POST">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">: المستوى</label>
                <select class="form-control bg-white border-2 small" name ="niveau" >
                    <option value="choos" disabled selected>اختار</option>
                <?php $niveaux = select("SELECT id,libelle FROM niveau");
                    for ($i=0; $i < count($niveaux); $i++) { 
                        echo'<option value="'.$niveaux[$i][0].'">'.$niveaux[$i][1].'</option>';
                    }?>
                </select>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">: قسم</label>
                <input type="text" class="form-control" name="classe">
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
<!-- End Modal Classe -->
<!-- Modal Edit Classe -->
<div class="modal fade" id="modal_edit_classe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ClasseleModalLabel">تحديث قسم</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="controller.php" method="POST">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">: المستوى</label>
                <input type="text" class="form-control" name="niveauLibelle" readonly id="niveauLibelle">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">: قسم</label>
                <input type="text" class="form-control" name="classeEditLibelle" id="classeEditLibelle">
                <input type="text" class="form-control" name="classeEdit" style="Display:none;" id="classeEdit" >
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
<!-- End Modal Edit Classe -->
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
                    <h2>? هل تريد أن تحذف قسم</h2>
	                <input type="number" style="display:none;" id="contentRemove" name="removeClasse"> 
	            </div>
	            <div class="modal-footer">
	                <button class="btn btn-secondary" type="button" data-dismiss="modal">إلغاء</button>
	                <button type="submit" class="btn btn-primary">حذف</button>
	            </div>
			</form>
        </div>
    </div>
</div>
<!--End Remove Modal-->
<script>
    document.getElementById("classePage").classList.add("active");
    document.getElementById("drow1").classList.add("active");
    document.getElementById("collapseTwo").classList.add("show");
    function updateClasse(params) {
        document.getElementById("classeEdit").setAttribute("value",params.getAttribute("data"));
        document.getElementById("classeEditLibelle").setAttribute("value", params.parentElement.parentElement.childNodes[1].innerHTML);
        document.getElementById("niveauLibelle").setAttribute("value", params.parentElement.parentElement.childNodes[2].innerHTML);
    }
    function removeClasse(params) {
        document.getElementById("contentRemove").value=params.getAttribute("data");
    }
</script>
<?php
        include("footer.php");
?>