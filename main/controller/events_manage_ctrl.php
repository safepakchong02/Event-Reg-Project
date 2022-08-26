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
                data: `ev_title=${$scope.add_ev_title}
                    &ev_assign_to=${$scope.add_ev_assign_to}
                    &ev_date_start=${convertDate($scope.add_ev_date_start.value)}
                    &ev_date_end=${convertDate($scope.add_ev_date_end.value)}`,
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

        } // end edit_event_view function

        $scope.edit_event_save = function() { // start edit_event_save function

        } // end edit_event_save function
        /* ==================END EDIT================== */

        /* ==================DELETE================== */
        $scope.delete_event = function($ev_id) { // start delete_event function

        } // end delete_event
        /* ==================END DELETE================== */

    }); // end controller function
</script>