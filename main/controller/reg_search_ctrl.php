<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function

        // start show event
        $http.get("main/model/reg/query_reg.php?event_view=show_data&ev_id=<?= $_GET["ev_id"] ?>")
            .then((res) => { // start then
                $scope.event_data = res.data.results_data; // "results_data" is key in json format
            }) // end then
        $http.get("main/model/reg/query_reg.php?event_view=show_member&ev_id=<?= $_GET["ev_id"] ?>")
            .then((res) => { // start then
                $scope.header_data = res.data.header_data; // "results_data" is key in json format
                $scope.table_data = res.data.table_data;
            }) // end then

    }); // end controller function
</script>