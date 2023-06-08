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
            <h1 class="h3 mb-0 text-gray-800" style="width:100%;"> استرجاع وصل التسجيل/الأداء</h1>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                        <form >
                            <div class="row">
                                <div class="col-sm">
                                    <h5 for="" class="form-label">وصل</h5>
                                    <label class="radio">
                                        <i></i>استرجاع وصل الأداء الشهري
                                        <input type="radio" value="paiement" name="typeResu" data-page="resuPaiement.php" data-function="getResuPaiement"   onchange="typeResuLaod(this)">
                                    </label>
                                    <label class="radio">
                                        <i></i>استرجاع وصل التسجيل
                                        <input type="radio" value="inscription" name="typeResu" checked data-page="resuInscription.php" data-function="getResuInscription"  onchange="typeResuLaod(this)">
                                    </label>
                                </div>
                                <div class="col-sm">
                                    <label for="school_year" class="form-label">الموسم الدراسي</label>
                                    <select class="form-control bg-white border-2 small" id="anneeScolaire" name="anneeScolaire" onchange="changeDate(this)">
                                        <option value="null" disabled selected>اختار</option>
                                        <?php $anneeScolaire = select("SELECT id,annee_debut,annee_fin FROM anneeScolaire");
                                        for ($i=0; $i < count($anneeScolaire); $i++) { 
                                            echo'<option value="'.$anneeScolaire[$i][0].'">'.$anneeScolaire[$i][1].'/'.$anneeScolaire[$i][2].'</option>';
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm">
                                    <label for="groupe" class="form-label">فوج</label>
                                    <select class="form-control bg-white border-2 small" id="groupe" name="groupe" onchange="checkBygroupe(this)">
                                        <option selected value="all">اختار</option>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="classe" class="form-label">القسم</label>
                                    <select class="form-control bg-white border-2 small" id="classe" name="classe" onchange="getGroupe(this)">
                                        <option selected value="all">اختار</option>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="niveau" class="form-label">المستوى</label>
                                    <select class="form-control bg-white border-2 small" id="niveau" name="niveau" onchange="getClasse(this)">
                                        <option selected value="all">اختار</option>
                                        <?php $niveaux = select("SELECT id,libelle FROM niveau");
                                        for ($i=0; $i < count($niveaux); $i++) { 
                                            echo'<option value="'.$niveaux[$i][0].'">'.$niveaux[$i][1].'</option>';
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm" id="listMonth" style="display:none;">
                                    <label for="month" class="form-label">اشهر الدراسية</label>
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
                                    <label for="prenom" class="form-label">اسم الشخصي</label>
                                    <select list="listPrenom" id="prenom" name="prenom" onchange="getMonth(this)" class="form-control bg-white border-2 small" >
                                        <option value="null" disabled selected >اختار</option>
                                    </select>  
                                </div>
                                <div class="col-sm">
                                    <label for="nom" class="form-label">اسم العائلي</label>
                                    <select id="nom" name="nom"  onchange="getEtudiant(this)" required class="form-control bg-white border-2 small">
                                        <option value="null" disabled selected>اختار</option>
                                    <?php $listNom = select("SELECT id,nom_pere FROM famille");
                                    for ($i=0; $i < count($listNom); $i++) { 
                                        echo '<option value="'.$list[$i][0].'">'.$list[$i][1].'</option>';
                                    }
                                    ?> 
                                    </select>  
                                </div>
                            </div>
                            <div class="row justify-content-center col-md-12" style="margin: 1%;" >
                                <div  id="div_btn" style="display:none;"> 
                                    <button type="reset" class="btn btn-warning btn-icon-split" >
                                        <span class="icon text-white-50">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                        <span class="text">أعاد للوضع السابق</span>
                                    </button>&nbsp;&nbsp;
                                    <button type="button" class="btn btn-success btn-icon-split" id="addEtudiant" name="addEtudiant" >
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">اضف</span>
                                    </button>
                                </div>
                            </div>
                            <div class="row justify-content-center col-md-12">
                                <table class="table" id="table" style="display:none;" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>حذف</th>
                                            <th>الشهر</th>
                                            <th>الموسم الدراسي</th>
                                            <th> التلميذ</th>
                                            <th >رقم</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyEt">
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-center col-md-12" style="margin: 1% ;">
                                <button type="button" id="btn_sub" class="btn btn-info btn-icon-split" >
                                    <span class="icon text-white-50">
                                        <i class="fas fa-download"></i>
                                    </span>
                                    <span class="text">حفظ وطبع الوصل</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!--Modal Imprimer-->
<div class="modal fade" id="Imprimer" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">وصل</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="" style="height: 75vh !important;" width="100%" title="Iframe Example" id="ImpIframe"></iframe>
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
    _dataMonth = document.getElementById("month").innerHTML;
    document.getElementById("recuperationPage").classList.add("active");
    document.getElementById("drow2").classList.add("active");
    document.getElementById("collapseUtilities").classList.add("show");
    var _data = [];
    var page ="resuInscription";
    function typeResuLaod(ele){
        document.getElementById("double").checked = true;
        if (ele.value == "inscription") {
            document.getElementById("listMonth").style.display= "none";
            document.getElementById("div_btn").style.display= "none";
            document.getElementById("btn_sub").removeAttribute("disabled");
            document.getElementById("bodyEt").innerHTML = "";
            _data = [];
            document.getElementById("table").style.display= "none";
            page = "resuInscription";
        }else{
            document.getElementById("listMonth").style.display= "block";
            document.getElementById("div_btn").style.display= "block";
            document.getElementById("btn_sub").setAttribute("disabled","disabled");
            page = "resuPaiement";
        }
    }
    function getClasse(ele) {
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                var o = JSON.parse(this.responseText);
                document.getElementById("groupe").innerHTML = "<option selected disabled value=\"all\">اختار</option>";
                var select = document.getElementById("classe");
                select.innerHTML="";
                select.insertAdjacentHTML('beforeend',"<option selected disabled value=\"all\">اختار</option>")
                o.forEach(element => {
                    select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.libelle+"</option>"); 
                });
            }
        };
        xhttp.open("GET","../../ControllerAjax.php?option=getClasseOfNiveau&niveauAcs="+ele.value,false);
        xhttp.send();
        var c = "&anneeScolaire=";
        if (document.getElementById("anneeScolaire").value != "all") {
            c += document.getElementById("anneeScolaire").value;
            getListNomEtudiant(ele,c);
        } else {
            getListNomEtudiant(ele,"");   
        }
    }
    function getGroupe(ele) {
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                var o = JSON.parse(this.responseText);
                var select = document.getElementById("groupe");
                select.innerHTML="";
                select.insertAdjacentHTML('beforeend',"<option selected disabled value=\"all\">اختار</option>");
                o.forEach(element => {
                    select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.libelle+"</option>"); 
                });
            }
        };
        xhttp.open("GET","../../ControllerAjax.php?option=getGroupeOfClasse&classeAcs="+ele.value,false);
        xhttp.send();
        var c = "&anneeScolaire=";
        if (document.getElementById("anneeScolaire").value != "all") {
            c += document.getElementById("anneeScolaire").value;
            getListNomEtudiant(ele,c);
        } else {
            getListNomEtudiant(ele,"");   
        }
    }
    function Print()
    {
        var frm = document.getElementById("ImpIframe").contentWindow;
        frm.focus();
        frm.print();
            return false;
    }
    function checkBygroupe(ele) {
        var c = "&anneeScolaire=";
        if (document.getElementById("anneeScolaire").value != "all") {
            c += document.getElementById("anneeScolaire").value;
            getListNomEtudiant(ele,c);
        } else {
            getListNomEtudiant(ele,"");   
        }
    }
    function getListNomEtudiant(ele,c) {
        var select = document.getElementById("nom");
        if(!select.getAttribute("disabled")){
            var xhttp = new  XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200 )
                {
                    var o = JSON.parse(this.responseText);
                    document.getElementById("prenom").innerHTML = "<option selected disabled value=\"null\">اختار</option>";
                    select.innerHTML = "<option selected disabled value=\"all\">اختار</option>";
                    o.forEach(element => {
                        select.insertAdjacentHTML('beforeend', "<option value=\""+element.id_famille+"\">"+element.nom+"</option>"); 
                    });
                }
            };
            var url = "../../ControllerAjax.php?option=getListNomEtudiant&id="+ele.value+"&condition="+ele.getAttribute("name")+c;
            xhttp.open("GET",url,false);
            xhttp.send();
            document.getElementById("month").innerHTML = "<option selected disabled value=\"null\">اختار</option>";
        }
    }
    function changeDate(ele){
        if(document.getElementById("groupe").value !="all"){
            getListNomEtudiant(document.getElementById("groupe"),"&anneeScolaire="+ele.value);
        }else if(document.getElementById("classe").value !="all"){
            getListNomEtudiant(document.getElementById("classe"),"&anneeScolaire="+ele.value);
        }else if(document.getElementById("niveau").value !="all"){
            getListNomEtudiant(document.getElementById("niveau"),"&anneeScolaire="+ele.value);
        }else
            getListNomEtudiant(ele,"");
        

    }
    function getEtudiant(ele) {
        if (ele.value != "all") {
            var xhttp = new  XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200 )
                {
                    console.log(this.responseText);
                    var o = JSON.parse(this.responseText);
                    var select = document.getElementById("prenom");
                    select.innerHTML="";
                    select.insertAdjacentHTML('beforeend',"<option selected disabled value=\"null\">اختار</option>");
                    o.forEach(element => {
                        select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.prenom+"</option>"); 
                    });
                }
            };
            var url = "../../ControllerAjax.php?option=getEtudiantByFamille&famille="+ele.value;
            if (document.getElementById("anneeScolaire").value !="null") {
                url += "&anneeScolaire="+document.getElementById("anneeScolaire").value;
            }
            xhttp.open("GET",url,false);
            console.log(url);
            xhttp.send();
            document.getElementById("month").innerHTML = "<option selected disabled value=\"null\">اختار</option>";
        }
    }
    function getMonth(ele) {
        document.getElementById("month").innerHTML = _dataMonth;
        var select = document.getElementById("month").children;
        for (i = 0; i < select.length; i++) {
            select[i].style.display= "none";
        }
        if (document.getElementById("anneeScolaire").value != "all") {
            var xhttp = new  XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200 )
                {
                    var o = JSON.parse(this.responseText);
                    for (i = 0; i < select.length; i++) {
                        o.forEach(element => {
                            if(element.mois == select[i].value)
                            {
                                select[i].style.display= "block";
                            }
                        });
                    }
                }
            };
            xhttp.open("GET","../../ControllerAjax.php?option=getMontOfEtudiant&etudiant="+ele.value+"&anneescolaire="+document.getElementById("anneeScolaire").value,false);
            xhttp.send();
        }
    }
    function removeEt(ele)
    {
        var tr = ele.parentElement.parentElement;
        var i = 0;
        _data.forEach(data => {
            if (data.id ==  tr.childNodes[3].childNodes[0].value && data.month == tr.childNodes[1].childNodes[0].value) {
                _data.splice(i,1);
                i++;
            }
        });
        tr.remove();
        if (document.getElementById("bodyEt").childElementCount == 0) {
            $("#table").hide();
            $("#nom").removeAttr("disabled");
            $("#groupe").removeAttr("disabled");
            $("#classe").removeAttr("disabled");
            $("#niveau").removeAttr("disabled");
            $("#btn_sub").attr("disabled","disabled");
        }
    }
    $(document).ready(function(){
        $("#double").click(function () {
            if ($('#ImpIframe').attr('data')) {
                if(this.checked)
                    $('#ImpIframe').attr('src',page+'.php?double=true&datasources='+$('#ImpIframe').attr('data'));
                else
                    $('#ImpIframe').attr('src',page+'.php?double=false&datasources='+$('#ImpIframe').attr('data'));
            }
        });
        $("#addEtudiant").click(function () {
            var valid = true;
            _data.forEach(data => {
                if (data.id ==  $("#prenom option:selected").val() && data.month == $("#month option:selected").val()) {
                    valid = false;
                    return false;
                }
            });
            var count = $("#bodyEt").children().length;
            if (valid) {
                if ($("#anneeScolaire option:selected").val() != "null") {
                    if ($("#nom option:selected").val() != "null") {
                        if ($("#prenom option:selected").val() != "null") {
                            if ($("#month option:selected").val() != "null"  ) {
                                $("#table").show();
                                var tr ='<tr><td><a onclick="removeEt(this)" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>';
                                tr += '<td><input name="monthList[]" value="'+$("#month option:selected").val()+'" style="display:none;">'+$("#month option:selected").text()+'</td>';
                                tr += '<td>'+$("#anneeScolaire option:selected").text()+'</td>';
                                tr += '<td><input name="etudiantList[]" value="'+$("#prenom option:selected").val()+'" style="display:none;">'+$("#prenom option:selected").text()+" "+$("#nom option:selected").text()+"</td>";
                                tr += '<td>'+(count +1)+"</td>";
                                tr += "</tr>";
                                $("#bodyEt").append(tr);
                                _data.push({id : $("#prenom option:selected").val(),month : $("#month option:selected").val() });
                                $("#month").removeClass("is-invalid");
                                $("#anneeScolaire").attr("disabled","disabled");
                                $("#nom").attr("disabled","disabled");
                                $("#groupe").attr("disabled","disabled");
                                $("#classe").attr("disabled","disabled");
                                $("#niveau").attr("disabled","disabled");
                                $("#btn_sub").removeAttr("disabled");
                            } else {
                                $("#month").addClass("is-invalid");
                            }
                            $("#prenom").removeClass("is-invalid");
                        } else {
                            $("#prenom").addClass("is-invalid");
                        }
                        $("#nom").removeClass("is-invalid");
                    } else{
                        $("#nom").addClass("is-invalid");}
                    $("#anneeScolaire").removeClass("is-invalid");
                } else {
                    $("#anneeScolaire").addClass("is-invalid");
                }   
            } 
        });
        $("#btn_sub").click(function () {
            var url = "../../ControllerAjax.php?option=";
            var src = "";
            var get_data = false;
            var get_month = false;
            $("input[name=typeResu]").each(function (input) {
                if(this.checked){
                    url += $(this).attr("data-function");
                    src += $(this).attr("data-page");
                }
                if($(this).val() == "paiement")
                    get_month = true;
            });
            if(get_month){
                url += '&monthList=['+$("#month option:selected").val()+']';   
            }
            if($("#anneeScolaire option:selected").val() != "null" )
            {
                if($("#nom option:selected").val() != "null")
                {
                    if($("#prenom option:selected").val() == "null")
                    {
                        url += "&anneeScolaire="+$("#anneeScolaire option:selected").val()+"&famille="+$("#nom option:selected").val();
                        get_data = true;
                    }else if ($("#prenom option:selected").val() != "null" && $("#bodyEt").children().length >0){
                        url += "&anneeScolaire="+$("#anneeScolaire option:selected").val()+"&etudiantList="; 
                        var m = "",e="[";
                        $("#bodyEt").children().each(function (index) {
                            e += this.childNodes[3].childNodes[0].value;
                            m += this.childNodes[1].childNodes[0].value ;
                            if(index < ($("#bodyEt").children().length)-1){
                                e += ",";m+=",";}
                        });
                        url += e+"]&monthList=["+m+"]";
                        get_data = true;
                    }else if ($("#prenom option:selected").val() != "null" ){
                        url += "&anneeScolaire="+$("#anneeScolaire option:selected").val()+"&etudiant="+$("#prenom option:selected").val(); 
                        get_data = true;
                    }
                    $("#nom").removeClass("is-invalid");
                }else
                    $("#nom").addClass("is-invalid");
                $("#anneeScolaire").removeClass("is-invalid");
            }else
                $("#anneeScolaire").addClass("is-invalid");
            var xhttp = new  XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200 )
                {
                    var o = this.responseText;
                    src += '?double=true&datasources='+o;
                    $('#ImpIframe').attr("data",o);
                    $('#ImpIframe').attr('src','');
                    $('#ImpIframe').attr('src',src);
                    $("#Imprimer").modal("show");
                }
            };  
            xhttp.open("GET",url,false);
            if (get_data) 
                xhttp.send();

        });
    });
</script>
<?php
        include("footer.php");
?>