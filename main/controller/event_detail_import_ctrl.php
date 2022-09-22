<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        $scope.isInit = true;

        $('#importFile').change((event) => {
            $scope.importFile = URL.createObjectURL(event.target.files[0]);
        });

        /* ==================IMPORT======================= */
        $scope.import = () => {
            alasql('SELECT * FROM XLSX(?,{headers:false})',
                [$scope.importFile],
                (data) => {
                    
                }); // end callback and alasql
        }; // end import function
        /* ==================END IMPORT======================= */
    }); // end controller function
</script>