<!-- import ctrl -->
<?
$ctrl_path = "login";
$ctrl_name = "login_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>
<link rel="stylesheet" type="text/css" href="/Event-Reg-Project/main/css/login.css">
<div class="login_bg" ng-controller="<?= $ctrl_name ?>">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-10 col-lg-6 col-xl-6">
                    <div class="card bg-light bg-opacity-10 text-dark login-card">
                        <div class="card-body cBox">
                            <div class="">
                                <h2 class="fw-bold mb-2 text-uppercase text-center">SUT-EVENTS</h2>
                                <span class="span-text ">
                                    <p class="text-dark-50 text-center">กรุณากรอกอีเมล และรหัสผ่าน</p>
                                </span>
                                <div class="form-floating mb-3">
                                    <input type="email" ng-model="u_email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">อีเมล</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" ng-model="u_password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">รหัสผ่าน</label>
                                </div>
                                <div class="forgetpassword">
                                 <p>ถ้ายังไม่มีบัญชี? <a href="index.php?p=user&m=profile&register" class="text-primary-50 fw-bold">สร้างบัญชี</a></p>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-outline-dark btn-lg px-5" type="button" ng-click="login()">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>