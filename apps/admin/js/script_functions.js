function getClasse(ele) {
    var xhttp = new  XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200 )
        {
            var o = JSON.parse(this.responseText);
            if(document.getElementById("groupe") != null)
                document.getElementById("groupe").innerHTML = "<option selected disabled value=\"null\">اختار</option>";
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
    var xhttp = new  XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200 )
        {
            var o = JSON.parse(this.responseText);
            var select = document.getElementById("groupe");
            document.getElementById("nom").innerHTML = "<option selected disabled value=\"null\">اختار</option>";
            document.getElementById("prenom").innerHTML = "<option selected disabled value=\"null\">اختار</option>";
            select.innerHTML="";
            select.insertAdjacentHTML('beforeend',"<option selected disabled value=\"null\">اختار</option>")
            o.forEach(element => {
                select.insertAdjacentHTML('beforeend', "<option value=\""+element.id+"\">"+element.libelle+"</option>"); 
            });
        }
    };
    xhttp.open("GET","../../ControllerAjax.php?option=getGroupeOfClasse&classeAcs="+ele.value,false);
    xhttp.send();
}
function changeValuesPrix() {
    $("#prix_annuel").val($("#niveau option:selected").attr("prix_annuel"));
    $("#prix_mensuel").val($("#niveau option:selected").attr("prix_mensuel"));
}
function getResu() {
    var xhttp = new  XMLHttpRequest();
    var cin = document.getElementById("cin");
    var anneeScolaireResu = document.getElementById("anneeScolaireResu");
    var parent = document.querySelector("input:checked[name=parent]");
    xhttp.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200 )
        {
            document.getElementById("can").click();
            cin.value="";
            anneeScolaireResu.selectedIndex = 0;
            var o = this.responseText;
            if(o.length)
            {
                document.getElementById("ImpIframe").setAttribute('src','resuInscription.php?double=true&datasources='+o);
                $("#Imprimer").modal("show");
            }else if(JSON.parse(o).length == 0){
                document.getElementById("show").click();
            }
        }
    };
    var url = "../../ControllerAjax.php?option=getResuInscription&cinAcs="+cin.value+"&parent="+parent.value+"&anneeScolaireResu="+anneeScolaireResu.value;
    xhttp.open("GET",url,false);
    xhttp.send();
}
function Print()
{
    var frm = document.getElementById("ImpIframe").contentWindow;
    frm.focus();
    frm.print();
        return false;
}
