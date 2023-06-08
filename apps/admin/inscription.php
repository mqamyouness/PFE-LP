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
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#getCNE" id="add_btn_modal">
            <i class="fas fa-plus-circle fa-sm text-white-50"></i>  أضف تلميذ</a>
            <h1 class="h3 mb-0 text-gray-800" >التسجيل</h1>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4"> 
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button"  id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="flase">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" style="" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#" >استطلاع على مداخل تسجيل</a>
                            </div>
                        </div>
                        <h6 class="m-0 font-weight-bold text-primary" style="width:100%;">إستمارة</h6>
                    </div>
                    <div class="card-body">
                        <form class="row" action="controller.php" method="POST" id="iscF">
                            <div class="col-md-12" style="margin-top:1%">
                                <h5 style="text-align: center !important;">معلومات  الأب </h5>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-3">
                                    <label for="tele_pere" class="form-label">رقم الهاتف</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="tele_pere" id="tele_pere" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" >
                                        <span class="input-group-text"  id="inputGroupPrepend3"><i class="fa fa-mobile"></i></span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="cin_pere" class="form-label">رقم البطاقة الوطنية للأب</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="cin_pere" id="cin_pere" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback">
                                        <span class="input-group-text"  id="inputGroupPrepend3"><i class="fas fa-address-card"></i></span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="prenom_pere" class="form-label">اسم الشخصي للأب</label>
                                    <input type="text" class="form-control " id="prenom_pere" name="prenom_pere">
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="nom" class="form-label">اسم العائلي</label>
                                    <input type="text" class="form-control " id="nom_pere" name="nom_pere" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12" style="margin-top:1%">
                                <h5 style="text-align: center !important;">معلومات  الأم </h5>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-3">
                                    <label for="tele_mere" class="form-label">رقم الهاتف</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="tele_mere" id="tele_mere" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback">
                                        <span class="input-group-text"  id="inputGroupPrepend3"><i class="fa fa-mobile"></i></span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="cin_mere" class="form-label"> رقم البطاقة الوطنية للأم</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="cin_mere" id="cin_mere" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback">
                                        <span class="input-group-text"  id="inputGroupPrepend3"><i class="fas fa-address-card"></i></span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="prenom_mere" class="form-label">اسم الشخصي للأم</label>
                                    <input type="text" class="form-control" id="prenom_mere" name="prenom_mere">
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="nom_mere" class="form-label">اسم العائلي للأم</label>
                                    <input type="text" class="form-control" id="nom_mere" name="nom_mere">
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4">
                                    <label for="email" class="form-label">البريد الإلكتروني</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" >
                                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label for="adresse_1" class="form-label">عنوان</label>
                                    <textArea type="text" class="form-control" id="adresse_1" name="adresse" rows="1" aria-describedby="validationServer03Feedback" ></textArea>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    Please provide a valid city.
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="sidebar-heading col-md-12">
                                <h5 style="text-align: center !important;">معلومات تلميذ</h5>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <label for="cne" class="form-label ">رمز الطالب الوطني</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="cne" name="cne" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" >
                                        <span class="input-group-text " id="inputGroupPrepend3">@</span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="prenom" class="form-label ">اسم الشخصي</label>
                                    <input type="text" class="form-control " id="prenom"  name="prenom" required>
                                    <div class="valid-feedback">
                                    Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4" >
                                    <label class="form-label">الجنس</label>
                                    <div >
                                        <label class="radio">
                                            <input type="radio" value="male" name="sexe">
                                            <i></i>ذكر
                                        </label>
                                        <label class="radio">
                                            <input type="radio" value="female" name="sexe">
                                            <i></i>انثى
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="date_naissance" class="form-label">تاريخ الازدياد</label>
                                    <input type="date" class="form-control" id="date_naissance" name="date_naissance"  aria-describedby="validationServer06Feedback" required>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12" style="margin-top:1%">
                                <h5 style="text-align: center !important;">اعدادات خاصة</h5>
                            </div>
                            <br>
                            <div class="row col-md-12">
                                <div class="col-md-4">
                                    <label for="" class="form-label">الواجب الشهري</label>
                                    <div class="input-group col-ms" >
                                        <input type="text" class="form-control" id="prix_mensuel" aria-label="Dollar amount (with dot and two decimal places)" name="prix_mensuel" required>
                                        <span class="input-group-text">DH</span>
                                        <span class="input-group-text">0.00</span>&nbsp; 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="form-label">الواجب السنوي</label>
                                    <div class="input-group col-ms" >
                                        <input type="text" class="form-control" id="prix_annuel" aria-label="Dollar amount (with dot and two decimal places)" name="prix_annuel" required>
                                        <span class="input-group-text">DH</span>
                                        <span class="input-group-text">0.00</span>&nbsp; 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="niveau" class="form-label">المستوى</label>
                                    <select class="form-control bg-white border-2 small" id="niveau" name="_niveau" onchange="getClasse(this,'classe')">
                                        <option value="null" selected value="null">اختار</option>
                                        <?php $niveaux = select("SELECT id,libelle,prix_annuel,prix_mensuel FROM niveau");
                                        for ($i=0; $i < count($niveaux); $i++) { 
                                            echo'<option value="'.$niveaux[$i][0].'" prix_annuel="'.$niveaux[$i][2].'" prix_mensuel="'.$niveaux[$i][3].'">'.$niveaux[$i][1].'</option>';
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4">
                                    <label for="school_year" class="form-label">الموسم الدراسي</label>
                                    <select class="form-control bg-white border-2 small" id="school_year" name="school_year">
                                        <option value="null" selected>اختار</option>
                                        <?php $anneeScolaire = select("SELECT id,annee_debut,annee_fin FROM anneeScolaire");
                                        for ($i=0; $i < count($anneeScolaire); $i++) { 
                                            echo'<option value="'.$anneeScolaire[$i][0].'">'.$anneeScolaire[$i][1].'/'.$anneeScolaire[$i][2].'</option>';
                                        }?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="groupe" class="form-label">فوج</label>
                                    <select class="form-control bg-white border-2 small" name="_groupe" id="groupe">
                                        <option selected value="null">اختار</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="classe" class="form-label">القسم</label>
                                    <select class="form-control bg-white border-2 small" id="classe" name="_classe" onchange="getGroupe(this,'groupe')">
                                        <option selected  value="null">اختار</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-center col-md-12" style="margin-top: 1% ;">
                                <button type="button" id="addEt" class="btn btn-info btn-icon-split" >
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">أضف الأطفال</span>
                                </button>
                            </div>
                            <br>
                            <div class="row justify-content-center col-md-12" style="margin-top: 1% ;">
                                <table class="table" style="display:none;" id="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">حذف</th>
                                            <th scope="col">الموسم الدراسي</th>
                                            <th scope="col">الواجب الشهري</th>
                                            <th scope="col">الواجب السنوي</th>
                                            <th scope="col">فوج</th>
                                            <th scope="col">القسم</th>
                                            <th scope="col">المستوى</th>
                                            <th scope="col">رمز الطالب الوطني</th>
                                            <th scope="col">الجنس</th>
                                            <th scope="col">تاريخ الازدياد</th>
                                            <th scope="col">اسم الشخصي</th>
                                            <th scope="col">#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataList">
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-center col-md-12" style="margin-top: 1% ;">
                                <input name="page" value="inscription" readonly style="display:none;" >
                                <button type="reset" class="btn btn-warning btn-icon-split" id="reset">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text">أعاد للوضع السابق</span>
                                </button>&nbsp;&nbsp;
                                <button type="submit" class="btn btn-success btn-icon-split" name="addEtudiant" >
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">حفظ</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<!--add etudiant Modal -->
<div class="modal fade" id="addEtudiant" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form  action="controller.php" method="POST" id="formEt">
				<div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">إستمارة</h5>
	                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">x</span>
	                </button>
	            </div>
	            <div class="modal-body" id="msg_body">
                    <div class="sidebar-heading col-md-12">
                        <h5 style="text-align: center !important;">معلومات تلميذ</h5>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <label for="cne" class="form-label ">رمز الطالب الوطني</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="cneEt" name="cneEt" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" >
                                <span class="input-group-text " id="inputGroupPrepend3">@</span>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="prenom" class="form-label ">اسم الشخصي</label>
                            <input type="text" class="form-control" id="prenomEt"  name="prenomEt" required>
                            <div class="valid-feedback">
                            Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-4" >
                            <label class="form-label">الجنس</label>
                            <div >
                                <label class="radio">
                                    <input type="radio" value="male" name="sexeEt">
                                    <i></i>ذكر
                                </label>
                                <label class="radio">
                                    <input type="radio" value="female" name="sexeEt">
                                    <i></i>انثى
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="date_naissance" class="form-label">تاريخ الازدياد</label>
                            <input type="date" class="form-control" id="date_naissanceEt" name="date_naissanceEt"  aria-describedby="validationServer06Feedback" required>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12" style="margin-top:1%">
                        <h5 style="text-align: center !important;">اعدادات خاصة</h5>
                    </div>
                    <br>
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <label for="" class="form-label">الواجب الشهري</label>
                            <div class="input-group col-ms" >
                                <input type="text" class="form-control" id="prix_mensuelEt" aria-label="Dollar amount (with dot and two decimal places)" name="prix_mensuelEt" required>
                                <span class="input-group-text">DH</span>
                                <span class="input-group-text">0.00</span>&nbsp; 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">الواجب السنوي</label>
                            <div class="input-group col-ms" >
                                <input type="text" class="form-control" id="prix_annuelEt" aria-label="Dollar amount (with dot and two decimal places)" name="prix_annuelEt" required>
                                <span class="input-group-text">DH</span>
                                <span class="input-group-text">0.00</span>&nbsp; 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="niveau" class="form-label">المستوى</label>
                            <select class="form-control bg-white border-2 small" id="niveauEt" name="niveauEt" onchange="getClasse(this,'classeEt')" required>
                                <option value="null" selected value="null">اختار</option>
                                <?php $niveaux = select("SELECT id,libelle,prix_annuel,prix_mensuel FROM niveau");
                                for ($i=0; $i < count($niveaux); $i++) { 
                                    echo'<option value="'.$niveaux[$i][0].'" prix_annuel="'.$niveaux[$i][2].'" prix_mensuel="'.$niveaux[$i][3].'">'.$niveaux[$i][1].'</option>';
                                }?>
                            </select>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <label for="classe" class="form-label">القسم</label>
                            <select class="form-control bg-white border-2 small" id="classeEt" name="classeEt" onchange="getGroupe(this,'groupeEt')" required>
                                <option selected  value="null">اختار</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="groupe" class="form-label">فوج</label>
                            <select class="form-control bg-white border-2 small" name="groupeEt" id="groupeEt" required>
                                <option selected value="null">اختار</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="school_year" class="form-label">الموسم الدراسي</label>
                            <select class="form-control bg-white border-2 small" id="school_yearEt" name="school_yearEt" required>
                                <option value="null" selected>اختار</option>
                                <?php $anneeScolaire = select("SELECT id,annee_debut,annee_fin FROM anneeScolaire");
                                for ($i=0; $i < count($anneeScolaire); $i++) { 
                                    echo'<option value="'.$anneeScolaire[$i][0].'">'.$anneeScolaire[$i][1].'/'.$anneeScolaire[$i][2].'</option>';
                                }?>
                            </select>
                        </div>
                    </div>
                    <input type="number" style="display:none;" id="famille" name="famille"> 
	            </div>
	            <div class="modal-footer">
	                <button class="btn btn-secondary" type="button" data-dismiss="modal" id="can">إلغاء</button>
	                <button type="submit"  class="btn btn-primary">حفظ</button>
	            </div>
			</form>
        </div>
    </div>
</div>
<!--End add etudiant Modal -->
<!--Modal Error-->
<div class="modal fade" id="getCNE" tabindex="-1" data-backdrop="static"   data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافة تلميذ عن طريق رمز الطالب الوطني</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" id="sherchCNE">
            <div class="col-sm">
                <label for="frereCNE" class="form-label"> رمز الطالب الوطني اخ المعني بالأمر </label>
                <input type="text" class="form-control" id="frereCNE" name="frereCNE"  aria-describedby="validationServer06Feedback" required>
            </div>
        </div>
        <div class="row" id="msgerr" style="display: none;">
            <div class="col-sm">
                !... <span></span> نعتذر لا يوجد اي معني بالأمر بهذا رمز  
            </div>
        </div>
        <div class="row" id="conferm" style="display: none;">
            <div class="col-sm">
                
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
        <button type="button" onclick="getFamille()" id="get" class="btn btn-primary">بحث</button>
        <button type="button"  id="add" data-toggle="modal" data-target="#addEtudiant" data-dismiss="modal" style="display: none;" class="btn btn-primary">تأكيد</button>
      </div>
    </div>
  </div>
</div>
<!--End Modal Error-->
<script>
    document.getElementById("inscriptionPage").classList.add("active");
    document.getElementById("drow2").classList.add("active");
    document.getElementById("collapseUtilities").classList.add("show");
    function getClasse(ele,sel) {
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
        xhttp.open("GET","../../ControllerAjax.php?option=getClasseOfNiveau&niveauAcs="+ele.value,false);
        xhttp.send();
        if(sel == 'classe')
        {
            $("#prix_annuel").val($("#niveau option:selected").attr("prix_annuel"));
            $("#prix_mensuel").val($("#niveau option:selected").attr("prix_mensuel"));
        }else{
            $("#prix_annuelEt").val($("#niveauEt option:selected").attr("prix_annuel"));
            $("#prix_mensuelEt").val($("#niveauEt option:selected").attr("prix_mensuel"));
            document.getElementById("groupeEt").innerHTML = "<option selected value=\"null\">اختار</option>";
        }   
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
    function getFamille() {
        var cne = document.getElementById("frereCNE");
        if (frereCNE.value != "") {
            var xhttp = new  XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200 )
                {
                    var o = JSON.parse(this.responseText);
                    if (o.length > 0) {
                        var content;
                        o.forEach(element => {
                            content ="<h2 data=\""+element.id+"\"><p>"+element.prenom_pere+" "+element.nom_pere+": اسم  لأب</p>";
                            content += "<p>"+element.cin_pere+": رقم البطاقة الوطنية للأب </p>";
                            content += "<p>"+element.prenom_mere+" "+element.nom_mere+" : اسم لأم</p>";
                            content += "<p>"+element.cin_pere+": رقم البطاقة الوطنية للأم </p></h2>";
                        });
                        document.getElementById("conferm").style.display = "block";
                        document.getElementById("conferm").innerHTML = content;
                        document.getElementById("add").style.display = "block";
                        document.getElementById("sherchCNE").style.display = "none";
                        document.getElementById("get").style.display = "none";
                    }else{
                        document.getElementById("sherchCNE").style.display = "none";
                        document.getElementById("get").style.display = "none";
                        document.getElementById("msgerr").style.display = "block";
                        document.getElementById("msgerr").childNodes[1].childNodes[1].innerHTML = cne.value;
                    }
                }
            };
            xhttp.open("GET","../../ControllerAjax.php?option=getFamille&frereCNE="+cne.value,false);
            xhttp.send();
        }else
            cne.classList.add("is-invalid");
    }
    function removeEt(ele)
    {
        var tr = ele.parentElement.parentElement;
        tr.remove();
        if (document.getElementById("dataList").childElementCount == 0) {
            $("#table").hide();
            $("#date_naissance").attr("required")
                    .attr("name","date_naissance");
            $("#prenom").attr("required")
                        .attr("name","prenom");
            $("#groupe").attr("name","groupe");
            $("#classe").attr("name","classe");
            $("#niveau").attr("name","niveau");
            $("#cne").attr("name","cne");
            $("#school_year").attr("name","school_year");
            $('#prix_mensuel').attr("name","prix_mensuel");
            $('#prix_annuel').attr("name","prix_annuel");
        }
    }
    $(document).ready(function(){
        $("#formEt").submit(function (f) {
            if ($("#school_yearEt option:selected").val() == "null" || $("#groupeEt option:selected").val() == "null" ) {
                f.preventDefault();   
            }
        });
        $("#add_btn_modal").click(function () {
            $("#sherchCNE").show();
            $("#get").show();
            $("#msgerr").hide();
            $("#add").hide();
            $("#conferm").hide();
            $("#frereCNE").val("")
                            .removeClass("is-invalid");

        });
        $("#add").click(function () {
            $("#famille").val($("#conferm >h2").attr("data"));
        });
        $("#double").click(function () {
            if ($('#ImpIframe').attr('data')) {
                if(this.checked )
                    $('#ImpIframe').attr('src','resuInscription.php?double=true&datasources='+$('#ImpIframe').attr('data'));
                else
                    $('#ImpIframe').attr('src','resuInscription.php?double=false&datasources='+$('#ImpIframe').attr('data'));
            }
        });
        $("#addEt").click(function () {
            if($("#prenom").val() != ""){
                if($("#date_naissance").val() != ""){
                    if ($("#niveau option:selected").val() != "null") {
                        if($("#prix_annuel").val() != ""){
                            if($("#prix_mensuel").val() != ""){
                                if ($("#classe option:selected").val() != "null") {
                                    if($("#groupe option:selected").val() != "null"){
                                        if($("#school_year option:selected").val() != "null"){
                                            $("#table").show();
                                            var row ='<tr><td><a  onclick="removeEt(this)" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>';
                                            row += '<td><input name="school_yearList[]" value="'+$("#school_year").val()+'" style="display:none;">'+$("#school_year option:selected").text()+'</td>';
                                            row += '<td><input name="prix_mensuelList[]" value="'+$("#prix_mensuel").val()+'" style="display:none;">'+$("#prix_mensuel").val()+'</td>';
                                            row += '<td><input name="prix_annuelList[]" value="'+$("#prix_annuel").val()+'" style="display:none;">'+$("#prix_annuel").val()+'</td>';;
                                            row += '<td><input name="groupeList[]" value="'+$("#groupe").val()+'" style="display:none;">'+$("#groupe option:selected").text()+'</td>';
                                            row += '<td><input name="classeList[]" value="'+$("#classe option:selected").text()+'" style="display:none;">'+$("#classe option:selected").text()+'</td>';
                                            row += '<td><input name="niveauList[]" value="'+$("#niveau option:selected").text()+'" style="display:none;">'+$("#niveau option:selected").text()+'</td>';
                                            row += '<td><input name="cneList[]" value="'+$("#cne").val()+'" style="display:none;">'+$("#cne").val()+'</td>';
                                            if($("input[name=sexe]")[0].checked){
                                                row +='<td><input name="sexeList[]" readonly value="'+$("input[name=sexe]")[0].value+'" style="display:none;">'+$("input[name=sexe]")[0].value+'</td>';
                                                $("input[name=sexe]")[0].checked = false;
                                            }else if($("input[name=sexe]")[1].checked){
                                                row +='<td><input name="sexeList[]" readonly value="'+$("input[name=sexe]")[1].value+'" style="display:none;">'+$("input[name=sexe]")[1].value+'</td>';
                                                $("input[name=sexe")[1].checked = false;
                                            }
                                            row +='<td><input name="date_naissanceList[]" readonly value="'+$("#date_naissance").val()+'" style="display:none;">'+$("#date_naissance").val()+'</td>';
                                            row +='<td><input name="prenomList[]" value="'+$("#prenom").val()+'" style="display:none;">'+$("#prenom").val()+'</td>';
                                            var count = $("#dataList").children().length+1;
                                            row +='<th scope="row">'+count+'</th></tr>';
                                            $("#dataList").append(row);
                                            $("#cne").val("")
                                                .removeAttr("name");
                                            $("#date_naissance").val("")
                                                    .removeAttr("required")
                                                    .removeAttr("name");
                                            $("#prenom").val("")
                                                            .removeAttr("required")
                                                            .removeAttr("name");
                                            $("#groupe").val('null').change()
                                                            .removeAttr("name");
                                            $("#classe").val('null').change()
                                                            .removeAttr("name");
                                            $("#niveau").val('null').change()
                                                            .removeAttr("name");
                                            $('#school_year').val('null').change()
                                                                .removeAttr("name");
                                            $('#prix_mensuel').val('').removeAttr("name");
                                            $('#prix_annuel').val('').removeAttr("name");
                                            $("#school_year").removeClass("is-invalid");
                                        }else 
                                            $("#school_year").addClass("is-invalid");
                                            $("#groupe").removeClass("is-invalid")
                                    }else{
                                        $("#groupe").addClass("is-invalid");
                                    }
                                    $("#classe").removeClass("is-invalid");
                                }else
                                    $("#classe").addClass("is-invalid");
                                $("#prix_mensuel").removeClass("is-invalid");
                            }else
                                $("#prix_mensuel").addClass("is-invalid");
                            $("#prix_annuel").removeClass("is-invalid");
                        }else
                            $("#prix_annuel").addClass("is-invalid");
                        $("#niveau").removeClass("is-invalid");
                    }else
                        $("#niveau").addClass("is-invalid");
                    $("#date_naissance").removeClass("is-invalid");
                }else
                    $("#date_naissance").addClass("is-invalid");
                $("#prenom").removeClass("is-invalid");
            }else
                $("#prenom").addClass("is-invalid");
        });
        $("#dropdownMenuLink").click();
    <?php
    if(isset($_SESSION["etudiant"]) && $_SESSION["etudiant"] != null){
        $myJSON = json_encode($_SESSION["etudiant"]);
        $_SESSION["etudiant"] = null;
        echo "$('#ImpIframe').attr('src','resuInscription.php?double=true&datasources=".$myJSON."');";
        echo "$('#ImpIframe').attr('data','".$myJSON."');";
        echo '$("#Imprimer").modal("show");';
    }
    ?>
        $("#reset").click(function (){
            $("#dataList").html("");
            $("#table").hide();
        });
    });
</script>
<?php
    include("footer.php");
?>