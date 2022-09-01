<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        // start show event
        $http.get("main/model/event/query_event.php?event_view=show_data")
            .then(function(res) { // start then
                $scope.event_data = res.data.results_data; // "results_data" is key in json format

            }) // end then

        /* ==================ADD================== */
        $scope.add_event = function() { // start add_event function

            $http({
                method: 'POST',
                url: 'main/model/event/query_event.php?event_view=add',
                data: `user_id=${$scope.add_user_id}` +
                    `&user_name=${$scope.add_user_name}` +
                    `&user_surname=${$scope.add_user_surname}` +
                    `&dep_id=${$scope.add_dep_id}` +
                    `&perm=${$scope.add_perm}`,
                    headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(response) {
                    // alert(response.data);
                    location.reload();
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
                    $scope.edit_user_id = response.data.results_data_edit[0].user_id;
                    $scope.edit_user_name = response.data.results_data_edit[0].user_name;
                    $scope.edit_user_surname = response.data.results_data_edit[0].user_surname;
                    $scope.edit_dep_id = createDate(response.data.results_data_edit[0].dep_id);
                    $scope.edit_perm = createDate(response.data.results_data_edit[0].perm);

                }) // end then
        } // end edit_event_view function

        $scope.edit_event_save = function() { // start edit_event_save function
            $http({
                method: 'POST',
                url: 'main/model/event/query_event.php?event_view=edit_form_save',
                data: `user_id=${$scope.edit_user_id}` +
                    `&user_name=${$scope.edit_user_name}` +
                    `&user_surname=${$scope.edit_user_surname}` +
                    `&dep_id=${$scope.edit_dep_id}` +
                    `&perm=${$scope.edit_perm}`,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function(response) {
                    // alert(response.data);
                    location.reload();
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
                        // alert(res.data);
                        location.reload();
                    }) // end then
            }
        } // end delete_event
        /* ==================END DELETE================== */

    }); // end controller function
</script>