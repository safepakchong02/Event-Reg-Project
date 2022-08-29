<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        $scope.haveData = false;

        /* ==================show data================== */
        // test ui
        $scope.header_data = [1, 2, 3, 4];
        $scope.data = [
            [1, 2, 3, 4],
            [1, 2, 3, 4],
            [1, 2, 3, 4]
        ]
    }); // end controller function
</script>