<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?= htmlspecialchars($title ?? 'HeliTech - Thế Giới Công Nghệ') ?></title>
    <meta name="description" content="<?= htmlspecialchars($description ?? 'Khám phá kỷ nguyên công nghệ mới với iPhone 15 Pro Max Titanium. Mua sắm thiết bị điện tử chính hãng tại HeliTech với giá ưu đãi nhất.') ?>">
    
 <!-- TỐI ƯU KẾT NỐI & TẢI ẢNH -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://images.unsplash.com">
    <link rel="preload" href="https://cdn.tailwindcss.com" as="script">
    
    <!-- TỐI ƯU ẢNH LCP (Nạp sẵn vào bộ nhớ) -->
    <link rel="preload" as="image" href="https://images.unsplash.com/photo-1695048133142-1a20484d2569?q=80&w=800&auto=format&fit=crop&fm=webp">

    <!-- FONT CHỮ (Tải ngầm không chặn render) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" media="print" onload="this.media='all'">
    
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- TAILWIND CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Montserrat', 'sans-serif'] },
                    colors: {
                        tech: { red: '#d70018', dark: '#111111', gray: '#f3f4f6' },
                        brand: { red: '#d70018', dark: '#222222' } 
                    }
                }
            }
        }
    </script>
<body class="text-gray-800 antialiased bg-white relative">
    <header class="bg-black fixed w-full top-0 z-50 border-b border-gray-800">
        <div class="container mx-auto px-6 md:px-12 flex justify-between items-center h-20">
            <a href="/" class="text-2xl font-extrabold text-white uppercase flex-shrink-0 tracking-tight">
                HELI<span class="text-tech-red">TECH</span>
            </a>
            <nav class="hidden md:flex space-x-8 text-sm font-bold uppercase">
                <a href="#hero" class="nav-link text-tech-red border-b-2 border-tech-red pb-1">Trang chủ</a>
                <a href="#shop" class="nav-link text-white hover:text-tech-red border-b-2 border-transparent pb-1">Sản phẩm</a>
                <a href="#specs" class="nav-link text-white hover:text-tech-red border-b-2 border-transparent pb-1">Thông số</a>
            </nav>
            <div class="flex items-center space-x-6 text-white flex-shrink-0">
                <a href="#cart" class="relative hover:text-tech-red transition flex items-center group">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    <span id="cart-count" class="absolute -top-2 -right-3 bg-tech-red text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold">0</span>
                </a>
            </div>
        </div>
    </header>