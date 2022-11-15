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
                        <div class="col-6" ng-if="check.hn" id="no">
                            <div class="form-group pb-2">
                                <label> ลำดับที่ :</label>
                                <input disabled type="text" ng-model="data_edit.no" name="data_edit.no" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.hn" id="hn">
                            <div class="form-group pb-2">
                                <label> HN :</label>
                                <input type="text" ng-model="data_edit.hn" name="data_edit.hn" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.emp_id" id="emp_id">
                            <div class="form-group pb-2">
                                <label> รหัสพนักงาน :</label>
                                <input type="text" ng-model="data_edit.emp_id" name="data_edit.emp_id" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.card_id" id="card_id">
                            <div class="form-group pb-2">
                                <label> รหัสบัตรประชาชน :</label>
                                <input type="text" ng-model="data_edit.card_id" name="data_edit.card_id" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.prefix" id="prefix">
                            <div class="form-group pb-2">
                                <label> คำนำหน้า :</label>
                                <input type="text" ng-model="data_edit.prefix" name="data_edit.prefix" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.name" id="name">
                            <div class="form-group pb-2">
                                <label> ชื่อ :</label>
                                <input type="text" ng-model="data_edit.name" name="data_edit.name" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.surname" id="surname">
                            <div class="form-group pb-2">
                                <label> นามสกุล :</label>
                                <input type="text" ng-model="data_edit.surname" name="data_edit.surname" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.call" id="call">
                            <div class="form-group pb-2">
                                <label> เบอร์โทรศัพท์ :</label>
                                <input type="tel" ng-model="data_edit.call" name="data_edit.call" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.com_name" id="com_name">
                            <div class="form-group pb-2">
                                <label> ชื่อบริษัท :</label>
                                <input type="text" ng-model="data_edit.com_name" name="data_edit.com_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.dep" id="dep">
                            <div class="form-group pb-2">
                                <label> แผนก :</label>
                                <input type="text" ng-model="data_edit.dep" name="data_edit.dep" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.pos" id="pos">
                            <div class="form-group pb-2">
                                <label> ตำแหน่ง :</label>
                                <input type="text" ng-model="data_edit.pos" name="data_edit.pos" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.gender" id="gender">
                            <div class="form-group pb-2">
                                <label>เพศ :</label>
                                <select class="form-select" ng-model="data_edit.gender">
                                    <option selected>------โปรดระบุ------</option>
                                    <option value="ชาย">ชาย</option>
                                    <option value="หญิง">หญิง</option>
                                    <option value="เพศทางเลือก">เพศทางเลือก</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.age" id="age">
                            <div class="form-group pb-2">
                                <label> อายุ :</label>
                                <input type="number" ng-model="data_edit.age" name="data_edit.age" class="form-control">
                            </div>
                        </div>
                        <div class="col-6" ng-if="check.birthDate" id="birthDate">
                            <div class="form-group pb-2">
                                <label> วันเดือนปีเกิด :</label>
                                <input type="date" ng-model="data_edit.birthDate" name="data_edit.birthDate" class="form-control">
                            </div>
                        </div>
                        <div class="col-12" ng-if="check.comment" id="comment">
                            <div class="form-group pb-2">
                                <label> หมายเหตุ :</label>
                                <textarea rows="3" ng-model="data_edit.comment" name="data_edit.comment" class="form-control"></textarea>
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