<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        // start show event
        $http.get("main/model/event/query_event.php?event_view=show_data")
            .then(function(res) { // start then
                $scope.event_data = res.data.rs_data; // "rs_data" is key in json format
            }) // end then

        /* ==================ADD================== */
        $scope.add_event = function() { // start add_event function

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