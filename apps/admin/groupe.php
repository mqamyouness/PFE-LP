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
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal_groupe">
                <i class="fas fa-plus-circle fa-sm text-white-50"></i>  اضافة فوج</a>
            <h1 class="h3 mb-0 text-gray-800">الافواج</h1>
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
                                <th>فوج</th>
                                <th>القسم</th>
                                <th>المستوى</th>
                                <th>رقم</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $list = select("SELECT g.id,g.libelle,c.libelle,n.libelle FROM groupe g INNER JOIN classe c on g.id_classe = c.id INNER JOIN niveau n  on n.id = c.id_niveau");
                            for ($i=0; $i < count($list); $i++) { 
                        echo '<tr>'.
                                '<td>'.
                                '   <a data-toggle="modal" data-target="#removeModal" class="btn btn-danger btn-circle"  data="'.$list[$i][0].'" onclick="removeGroupe(this)">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a data-toggle="modal" data-target="#modal_edit_groupe" class="btn btn-warning btn-circle" data="'.$list[$i][0].'" onclick="updateGroupe(this)">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>'.
                                '<td>'.$list[$i][1].'</td>'.
                                '<td>'.$list[$i][2].'</td>'.
                                '<td>'.$list[$i][3].'</td>'.
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
<!-- Modal Groupe -->
<div class="modal fade" id="modal_groupe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="GroupeModalLabel">اضافة فوج</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="controller.php" method="POST">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">: المستوى</label>
                <select class="form-control bg-white border-2 small" name ="niveau" onchange="getClasse(this,'classe')" required>
                    <option value="choos" disabled selected>اختار</option>
                <?php $niveaux = select("SELECT id,libelle FROM niveau");
                    for ($i=0; $i < count($niveaux); $i++) { 
                        echo'<option value="'.$niveaux[$i][0].'">'.$niveaux[$i][1].'</option>';
                    }?>
                </select>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">: قسم</label>
                <select class="form-control bg-white border-2 small" name ="classe" id="classe" required>
                    <option value="choos" disabled selected>اختار</option>
                </select>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">: فوج</label>
                <input type="text" class="form-control" name="groupe" required>
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
<!-- End Modal Groupe -->
<!-- Modal Edit Groupe -->
<div class="modal fade" id="modal_edit_groupe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="GroupeModalLabel">تحديث فوج</h5>
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
                <input type="text" class="form-control" name="classeLibelle" readonly id="classeLibelle">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">: فوج</label>
                <input type="text" class="form-control" name="groupeEditLibelle" id="groupeEditLibelle" required>
                <input type="text" class="form-control" name="groupeEdit" id="groupeEdit"  style="Display:none;">
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
<!-- End Modal Edit Groupe -->
<!-- Remove Modal-->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<form method="POST" action="controller.php">
				<div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">حذف</h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">x</span>
	                </button>
	            </div>
	            <div class="modal-body" id="msg_body">
                    <h2>?  هل تريد أن تحذف فوج</h2>  
	                <input type="number" style="display:none;" id="contentRemove" name="removeGroupe"> 
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
    document.getElementById("groupePage").classList.add("active");
    document.getElementById("drow1").classList.add("active");
    document.getElementById("collapseTwo").classList.add("show");
    function updateGroupe(params) {
        document.getElementById("groupeEdit").setAttribute("value",params.getAttribute("data"));
        document.getElementById("groupeEditLibelle").setAttribute("value", params.parentElement.parentElement.childNodes[1].innerHTML);
        document.getElementById("niveauLibelle").setAttribute("value", params.parentElement.parentElement.childNodes[3].innerHTML);
        document.getElementById("classeLibelle").setAttribute("value", params.parentElement.parentElement.childNodes[2].innerHTML);
    }
    function removeGroupe(params) {
        document.getElementById("contentRemove").value=params.getAttribute("data");
    }
    function getClasse(ele,sel) {
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                var o = JSON.parse(this.responseText);
                var select = document.getElementById(sel);
                select.innerHTML="";
                select.insertAdjacentHTML('beforeend',"<option value='all' selected disabled>جميع</option>");
                o.forEach(element => {
                    select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.libelle+"</option>"); 
                });
            }
        };
        xhttp.open("GET","../../ControllerAjax.php?option=getClasseOfNiveau&niveauAcs="+ele.value,false);
        xhttp.send();
    }
</script>
<?php
        include("footer.php");
?>