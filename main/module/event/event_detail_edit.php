<div class="modal fade" tabindex="-1" id="modal-detail_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 ng-hide="isPreview" class="modal-title"><i class="bi bi-plus-circle"></i> แก้ไขข้อมูลผู้ลงทะเบียน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="member_edit" ng-submit="edit_form_save()" ng-controller="<?= $ctrl_name ?>">
                    <div class="row">
                        <div class="col-6" ng-hide="!check.emp_id">
                            <div class="form-group pb-2">
                                <label> รหัสพนักงาน :</label>
                                <input type="text" ng-model="data_edit.emp_id" name="data_edit.emp_id" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.com_name">
                            <div class="form-group pb-2">
                                <label> ชื่อบริษัท :</label>
                                <input type="text" ng-model="data_edit.com_name" name="data_edit.com_name" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.name">
                            <div class="form-group pb-2">
                                <label> ชื่อ-สกุล :</label>
                                <input type="text" ng-model="data_edit.name" name="data_edit.name" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.card_id">
                            <div class="form-group pb-2">
                                <label> รหัสบัตรประชาชน :</label>
                                <input type="text" ng-model="data_edit.card_id" name="data_edit.card_id" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.dep">
                            <div class="form-group pb-2">
                                <label> แผนก :</label>
                                <input type="text" ng-model="data_edit.dep" name="data_edit.dep" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.pos">
                            <div class="form-group pb-2">
                                <label> ตำแหน่ง :</label>
                                <input type="text" ng-model="data_edit.pos" name="data_edit.pos" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.call">
                            <div class="form-group pb-2">
                                <label> เบอร์โทรศัพท์ :</label>
                                <input type="tel" ng-model="data_edit.call" name="data_edit.call" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.gender">
                            <div class="form-group pb-2">
                                <label> เพศ :</label>
                                <select class="form-select" ng-model="data_edit.gender">
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
                                <input type="number" ng-model="data_edit.age" name="data_edit.age" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.birthDate">
                            <div class="form-group pb-2">
                                <label> วันเดือนปีเกิด :</label>
                                <input type="date" ng-model="data_edit.birthDate" name="data_edit.birthDate" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-hide="!check.salary">
                            <div class="form-group pb-2">
                                <label> เงินเดือน :</label>
                                <input type="number" ng-model="data_edit.salary" name="data_edit.salary" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="member_edit" ng-hide="isPreview" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>