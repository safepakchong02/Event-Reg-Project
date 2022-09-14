<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        /* =============SHOW DATA============= */
        $http.get("main/model/reg/query_reg.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then(function(res) { // start then
                $scope.event_data = res.data.results_data; // "results_data" is key in json format
            }) // end then
        /* =============END SHOW DATA============= */
    }); // end controller function
</script>