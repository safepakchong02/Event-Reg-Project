<script>
    var app = angular.module("<?= $app_name ?>", []);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        // init web
        $scope.walkInIsOpen = true;
    }); // end controller function
</script>