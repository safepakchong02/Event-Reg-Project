<div class="modal fade" tabindex="-1" id="modal-status_reg_success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <br>
                <div class="row text-center">
                    <div class="col-12">
                        <span style="font-size:1.5rem;"><b id="status_success_text">ดำเนินการเสร็จสิ้น</b></span>
                    </div>
                    <div class="col-12">
                        <i class="bi bi-check2-circle " style="color: #49C83E; font-size:7rem;"></i>
                    </div>
                </div>
                <form ng-controller="<?= $ctrl_name ?>">
                    <div class="row">
                        <div class="col-6" ng-if="check.hn" id="no">
                            <div class="form-group pb-2">
                                <label> ลำดับที่ :</label>
                                <input disabled type="text" ng-model="preview.no" name="preview.no" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.hn" id="hn">
                            <div class="form-group pb-2">
                                <label> HN :</label>
                                <input disabled type="text" ng-model="preview.hn" name="preview.hn" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.emp_id" id="emp_id">
                            <div class="form-group pb-2">
                                <label> รหัสพนักงาน :</label>
                                <input disabled type="text" ng-model="preview.emp_id" name="preview.emp_id" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.card_id" id="card_id">
                            <div class="form-group pb-2">
                                <label> รหัสบัตรประชาชน :</label>
                                <input disabled type="text" ng-model="preview.card_id" name="preview.card_id" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.prefix" id="prefix">
                            <div class="form-group pb-2">
                                <label> คำนำหน้า :</label>
                                <input disabled type="text" ng-model="preview.prefix" name="preview.prefix" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.name" id="name">
                            <div class="form-group pb-2">
                                <label> ชื่อ :</label>
                                <input disabled type="text" ng-model="preview.name" name="preview.name" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.surname" id="surname">
                            <div class="form-group pb-2">
                                <label> นามสกุล :</label>
                                <input disabled type="text" ng-model="preview.surname" name="preview.surname" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.call" id="call">
                            <div class="form-group pb-2">
                                <label> เบอร์โทรศัพท์ :</label>
                                <input disabled type="tel" ng-model="preview.call" name="preview.call" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.com_name" id="com_name">
                            <div class="form-group pb-2">
                                <label> ชื่อบริษัท :</label>
                                <input disabled type="text" ng-model="preview.com_name" name="preview.com_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.dep" id="dep">
                            <div class="form-group pb-2">
                                <label> แผนก :</label>
                                <input disabled type="text" ng-model="preview.dep" name="preview.dep" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.pos" id="pos">
                            <div class="form-group pb-2">
                                <label> ตำแหน่ง :</label>
                                <input disabled type="text" ng-model="preview.pos" name="preview.pos" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.gender" id="gender">
                            <div class="form-group pb-2">
                                <label>เพศ :</label>
                                <select disabled class="form-select" ng-model="preview.gender">
                                    <option selected>------โปรดระบุ------</option>
                                    <option value="ชาย" id="ชาย">ชาย</option>
                                    <option value="หญิง" id="หญิง">หญิง</option>
                                    <option value="เพศทางเลือก" id="เพศทางเลือก">เพศทางเลือก</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.age" id="age">
                            <div class="form-group pb-2">
                                <label> อายุ :</label>
                                <input disabled type="number" ng-model="preview.age" name="preview.age" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.birthDate" id="birthDate">
                            <div class="form-group pb-2">
                                <label> วันเดือนปีเกิด :</label>
                                <input disabled type="date" ng-model="preview.birthDate" name="preview.birthDate" class="form-control">
                            </div>
                        </div>
                        <div class="col-12" ng-if="check.comment" id="comment">
                            <div class="form-group pb-2">
                                <label> หมายเหตุ :</label>
                                <textarea disabled rows="3" ng-model="preview.comment" name="preview.comment" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>