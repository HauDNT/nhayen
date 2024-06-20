<!-- Header -->
<?php require "./layout/header.php" ?>

<!-- Navbar -->
<nav>
    <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Logo</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="logo-name">Quản lý nhà yến</span>
        </div>

        <div class="sidebar-content">
            <ul class="lists list-inline">
                <li class="list">
                    <a href="?mod=home" class="nav-link">
                        <i class="bx bxs-home icon"></i>
                        <span class="link">Dashboard</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#" class="nav-link">
                        <i class="bx bxs-bar-chart-alt-2 icon"></i>
                        <span class="link">Báo cáo</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#" class="nav-link">
                        <i class="bx bxs-certification icon"></i>
                        <span class="link">Nhiệt độ, độ ẩm</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#" class="nav-link">
                        <i class="bx bxs-hot icon"></i>
                        <span class="link">Báo cháy</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#" class="nav-link">
                        <i class="bx bxs-cog icon"></i>
                        <span class="link">Thiết lập</span>
                    </a>
                </li>
            </ul>

            <div class="bottom-cotent">
                <li class="list">
                    <a href="#" class="nav-link">
                        <i class="bx bx-log-out icon"></i>
                        <span class="link">Đăng xuất</span>
                    </a>
                </li>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid mainpage mt-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <h3>Báo cáo</h3>
            </div>

            <div class="d-flex mb-2">
                <select class="form-select w-auto me-2" style="cursor: pointer" aria-label="Default select example">
                    <option selected disabled hidden>Vị trí</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <select class="form-select w-auto me-2" style="cursor: pointer" aria-label="Default select example">
                    <option value="1">Nhiệt độ</option>
                    <option value="2">Độ ẩm</option>
                </select>

                <select class="form-select w-auto" style="cursor: pointer" aria-label="Default select example">
                    <option value="1">Năm</option>
                    <option value="2" selected>Tháng</option>
                    <option value="3">Ngày</option>
                </select>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<section class="overlay"></section>

<!-- Footer -->
<?php require "./layout/footer.php" ?>