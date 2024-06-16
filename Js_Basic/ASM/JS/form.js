let khach_hang = document.getElementById("khach_hang")
        let loai_hang= document.getElementById("loai_hang")
        let don_gia= document.getElementById("don_gia")
        let so_luong= document.getElementById("so_luong")
        let thanh_tien= document.getElementById("thanh_tien")
        let noi_nhan_hang= document.getElementsByName("noi_nhan_hang")
        console.log(noi_nhan_hang[1].value);
        let phi_van_chuyen= document.getElementById("phi_van_chuyen")


        function chonLoaiHang() {
            if (loai_hang.value == 1) {
                document.getElementById("don_gia").value = 500;
            } else if(loai_hang.value == 2){
                document.getElementById("don_gia").value = 100;
            } else if(loai_hang.value == 3){
                document.getElementById("don_gia").value = 2000;
            }
            thanhTien();
        }

        function chonNoiNhanHang() {
            if(noi_nhan_hang[0].checked == true){
                document.getElementById("phi_van_chuyen").value = 500;
            } else if(noi_nhan_hang[1].checked == true){
                document.getElementById("phi_van_chuyen").value = 1000;
            }
            thanhTien();
        }

        function thanhTien() {
            let dg = parseFloat(don_gia.value);
            let sl = parseFloat(so_luong.value);
            let pvc = parseFloat(phi_van_chuyen.value);
            thanh_tien.value = (dg * sl) + pvc;
        }
        

        function checkForm() {
            // Kiểm tra họ tên
            if (khach_hang.value === "") {
                document.getElementById("alert_khach_hang").innerText = "Vui lòng nhập họ tên!";
                return false;
            } else {
                document.getElementById("alert_khach_hang").innerText = "";
            }

            // Kiểm tra loại hàng
            if (loai_hang.value === "") {
                document.getElementById("alert_loai_hang").innerText = "Vui lòng chọn loại hàng";
                return false;
            } else {
                document.getElementById("alert_loai_hang").innerText = "";
            }

            // Kiểm tra số lượng
            let soLuong = parseFloat(so_luong.value);
            if (isNaN(soLuong)) {
                document.getElementById("alert_so_luong").innerText = "Số lượng phải là số";
                return false;
            } else if (soLuong <= 0) {
                document.getElementById("alert_so_luong").innerText = "Số lượng phải lớn hơn 0";
                return false;
            } else {
                document.getElementById("alert_so_luong").innerText = "";
            }

            // Kiểm tra nơi nhận hàng
            if (!noi_nhan_hang[0].checked && !noi_nhan_hang[1].checked) {
                document.getElementById("alert_noi_nhan_hang").innerText = "Vui lòng chọn nơi nhận hàng";
                return false;
            } else {
                document.getElementById("alert_noi_nhan_hang").innerText = "";
            }

            alert("Đặt mua thành công!");
            return true;
        }