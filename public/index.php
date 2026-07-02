<?php
use DI\Container;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();
$app->addBodyParsingMiddleware();

// 1. KẾT NỐI DATABASE SQLITE (Tự động tạo file nếu chưa có)
$container->set('db', function() {
    $dbPath = __DIR__ . '/../database/store.sqlite';
    // Đảm bảo thư mục database tồn tại
    if (!is_dir(__DIR__ . '/../database')) {
        mkdir(__DIR__ . '/../database', 0777, true);
    }
    
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Tự động tạo bảng products nếu chưa có
    $pdo->exec("CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        price INTEGER NOT NULL,
        original_price INTEGER NULL,
        image TEXT NOT NULL,
        discount INTEGER DEFAULT 0,
        category TEXT DEFAULT 'Điện thoại'
    )");
    
    return $pdo;
});

// 2. Cấu hình View
$container->set('view', function() {
    return new PhpRenderer(__DIR__ . '/../views');
});

// ==========================================
// ROUTE DÀNH CHO KHÁCH HÀNG (FRONTEND)
// ==========================================
$app->get('/', function (Request $request, Response $response) {
    $db = $this->get('db');
    
    // Truy vấn lấy sản phẩm từ CSDL
    $stmt = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 8");
    $products = $stmt->fetchAll();

    $view = $this->get('view');
    return $view->render($response, 'home.php', [
        'title' => 'Trang chủ - Thế Giới Công Nghệ',
        'products' => $products
    ]);
});

// ==========================================
// ROUTE DÀNH CHO ADMIN (BACKEND) - Sẽ làm ở bước sau
// ==========================================
$app->get('/admin', function (Request $request, Response $response) {
    $response->getBody()->write("Trang Quản Trị Admin (Sắp ra mắt)");
    return $response;
});

$app->run();