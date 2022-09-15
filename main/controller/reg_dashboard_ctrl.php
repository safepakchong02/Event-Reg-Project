<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http, $interval) { // start controller function
        /* =============SHOW DATA============= */
        $http.get("main/model/reg/query_reg.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then(function(res) { // start then
                $scope.event_data = res.data.results_data; // "results_data" is key in json format
            }) // end then
        /* =============END SHOW DATA============= */

        /* =============SHOW REPORT REALTIME============= */
        $scope.loadData = () => {
            $http.get(`main/model/reg/query_reg.php?event_view=report&ev_id=<?= $_GET["ev_id"] ?>&group_by=${$scope.group_by}`)
                .then(function(res) { // start then
                    $scope.report_data = res.data.report_data; // "results_data" is key in json format
                    $scope.sum_report = res.data.sum_report;
                }) // end then
        }

        /* =============INIT PAGE============= */
        // $scope.loadData();

        $interval(() => {
            console.log("reload");
            // $scope.loadData();
        }, 5000)
        /* =============END SHOW REPORT REALTIME============= */
    }); // end controller function
</script>