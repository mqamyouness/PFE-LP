<?php
    include("header.php");
?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
    <?php
        include("small_header.php");
    ?>
    <div class="container-fluid"> 
        <div class="d-sm-flex  mb-3">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="update_info"  data="true">
                <i class="fas fa-plus-circle fa-sm text-white-50"></i>  تحديث المعلومات
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-2">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary" style="width:100%;">الملف الشخصي</h5>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body ">
                        <form class="g-3" method="POST" action="controller.php">
                            <div class="row">
                                <div class="col-sm">
                                    <label for="validationServer01" class="form-label">اسم العائلي</label>
                                    <input type="text" class="form-control" name="nameAdmin" id="name" required value="<?php echo $_SESSION["admin"][2] ?>">
                                    <div class="valid-feedback">
                                    ! الرجاء إعادة 
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <label for="validationServer02" class="form-label">اسم الشخصي</label>
                                    <input type="text" class="form-control" name="lastnameAdmin" id="lastName" required value="<?php echo $_SESSION["admin"][1] ?>">
                                    <div class="valid-feedback">
                                    ! الرجاء إعادة 
                                    </div>
                                </div>
                            </div> 
                            <div class="row"> 
                                <div class="col-sm">
                                    <label for="validationServerUsername" class="form-label">البريد الإلكتروني</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="emailAdmin" id="email" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required value="<?php echo $_SESSION["admin"][3] ?>">
                                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        ! الرجاء إعادة 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <label for="validationServerUsername" class="form-label">رقم الهاتف</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="teleAdmin" id="tele" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required value="<?php echo $_SESSION["admin"][4] ?>">
                                        <span class="input-group-text"  id="inputGroupPrepend3"><i class="fa fa-mobile"></i></span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            ! الرجاء إعادة 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm">
                                    <label for="validationServerUsername" class="form-label">اسم المستخدم</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="usernameAdmin"  id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required value="<?php echo $_SESSION["admin"][5] ?>">
                                        <span class="input-group-text" id="username"><i class="fa fa-user"></i></span>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            ! الرجاء إعادة 
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-sm">
                                    <label for="validationServerUsername" class="form-label">كلمات السر</label>
                                    <div class="input-group has-validation">
                                        <input type="password" class="form-control" id="password" placeholder="********">
                                        <span class="input-group-text" id="eye"  ><i class="fa fa-eye-slash"></i></span>
                                        <div class="valid-feedback">
                                            ! الرجاء إعادة
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="row justify-content-center" style="margin-top: 1% ;">
                                <button type="reset" class="btn btn-warning btn-icon-split" id="reset" style="display:none;">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text">أعاد للوضع السابق</span>
                                </button>&nbsp;&nbsp;
                                <button class="btn btn-success btn-icon-split" type="submit" id="submit" style="display:none;">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">حفظ</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#eye").click(function(){
            if($("#password").attr("type") == "text"){
                $("#password").attr("type","password");
                $("#eye > i").attr("class","fa fa-eye-slash");
            }
            else{
                $("#password").attr("type","text");
                $("#eye > i").attr("class","fa fa-eye");
            }
        });
        $("form input").each(
            function(index){  
                $(this).attr("readonly","true");
            }
        );
        $("#update_info").click(function () {
            if($(this).attr('data') == "true")
            {
                $("#update_info").html("<i class=\"	fa fa-minus-circle fa-sm text-white-50\"></i>   إلغاء تحديث المعلومات");
                $("#submit").show(); 
                $("#reset").show();
                $(this).attr('data','false');
                $("form input").each(
                    function(index){  
                        $(this).removeAttr("readonly");
                    }
                );
            }else{
                $("#update_info").html("<i class=\"fas fa-plus-circle fa-sm text-white-50\"></i>  تحديث المعلومات</a>");
                $("#submit").hide(); 
                $("#reset").hide()
                          .click(); 
                $("table").show(); 
                $(this).attr('data','true');
                $("form input").each(
                    function(index){  
                        $(this).attr("readonly","true");
                    }
                );
            }
        });
        $("#password").change(function () {
            if($(this).val() != "")
                $(this).attr("name","passwordAdmin");
            else
                $(this).removeAttr("name");
        });
    });
</script>
<?php
    include("footer.php");
?>