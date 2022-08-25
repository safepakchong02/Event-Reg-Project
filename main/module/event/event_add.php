<div class="modal fade" tabindex="-1" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-plus-circle"></i> เพิ่มกิจกรรม</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-6">
              <div class="form-group pb-2">
                <label> ชื่อกิจกรรม :</label>
                <input type="text" ng-model="add_title_event" name="add_title_event" class="form-control" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group pb-2">
                <label> เจ้าหน้าที่ดูแล :</label>
                <input type="text" ng-model="add_emp_id" name="add_emp_id" class="form-control" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group pb-2">
                <label> วันที่เปิดลงทะเบียน :</label>
                <input type="datetime-local" ng-model="add_emp_id" name="add_emp_id" class="form-control" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group pb-2">
                <label> วันที่ปิดลงทะเบียน :</label>
                <input type="datetime-local" ng-model="add_emp_id" name="add_emp_id" class="form-control" required>
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
