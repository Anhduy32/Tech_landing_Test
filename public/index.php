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

// ==========================================
// 1. KẾT NỐI DATABASE SQLITE
// ==========================================
$container->set('db', function() {
    $dbPath = __DIR__ . '/../database/store.sqlite';
    if (!is_dir(__DIR__ . '/../database')) {
        mkdir(__DIR__ . '/../database', 0777, true);
    }
    
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

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

// Cấu hình View
$container->set('view', function() {
    return new PhpRenderer(__DIR__ . '/../views');
});

// ==========================================
// 2. ROUTE KHÁCH HÀNG (GET)
// ==========================================
$app->get('/', function (Request $request, Response $response) {
    $db = $this->get('db');
    $stmt = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 8");
    $products = $stmt->fetchAll();

    $view = $this->get('view');
    return $view->render($response, 'home.php', [
        'title' => 'Trang chủ - Thế Giới Công Nghệ',
        'products' => $products
    ]);
});

// ==========================================
// 3. ROUTE ADMIN (GET)
// ==========================================
$app->get('/admin', function (Request $request, Response $response) {
    $response->getBody()->write("Trang Quản Trị Admin (Sắp ra mắt)");
    return $response;
});

// ==========================================
// 4. ROUTE WEBHOOK API (POST) - TÍNH NĂNG ĐIỂM CỘNG
// ==========================================
$app->post('/api/webhook', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    
    if (empty($data['event_type'])) {
        $response->getBody()->write(json_encode(['success' => false, 'error' => 'Dữ liệu không hợp lệ']));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
    }

    // URL Webhook của bạn (Lấy từ webhook.site)
    $webhookUrl = 'https://webhook.site/cab83402-b7c2-433f-8575-9f7cfc8146c1';

    $options = [
        'http' => [
            'header'  => "Content-Type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode([
                'timestamp' => date('Y-m-d H:i:s'),
                'event' => $data['event_type'],
                'details' => $data['payload']
            ])
        ]
    ];
    $context = stream_context_create($options);
    @file_get_contents($webhookUrl, false, $context);

    $response->getBody()->write(json_encode(['success' => true, 'message' => 'Đã đẩy lên Webhook']));
    return $response->withHeader('Content-Type', 'application/json');
});

// ==========================================
// LỆNH CHẠY APP (BẮT BUỘC NẰM CUỐI CÙNG)
// ==========================================
$app->run();