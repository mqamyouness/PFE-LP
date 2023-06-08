            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Groupe Al-Hakim 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Modal Transport-->
    <div class="modal fade" id="modal_transport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="controller.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">واجب للنقل</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body" id="msg_body">
                        <h4>: مبلغ الشهري للنقل</h4>
                        <div class="input-group col-ms" ><?php $costs = select("SELECT id,prix FROM costs WHERE id LIKE 'transport'");?>
                            <input type="text" class="form-control" value="<?php if(count($costs)>0){echo $costs[0][1];}?>" aria-label="Dollar amount (with dot and two decimal places)" name="prix" required>
                            <span class="input-group-text">DH</span>
                            <span class="input-group-text">0.00</span>&nbsp; 
                        </div>
                        <input type="text" style="display:none;" id="cost" name="cost" value="<?php if(count($costs)>0){echo $costs[0][0];}?>"> 
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End Modal Transport-->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="text-align: center !important;">
        <i class="fas fa-angle-up"></i>
    </a>
    <script>
        $(document).ready(function(){
            <?php
                if($_SESSION['message'] != null){
                    echo "$('#modal_msg').html('<h3>".$_SESSION['message'][0]."</h3>');";
                    if ($_SESSION['message'][1] == 'valide') {
                        echo "$('#modal_icon').html('<a class=\"btn btn-success btn-circle btn-lg\"><i class=\"fas fa-check\"></i></a>');";
                    } else {
                        echo "$('#modal_icon').html('<a class=\"btn btn-warning btn-circle btn-lg\"><i class=\"fas fa-exclamation-triangle\"></i></a>');";
                    }
                    echo "$('#msg_modal_session').modal('show');";
                    $_SESSION['message'] = null;
                }
            ?>
        });
    </script>
    <div class="modal fade" id="msg_modal_session" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اشعار</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2" id="modal_icon"></div>
                        <div class="col-sm ml-auto" id="modal_msg"></div>
                    </div>    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">حسنا</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">جاهز للمغادرة؟</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">حدد "تسجيل الخروج" أدناه إذا كنت مستعدًا لإنهاء جلستك الحالية.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">إلغاء</button>
                    <a class="btn btn-primary" href="logout.php">تأكد الخروج</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <?php
        if (basename($_SERVER['PHP_SELF']) == "index.php")
        {
            echo '<script src="vendor/chart.js/Chart.min.js"></script>';
            echo '<script src="js/demo/chart-area-demo.js"></script>';
            echo '<script src="js/demo/chart-pie-demo.js"></script>';
        }
    ?> 
</body>
</html>
