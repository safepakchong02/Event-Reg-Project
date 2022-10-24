<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        // start show emp
        $http.get("main/model/emp/query_emp.php?event_view=show_data")
            .then((res) => { // start then
                $scope.emp_data = res.data.results_data; // "results_data" is key in json format
            }) // end then
        $http.get("main/model/emp/query_emp.php?event_view=dep")
            .then((res) => { // start then
                $scope.dep_data = res.data.results_data; // "results_data" is key in json format
                console.log($scope.dep_data);
            }) // end then

        /* ==================ADD================== */
        $scope.add_emp = () => { // start add_emp function

            $http({
                method: 'POST',
                url: 'main/model/emp/query_emp.php?event_view=add',
                data: `user_id=${$scope.emp_add.user_id}` +
                    `&user_name=${$scope.emp_add.user_name}` +
                    `&user_surname=${$scope.emp_add.user_surname}` +
                    `&dep_id=${$scope.emp_add.dep_id}` +
                    `&perm=${$scope.emp_add.perm}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(response) {
                    $("#modal-add").modal("hide");
                    $("#modal-status_success").modal("show");
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                },
                function(response) { // optional
                    // failed
                    alert('ไม่สามารถบันทึกข้อมูลได้');
                });

        }; // end add_emp function
        /* ==================END ADD================== */

        /* ==================EDIT================== */
        $scope.edit_emp_view = (id) => { // start edit_event_view function
            $http.get(`main/model/emp/query_emp.php?event_view=show_data_edit&id=${id}`)
                .then((res) => { // start then
                    $scope.emp_edit = res.data.results_data_edit[0];
                }) // end then
        } // end edit_event_view function

        $scope.edit_emp_save = () => { // start edit_emp_save function
            $http({
                method: 'POST',
                url: 'main/model/emp/query_emp.php?event_view=edit_form_save',
                data: `id=${$scope.emp_edit.id}` +
                    `user_id=${$scope.emp_edit.user_id}` +
                    `&user_name=${$scope.emp_edit.user_name}` +
                    `&user_surname=${$scope.emp_edit.user_surname}` +
                    `&dep_id=${$scope.emp_edit.dep_id}` +
                    `&perm=${$scope.emp_edit.perm}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(response) {
                    $("#modal-edit").modal("hide");
                    $("#modal-status_success").modal("show");
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                },
                function(response) { // optional
                    // failed
                    alert('ไม่สามารถบันทึกข้อมูลได้');
                });

        } // end edit_emp_save function
        /* ==================END EDIT================== */

        /* ==================DELETE================== */
        $scope.delete_emp = (id) => { // start delete_emp function
            if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
                $http.get(`main/model/emp/query_emp.php?event_view=del_emp&id=${id}`)
                    .then(function(res) { // start then
                        $("#modal-status_success").modal("show");
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    }) // end then
            }
        } // end delete_emp
        /* ==================END DELETE================== */

    }); // end controller function
</script>