<!-- Header -->
<?php require "./layout/header.php" ?>

<!-- Modal update Sensor-->
<div class="modal fade" id="updateSensorModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật cảm biến</h1>
                <button type="button" class="btn ms-auto" data-bs-dismiss="modal" aria-label="Close">
                <a href="?mod=sensors" class="text-light text-decoration-none btn-close"></a>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="POST">
                    <input type="hidden" id="sensor-id" name="sensor_id">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Tên cảm biến</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="update-recipient-name" 
                            name="name_sensor" 
                            value="<?php if (!empty($sensor_update['name'])) echo $sensor_update['name'];?>"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="update-message-text" class="col-form-label">Trạm</label>
                        <select class="form-select" id="update-station" name="station">
                            <option selected hidden>-- Chọn trạm --</option>
                            <?php foreach ($list_station as $station) { ?>
                                <option value="<?php echo $station['id'] ?>" <?php if ($sensor_update['station_id'] == $station['id']) echo 'selected' ?> ><?php echo $station['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="update-position" class="col-form-label">Vị trí</label>
                        <select class="form-select" id="update-position" name="position">
                            <option selected hidden>-- Chọn tầng --</option>
                            <?php foreach ($list_position as $position) { ?>
                                <option value="<?php echo $position['id'] ?>" <?php if ($sensor_update['position_id'] == $position['id']) echo 'selected' ?> ><?php echo $position['Position'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb3 mt-8 d-flex modal-footer">
                        <button type="button" class="btn btn-secondary ms-auto mr-4" data-bs-dismiss="modal"><a href="?mod=sensors" class="text-light text-decoration-none">Trở lại</a></button>
                        <button type="submit" class="btn btn-primary ms-2" name="update_sensor">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal JS Script -->
<script type="text/javascript">
    window.onload = () => {
        $('#updateSensorModal').modal('show');
    }
</script>
<!-- Footer -->
<?php require "./layout/footer.php" ?>