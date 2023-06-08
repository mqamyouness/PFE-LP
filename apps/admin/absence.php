<?php
        include("header.php");
?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
    <?php
        include("small_header.php");
    ?>
    <div class="container-fluid"> 
        <h1 class="h3 mb-2 text-gray-800">مشتركون النشرة الإخبارية</h1>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-2">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">إعدادات</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row g-3"  style=";padding-bottom: 5px;">
                            <div class="col-sm"> 
                                <div class="mb-4">
                                    <div class="input-group">
                                        <div class="col-sm" id="listMois">
                                            <label for="groupe" class="form-label">شهر</label>
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
                                </div>
                            </div>
                            <div class="col-sm">
                                <label for="school_year" class="form-label">الموسم الدراسي</label>
                                <select class="form-control bg-white border-2 small" id="school_year" name="school_year">
                                    <option value="null" disabled selected>اختار</option>
                                    <?php $anneeScolaire = select("SELECT id,annee_debut,annee_fin FROM anneeScolaire");
                                    for ($i=0; $i < count($anneeScolaire); $i++) { 
                                        echo'<option value="'.$anneeScolaire[$i][0].'" firstYears="'.$anneeScolaire[$i][1].'" 
                                        lastYears="'.$anneeScolaire[$i][2].'" >'.$anneeScolaire[$i][1].'/'.$anneeScolaire[$i][2].'</option>';
                                    }?>
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="groupe" class="form-label">فوج</label>
                                <select class="form-control bg-white border-2 small" id="groupe" name="etu_groupe" >
                                    <option selected disabled value="null">اختار</option>
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="classe" class="form-label">القسم</label>
                                <select class="form-control bg-white border-2 small" id="classe" name="classe" onchange="getGroupe(this)">
                                    <option selected disabled value="null">اختار</option>
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="niveau" class="form-label">المستوى</label>
                                <select class="form-control bg-white border-2 small" id="niveau" name="niveau" onchange="getClasse(this)">
                                    <option value="all" disabled selected value="null">اختار</option>
                                    <?php $niveaux = select("SELECT id,libelle FROM niveau");
                                    for ($i=0; $i < count($niveaux); $i++) { 
                                        echo'<option value="'.$niveaux[$i][0].'">'.$niveaux[$i][1].'</option>';
                                    }?>
                                </select>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm">
                                <label for="intervalle" class="form-label">تاريخ فترة </label> 
                                <div class="mb-4">
                                    <div class="input-group">
                                        <div class="col-sm">
                                            <label for="date_fin" class="form-label">الى</label>
                                            <input type="date" class="form-control" id="date_fin" name="date_fin"  min="2020-09-01" max="2021-07-01" aria-describedby="validationServer06Feedback" required>
                                            <div id="validationServer06Feedback" class="invalid-feedback">
                                                Please provide a valid zip.
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <label for="date_dub" class="form-label">من</label>
                                            <input type="date" class="form-control"  id="date_dub" name="date_dub" min="2020-09-01" max="2021-07-01" aria-describedby="validationServer06Feedback" required>
                                            <div id="validationServer06Feedback" class="invalid-feedback">
                                                Please provide a valid zip.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" id="intervalle" class="btn btn-primary">أضاف فترة فراغ</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <style>
            .row_abs{
                width: 30px;
            }
            .row-somme{
                width: 90px;
            }
            table,tr,td,th{
                border: 1px solid !important;
            }
        </style>
        <div class="card shadow mb-4 col-xl-12" id="contentAbsence" style="padding : 1.25rem 0 1.25rem 0  !important; /* display: none;*/">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">لائحة الغياب</h6>
            </div>
            <div class="card-body col-xl-12" style="padding : 1.25rem 0 1.25rem 0  !important; ">
                <div class="table-responsive container col-xl-12">
                    <div id="table_abs" class="col-sm">
                        <style >
                            table,tr,td,th{
                                border: 1px solid !important;
                            }
                        </style>
                        <table class="col-sm">
                            <thead>
                                <tr>
                                    <th class="row-somme">موجوع غياب الشهر</th>
                                    <th class="row-somme">موجوع ايام الدراسة</th>
                                    <th id="thAnnee"></th>
                                    <th >السنة</th>                
                                    <th id="thMois"></th>
                                    <th >الشهر</th>
                                    <th id="thGroupe"></th>
                                    <th >فوج</th>
                                    <th id="thClasse"></th>
                                    <th >القسم</th>
                                    <th id="thNiveau"></th>
                                    <th >المستوى</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="12">
                                        <table class="col-sm">
                                            <thead>
                                                <tr id="days_txt"><tr>
                                                <tr id="days_number"></tr>
                                            </thead>
                                            <tbody id="listStudent">
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="border: none; height: 20px;"></tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2">المجموع</td>
                                    <td colspan="3"></td>
                                    <td colspan="3">نسبة المئوية الحاضر</td>
                                    <td colspan="3"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="container" style="margin-top: 2%;" >
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <a href="#" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-download"></i>
                                    </span>
                                    <span class="text" onclick="printData()">اطبع</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script>
    document.getElementById("absencePage").classList.add("active");
    document.getElementById("drow1").classList.add("active");
    document.getElementById("collapseTwo").classList.add("show");
    months =  document.getElementById("month").innerHTML;
    yearsSchool = document.getElementById("school_year").innerHTML;
    function printData() {
        var printContents = document.getElementById("table_abs").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    $("#contentAbsence").hide();
    function getClasse(ele) {
        $("#contentAbsence").hide();
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                var o = JSON.parse(this.responseText);
                document.getElementById("groupe").innerHTML="<option selected disabled value=\"null\">اختار</option>";
                document.getElementById("month").innerHTML = months;
                document.getElementById("school_year").innerHTML = yearsSchool;
                document.getElementById("date_dub").value = "";
                document.getElementById("date_fin").value = "";
                var select = document.getElementById("classe");
                select.innerHTML="";
                select.insertAdjacentHTML('beforeend',"<option selected disabled value=\"null\">اختار</option>")
                o.forEach(element => {
                    select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.libelle+"</option>"); 
                });
            }
        };
        xhttp.open("GET","../../ControllerAjax.php?option=getClasseOfNiveau&niveauAcs="+ele.value,false);
        xhttp.send();
    }
    function getGroupe(ele) {
        $("#contentAbsence").hide();
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                var o = JSON.parse(this.responseText);
                var select = document.getElementById("groupe");
                document.getElementById("month").innerHTML = months;
                document.getElementById("school_year").innerHTML = yearsSchool;
                document.getElementById("date_dub").value = "";
                document.getElementById("date_fin").value = "";
                select.innerHTML="";
                select.insertAdjacentHTML('beforeend',"<option selected disabled value=\"null\">اختار</option>");
                o.forEach(element => {
                    select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.libelle+"</option>"); 
                });
            }
        };
        xhttp.open("GET","../../ControllerAjax.php?option=getGroupeOfClasse&classeAcs="+ele.value,false);
        xhttp.send();
    }
    function getListEtudiant() {
        var groupe = document.getElementById("groupe").value;
        var school_year = document.getElementById("school_year").value;
        var countTh = document.getElementById("days_number").childElementCount;
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                var o = JSON.parse(this.responseText);
                var tbody = document.getElementById("listStudent");
                tbody.innerHTML="";
                var rowTd ="";
                for (let index = 0; index < countTh; index++) 
                    rowTd += "<td></td>";
                var number = 0;
                o.forEach(element => {
                    var row ='<tr data="'+element.id+'">'+rowTd;
                    row += "<th>"+element.prenom+"</th>";
                    row += "<th>"+element.nom+"</th>";
                    row += "<th>"+number+"</th>";
                    row += "</tr>"
                    tbody.insertAdjacentHTML('beforeend', row); 
                });
            }
        };
        xhttp.open("GET","../../ControllerAjax.php?option=getListEtudiantOfGroupeAndAnnescolaire&groupe="+groupe+"&anneescolaire="+school_year,false);
        xhttp.send();
    }
    $(document).ready(function () {
        $("#month").change(function () {
            var year = 0;
            if ($("#month").val() != "null") {
                if(($("#month").val()-1) <= 12)
                    year = $("#month").attr("firstYears");
                if(($("#month").val()-1) <= 6)
                    year = $("#month").attr("lastYears");
                if(year != 0)
                {
                    var days = new Date(year,$("#month").val(),0);
                    $("#days_number").html("");
                    $("#days_txt").html("");
                    for (let index = 1; index <= days.getDate(); index++) {
                        var opt_weekday = { weekday: 'short' };
                        var day  = new Date(year,$("#month").val()-1,index);
                        if ((day.toLocaleDateString("fr-FR", opt_weekday) == "sam.") || (day.toLocaleDateString("fr-FR", opt_weekday) == "dim.")) {
                            $("#days_number").prepend("<th style=\"background-color: #000000ad;padding: 1px !important;\"></th>");
                            $("#days_txt").prepend("<th style=\"background-color: #000000ad;padding: 1px !important;\"></th>");   
                        } else {
                            row = '<th class="row_abs day-'+index+'">'+index+'</th>';
                            $("#days_number").prepend(row);
                            row = '<th class="row_abs day-'+index+'">'+day.toLocaleDateString("fr-FR", opt_weekday)+"</th>";
                            $("#days_txt").prepend(row);   
                        }
                    }
                    $("#days_txt").append("<th rowspan=\"3\">اسم الشخصي</th><th rowspan=\"3\">اسم العائلي</th><th rowspan=\"3\">رقم</th>");
                    $("#days_txt").prepend("<th class=\"row-somme\"></th><th class=\"row-somme\"></th>");
                    $("#days_number").prepend("<th class=\"row-somme\"></th><th class=\"row-somme\"></th>");
                    $("#thAnnee").html($("#school_year option:selected").text());
                    $("#thMois").html( $("#month option:selected").text());
                    $("#thGroupe").html($("#groupe option:selected").text());
                    $("#thClasse").html($("#classe option:selected").text());
                    $("#thNiveau").html($("#niveau option:selected").text());
                    getListEtudiant();
                    var year = "2020";
                    var zero = "";
                    if($("#month").val()<=9)
                            zero = "0";
                        if($("#month").val()<7)
                            year = $("#school_year option:selected").text().substr(5,9);
                        if($("#month").val()>8)
                            year = $("#school_year option:selected").text().substr(0,4);
                        var date_min= year+"-"+zero+$("#month").val()+"-01";
                        var date_max= year+"-"+zero+$("#month").val()+"-"+days.getDate();
                    $("#date_dub").attr("min",date_min)
                                    .attr("max",date_max);
                    $("#date_fin").attr("min",date_min)
                                    .attr("max",date_max);
                    $("#contentAbsence").show(); 
                }
            }            
        });
        $("#school_year").change(function(){
            $("#month").html(months);
            $("#contentAbsence").hide(); 
            $("#month").attr("firstYears",$("#school_year option:selected").text().substr(0,4));
            $("#month").attr("lastYears",$("#school_year option:selected").text().substr(5,9));
            var year = "2020";
            var zero = "";
            if( $("#month").val() != "")
            {   
                if($("#month").val()<9)
                    zero = "0";
                if($("#month").val()<7)
                    year = $("#school_year option:selected").text().substr(5,9);
                if($("#month").val()>8)
                    year = $("#school_year option:selected").text().substr(0,4);
                var date_min= year+"-"+zero+$("#month").val()+"-01";
                var date_max= year+"-"+zero+$("#month").val()+"-01";
            }else{
                var date_min= year+"-01-01";
                var date_max= year+"-01-01";
            }
            $("#date_dub").attr("min",date_min)
                            .attr("max",date_max);
            $("#date_fin").attr("min",date_min)
                            .attr("max",date_max);
        });
        $("#intervalle").click(function () {
            if ($("#date_dub").val() != null ){
                var start = $('#date_dub').val().substr(8,2);
                className = ".day-"+(start*1);    
                $(className).remove();
           }
           if($("#date_fin").val() != null){
                var start = $('#date_dub').val().substr(8,2);
                var end = $('#date_fin').val().substr(8,2);
                for (let index = (start*1)+1; index <= (end*1); index++) {
                    className = ".day-"+index; 
                    console.log(className);   
                    $(className).remove();
                }
           }
        });
    });
</script>
<?php
        include("footer.php");
?>
