<nav class="navbar navbar-expand-lg bg-dark text-white" id="nav">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">SUT-Events</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="index.php?p=event&m=dashboard">กิจกรรมของฉัน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php?p=event&m=event_list">รายชื่อกิจกรรม</a>
                </li>
                <li class="nav-item" ng-if="u_role == 3">
                    <a class="nav-link text-white" href="index.php?p=admin&m=dashboard">Admin</a>
                </li>

            </ul>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ud_name}}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                            <li><a class="dropdown-item" href="index.php?p=user&m=profile">โปรไฟล์</a></li>
                            <li><a class="dropdown-item" href="index.php?p=login&m=login&logout">ออกจากระบบ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>