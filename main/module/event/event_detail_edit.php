<div class="modal fade" tabindex="-1" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-pencil-square"></i> แก้ไขรายชื่อผู้ลงทะเบียน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ev_edit" ng-submit="edit_event_save()" ng-controller="<?= $ctrl_name ?>">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> รหัสพนักงาน :</label>
                                <input type="text" ng-model="edit_ev_title" name="edit_ev_title" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> ชื่อบริษัท :</label>
                                <input type="text" ng-model="edit_ev_title" name="edit_ev_title" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> ชื่อ-สกุล :</label>
                                <input type="text" ng-model="edit_ev_assign_to" name="edit_ev_assign_to" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> รหัสบัตรประชาชน :</label>
                                <input type="text" ng-model="edit_ev_assign_to" name="edit_ev_assign_to" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> แผนก :</label>
                                <input type="text" ng-model="edit_ev_title" name="edit_ev_title" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> ตำแหน่ง :</label>
                                <input type="text" ng-model="edit_ev_assign_to" name="edit_ev_assign_to" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> เบอร์โทรศัพท์ :</label>
                                <input type="tel" ng-model="edit_ev_assign_to" name="edit_ev_assign_to" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                            <label>เพศ :</label>
                                    <select class="form-control selectpicker" id="select-country" data-live-search="true">
                                        <option data-tokens="/">ชาย</option>
                                        <option data-tokens="/">หญิง</option>
                                        <option data-tokens="/">เพศทางเลือก</option>
                                    </select>
                                <label> เบอร์โทรศัพท์ :</label>
                                <input type="text" ng-model="edit_ev_assign_to" name="edit_ev_assign_to" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> อายุ :</label>
                                <input type="number" ng-model="edit_ev_assign_to" name="edit_ev_assign_to" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> วันเดือนปีเกิด :</label>
                                <input type="date" ng-model="edit_ev_assign_to" name="edit_ev_assign_to" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> เงินเดือน :</label>
                                <input type="number" ng-model="edit_ev_assign_to" name="edit_ev_assign_to" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="ev_edit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>