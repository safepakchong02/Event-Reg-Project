<div class="modal fade" tabindex="-1" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-plus-circle"></i> เพิ่มข้อมูลพนักงาน</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form ng-submit="add_emp()" id="add_emp">
          <div class="row">
            <div class="col-6">
              <div class="form-group pb-2">
                <label> รหัสพนักงาน :</label>
                <input type="text" ng-model="emp_add.user_id" name="emp_add.user_id" class="form-control" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group pb-2">
                <label> ชื่อ :</label>
                <input type="text" ng-model="emp_add.user_name" name="emp_add.user_name" class="form-control" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group pb-2">
                <label> นามสกุล :</label>
                <input type="text" ng-model="emp_add.user_surname" name="emp_add.user_surname" class="form-control" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group pb-2">
                <label> แผนก :</label>
                <input type="text" ng-model="emp_add.dep_id" name="emp_add.dep_id" list="dep" class="form-control" required>
                <datalist id="dep" role="listbox">
                  <option ng-repeat="dep in dep_data" value="{{dep.dep_id}}">{{dep.dep_name}}</option>
                </datalist>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group pb-2">
                <label> สิทธิ์การใช้งาน :</label>
                <select class="form-select" ng-model="emp_add.perm">
                  <option selected>------โปรดระบุ------</option>
                  <option value="admin">admin</option>
                  <option value="manager">manager</option>
                  <option value="register">register</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="add_emp">Save changes</button>
      </div>
    </div>
  </div>
</div>