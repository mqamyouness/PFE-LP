<?php
    include("header.php");
    if(isset($_GET["student"]))
    {
        $student = select("SELECT e.id,e.nom,e.prenom,e.datenaissance,e.sexe,e.CNE,f.id,f.prenom_pere,f.nom_mere,f.nom_mere,f.prenom_mere,f.tele_pere,f.cin_pere,f.tele_mere,f.cin_mere,f.adresse,f.email, g.libelle,c.libelle,n.libelle,n.id,c.id,g.id,a.annee_debut,a.annee_fin,a.id FROM etudiant e
                            INNER JOIN famille f on f.id = e.id_famille
                            INNER JOIN parcours p on p.id_etudiant = e.id
                            INNER JOIN groupe g on g.id = p.id_groupe
                            INNER JOIN classe c ON c.id = g.id_classe
                            INNER JOIN niveau n ON n.id = c.id_niveau 
                            INNER JOIN anneescolaire a ON a.id = p.id_anneescolaire WHERE e.id =".$_GET["student"]);
    }else {
        //header("Refresh:0; url=student.php");
        exit();
    }
?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
    <?php
        include("small_header.php");
    ?>
    <div class="container-fluid"> 
        <div class="d-sm-flex  mb-3">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal_add_parcour" style="margin-right : 10px;">
                <i class="fas fa-plus-circle fa-sm text-white-50"></i>  إعادة التسجيل</a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="update_info"  data="true">
                <i class="fas fa-plus-circle fa-sm text-white-50"></i>  تحديث المعلومات</a>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-2">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary" style="width:100%;"> <?php  echo $student[0][2].'  '.$student[0][1]; ?>   : الملف الشخصي لتلميذ</h5>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body ">
                        <form class="g-3" method="POST" action="controller.php" id="info">
                            <div class="row">
                                <div class="col-sm">
                                    <label class="form-label">الجنس</label>
                                    <?php if($student[0][4] == "male") 
                                            echo " <h5>ذكر</h5>";
                                        else
                                                echo " <h5>انثى</h5>";
                                    ?>
                                </div>
                                <div class="col-sm">
                                    <label for="date_naissance" class="form-label">تاريخ الازدياد</label>
                                    <input type="date" class="form-control" id="date_naissance" name="date_naissance_update" value="<?php echo $student[0][3];?>"  aria-describedby="validationServer06Feedback" required>
                                </div>
                                <div class="col-sm">
                                    <label for="cne" class="form-label ">رمز الطالب الوطني</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="cne" name="cne_update" value="<?php echo $student[0][5];?>" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" >
                                        <span class="input-group-text " id="inputGroupPrepend3">@</span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <label for="validationServer02" class="form-label">اسم الشخصي</label>
                                    <input type="text" class="form-control" name="lastname_update" id="lastName" required value="<?php echo $student[0][2];?>">
                                    <div class="valid-feedback">
                                    ! الرجاء إعادة 
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-12" style="margin-top:1%">
                                <h5 style="text-align: center !important;">معلومات  الأب </h5>
                            </div>
                            <div class="row ">
                                <div class="col-sm">
                                    <label for="tele_pere" class="form-label">رقم الهاتف</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="tele_pere_update" id="tele_pere" value="<?php echo $student[0][11];?>" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" >
                                        <span class="input-group-text"  id="inputGroupPrepend3"><i class="fa fa-mobile"></i></span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <label for="cin_pere" class="form-label">رقم البطاقة الوطنية للأب</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="cin_pere_update" id="cin_pere" value="<?php echo $student[0][12];?>" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback">
                                        <span class="input-group-text"  id="inputGroupPrepend3"><i class="fas fa-address-card"></i></span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <label for="prenom_pere" class="form-label">اسم الشخصي للأب</label>
                                    <input type="text" class="form-control " id="prenom_pere" name="prenom_pere_update" value="<?php echo $student[0][7];?>">
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <label for="nom" class="form-label">اسم العائلي</label>
                                    <input type="text" class="form-control " id="nom_pere" name="nom_pere_update" required value="<?php echo $student[0][8];?>">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12" style="margin-top:1%">
                                <h5 style="text-align: center !important;">معلومات  الأم </h5>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <label for="tele_mere" class="form-label">رقم الهاتف</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="tele_mere_update" id="tele_mere" value="<?php echo $student[0][13];?>" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback">
                                        <span class="input-group-text"  id="inputGroupPrepend3"><i class="fa fa-mobile"></i></span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <label for="cin_mere" class="form-label"> رقم البطاقة الوطنية للأم</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="cin_mere_update" id="cin_mere" value="<?php echo $student[0][14];?>" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback">
                                        <span class="input-group-text"  id="inputGroupPrepend3"><i class="fas fa-address-card"></i></span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <label for="prenom_mere" class="form-label">اسم الشخصي للأم</label>
                                    <input type="text" class="form-control" id="prenom_mere" name="prenom_mere_update" value="<?php echo $student[0][10];?>">
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <label for="nom_mere" class="form-label">اسم العائلي للأم</label>
                                    <input type="text" class="form-control" id="nom_mere" name="nom_mere_update" value="<?php echo $student[0][9];?>">
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="email" class="form-label">البريد الإلكتروني</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="email_update" id="email" value="<?php echo $student[0][16];?>" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" >
                                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label for="adresse_1" class="form-label">عنوان</label>
                                    <textArea type="text" class="form-control" id="adresse" name="adresse_update" rows="1" aria-describedby="validationServer03Feedback" >
                                        <?php echo $student[0][15];?>
                                    </textArea>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    Please provide a valid city.
                                    </div>
                                </div>
                            </div>
                            <input type="number" style="display:none;"  name="famille_update" value="<?php echo $student[0][6];?>"> 
                            <input type="number" style="display:none;"  name="etudiant_update" value="<?php echo $student[0][0];?>"> 
                            <div class="row justify-content-center" style="margin-top: 1% ;">
                                <button type="reset" class="btn btn-warning btn-icon-split" id="reset" style="display:none">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text">أعاد للوضع السابق</span>
                                </button>&nbsp;&nbsp;
                                <button class="btn btn-success btn-icon-split" type="submit" id="sub_info" style="display:none">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">حفظ</span>
                                </button>
                            </div>
                            <br>
                            <div class="row">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">حذف</th>
                                            <th scope="col">الموسم الدراسي</th>
                                            <th scope="col">فوج</th>
                                            <th scope="col">القسم</th>
                                            <th scope="col">المستوى</th>
                                            <th scope="col">رقم</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i=0; $i < count($student); $i++) { 
                                        echo '<tr>'.
                                                '<td>'.'<a data-toggle="modal" data-target="#removeModal" class="btn btn-danger btn-circle removeParcour" data_etu="'.$student[$i][0].'" data_annee="'.$student[$i][25].'" data_groupe="'.$student[$i][22].'" >
                                                        <i class="fas fa-trash"></i>
                                                    </a></td>'.
                                                '<td>'.$student[$i][24].'/'.$student[$i][23].'</td>'.
                                                '<td>'.$student[$i][17].'</td>'.
                                                '<td>'.$student[$i][18].'</td>'.
                                                '<td>'.$student[$i][19].'</td>'.
                                                '<td>'.($i+1).'</td>'.
                                                '</tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    <h2>?  هل تريد أن تحذف المستوى</h2> 
	                <input type="number" style="display:none;" id="contentRemove_etudiant" name="removeParcour_etudiant"> 
                    <input type="number" style="display:none;" id="contentRemove_annee" name="removeParcour_anneescolaire"> 
                    <input type="number" style="display:none;" id="contentRemove_groupe" name="removeParcour_groupe"> 
	            </div>
	            <div class="modal-footer">
	                <button class="btn btn-secondary" type="button" data-dismiss="modal">إلغاء</button>
	                <button type="submit" class="btn btn-primary">حذف</button>
	            </div>
			</form>
        </div>
    </div>
</div>
<!-- Modal Add parcour -->
<div class="modal fade" id="modal_add_parcour" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="GroupeModalLabel">إعادة التسجيل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="controller.php" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" class="form-label">الواجب الشهري</label>
                            <div class="input-group col-ms" >
                                <input type="text" class="form-control" id="prix_mensuel" aria-label="Dollar amount (with dot and two decimal places)" name="reInsc_prix_mensuel" required>
                                <span class="input-group-text">DH</span>
                                <span class="input-group-text">0.00</span>&nbsp; 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">الواجب السنوي</label>
                            <div class="input-group col-ms" >
                                <input type="text" class="form-control" id="prix_annuel" aria-label="Dollar amount (with dot and two decimal places)" name="reInsc_prix_annuel" required>
                                <span class="input-group-text">DH</span>
                                <span class="input-group-text">0.00</span>&nbsp; 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="niveau" class="form-label">المستوى</label>
                            <select class="form-control bg-white border-2 small" id="niveau" name="reInsc_niveau" onchange="getClasse(this)">
                                <option value="null" selected value="null">اختار</option>
                                <?php $niveaux = select("SELECT id,libelle,prix_annuel,prix_mensuel FROM niveau");
                                for ($i=0; $i < count($niveaux); $i++) { 
                                    echo'<option value="'.$niveaux[$i][0].'" prix_annuel="'.$niveaux[$i][2].'" prix_mensuel="'.$niveaux[$i][3].'">'.$niveaux[$i][1].'</option>';
                                }?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="school_year" class="form-label">الموسم الدراسي</label>
                            <select class="form-control bg-white border-2 small" id="school_year" name="reInsc_school_year">
                                <option value="null" selected>اختار</option>
                                <?php $anneeScolaire = select("SELECT id,annee_debut,annee_fin FROM anneeScolaire");
                                for ($i=0; $i < count($anneeScolaire); $i++) { 
                                    echo'<option value="'.$anneeScolaire[$i][0].'">'.$anneeScolaire[$i][1].'/'.$anneeScolaire[$i][2].'</option>';
                                }?>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="groupe" class="form-label">فوج</label>
                            <select class="form-control bg-white border-2 small" name="reInsc_groupe" id="groupe">
                                <option selected value="null">اختار</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="classe" class="form-label">القسم</label>
                            <select class="form-control bg-white border-2 small" id="classe" name="reInsc_classe" onchange="getGroupe(this,'groupe')">
                                <option selected  value="null">اختار</option>
                            </select>
                        </div>
                    </div>
                    <input type="number" style="display:none;" id="etudiant" name="reInsc_etudiant" value="<?php echo $student[0][0];?>" > 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" id="can">إلغاء</button>
                    <button type="submit"  class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal  add parcour -->
<!--Modal Imprimer-->
<div class="modal fade" id="Imprimer" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">وصل التسجيل</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="resuInscription.php" style="height: 75vh !important;" width="100%" title="Iframe Example" id="ImpIframe"></iframe>
      </div>
      <div class="modal-footer">
        <label class="checkbox" style="font-size: 1.25rem;">
            <input type="checkbox" id="double" checked>
            <i></i>إيصال مزدوج
        </label>&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-primary" onclick="Print()">اطبع وثيقة</button>
      </div>
    </div>
  </div>
</div>
<!--End Modal Imprimer-->
<script>
        function getClasse(ele) {
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                var o = JSON.parse(this.responseText);
                var select = document.getElementById('classe');
                select.innerHTML="";
                select.insertAdjacentHTML('beforeend',"<option selected value=\"null\">اختار</option>");
                o.forEach(element => {
                    select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.libelle+"</option>"); 
                });
            }
        };
        xhttp.open("GET","../../ControllerAjax.php?option=getClasseOfNiveau&niveauAcs="+ele.value,false);
        xhttp.send();
        $("#prix_annuel").val($("#niveau option:selected").attr("prix_annuel"));
        $("#prix_mensuel").val($("#niveau option:selected").attr("prix_mensuel"));
    }
    function getGroupe(ele,sel) {
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                var o = JSON.parse(this.responseText);
                var select = document.getElementById(sel);
                select.innerHTML="";
                select.insertAdjacentHTML('beforeend',"<option selected value=\"null\">اختار</option>");
                o.forEach(element => {
                    select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.libelle+"</option>"); 
                });
            }
        };
        xhttp.open("GET","../../ControllerAjax.php?option=getGroupeOfClasse&classeAcs="+ele.value,false);
        xhttp.send();
    }
    function Print()
    {
        var frm = document.getElementById("ImpIframe").contentWindow;
        frm.focus();
        frm.print();
            return false;
    }
    $(document).ready(function(){
        $("#info input").each(
            function(index){  
                $(this).attr("readonly","true");
            }
        );
        $("#info textArea").eq(0).attr("readonly","true");
        $("#update_info").click(function () {
            
            if($(this).attr('data') == "true")
            {
                $("#update_info").html("<i class=\"	fa fa-minus-circle fa-sm text-white-50\"></i>   إلغاء تحديث المعلومات");
                $("#sub_info").show(); 
                $("#reset").show();
                $("table").hide();
                $(this).attr('data','false');
                $("#info input").each(
                    function(index){  
                        $(this).removeAttr("readonly");
                    }
                );
                $("#info textArea").eq(0).removeAttr("readonly");
            }else{
                $("#update_info").html("<i class=\"fas fa-plus-circle fa-sm text-white-50\"></i>  تحديث المعلومات</a>");
                $("#sub_info").hide(); 
                $("#reset").hide()
                          .click(); 
                $("table").show(); 
                $(this).attr('data','true');
                $("#info input").each(
                    function(index){  
                        $(this).attr("readonly","true");
                    }
                );
                $("#info textArea").eq(0).attr("readonly","true");
            }
        });
        $(".removeParcour").click(function () {
            $("#contentRemove_etudiant").val($(this).attr("data_etu"));
            $("#contentRemove_annee").val($(this).attr("data_annee"));
            $("#contentRemove_groupe").val($(this).attr("data_groupe"));
        });
        $("#updategroupe").click(function () {
            $("#updateG input").eq(0).val("mqam");
            $("#updateG input").eq(1).val("mqam");
        });
        $("#double").click(function () {
            if ($('#ImpIframe').attr('data')) {
                if(this.checked )
                    $('#ImpIframe').attr('src','resuInscription.php?double=true&datasources='+$('#ImpIframe').attr('data'));
                else
                    $('#ImpIframe').attr('src','resuInscription.php?double=false&datasources='+$('#ImpIframe').attr('data'));
            }
        });
        <?php
        if(isset($_SESSION["etudiant"]) && $_SESSION["etudiant"] != null){
            $myJSON = json_encode($_SESSION["etudiant"]);
            $_SESSION["etudiant"] = null;
            echo "$('#ImpIframe').attr('src','resuInscription.php?double=true&datasources=".$myJSON."');";
            echo "$('#ImpIframe').attr('data','".$myJSON."');";
            echo '$("#Imprimer").modal("show");';
        }
        ?>
    });
</script>
<?php
    include("footer.php");
?>