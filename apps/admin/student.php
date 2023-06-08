<?php
    include("header.php");
?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
    <?php
        include("small_header.php");
    ?>
    <div class="container-fluid"> 
        <h1 class="h3 mb-2 text-gray-800">التلاميذ</h1>
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-2">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary" style="width:100%;">اعدادات</h6>
                    </div>
                    <div class="card-body">
                        <form class="row g-3">
                            <div class="col-md-3">
                                <label for="anneeScolaire" class="form-label">الموسم الدراسي</label>
                                <select class="form-control bg-white border-2 small" id="anneeScolaire" name="anneeScolaire" onchange="getByAnneeScolaire(this)">
                                    <option value="all" selected>جميع</option>
                                    <?php $anneeScolaire = select("SELECT id,annee_debut,annee_fin FROM anneeScolaire");
                                    for ($i=0; $i < count($anneeScolaire); $i++) { 
                                        echo'<option value="'.$anneeScolaire[$i][0].'">'.$anneeScolaire[$i][1].'/'.$anneeScolaire[$i][2].'</option>';
                                    }?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="groupe" class="form-label">فوج</label>
                                <select class="form-control bg-white border-2 small" id="groupe" name="groupe" onchange="getListEtudiant(this,'')">
                                    <option value="all"  selected>جميع</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="classe" class="form-label">القسم</label>
                                <select class="form-control bg-white border-2 small" id="classe" name="classe"  onchange="getGroupe(this)">
                                    <option value="all" selected>جميع</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="niveau" class="form-label">المستوى</label>
                                <select class="form-control bg-white border-2 small" id="niveau" name="niveau" onchange="getClasse(this)" >
                                    <option value="all" selected>جميع</option>
                                    <?php $niveaux = select("SELECT id,libelle FROM niveau");
                                    for ($i=0; $i < count($niveaux); $i++) { 
                                        echo'<option value="'.$niveaux[$i][0].'">'.$niveaux[$i][1].'</option>';
                                    }?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">جدول</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>اعدادات</th>
                                <th>الموسم الدراسي</th>
                                <th>فوج</th>
                                <th>القسم</th>
                                <th>المستوى</th>
                                <th>رقم الوطني</th>
                                <th>اسم الشخصي</th>
                                <th>اسم العائلي</th>
                                <th>رقم</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                        <?php $list = select("SELECT e.id,e.nom,e.prenom,e.CNE,g.id,g.libelle,c.libelle ,n.libelle,a.annee_debut,a.annee_fin FROM etudiant e 
                                                                                                                    INNER JOIN parcours p on e.id = p.id_etudiant 
                                                                                                                    INNER JOIN  groupe g on p.id_groupe = g.id 
                                                                                                                    INNER JOIN classe c on c.id = g.id_classe 
                                                                                                                    INNER JOIN niveau n on n.id = c.id_niveau
                                                                                                                    INNER JOIN anneescolaire a on a.id = p.id_anneeScolaire");
                            for ($i=0; $i < count($list); $i++) { 
                        echo '<tr>'.
                                '<td>'.
                                '   <a data-toggle="modal" data-target="#removeModal" class="btn btn-danger btn-circle"  data="'.$list[$i][0].'" onclick="removeStudent(this)">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="profile_student.php?student='.$list[$i][0].'" class="btn btn-info btn-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>'.
                                '<td>'.$list[$i][8].'/'.$list[$i][9].'</td>'.
                                '<td>'.$list[$i][5].'</td>'.
                                '<td>'.$list[$i][6].'</td>'.
                                '<td>'.$list[$i][7].'</td>'.
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
                    هل تريد أن تحذف.    
	                <input type="number" style="display:none;" id="contentRemove" name="removeStudent"> 
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
    document.getElementById("studentPage").classList.add("active");
    function removeStudent(params) {
        document.getElementById("contentRemove").value=params.getAttribute("data");
    }
    function getClasse(ele) {
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                var o = JSON.parse(this.responseText);
                var select = document.getElementById("classe");
                document.getElementById("groupe").innerHTML = "<option value='all' selected disabled>جميع</option>";
                select.innerHTML="";
                select.insertAdjacentHTML('beforeend',"<option value='all' selected disabled>جميع</option>");
                o.forEach(element => {
                    select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.libelle+"</option>"); 
                });
            }
        };
        xhttp.open("GET","../../ControllerAjax.php?option=getClasseOfNiveau&niveauAcs="+ele.value,false);
        xhttp.send();
        if(document.getElementById("anneeScolaire").value != "all")
            getListEtudiant(ele,"&anneeScolaire="+document.getElementById("anneeScolaire").value);
        else
            getListEtudiant(ele,"");
    }
    function getGroupe(ele) {
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                var o = JSON.parse(this.responseText);
                var select = document.getElementById("groupe");
                select.innerHTML="";
                select.insertAdjacentHTML('beforeend',"<option value='all' selected disabled>جميع</option>");
                o.forEach(element => {
                    select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.libelle+"</option>"); 
                });
            }
        };
        xhttp.open("GET","../../ControllerAjax.php?option=getGroupeOfClasse&classeAcs="+ele.value,false);
        xhttp.send();
        console.log(document.getElementById("anneeScolaire").value);
        if(document.getElementById("anneeScolaire").value != "all")
            getListEtudiant(ele,"&anneeScolaire="+document.getElementById("anneeScolaire").value);
        else
            getListEtudiant(ele,"");
    }
    function getByAnneeScolaire(ele) {
        if(document.getElementById("groupe").value != "all")
            getListEtudiant(ele,"&groupe="+document.getElementById("groupe").value);
        else if(document.getElementById("classe").value != "all")
            getListEtudiant(ele,"&classe="+document.getElementById("groupe").value);
        else if(document.getElementById("niveau").value != "all")
            getListEtudiant(ele,"&niveau="+document.getElementById("niveau").value);
        else
            getListEtudiant(ele,"");
    }
    function getListEtudiant(ele,condition) {
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                var o = JSON.parse(this.responseText);
                var table = document.getElementById("list");
                table.innerHTML="";
                var i = 0;
                o.forEach(list => {
                    var tr ='<tr><td>'+
                                '<a data-toggle="modal" data-target="#removeModal" class="btn btn-danger btn-circle"  data="'+list[0]+'" onclick="removeStudent(this)"><i class="fas fa-trash"></i></a>&nbsp;'+
                                '<a href="profile_student.php?student='+list[0]+'" class="btn btn-info btn-circle"><i class="fas fa-info-circle"></i></a></td>'+
                                '<td>'+list[8]+'/'+list[9]+'</td>'+
                                '<td>'+list[5]+'</td>'+
                                '<td>'+list[6]+'</td>'+
                                '<td>'+list[7]+'</td>'+
                                '<td>'+list[3]+'</td>'+
                                '<td>'+list[2]+'</td>'+
                                '<td>'+list[1]+'</td>'+
                                '<td>'+(i+1)+'</td>'+
                            '</tr>';
                    table.insertAdjacentHTML('beforeend', tr); 
                });
            }
        };
        var url = "../../ControllerAjax.php?option=getListEtudiant&"+ele.getAttribute("name")+"="+ele.value+condition;
        xhttp.open("GET",url,false);
        console.log(url);
        xhttp.send();
    }
    $("#sidebarToggle").click();
    
</script>
<?php
        include("footer.php");
?>