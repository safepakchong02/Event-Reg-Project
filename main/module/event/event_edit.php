<div class="modal fade" tabindex="-1" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-pencil-square"></i> แก้ไขกิจกรรม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ev_edit" ng-submit="edit_event_save()" ng-controller="<?= $ctrl_name ?>">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> ชื่อกิจกรรม :</label>
                                <input type="text" ng-model="edit_ev_title" name="edit_ev_title" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> เจ้าหน้าที่ดูแล :</label>
                                <input type="text" ng-model="edit_ev_assign_to" name="edit_ev_assign_to" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> วันที่เปิดลงทะเบียน :</label>
                                <input type="datetime-local" ng-model="edit_ev_date_start" name="edit_ev_date_start" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group pb-2">
                                <label> วันที่ปิดลงทะเบียน :</label>
                                <input type="datetime-local" ng-model="edit_ev_date_end" name="edit_ev_date_end" class="form-control" required>
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