<?php
function construct() {
    load_model('index');
}

function indexAction() {
    // Lấy danh sách các trạm trong DB:
    $list_station_info = get_list_station_info();
    // Lấy danh sách users infor để thêm vào quản lý trạm:
    $list_user_info = get_list_user_info();
    // Lấy danh sách tầng (position):
    $list_position = get_list_position();

    $data = array(
        'list_station_info' => $list_station_info,
        'list_user_info' => $list_user_info,
        'list_position' => $list_position,
    );

    load_view('index', $data);
}

function addStationAction() {
    if (isset($_POST['add_station'])) {
        if (
            empty($_POST['station_name']) ||
            empty($_POST['station_longtitude']) ||
            empty($_POST['station_langtitude']) ||
            empty($_POST['station_urlServer']) ||
            empty($_POST['station_position']) ||
            empty($_POST['station_user'])
        ) {
            $_SESSION['error'] = "<b>THÊM THẤT BẠI</b> vui lòng nhập hết các trường dữ liệu!";
        }
        else {
            $station_name = $_POST['station_name'];
            $station_longtitude = $_POST['station_longtitude'];
            $station_langtitude = $_POST['station_langtitude'];
            $station_urlServer = $_POST['station_urlServer'];
            $station_position = $_POST['station_position'];
            $station_sensors = $_POST['station_sensors'];
            $station_user = $_POST['station_user'];
        }

        if (empty($_SESSION['error'])) {
            $data_stations = array(
                'name' => $station_name,
                'longtitude' => $station_longtitude,
                'langtitude' => $station_langtitude,
                'urlServer' => $station_urlServer,
                'position_id' => $station_position,
                'user_id' => $station_user,
            );

            db_insert('stations', $data_stations);

            $_SESSION['success'] = 'Thêm trạm mới <b>THÀNH CÔNG!</b>';
        }
    }
    header('location: ?mod=stations');
}

function updateStationAction() {
    if (isset($_POST['update_station'])) {
        $id = (int) $_GET['id'];
        show_array($id);

        if (empty(
                $_POST['station_name'] ||
                $_POST['station_address'] ||
                $_POST['station_longtitude'] ||
                $_POST['station_langtitude'] ||
                $_POST['station_urlServer'] ||
                $_POST['station_sensors'] ||
                $_POST['station_user']
            )
        ) {
            $_SESSION['error'] = "<b>CẬP NHẬT THẤT BẠI</b> vui lòng nhập hết các trường dữ liệu!";
        }
        else {
            $station_name = $_POST['station_name'];
            $station_longtitude = $_POST['station_longtitude'];
            $station_langtitude = $_POST['station_langtitude'];
            $station_urlServer = $_POST['station_urlServer'];
            $station_sensors = $_POST['station_sensors'];
            $station_user = $_POST['station_user'];

            if (empty($_SESSION['error'])) {
                // Cập nhật thông tin trạm:
                $data_station = array(
                    'name' => $station_name,
                    'longtitude' => $station_longtitude,
                    'langtitude' => $station_langtitude,
                    'urlServer' => $station_urlServer,
                    'user_id' => $station_user,
                );
                update_station($id, $data_station);

                // Cập nhật cảm biến vào trạm:
                foreach($station_sensors as $value) {
                    $insert = "INSERT INTO station_sensors(station_id, sensor_id) VALUES('{$id}', '{$value}')";
                    db_query($insert);

                    db_update('sensors', ["connect_status" => 1], $value);
                }

                $_SESSION['success'] = 'Cập nhật thông tin trạm <b>THÀNH CÔNG!</b>';
            }
        }
        header('location: ?mod=stations');
    }
    else {
        $id = (int) $_GET['id'];
        $station_update = get_station_by_id($id);
        $list_user_info = get_list_user_info();
        $list_sensors_unconnect = get_sensors_unconnect();
        $data_station = array(
            'station_update' => $station_update,
            'list_user_info' => $list_user_info,
            'list_sensors_unconnect' => $list_sensors_unconnect,
        );
        load_view('update', $data_station);
    }
}

function deleteStationAction() {
    $id = (int) $_GET['id'];

    // Xóa trong bảng trạm - stations:
    db_delete('stations', "`id` = {$id}");

    // Lấy id các cảm biến thuộc trạm:
    $sensor_ids = get_sensors_by_station_id($id);

    // Cập nhật lại cảm biến trong bảng (set connect status về 0):
    foreach ($sensor_ids as $sensor) {
        db_update('sensors', ["connect_status" => 0], $sensor);
    }

    // Xóa trong bảng station_sensors:
    db_delete('station_sensors', "`station_id` = {$id}");

    header('location: ?mod=stations');
}