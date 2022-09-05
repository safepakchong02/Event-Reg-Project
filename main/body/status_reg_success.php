<div class="modal fade" tabindex="-1" id="modal-status_reg_success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <br>
                <div class="row text-center">
                    <div class="col-12">
                        <span style="font-size:1.5rem;"><b>บันทึกข้อมูลเสร็จสิ้น</b></span>
                    </div>
                    <div class="col-12">
                        <i class="bi bi-check2-circle " style="color: #49C83E; font-size:7rem;"></i>
                    </div>
                </div>
                <div class="row" ng-controller="<?=$ctrl_name?>">
                    <div class="col-6" ng-hide="!check.emp_id">
                        <div class="form-group pb-2">
                            <label> รหัสพนักงาน :</label>
                            <input type="text" ng-model="add_detail_emp_id" name="add_detail_emp_id" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6" ng-hide="!check.com_name">
                        <div class="form-group pb-2">
                            <label> ชื่อบริษัท :</label>
                            <input type="text" ng-model="add_detail_com_name" name="add_detail_com_name" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6" ng-hide="!check.name">
                        <div class="form-group pb-2">
                            <label> ชื่อ-สกุล :</label>
                            <input type="text" ng-model="add_detail_name" name="add_detail_name" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6" ng-hide="!check.card_id">
                        <div class="form-group pb-2">
                            <label> รหัสบัตรประชาชน :</label>
                            <input type="text" ng-model="add_detail_card_id" name="add_detail_card_id" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6" ng-hide="!check.dep">
                        <div class="form-group pb-2">
                            <label> แผนก :</label>
                            <input type="text" ng-model="add_detail_dep" name="add_detail_dep" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6" ng-hide="!check.pos">
                        <div class="form-group pb-2">
                            <label> ตำแหน่ง :</label>
                            <input type="text" ng-model="add_detail_pos" name="add_detail_pos" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6" ng-hide="!check.call">
                        <div class="form-group pb-2">
                            <label> เบอร์โทรศัพท์ :</label>
                            <input type="tel" ng-model="add_detail_call" name="add_detail_call" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6" ng-hide="!check.gender">
                        <div class="form-group pb-2">
                            <label> เพศ :</label>
                            <select class="form-select" ng-model="add_detail_gender">
                                <option selected>------โปรดระบุ------</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                                <option value="3">เพศทางเลือก</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6" ng-hide="!check.age">
                        <div class="form-group pb-2">
                            <label> อายุ :</label>
                            <input type="number" ng-model="add_detail_age" name="add_detail_age" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6" ng-hide="!check.birthDate">
                        <div class="form-group pb-2">
                            <label> วันเดือนปีเกิด :</label>
                            <input type="date" ng-model="add_detail_birthDate" name="add_detail_birthDate" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-6" ng-hide="!check.salary">
                        <div class="form-group pb-2">
                            <label> เงินเดือน :</label>
                            <input type="number" ng-model="add_detail_salary" name="add_detail_salary" value="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>