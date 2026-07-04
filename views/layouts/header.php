<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HeliTech - Hệ thống cửa hàng bán lẻ điện thoại, phụ kiện công nghệ chính hãng, uy tín. Mua ngay iPhone 15 Pro Max với giá ưu đãi.">
    
    <title><?= htmlspecialchars($title ?? 'HeliTech - Thế Giới Công Nghệ') ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="preload" as="image" href="https://images.unsplash.com/photo-1695048133142-1a20484d2569?q=80&w=400&auto=format&fit=crop&fm=webp" fetchpriority="high">

    <style>
        html { scroll-behavior: smooth; scroll-padding-top: 5rem; }
        body { overflow-x: hidden; background-color: #f3f4f6; margin: 0; font-family: sans-serif; opacity: 0; animation: fadeIn 0.3s forwards 0.2s; }
        @keyframes fadeIn { to { opacity: 1; } }
        /* Các style khác */
        .tech-shadow { box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .tech-shadow:hover { box-shadow: 0 10px 25px rgba(215, 0, 24, 0.15); }
        .nav-link { transition: all 0.3s ease; }
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" media="print" onload="this.media='all'">

    <!-- CẤU HÌNH TAILWIND -->
    <script>
        window.tailwind = {
            config: {
                theme: { extend: { fontFamily: { sans: ['Montserrat', 'sans-serif'] }, colors: { tech: { red: '#d70018', dark: '#111111', gray: '#f3f4f6' }, brand: { red: '#d70018', dark: '#222222' } } } }
            }
        }
    </script>
    
    <script>
        (function() {
            var script = document.createElement('script');
            script.src = "https://cdn.tailwindcss.com";
            // Dùng thuộc tính async thay vì defer để giải phóng TBT ngay lập tức
            script.async = true; 
            document.head.appendChild(script);
        })();
    </script>
</head>