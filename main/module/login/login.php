<style>
    .bi-person-fill {
        color: #808080;
    }

    .bi-lock-fill {
        color: #808080;
    }

    .center_screen {
        position: fixed;  
        top: 50%;  
        left: 50%;  
        transform: translate(-50%, -50%); 
     
    }
</style>
<div class="container center_screen"><br><br>
        <div class="row justify-content-center" align="center">
            <div class="col-12">
                <span class="h3">ระบบลงทะเบียนออนไลน์</span>
            </div>
        </div><br>
        <div class="row justify-content-center" align="center">
            <div class="col-6">
                <span>สำหรับเจ้าหน้าที่</span>
            </div>
        </div>
        <div class="row justify-content-center" align="center">
            <div class="col-4">
                <div class="input-group flex-nowrap">
                    <input type="text" class="form-control col-md-12" placeholder="รหัสพนักงาน" aria-label="Username" aria-describedby="addon-wrapping">
                    <span class="input-group-text " id="addon-wrapping"><i class="bi bi-person-fill"></i></span>
                </div>
            </div>
        </div><br>
        <div class="row justify-content-center" align="center">
            <div class="col-4">
                <div class="input-group flex-nowrap">
                    <input type="password" class="form-control col-md-12" placeholder="รหัสผ่าน" aria-label="Username" aria-describedby="addon-wrapping">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-lock-fill"></i></span>
                </div>
            </div>
        </div><br>
        <div class="row justify-content-center" align="center">
            <div class="col-4">
                <div class="input-group flex-nowrap">
                    <button type="button" class="btn btn-primary btn-block col-md-12" data-bs-toggle="modal" data-bs-target="#modal-add">เข้าสู่ระบบ</button>
                </div>
            </div>
        </div> 
</div>