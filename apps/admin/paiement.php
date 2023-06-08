<?php
    include("header.php");
    try {
        if(isset($_POST['etudiantList']) && isset($_POST['anneeScolaireList']) && isset($_POST['prix_mensuelList']) 
            && isset($_POST['monthList']) && isset($_POST['method_paiementList']) && isset($_POST['transportList'])){
            $etudiantList = $_POST['etudiantList'];
            $anneeScolaireList = $_POST['anneeScolaireList'];
            $prix_mensuelList = $_POST['prix_mensuelList'];
            $method_paiementList = $_POST['method_paiementList'];
            $monthList = $_POST['monthList'];
            $prix_transportList = $_POST['transportList'];
            $date_paiement = Date("Y-m-d");
            $data_resu = [];
            for ($i=0; $i < count($etudiantList); $i++) { 
                $requet= "INSERT INTO devoir_mensuel(id_etudiant,id_anneeScolaire,mois,prix_transport,prix_mensuel,method_paiement,date_paiement) VALUES ($etudiantList[$i],$anneeScolaireList[$i],$monthList[$i],$prix_transportList[$i],'$prix_mensuelList[$i]','$method_paiementList[$i]','$date_paiement')";
                if($db->exec($requet)){
                    $data = select("SELECT e.id,e.nom,e.prenom,n.libelle as 'niveau' ,p.prix_mensuel,a.annee_debut,a.annee_fin,d.mois,d.prix_transport,d.date_paiement ,d.method_paiement FROM etudiant e 
                        INNER JOIN parcours p ON e.id = p.id_etudiant 
                        INNER JOIN groupe g ON g.id = p.id_groupe 
                        INNER JOIN classe c ON c.id = g.id_classe 
                        INNER JOIN niveau n ON n.id = c.id_niveau 
                        INNER JOIN anneescolaire a ON a.id = p.id_anneeScolaire 
                        INNER JOIN devoir_mensuel d ON d.id_etudiant = e.id AND d.id_anneeScolaire = a.id
                        WHERE e.id = $etudiantList[$i] AND d.mois = $monthList[$i] AND a.id = $anneeScolaireList[$i] ");
                        array_push($data_resu,$data[0]);
                }
            }   
            $_SESSION["data_resu"] = $data_resu;      
        }
    }catch (\Throwable $th) {
        
    }
?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php
            include("small_header.php");
        ?>
        <div class="container-fluid"> 
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <a href="tablePaiement.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus-circle fa-sm text-white-50"></i> لائحة دفعات</a>
                <h1 class="h3 mb-0 text-gray-800" >  الأداء الشهري</h1>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        </div>
                        <div class="card-body">
                            <form method="POST" action="paiement.php">
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
                                        <?php $listNom = select("SELECT id_famille,nom FROM etudiant");
                                        for ($i=0; $i < count($listNom); $i++) { 
                                            echo '<option value="'.$list[$i][0].'">'.$list[$i][1].'</option>';
                                        }
                                        ?> 
                                        </select>  
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
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="checkbox" style="font-size: 1.25rem;">
                                            <input type="checkbox" name="addTransport" id="btnCheck" onclick="checkTransport(this)">&nbsp;&nbsp;&nbsp;
                                                <i></i>نقل مدرسي
                                        </label>
                                        <div  id="divTransport">
                                            <label for="" class="form-label">: مبلغ الشهري للنقل</label>
                                            <div class="input-group col-sm" ><?php $costs = select("SELECT id,prix FROM costs WHERE id LIKE 'transport'");?>
                                                <input type="text" id="transport" class="form-control" value="<?php if(count($costs)>0){echo $costs[0][1];}?>" name="transport" aria-label="Dollar amount (with dot and two decimal places)" >
                                                <span class="input-group-text">DH</span>
                                                <span class="input-group-text">0.00</span>&nbsp; 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 for="" class="form-label">طريقة الدفع</h5>
                                        <label class="radio">
                                            <i></i>par chèque
                                            <input type="radio" value="chèque" name="method_paiement" checked>
                                        </label>
                                        <label class="radio">
                                            <i></i>espèces
                                            <input type="radio" value="espèces" name="method_paiement">
                                        </label>
                                        <label class="radio">
                                            <i></i>versement
                                            <input type="radio" value="versement" name="method_paiement">
                                        </label>
                                        <label class="radio">
                                            <i></i>virement
                                            <input type="radio" value="virement" name="method_paiement">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
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
                                </div>
                                <div class="row justify-content-center col-md-12" style="margin: 1% ;">
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
                                <div class="row justify-content-center col-md-12">
                                    <table class="table" id="table" style="display:none;" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>حذف</th>
                                                <th>نقل مدرسي</th>
                                                <th>طريقة الدفع</th>
                                                <th>الواجب الشهري</th>
                                                <th>الشهر</th>
                                                <th>الموسم الدراسي</th>
                                                <th>القسم</th>
                                                <th>المستوى</th>
                                                <th> التلميذ</th>
                                                <th >رقم</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyEt">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-center col-md-12" style="margin: 1% ;">
                                    <button type="submit" id="btn_sub" class="btn btn-info btn-icon-split" disabled >
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
    document.getElementById("paiementPage").classList.add("active");
    document.getElementById("drow2").classList.add("active");
    document.getElementById("collapseUtilities").classList.add("show");
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
                    select.innerHTML = "<option selected disabled value=\"null\">اختار</option>";
                    o.forEach(element => {
                        select.insertAdjacentHTML('beforeend', "<option value=\""+element.id_famille+"\">"+element.nom+"</option>"); 
                    });
                }
            };
            var url = "../../ControllerAjax.php?option=getListNomEtudiant&id="+ele.value+"&condition="+ele.getAttribute("name")+c;
            xhttp.open("GET",url,false);
            xhttp.send();
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
                    var o = JSON.parse(this.responseText);
                    var select = document.getElementById("prenom");
                    select.innerHTML="";
                    select.insertAdjacentHTML('beforeend',"<option selected disabled value=\"null\">اختار</option>");
                    o.forEach(element => {
                        select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.prenom+"</option>"); 
                    });
                }
            };
            xhttp.open("GET","../../ControllerAjax.php?option=getEtudiantByFamille&famille="+ele.value,false);
            xhttp.send();
        }
    }
    function getMonth(ele) {
        var select = document.getElementById("month").children;
        for (i = 0; i < select.length; i++) {
            select[i].style.display= "block";
        }
        if (document.getElementById("anneeScolaire").value != "all") {
            var xhttp = new  XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200 )
                {
                   var o = JSON.parse(this.responseText);
                    o.forEach(element => {
                        for (i = 0; i < select.length; i++) {
                            if(element.mois == select[i].value)
                                select[i].style.display= "none";
                        }
                    });
                }
            };
            xhttp.open("GET","../../ControllerAjax.php?option=getMontOfEtudiant&etudiant="+ele.value+"&anneescolaire="+document.getElementById("anneeScolaire").value,false);
            xhttp.send();
        }
    }
    document.getElementById("divTransport").style.display= "none";
    function checkTransport(ele){
        if (ele.checked) {
            document.getElementById("divTransport").style.display= "block";
        }else{
            document.getElementById("divTransport").style.display= "none";
        }
    }
    var _data = [];
    function removeEt(ele)
    {
        var tr = ele.parentElement.parentElement;
        var i = 0;
        _data.forEach(data => {
            if (data.id ==  tr.childNodes[8].childNodes[0].value && data.month == tr.childNodes[4].childNodes[0].value) {
                _data.splice(i,1);
                i++;
            }
        });
        tr.remove();
        if (document.getElementById("bodyEt").childElementCount == 0) {
            $("#table").hide();
            $("#btn_sub").attr("disabled","disabled");
            $("#nom").removeAttr("disabled");
            $("#anneeScolaire").removeAttr("disabled");
            $("#groupe").removeAttr("disabled");
            $("#classe").removeAttr("disabled");
            $("#niveau").removeAttr("disabled");
        }
    }
    $(document).ready(function(){
        $("#double").click(function () {
            if ($('#ImpIframe').attr('data')) {
                if(this.checked )
                    $('#ImpIframe').attr('src','resuPaiement.php?double=true&datasources='+$('#ImpIframe').attr('data'));
                else
                    $('#ImpIframe').attr('src','resuPaiement.php?double=false&datasources='+$('#ImpIframe').attr('data'));
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
                                var xhttp = new  XMLHttpRequest();
                                    xhttp.onreadystatechange = function () {
                                    if(this.readyState == 4 && this.status == 200 )
                                    {
                                        $("#table").show();
                                        $("#btn_sub").removeAttr("disabled");
                                        var o = JSON.parse(this.responseText);
                                        o.forEach(element => {
                                            var tr ='<tr><td><a onclick="removeEt(this)" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>';
                                            if ($("#btnCheck")[0].checked  && $("#transport").val() != "" )
                                                    tr += '<td><input name="transportList[]" value="'+$("#transport").val()+'" style="display:none;">'+$("#transport").val()+' DH</td>';
                                            else 
                                                tr += '<td><input name="transportList[]" value="0" style="display:none;">0 DH</td>';
                                            $("input[name=method_paiement]").each(function (input) {
                                                if(this.checked)
                                                    tr += '<td><input name="method_paiementList[]" value="'+$(this).val()+'" style="display:none;">'+$(this).val()+'</td>';
                                            });
                                            tr += '<td><input name="prix_mensuelList[]" value="'+element.prix_mensuel+'" style="display:none;">'+element.prix_mensuel+' DH </td>';
                                            tr += '<td><input name="monthList[]" value="'+$("#month option:selected").val()+'" style="display:none;">'+$("#month option:selected").text()+'</td>';
                                            tr += '<td><input name="anneeScolaireList[]" value="'+$("#anneeScolaire option:selected").val()+'" style="display:none;">'+$("#anneeScolaire option:selected").text()+'</td>';
                                            tr += '<td>'+element.classe+"</td>";
                                            tr += '<td>'+element.niveau+"</td>";
                                            tr += '<td><input name="etudiantList[]" value="'+element.id+'" style="display:none;">'+element.prenom+" "+element.nom+"</td>";
                                            tr += '<td>'+(count +1)+"</td>";
                                            tr += "</tr>";
                                            $("#bodyEt").append(tr);
                                            _data.push({id : $("#prenom option:selected").val(),month : $("#month option:selected").val() });
                                        });
                                    }
                                };
                                xhttp.open("GET","../../ControllerAjax.php?option=getEtudiant&etudiant="+$("#prenom").val(),false);
                                xhttp.send();
                                $("#month").removeClass("is-invalid");
                                $("#anneeScolaire").attr("disabled","disabled");
                                $("#nom").attr("disabled","disabled");
                                $("#groupe").attr("disabled","disabled");
                                $("#classe").attr("disabled","disabled");
                                $("#niveau").attr("disabled","disabled");
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
            } else {
                
            }
        });
        <?php
        if(isset($_SESSION["data_resu"]) && $_SESSION["data_resu"] != null){
            $myJSON = json_encode($_SESSION["data_resu"]);
            $_SESSION["data_resu"] = null;
            echo "$('#ImpIframe').attr('src','resuPaiement.php?double=true&datasources=".$myJSON."');";
            echo "$('#ImpIframe').attr('data','".$myJSON."');";
            echo '$("#Imprimer").modal("show");';
        }
        ?>
    });
</script>
<?php
        include("footer.php");
?>