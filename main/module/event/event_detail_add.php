<div class="modal fade" tabindex="-1" id="modal-detail_add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="bi bi-plus-circle"></i> เพิ่มข้อมูลผู้ลงทะเบียน</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row">
              <div class="col-6">
                <div class="form-group pb-2">
                  <label> รหัสพนักงาน :</label>
                  <input type="text" ng-model="add_title_event" name="add_title_event" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group pb-2">
                  <label> ชื่อ-สกุล :</label>
                  <input type="text" ng-model="add_emp_id" name="add_emp_id" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group pb-2">
                  <label> แผนก :</label>
                  <input type="text" ng-model="add_emp_id" name="add_emp_id" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group pb-2">
                  <label> ตำแหน่ง :</label>
                  <input type="text" ng-model="add_emp_id" name="add_emp_id" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group pb-2">
                  <label> เบอร์โทรศัพท์ :</label>
                  <input type="text" ng-model="add_emp_id" name="add_emp_id" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group pb-2">
                  <label> เพศ :</label>
                  <select class="form-select" aria-label="Default select example">
                          <option selected>------โปรดระบุ------</option>
                          <option value="1">ชาย</option>
                          <option value="2">หญิง</option>
                          <option value="3">เพศทางเลือก</option>
                  </select>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  