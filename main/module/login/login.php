<!-- import ctrl -->
<?
$ctrl_path = "login";
$ctrl_name = "login_ctrl";
include("main/controller/$ctrl_path/$ctrl_name.php");
?>

<div class="row" ng-controller="<?= $ctrl_name ?>">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-success bg-opacity-25 text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase text-center">Login</h2>
                                <p class="text-dark-50 mb-5 text-center">กรุณากรอกอีเมล และรหัสผ่าน</p>

                                <div class="form-floating mb-3">
                                    <input type="email" ng-model="u_email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">อีเมล</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" ng-model="u_password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">รหัสผ่าน</label>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-outline-dark btn-lg px-5" type="button" ng-click="login()">Login</button>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0">ถ้ายังไม่มีบัญชี? <a href="#!" class="text-primary-50 fw-bold">สร้างบัญชี</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>