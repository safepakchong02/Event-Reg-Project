<script>
    var app = angular.module("<?= $app_name ?>", ['datatables']);
    app.controller("<?= $ctrl_name ?>", function($scope, $http) { // start controller function
        $scope.isInit = true;
        $scope.head = [];

        $('#importFile').change((event) => {
            $scope.importFile = URL.createObjectURL(event.target.files[0]);
        });

        /* ==================IMPORT======================= */
        $scope.import = () => {
            alasql('SELECT * FROM XLSX(?,{headers:true})',
                [$scope.importFile],
                (data) => {
                    $scope.isInit = false;
                    const head = [];

                    for (const h in data[0]) {
                        head.push(h);
                    }
                    $scope.head = head;
                    console.log($scope.head);
                    $("#table").removeClass("ng-hide");
                    $("#convert").removeClass("ng-hide");

                }); // end callback and alasql
        }; // end import function
        /* ==================END IMPORT======================= */
    }); // end controller function
</script>