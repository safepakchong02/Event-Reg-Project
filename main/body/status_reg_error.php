<div class="modal fade" tabindex="-1" id="modal-status_reg_error">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" ng-controller="<?= $ctrl_name ?>">
                <div class="row text-center">
                    <div class="col-12">
                        <span style="font-size:1.5rem;"><b>บันทึกข้อมูลไม่สำเร็จ</b></span>
                    </div>
                    <div class="col-12">
                        <i class="bi bi-x-circle" style="color: #ff0000; font-size:7rem;"></i>
                    </div>
                </div>
                <div class="row text-center" ng-hide="!isExist">
                    <div class="col-12">
                        <span style="font-size: 20px;">ข้อมูลนี้มีอยู่แล้ว</span>
                    </div>
                </div>
                <div class="row text-center" ng-hide="!isNoData">
                    <div class="col-12">
                        <span style="font-size: 20px;">ไม่มีข้อมูลนี้ในระบบ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>