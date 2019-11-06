CREATE TABLE loaimaybay (
    id VARCHAR(10) NOT NULL,
    ten VARCHAR(50) NOT NULL,
    gheThuong INT NOT NULL,
    gheThuongGia INT NOT NULL,
    gheLoaiNhat INT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE maybay(
    id VARCHAR(10) NOT NULL,
    idLoaiMayBay VARCHAR(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idLoaiMayBay) REFERENCES loaimaybay(id)
);

CREATE TABLE sanbay(
    id VARCHAR(10) NOT NULL,
    tenThanhPho VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE chuyenbay(
    id VARCHAR(10) NOT NULL,
    idMayBay VARCHAR(10) NOT NULL,
    diemDi VARCHAR(10) NOT NULL,
    diemDen VARCHAR(10) NOT NULL,
    gioBay TIME NOT NULL,
    khoangCach INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idMayBay) REFERENCES maybay(id),
    FOREIGN KEY (diemDi) REFERENCES sanbay(id),
    FOREIGN KEY (diemDen) REFERENCES sanbay(id)
);

CREATE TABLE loaive(
    id VARCHAR(10) NOT NULL,
    ten VARCHAR(50) NOT NULL,
    phanTram INT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE ve(
    id VARCHAR(15) NOT NULL,
    cmndKhachHang VARCHAR(12) NOT NULL,
    tenKhachHang VARCHAR(50) NOT NULL,
    sdtKhachHang VARCHAR(11) NOT NULL,
    diaChiKhachHang VARCHAR(100) NOT NULL,
    kieuVe TINYINT(1) NOT NULL,
    loaiVe VARCHAR(10) NOT NULL,
    diemDi VARCHAR(10) NOT NULL,
    diemDen VARCHAR(10) NOT NULL,
    ngayDi1 DATE NOT NULL,
    ngayDi2 DATE NOT NULL,
    nguoiLon INT NOT NULL,
    treEm INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (loaiVe) REFERENCES loaive(id)
);

CREATE TABLE trangthaive(
    idVe VARCHAR(15) NOT NULL,
    trangThai VARCHAR(50) NOT NULL,
    PRIMARY KEY (idVe),
    FOREIGN KEY (idVe) REFERENCES ve(id)
);

CREATE TABLE ghebay(
    idChuyenBay VARCHAR(10) NOT NULL,
    idVe VARCHAR(15) NOT NULL,
    ghe VARCHAR(10) NOT NULL,
    ngayBay DATE NOT NULL,
    PRIMARY KEY (idChuyenBay, idVe, ghe, ngayBay),
    FOREIGN KEY (idChuyenBay) REFERENCES chuyenbay(id),
    FOREIGN KEY (idVe) REFERENCES ve(id)
);