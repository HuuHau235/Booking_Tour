<h2>Tạo Tour Mới</h2>
<form action="create_tour_action.php" method="POST">
    <div class="mb-3">
        <label for="tourName" class="form-label">Tên Tour</label>
        <input type="text" class="form-control" id="tourName" name="tourName" required>
    </div>
    <div class="mb-3">
        <label for="tourDescription" class="form-label">Mô tả</label>
        <textarea class="form-control" id="tourDescription" name="tourDescription" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="tourPrice" class="form-label">Giá</label>
        <input type="number" class="form-control" id="tourPrice" name="tourPrice" required>
    </div>
    <div class="mb-3">
        <label for="tourStartDate" class="form-label">Ngày bắt đầu</label>
        <input type="date" class="form-control" id="tourStartDate" name="tourStartDate" required>
    </div>
    <div class="mb-3">
        <label for="tourEndDate" class="form-label">Ngày kết thúc</label>
        <input type="date" class="form-control" id="tourEndDate" name="tourEndDate" required>
    </div>
    <div class="mb-3">
        <label for="tourDuration" class="form-label">Thời gian (số ngày)</label>
        <input type="number" class="form-control" id="tourDuration" name="tourDuration" required>
    </div>
    <div class="mb-3">
        <label for="tourType" class="form-label">Loại Tour</label>
        <select class="form-control" id="tourType" name="tourType" required>
            <option value="mạo hiểm">Mạo hiểm</option>
            <option value="nghỉ dưỡng">Nghỉ dưỡng</option>
            <option value="khám phá">Khám phá</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Tạo Tour</button>
</form>
