<div class="modal fade" tabindex="-1" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-plus-circle"></i> เพิ่มข้อมูลพนักงาน</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form ng-submit="edit_emp_save()" id="edit_emp_save">
          <div class="row">
            <div class="col-6">
              <div class="form-group pb-2">
                <label> รหัสพนักงาน :</label>
                <input type="text" ng-model="emp_edit.user_id" name="emp_edit.user_id" class="form-control" required disabled>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group pb-2">
                <label> ชื่อ :</label>
                <input type="text" ng-model="emp_edit.user_name" name="emp_edit.user_name" class="form-control" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group pb-2">
                <label> นามสกุล :</label>
                <input type="text" ng-model="emp_edit.user_surname" name="emp_edit.user_surname" class="form-control" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group pb-2">
                <label> แผนก :</label>
                <input type="text" ng-model="emp_edit.dep_id" name="emp_edit.dep_id" class="form-control" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group pb-2">
                <label> สิทธิ์การใช้งาน :</label>
                <select class="form-select" ng-model="emp_edit.perm">
                  <option ng-selected="emp_edit.perm == ''">------โปรดระบุ------</option>
                  <option ng-selected="emp_edit.perm == 'admin'" value="admin">admin</option>
                  <option ng-selected="emp_edit.perm == 'manager'" value="manager">manager</option>
                  <option ng-selected="emp_edit.perm == 'register'" value="register">register</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="edit_emp_save">Save changes</button>
      </div>
    </div>
  </div>
</div>