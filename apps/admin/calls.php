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
        <h1 class="h3 mb-2 text-gray-800">طلب موعد</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">قائمة </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>حذف</th>
                                <th>تاريخ و الوقت</th>
                                <th>رقم الهاتف</th>
                                <th>الاسم</th>
                                <th>رقم</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $list = select("SELECT id,nom,tele,date_demand FROM calls");
                            for ($i=0; $i < count($list); $i++) { 
                        echo '<tr>'.
                                '<td>'.
                                '   <a data-toggle="modal" data-target="#removeModal" class="btn btn-danger btn-circle"  data="'.$list[$i][0].'" onclick="removeCall(this)">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>'.
                                '<td>'.$list[$i][3].'</td>'.
                                '<td>'.($list[$i][2]).'</td>'.
                                '<td>'.($list[$i][1]).'</td>'.
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
                    <h2>? هل تريد أن تحذف</h2>  
	                <input type="number" style="display:none;" id="contentRemove" name="removeCall"> 
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
    document.getElementById("callsPage").classList.add("active");
    document.getElementById("drow3").classList.add("active");
    document.getElementById("collapsePages").classList.add("show");
    function removeCall(params) {
        document.getElementById("contentRemove").value=params.getAttribute("data");
    }
</script>
<?php
        include("footer.php");
?>