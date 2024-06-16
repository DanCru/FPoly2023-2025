var dSSanPham = document.querySelector("#dSMH");
var myCart = document.querySelector("#cart");
var gioHang = [];

function them(obj) {
    let row = obj.parentNode.parentNode;
    let tenSP = row.children.item(0).innerHTML;
    let gia = parseFloat(row.children.item(1).innerHTML.substr(1)); // Parse to float
    let soluong = 1;
    let exist = false;

    for (let i = 0; i < gioHang.length; i++) {
        if (gioHang[i].name === tenSP) {
        gioHang[i].quantity++;
        document.getElementById(tenSP).children.item(2).innerHTML = gioHang[i].quantity;
        document.getElementById(tenSP).children.item(3).innerHTML = gioHang[i].quantity * gioHang[i].price;
        exist = true;
        break;
        }
    }

    if (!exist) {
        var sanPham = { name: tenSP, price: gia, quantity: soluong };
        gioHang.push(sanPham);
        addCart(sanPham);
    }

    tinhTong();
    console.log(gioHang);
}

function addCart(sanPham) {
    let idx = myCart.rows.length;
    let newRow = myCart.insertRow(idx);
    newRow.setAttribute("id", sanPham.name);

    let cell0 = newRow.insertCell(0);
    cell0.innerHTML = sanPham.name;

    let cell1 = newRow.insertCell(1);
    cell1.innerHTML = sanPham.price;

    let cell2 = newRow.insertCell(2);
    cell2.innerHTML = sanPham.quantity;

    let totalCellPrice = sanPham.price * sanPham.quantity;
    let cell3 = newRow.insertCell(3);
    cell3.innerHTML = totalCellPrice;

    let cell4 = newRow.insertCell(4);
    cell4.innerHTML = `<button onclick="xoa(this)">Xóa</button>`;
}

function xoa(button) {
    var row = button.parentElement.parentElement;
    let tenSP = row.children.item(0).innerHTML;
    let sp = gioHang.find(item => item.name === tenSP);
  
    if (sp) {
      sp.quantity--;
    }
  
    if (sp.quantity === 0) {
      document.getElementById(tenSP).remove();
    } else {
      document.getElementById(tenSP).children.item(2).innerHTML = sp.quantity;
      document.getElementById(tenSP).children.item(3).innerHTML = sp.quantity * sp.price;
    }
  
    tinhTong();
  }
  

function tinhTong() {
    var tong = 0;
    gioHang.forEach((item) => {
        tong += item.price * item.quantity;
    });

    document.getElementById("tong").innerHTML = tong;
}
