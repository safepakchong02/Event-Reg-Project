<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        // start show event
        $http.get("main/model/event/query_event.php?event_view=show_data")
            .then(function(res) { // start then
                $scope.event_data = res.data.results_data; // "results_data" is key in json format
            }) // end then
        $http.get("main/model/emp/query_emp.php?event_view=emp")
            .then(function(res) { // start then
                $scope.emp_data = res.data.results_data; // "results_data" is key in json format
                // console.log($scope.emp_data);
            }) // end then

        /* ==================ADD================== */
        $scope.add_event = function() { // start add_event function

            $http({
                method: 'POST',
                url: 'main/model/event/query_event.php?event_view=add',
                data: `ev_title=${$scope.add_ev_title}` +
                    `&ev_assign_to=${$scope.add_ev_assign_to}` +
                    `&ev_date_start=${convertDate($scope.add_ev_date_start.value)}` +
                    `&ev_date_end=${convertDate($scope.add_ev_date_end.value)}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(response) {
                    $("#modal-add").modal("hide");
                    $("#modal-status_success").modal("show");
                    setTimeout(() => {
                        location.reload();
                    }, 1500)
                },
                function(response) { // optional
                    // failed
                    alert('ไม่สามารถบันทึกข้อมูลได้');
                });

        }; // end add_event function
        /* ==================END ADD================== */

        /* ==================EDIT================== */
        $scope.edit_event_view = function($ev_id) { // start edit_event_view function
            $http.get(`main/model/event/query_event.php?event_view=show_data_edit&ev_id=${$ev_id}`)
                .then(function(response) { // start then
                    // alert(response.data);
                    $scope.edit_ev_id = response.data.results_data_edit[0].ev_id;
                    $scope.edit_ev_title = response.data.results_data_edit[0].ev_title;
                    $scope.edit_ev_assign_to = response.data.results_data_edit[0].ev_assign_to;
                    $scope.edit_ev_date_start = createDate(response.data.results_data_edit[0].ev_date_start);
                    $scope.edit_ev_date_end = createDate(response.data.results_data_edit[0].ev_date_end);

                }) // end then
        } // end edit_event_view function

        $scope.edit_event_save = function() { // start edit_event_save function
            $http({
                method: 'POST',
                url: 'main/model/event/query_event.php?event_view=edit_form_save',
                data: `ev_id=${$scope.edit_ev_id}` +
                    `&ev_title=${$scope.edit_ev_title}` +
                    `&ev_assign_to=${$scope.edit_ev_assign_to}` +
                    `&ev_date_start=${convertDate($scope.edit_ev_date_start)}` +
                    `&ev_date_end=${convertDate($scope.edit_ev_date_end)}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(response) {
                    $("#modal-edit").modal("hide");
                    $("#modal-status_success").modal("show");
                    setTimeout(() => {
                        location.reload();
                    }, 1500)
                },
                function(response) { // optional
                    // failed
                    alert('ไม่สามารถบันทึกข้อมูลได้');
                });

        } // end edit_event_save function
        /* ==================END EDIT================== */

        /* ==================DELETE================== */
        $scope.delete_event = function($ev_id) { // start delete_event function
            if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
                $http.get(`main/model/event/query_event.php?event_view=del_event&ev_id=${$ev_id}`)
                    .then(function(res) { // start then
                        $("#modal-status_success").modal("show");
                        setTimeout(() => {
                            location.reload();
                        }, 1500)
                    }) // end then
            }
        } // end delete_event
        /* ==================END DELETE================== */

    }); // end controller function
</script>