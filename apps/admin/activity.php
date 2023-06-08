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
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal_activity">
          <i class="fas fa-plus-circle fa-sm text-white-50"></i> اضافة نشاط</a>
          <h1 class="h3 mb-0 text-gray-800">أنشطة المؤسسة</h1>
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
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2">
                    <?php $list = select("SELECT id,title,content,img,data_pub,visibility FROM activity");
                      for ($i=0; $i < count($list); $i++) {?>
                      <div class="col-sm-4" style="margin-top: 1%;">
                        <div class="card shadow-sm">
                          <img src="../.asset./upload/._imgs/<?php echo $list[$i][3]?>" class="bd-placeholder-img card-img-top" height="325">
                          <div class="card-body">
                              <h3><?php echo $list[$i][1] ?></h3>
                              <p class="card-text"><?php if(strlen($list[$i][2]) < 100) echo $list[$i][2]; else echo substr($list[$i][2],0,250).'&nbsp;&nbsp;<a data-toggle="modal" data-target="#showModal" data="'.$list[$i][3].'"onclick="showActivity(this)">...</a>'; ?></p>
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                    <a data-toggle="modal" data-target="#showModal" <?php echo 'data="'.$list[$i][0].'" dataImg="'.$list[$i][3].'" dataTitle="'.$list[$i][1].'" dataText="'.$list[$i][2].'" '; ?> onclick="showActivity(this)" class="btn btn-info">عرض</a>
                                    <a data-toggle="modal" data-target="#removeModal" <?php echo 'data="'.$list[$i][0].'"'; ?> onclick="removeActivity(this)" class="btn btn-danger">حذف</a>&nbsp;
                                  </div>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" onclick="visibilityActivity(this)" id="visibility" <?php echo 'data="'.$list[$i][0].'"';if(!$list[$i][5]) echo 'checked' ;?>>
                                      <label class="form-check-label" >اخفاء</label>
                                  </div>
                                  <small class="text-muted"><?php echo $list[$i][4]?></small>
                              </div>
                          </div>
                        </div>
                      </div>
                      <?php } if(count($list) == 0)
                        echo '<h2 style="margin: 0 0 20px 0;font-size: 35px;">نعتذر  ...!   لا يوجد نشاط حاليا </h2>';?>
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
<!--Modal Activity-->
<div class="modal fade" id="modal_activity" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">اضافة نشاط</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="controller.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">: حمل صورة</label>
            <input type="file" class="form-control" name="img"  id="img" accept="image/x-png,image/gif,image/jpeg" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">: عنوان</label>
            <input type="text" class="form-control" name="title"  id="title"   required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">: نص</label>
            <textArea type="file" class="form-control" name="text" rows="4" id="text" required></textArea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="rest" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary" name="add">اضافة</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal Activity-->
<!--Show Activity -->
<div class="modal fade" id="showModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">عرض نشاط</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="col">
            <div class="card shadow-sm">
              <form action="controller.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="col" style="margin-top: 1%;">
                    <div class="card shadow-sm">
                      <img src="img/logo.jpg" class="bd-placeholder-img card-img-top" id="view" width="100%" height="325" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">: حمل صورة</label>
                    <input type="file" class="form-control" name="imgUpdate"  id="imgUpdate" accept="image/x-png,image/gif,image/jpeg" >
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">: عنوان</label>
                    <input type="text" class="form-control" name="titleUpdate"  id="titleUpdate"   required>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">: نص</label>
                    <textArea type="file" class="form-control" name="textUpdate" rows="5" id="textUpdate" required></textArea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="rest" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                  <button type="submit" class="btn btn-primary" name="update">حفظ</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<!--End Show Activity -->
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
        <h2>?  هل تريد أن تحذف نشاط</h2> 
	        <input type="text" style="display:none;" readonly id="contentRemove" name="removeActivity"> 
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
    document.getElementById("activityPage").classList.add("active");
    function removeActivity(params) {
      document.getElementById("contentRemove").value=params.getAttribute("data");
    }
    function showActivity(params) {
      document.getElementById("view").setAttribute("src","../.asset./upload/._imgs/"+params.getAttribute("dataImg"));
      document.getElementById("titleUpdate").setAttribute("value",""+params.getAttribute("dataTitle"));
      document.getElementById("textUpdate").value = params.getAttribute("dataText");
      document.getElementById("activituIdn").value = params.getAttribute("data");
    }
    function visibilityActivity(params) {
        var object = "";
        if (params.checked) {
            object = "activity="+params.getAttribute("data")+"&visibility=0";
        } else {
            object = "activity="+params.getAttribute("data")+"&visibility=1";
        }        
        var xhttp = new  XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200 )
            {
            
            }
        };
        xhttp.open("POST","../../ControllerAjax.php?option=visibilityActivity",false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(object);
    }
</script>
<?php
  include("footer.php");
?>
