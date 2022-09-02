<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http, $rootScope) { // start controller function
        $scope.isInit = true;


        $('#importFile').change(function(event) {
            $scope.importFile = URL.createObjectURL(event.target.files[0]);
        });

        $scope.import = function() {
            alasql('SELECT * FROM XLSX(?,{headers:true})', [$scope.importFile], function(data) {
                $scope.isInit = false;
                $scope.data = data;
                console.log($scope.data);
                console.log($scope.isInit);
            });
        }
    }); // end controller function
</script>