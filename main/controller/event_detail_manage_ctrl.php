<script>
    function visibleUI(status) {
        if (status) {
            $(document).ready(() => {
                $("#example_wrapper").hide();
            });
        } else {
            $(document).ready(() => {
                $("#example_wrapper").show();
            });
        }
    } // end function

    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        $scope.isEmpty = true;

        /* ==================--SHOW--======================= */
        $http.get("main/model/event/query_event_detail.php?event_view=show_data")
            .then(function(res) { // start then
                if (res.data.results_data !== "null") {
                    $scope.header_data = res.data.results_data.header; // "results_data" is key in json format
                    $scope.table_data = res.data.results_data.table_data;

                    $scope.isEmpty = false;
                    visibleUI($scope.isEmpty);
                } else {
                    $scope.isEmpty = true;
                    visibleUI($scope.isEmpty);
                }
            }) // end then
        /* ==================END SHOW======================= */
        /* ==================--ADD---======================= */
        $scope.add_event_detail = function() {
            $http({
                method: 'POST',
                url: 'main/model/event/query_event_detail.php?event_view=add',
                data: ``,
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

        } // end add_event_detail function
        /* ==================END ADD-======================= */
        /* ==================--EDIT--======================= */
        $scope.edit_event_detail_view = function($id) { // start edit_event_detail_view function
            $http.get(`main/model/event/query_event_detail.php?event_view=show_data_edit&id=${$id}`)
                .then(function(response) { // start then
                    // alert(response.data);

                }) // end then
        } // end edit_event_detail_view function

        $scope.edit_event_detail_save = function() { // start edit_event_detail_save function
            $http({
                method: 'POST',
                url: 'main/model/event/query_event_detail.php?event_view=edit_form_save',
                data: ``,
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

        } // end edit_event_detail_save function
        /* ==================END EDIT======================= */
        /* ==================-DELETE-======================= */
        $scope.delete_event_detail = function($id) { // start delete_event_detail function
            if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
                $http.get(`main/model/event/query_event_detail.php?event_view=del_event&id=${$id}`)
                    .then(function(res) { // start then
                        // alert(res.data);
                        location.reload();
                    }) // end then
            }
        } // end delete_event_detail function
        /* ==================END DELETE===================== */

    }); // end controller function
</script>