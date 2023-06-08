function addclientnewsletter() {
    var em = document.getElementById("email");
    if(em.value != "")
    {
        var vars = "&email="+em.value; 
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200)
            {
                document.getElementById("gridSystemModalLabel").innerHTML="شكرا";
                document.getElementById("msg").innerHTML="تم الاشتراك بنجاح";
                em.value="";
            }else{
                document.getElementById("gridSystemModalLabel").innerHTML="نعتذر !";
                document.getElementById("msg").innerHTML="فشل في الاشتراك";
            }
        };
        xhttp.open("POST","http://localhost/Stage/ControllerAjax.php?option=addclientnewsletter",false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(vars);
    }else{
        document.getElementById("gridSystemModalLabel").innerHTML="نعتذر !";
        document.getElementById("msg").innerHTML="فشل في الاشتراك";
    }
}
function addRequestCall() {
    var nom = document.getElementById("nom");
    var tele = document.getElementById("tele");
    if(nom.value != "" && tele.value != "")
    {
        var vars = "&nom="+nom.value+"&phoneNumbre="+tele.value; 
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200)
            {
                document.getElementById("gridSystemModalLabel").innerHTML="شكرا";
                document.getElementById("msg").innerHTML="تم تقديم طلبك بنجاح";
                nom.value = "" ; 
                tele.value="";
            }else{
                document.getElementById("gridSystemModalLabel").innerHTML="نعتذر !";
                document.getElementById("msg").innerHTML="فشل في تقديم طلبك";
            }
        };
        xhttp.open("POST","ControllerAjax.php?option=addrequestCall",false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(vars);
    }else{
        document.getElementById("gridSystemModalLabel").innerHTML="نعتذر !";
        document.getElementById("msg").innerHTML="فشل في تقديم طلبك";
    }
    
}