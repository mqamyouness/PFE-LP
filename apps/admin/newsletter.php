<?php
    include("header.php");
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
<div id="content">
    <?php
        include("small_header.php");
    ?>
    <div class="container-fluid"> 
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#envMessage">
            <i class="fas fa-plus-circle fa-sm text-white-50"></i>  إرسال رسالة</a>
            <h1 class="h3 mb-2 text-gray-800">مشتركون النشرة الإخبارية</h1>
        </div>
        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">قائمة</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>حذف</th>
                                <th>منعت</th>
                                <th>تاريخ و الوقت</th>
                                <th>عنوان البريد الالكترونى</th>
                                <th>رقم</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $list = select("SELECT email,date_abonne,blocked FROM newsletter");
                            for ($i=0; $i < count($list); $i++) { 
                        echo '<tr>'.
                                '<td>'.
                                '   <a data-toggle="modal" data-target="#removeModal" class="btn btn-danger btn-circle"  data="'.$list[$i][0].'" onclick="removeNewsLetter(this)">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>'.
                                '<td><input type="checkbox" onclick="blocked(this)" name="block" data="'.$list[$i][0].'" ';if($list[$i][2]) echo 'checked' ;echo'></td>'.
                                '<td>'.$list[$i][1].'</td>'.
                                '<td>'.$list[$i][0].'</td>'.
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
                    <h2>? هل تريد أن تحذف مشترك</h2>
	                <input type="text" style="display:none;" id="contentRemove" name="removeNewsLetter"> 
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
<div class="modal fade" id="envMessage" tabindex="-1" data-backdrop="static"   data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">رسالة جديدة</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">: موضوع</label>
            <input type="text" class="form-control" id="recipient-name" name="sujet">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">: رسالة</label>
            <textarea class="form-control" id="message-text" name="message"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-primary">أرسل رسالة</button>
      </div>
    </div>
  </div>
</div>
<script>
    document.getElementById("newsletterPage").classList.add("active");
    document.getElementById("drow3").classList.add("active");
    document.getElementById("collapsePages").classList.add("show");
    function removeNewsLetter(params) {
        document.getElementById("contentRemove").value=params.getAttribute("data");
    }
    function blocked(params) {
        var object = "";
        if (params.checked) {
            object = "clientnewsletter="+params.getAttribute("data")+"&blocked=1";
        } else {
            object = "clientnewsletter="+params.getAttribute("data")+"&blocked=0";
        }      
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
                
            }
        };
        xhttp.open("POST","../../ControllerAjax.php?option=blockRequetNewsLetter",false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(object);
    }
</script>
<?php
        include("footer.php");
?>