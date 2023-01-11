<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        // start show event
        $http.get("main/model/event/query_event.php?event_view=show_data")
            .then(function(res) { // start then
                $scope.event_data = res.data.results_data; // "results_data" is key in json format
            }) // end the n
    }); // end controller function
</script>