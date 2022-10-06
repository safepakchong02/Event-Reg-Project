<style>
    .center_screen {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<div class="modal" tabindex="-1" id="modal-loading">
    <div class="modal-dialog">
        <div class="center_screen" style="display:block;" width="100%">
            <div class="text-center">
                <div class="spinner-border text-info" style="width: 5rem; height: 5rem;" role="status"></div><br><br>
                <div id="isImport" class="ng-hide">
                    <div class="progress" style="height: 20px; width: 15rem;">
                        <div class="progress-bar  bg-success progress-bar-striped progress-bar-animated" ng-style="{width: widthCal(now, all)}"></div>
                    </div>
                    <br><span class="progress-text text-light">กำลังนำข้อมูลเข้าระบบ... {{now}}/{{all}}</span>
                </div>
            </div>
        </div>
    </div>
</div>