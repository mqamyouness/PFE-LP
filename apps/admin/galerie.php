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
    <!-- Begin Page Content -->
    <div class="container-fluid">   
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal_photo">
            <i class="fas fa-plus-circle fa-sm text-white-50"></i> اضافة صورة</a>
          <h1 class="h3 mb-0 text-gray-800">صور المؤسسة</h1>
        </div>
        <div class="row">
          <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary" style="width: 100%;">قائمة</h6>
              </div>
              <div class="card-body">
                <div class="album py-10 bg-light">
                    <div class="container">
                      <div class="row g-4">
                      <?php
                        $list = select("SELECT id,link,dataUpload,visibility FROM galerie");
                        for ($i=0; $i < count($list); $i++) {?>
                        <div class="col-sm-4" style="margin-top: 1%;">
                          <div class="card shadow-sm">
                            <img src="../.asset./upload/._imgs/<?php echo $list[$i][1]?>" class="bd-placeholder-img card-img-top" height="275" >
                            <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                  <a data-toggle="modal" data-target="#showModal" <?php echo 'data="'.$list[$i][1].'"'; ?> onclick="showPhoto(this)" class="btn btn-info">عرض</a>
                                  <a data-toggle="modal" data-target="#removeModal" <?php echo 'data="'.$list[$i][0].'"'; ?> onclick="removePhoto(this)" class="btn btn-danger">حذف</a>&nbsp;
                                </div>
                                <div class="form-check form-switch">
                                  <input class="form-check-input" type="checkbox" onclick="visibilityPhoto(this)" id="visibility" <?php echo 'data="'.$list[$i][0].'"';if(!$list[$i][3]) echo 'checked' ;?>>
                                  <label class="form-check-label" >اخفاء</label>
                                </div>
                                <small class="text-muted"><?php echo $list[$i][2] ?></small>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php }if(count($list) == 0)
                        echo '<h2 style="margin: 0 0 20px 0;font-size: 35px;">نعتذر  ...!   لا يوجد صورة حاليا </h2>';?>
                      </div>
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
<!--Modal Galerie-->
<div class="modal fade" id="modal_photo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">اضافة صورة</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="controller.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">: حمل صورة</label>
            <input type="file" class="form-control" name="photo"  id="photo" text="صورة " accept="image/x-png,image/gif,image/jpeg" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="rest" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary" name="upload">اضافة</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal Galerie-->
<!--Show Photo -->
<div class="modal fade" id="showModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">عرض</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="col">
            <div class="card shadow-sm">
              <img id="view" class="bd-placeholder-img card-img-top" width="auto" height="auto"  preserveAspectRatio="xMidYMid slice" focusable="false">
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<!--End Show Photo -->
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
          <h2>?  هل تريد أن تحذف صورة</h2>    
	        <input type="text" style="display:none;" readonly id="contentRemove" name="removePhoto"> 
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
    document.getElementById("galeriePage").classList.add("active");
    function removePhoto(params) {
      document.getElementById("contentRemove").value=params.getAttribute("data");
    }
    function showPhoto(params) {
      document.getElementById("view").setAttribute("src","../.asset./upload/._imgs/"+params.getAttribute("data"));
    }
    function visibilityPhoto(params) {
        var object = "";
        if (params.checked) {
            object = "photo="+params.getAttribute("data")+"&visibility=0";
        } else {
            object = "photo="+params.getAttribute("data")+"&visibility=1";
        }        
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
              
            }
        };
        xhttp.open("POST","../../ControllerAjax.php?option=visibilityPhoto",false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(object);
    }
</script>
<?php
        include("footer.php");
?>