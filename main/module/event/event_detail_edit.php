<div class="modal fade" tabindex="-1" id="modal-detail_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-pencil-square"></i> แก้ไขรายชื่อผู้ลงทะเบียน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="detail_edit" ng-submit="edit_form_save()" ng-controller="<?= $ctrl_name ?>">
                    <div class="row">
                        <div class="col-6" ng-if="check.emp_id">
                            <div class="form-group pb-2">
                                <label> รหัสพนักงาน :</label>
                                <input type="text" ng-model="data_edit.emp_id" name="data_edit.emp_id" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.com_name">
                            <div class="form-group pb-2">
                                <label> ชื่อบริษัท :</label>
                                <input type="text" ng-model="data_edit.com_name" name="data_edit.com_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.name">
                            <div class="form-group pb-2">
                                <label> ชื่อ-สกุล :</label>
                                <input type="text" ng-model="data_edit.name" name="data_edit.name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.card_id">
                            <div class="form-group pb-2">
                                <label> รหัสบัตรประชาชน :</label>
                                <input type="text" ng-model="data_edit.card_id" name="data_edit.card_id" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.dep">
                            <div class="form-group pb-2">
                                <label> แผนก :</label>
                                <input type="text" ng-model="data_edit.dep" name="data_edit.dep" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.pos">
                            <div class="form-group pb-2">
                                <label> ตำแหน่ง :</label>
                                <input type="text" ng-model="data_edit.pos" name="data_edit.pos" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.call">
                            <div class="form-group pb-2">
                                <label> เบอร์โทรศัพท์ :</label>
                                <input type="tel" ng-model="data_edit.call" name="data_edit.call" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.gender">
                            <div class="form-group pb-2">
                                <label>เพศ :</label>
                                <select class="form-select" ng-model="data_edit.gender">
                                    <option selected>------โปรดระบุ------</option>
                                    <option value="male" ng-selected="data_edit.gender == 'male">ชาย</option>
                                    <option value="female" ng-selected="data_edit.gender == 'female">หญิง</option>
                                    <option value="LGBTQ+" ng-selected="data_edit.gender == 'LGBTQ+">เพศทางเลือก</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.age">
                            <div class="form-group pb-2">
                                <label> อายุ :</label>
                                <input type="number" ng-model="data_edit.age" name="data_edit.age" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.birthDate">
                            <div class="form-group pb-2">
                                <label> วันเดือนปีเกิด :</label>
                                <input type="date" ng-model="data_edit.birthDate" name="data_edit.birthDate" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.no">
                            <div class="form-group pb-2">
                                <label> ลำดับที่ :</label>
                                <input type="number" ng-model="data_edit.no" name="data_edit.no" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="detail_edit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>