-- Thêm dữ liệu vào bảng 'categories'
INSERT INTO categories (name, description, created_at, updated_at) VALUES
('Sữa và sản phẩm từ sữa', 'Sữa và sản phẩm từ sữa', NOW(), NOW()),
('Đồ ăn nhẹ', 'Đồ ăn nhẹ', NOW(), NOW()),
('Đồ uống', 'Đồ uống', NOW(), NOW());

-- Thêm dữ liệu vào bảng 'manufacturers'
INSERT INTO manufacturers (name, address, website, created_at, updated_at) VALUES
('Vinamilk', 'Địa chỉ của Vinamilk', 'http://www.vinamilk.com.vn', NOW(), NOW()),
('Kokomi', 'Địa chỉ của Kokomi', 'http://www.kokomi.com', NOW(), NOW()),
('Hảo Hảo', 'Địa chỉ của Hảo Hảo', 'http://www.haohao.com', NOW(), NOW());

-- Thêm dữ liệu vào bảng 'products'
INSERT INTO products (name, description, unit, price, stock_quantity, category_id, manufacturer_id, production_date, production_location, size, image, created_at, updated_at) VALUES
('Sữa tươi', 'Sữa tươi từ bò sữa tươi', 'Lít', 15000, 100, 1, 1, '2023-01-01 00:00:00', 'Nhà máy A', '1 Lít', 'IFXnP8RjO6oppwTBTum1ECPIvcOp1yKPMzAmtMIN.jpg', NOW(), NOW()),
('Mì gói', 'Mì gói ăn liền', 'Gói', 1990, 200, 2, 3, '2023-02-01 00:00:00', 'Nhà máy B', '100 gram', 'zARDKWZFwpMEru4Oipc7AlomQ9mtRFRNQ7dnIqyN.webp', NOW(), NOW()),
('Trà xanh', 'Bao trà xanh', 'Hộp', 5990, 150, 3, 2, '2023-03-01 00:00:00', 'Nhà máy C', '50 gram', '0ekj3OtcyriyKilzpV6xsB5j5gDJLoqpurnODG0F.jpg', NOW(), NOW());

-- Thêm dữ liệu vào bảng 'order_statuses' (Đã thêm theo mã mẫu trong code PHP)
-- Không cần thêm dữ liệu vì đã thêm sẵn trong mã mẫu

-- Thêm dữ liệu vào bảng 'suppliers'
INSERT INTO suppliers (name, address, phone, email, created_at, updated_at) VALUES
('Nhà cung cấp Vinamilk', 'Địa chỉ của Nhà cung cấp Vinamilk', '123456789', 'vinamilk@example.com', NOW(), NOW()),
('Nhà cung cấp Kokomi', 'Địa chỉ của Nhà cung cấp Kokomi', '987654321', 'kokomi@example.com', NOW(), NOW()),
('Nhà cung cấp Hảo Hảo', 'Địa chỉ của Nhà cung cấp Hảo Hảo', '456789123', 'haohao@example.com', NOW(), NOW());

-- Thêm dữ liệu vào bảng 'users' (tài khoản người dùng)
INSERT INTO users (name, email, password, role_id, created_at, updated_at) VALUES
('John Doe', 'john@example.com', 'password_hash', 3, NOW(), NOW()),
('Jane Smith', 'jane@example.com', 'password_hash', 3, NOW(), NOW()),
('James Brown', 'james@example.com', 'password_hash', 3, NOW(), NOW());

-- Thêm dữ liệu vào bảng 'import_statuses' (Đã thêm theo mã mẫu trong code PHP)
-- Không cần thêm dữ liệu vì đã thêm sẵn trong mã mẫu

-- Thêm dữ liệu vào bảng 'imports'
INSERT INTO imports (supplier_id, user_id, total_amount, status, created_at, updated_at) VALUES
(1, 1, 100.00, 'pending', NOW(), NOW()),
(2, 2, 200.00, 'processing', NOW(), NOW()),
(3, 3, 300.00, 'completed', NOW(), NOW());

-- Thêm dữ liệu vào bảng 'import_details'
INSERT INTO import_details (import_id, product_id, quantity, unit_price, created_at, updated_at) VALUES
(1, 1, 10, 5.99, NOW(), NOW()),
(1, 2, 20, 10.99, NOW(), NOW()),
(2, 2, 30, 15.99, NOW(), NOW()),
(2, 3, 40, 20.99, NOW(), NOW()),
(3, 1, 50, 25.99, NOW(), NOW()),
(3, 3, 60, 30.99, NOW(), NOW());

-- Thêm dữ liệu vào bảng 'orders' (đơn hàng của người dùng)
INSERT INTO orders (user_id, total_amount, status, created_at, updated_at) VALUES
(1, 150.00, 'pending', NOW(), NOW()),
(2, 200.00, 'pending', NOW(), NOW()),
(3, 300.00, 'pending', NOW(), NOW());

-- Thêm dữ liệu vào bảng 'order_items' (các mặt hàng trong đơn hàng)
INSERT INTO order_items (order_id, product_id, quantity, price, created_at, updated_at) VALUES
(1, 1, 5, 20.99, NOW(), NOW()),
(1, 2, 10, 15.99, NOW(), NOW()),
(2, 2, 8, 25.99, NOW(), NOW()),
(2, 3, 15, 30.99, NOW(), NOW()),
(3, 1, 12, 22.99, NOW(), NOW()),
(3, 3, 20, 35.99, NOW(), NOW());
