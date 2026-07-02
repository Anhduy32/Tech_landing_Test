<!-- ================= HERO SECTION ================= -->
<section id="hero" class="relative overflow-hidden bg-gradient-to-br from-[#1b0005] via-[#3a050a] to-[#111111]">
    <!-- Background Glow -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-32 -left-32 w-[300px] h-[300px] md:w-[550px] md:h-[550px] bg-red-600/25 rounded-full blur-[120px] md:blur-[170px]"></div>
        <div class="absolute bottom-[-50px] right-[-50px] md:bottom-[-120px] md:right-[-80px] w-[350px] h-[350px] md:w-[600px] md:h-[600px] bg-red-500/20 rounded-full blur-[130px] md:blur-[180px]"></div>
        <!-- Grid -->
        <div class="absolute inset-0 opacity-[0.05]" style="background-image: linear-gradient(rgba(255,255,255,.2) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.2) 1px, transparent 1px); background-size:40px 40px;"></div>
    </div>

    <div class="container mx-auto px-6 lg:px-10 relative z-10">
        <!-- Chỉnh lại min-h và padding cho mobile -->
        <div class="grid lg:grid-cols-2 gap-10 items-center min-h-screen lg:min-h-[760px] py-16 lg:py-0">
            
            <!-- LEFT CONTENT -->
            <div class="text-white flex flex-col justify-center">
                <div>
                    <span class="inline-flex items-center gap-2 bg-red-500/15 border border-red-400/30 px-4 py-1.5 md:px-5 md:py-2 rounded-full text-red-200 text-sm md:text-base font-semibold backdrop-blur-md">
                        SIÊU PHẨM 2026
                    </span>
                </div>

                <!-- Resize font H1 linh hoạt -->
                <h1 class="mt-6 md:mt-8 text-4xl sm:text-5xl lg:text-7xl font-black leading-tight">
                    iPhone 15 <br>
                    <span class="bg-gradient-to-r from-red-500 via-white to-red-300 bg-clip-text text-transparent">
                        PRO MAX
                    </span>
                </h1>

                <p class="mt-6 md:mt-8 text-gray-300 text-base md:text-lg leading-7 md:leading-8 max-w-xl">
                    Khung Titan chuẩn hàng không vũ trụ. Chip <strong class="text-white">A17 Pro</strong> mạnh mẽ. Camera 48MP chuyên nghiệp. Trải nghiệm tốc độ và hiệu năng vượt trội dành cho người yêu công nghệ.
                </p>

                <!-- BUTTONS: Dọc trên mobile, ngang trên desktop -->
                <div class="flex flex-col sm:flex-row gap-4 mt-8 md:mt-10">
                    <a href="#shop" class="w-full sm:w-auto text-center px-8 py-4 rounded-full bg-gradient-to-r from-red-600 to-red-500 font-bold shadow-[0_15px_45px_rgba(215,0,24,.45)] hover:scale-105 transition-transform duration-300">
                        🛒 MUA NGAY
                    </a>
                    <a href="#features" class="w-full sm:w-auto text-center px-8 py-4 rounded-full border border-white/20 backdrop-blur-md hover:bg-white hover:text-black transition-colors duration-300">
                        XEM CHI TIẾT
                    </a>
                </div>

                <!-- STATS: Thu nhỏ text trên điện thoại nhỏ -->
                <div class="grid grid-cols-3 gap-4 sm:gap-8 mt-12 md:mt-16">
                    <div>
                        <h2 class="text-3xl sm:text-4xl font-black text-red-500">48MP</h2>
                        <p class="text-xs sm:text-base text-gray-400 mt-1 sm:mt-2">Camera Pro</p>
                    </div>
                    <div>
                        <h2 class="text-3xl sm:text-4xl font-black text-red-500">A17</h2>
                        <p class="text-xs sm:text-base text-gray-400 mt-1 sm:mt-2">Pro Chip</p>
                    </div>
                    <div>
                        <h2 class="text-3xl sm:text-4xl font-black text-red-500">120Hz</h2>
                        <p class="text-xs sm:text-base text-gray-400 mt-1 sm:mt-2">ProMotion</p>
                    </div>
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="relative flex justify-center items-center mt-8 lg:mt-0">
                <!-- RED GLOW -->
                <div class="absolute w-[250px] h-[250px] md:w-[400px] md:h-[400px] lg:w-[500px] lg:h-[500px] rounded-full bg-red-600/25 blur-[120px] md:blur-[170px] animate-pulse"></div>
                <!-- CIRCLES: Tự động co giãn theo màn hình -->
                <div class="absolute w-[240px] h-[240px] md:w-[380px] md:h-[380px] lg:w-[470px] lg:h-[470px] rounded-full border border-white/10"></div>
                <div class="absolute w-[300px] h-[300px] md:w-[460px] md:h-[460px] lg:w-[560px] lg:h-[560px] rounded-full border border-red-500/20"></div>
                <!-- PHONE -->
                <img src="https://images.unsplash.com/photo-1695048133142-1a20484d2569?q=80&w=1200&auto=format&fit=crop" alt="iPhone 15 Pro Max" class="relative z-20 w-full max-w-[220px] sm:max-w-[280px] md:max-w-md lg:max-w-lg drop-shadow-[0_35px_80px_rgba(0,0,0,.7)] hover:scale-105 duration-700">
            </div>
            
        </div>
    </div>
</section>

<!-- ================= SHOP SECTION ================= -->
<section id="shop" class="py-12 md:py-16 container mx-auto px-4 md:px-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-3 mb-8 border-b-2 border-brand-red pb-2">
        <h2 class="text-xl md:text-2xl font-black text-brand-dark uppercase">Điện thoại nổi bật</h2>
        <a href="#" class="text-sm text-blue-600 hover:text-brand-red font-medium">Xem tất cả ></a>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="bg-white rounded-lg p-3 md:p-4 tech-shadow relative flex flex-col justify-between group transition-all">
                    <?php if (!empty($product['discount']) && $product['discount'] > 0): ?>
                        <div class="absolute top-0 left-0 bg-brand-red text-white text-[10px] md:text-[11px] font-bold px-2 py-1 rounded-tl-lg rounded-br-lg z-10">
                            Giảm <?= htmlspecialchars($product['discount']) ?>%
                        </div>
                    <?php endif; ?>

                    <div class="w-full aspect-square mb-3 md:mb-4 flex items-center justify-center overflow-hidden">
                        <img src="<?= htmlspecialchars($product['image'] ?? 'https://via.placeholder.com/200') ?>" alt="Sản phẩm" class="w-full h-full object-contain group-hover:-translate-y-2 transition duration-300">
                    </div>

                    <div>
                        <h3 class="font-bold text-xs md:text-sm text-gray-800 mb-1 md:mb-2 line-clamp-2 hover:text-brand-red transition">
                            <?= htmlspecialchars($product['name'] ?? 'Tên sản phẩm') ?>
                        </h3>
                        <div class="flex flex-col mb-3">
                            <span class="text-brand-red font-black text-sm md:text-lg">
                                <?= number_format($product['price'] ?? 0, 0, ',', '.') ?> ₫
                            </span>
                            <?php if (!empty($product['original_price']) && $product['original_price'] > $product['price']): ?>
                                <span class="text-[10px] md:text-xs text-gray-500 line-through">
                                    <?= number_format($product['original_price'], 0, ',', '.') ?> ₫
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <button class="w-full bg-brand-dark text-white py-1.5 md:py-2 text-xs md:text-sm font-bold rounded hover:bg-brand-red transition mt-auto">
                        Mua ngay
                    </button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-full bg-white p-12 text-center rounded-lg tech-shadow">
                <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
                <p class="text-gray-500 mb-4 font-medium">Chưa có sản phẩm nào trong cửa hàng.</p>
                <a href="/admin" class="inline-block bg-brand-red text-white font-bold py-2 px-6 rounded hover:bg-red-700 transition shadow-md">Đến Admin Thêm Sản Phẩm</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ================= PROMO SECTION ================= -->
<section id="promo" class="container mx-auto px-4 md:px-8 mb-12 md:mb-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Chỉnh độ rộng text để không bị đè bởi hình ảnh trên màn nhỏ -->
        <div class="bg-gray-800 rounded-lg overflow-hidden flex items-center p-5 md:p-8 h-[200px] md:h-[250px] relative">
            <div class="relative z-10 w-full max-w-[60%] sm:max-w-[66%] text-white">
                <h3 class="text-lg sm:text-xl md:text-2xl font-black mb-1 md:mb-2 uppercase text-brand-red leading-tight">Phụ kiện Apple</h3>
                <p class="text-xs sm:text-sm mb-3 md:mb-4 opacity-90">Giảm thêm 5% khi mua kèm điện thoại.</p>
                <a href="#" class="inline-block bg-white text-black text-[10px] sm:text-xs font-bold py-2 px-3 md:px-4 rounded hover:bg-gray-200 transition">XEM CHI TIẾT</a>
            </div>
            <div class="absolute right-0 top-0 h-full w-1/2 bg-gradient-to-l from-transparent to-gray-800 z-0 opacity-80"></div>
            <img src="https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?q=80&w=400&auto=format&fit=crop" class="absolute right-0 top-0 h-full w-1/2 object-cover opacity-80" alt="Apple Accessories">
        </div>
        
        <div class="bg-brand-red rounded-lg overflow-hidden flex items-center p-5 md:p-8 h-[200px] md:h-[250px] relative">
            <div class="relative z-10 w-full max-w-[60%] sm:max-w-[66%] text-white">
                <h3 class="text-lg sm:text-xl md:text-2xl font-black mb-1 md:mb-2 uppercase leading-tight">Tai nghe Sony</h3>
                <p class="text-xs sm:text-sm mb-3 md:mb-4 opacity-90">Âm thanh đỉnh cao, chống ồn chủ động.</p>
                <a href="#" class="inline-block bg-brand-dark text-white text-[10px] sm:text-xs font-bold py-2 px-3 md:px-4 rounded hover:bg-black transition">MUA NGAY</a>
            </div>
            <img src="https://images.unsplash.com/photo-1618366712010-f4ae9c647dcb?q=80&w=400&auto=format&fit=crop" class="absolute -right-6 md:-right-10 bottom-0 h-[110%] md:h-[120%] w-auto object-contain" alt="Sony Headphone">
        </div>
    </div>
</section>

<!-- ================= FEATURES SECTION ================= -->
<section class="bg-white border-y border-gray-200 py-6 md:py-8 mb-12 md:mb-16">
    <!-- Xếp 1 cột trên mobile siêu nhỏ, 2 cột trên tablet, 4 cột trên Desktop -->
    <div class="container mx-auto px-4 md:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        <div class="flex items-center gap-4 justify-start p-2">
            <div class="text-brand-red shrink-0">
                <svg class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
            </div>
            <div>
                <h4 class="font-bold text-sm md:text-base text-brand-dark">Giao hàng cực nhanh</h4>
                <p class="text-xs md:text-sm text-gray-500 mt-0.5">Miễn phí toàn quốc</p>
            </div>
        </div>
        
        <div class="flex items-center gap-4 justify-start p-2">
            <div class="text-brand-red shrink-0">
                <svg class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
            </div>
            <div>
                <h4 class="font-bold text-sm md:text-base text-brand-dark">Bảo hành 12 tháng</h4>
                <p class="text-xs md:text-sm text-gray-500 mt-0.5">Đổi trả trong 30 ngày</p>
            </div>
        </div>
        
        <div class="flex items-center gap-4 justify-start p-2">
            <div class="text-brand-red shrink-0">
                <svg class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            </div>
            <div>
                <h4 class="font-bold text-sm md:text-base text-brand-dark">Hỗ trợ trả góp 0%</h4>
                <p class="text-xs md:text-sm text-gray-500 mt-0.5">Thủ tục nhanh gọn</p>
            </div>
        </div>
        
        <div class="flex items-center gap-4 justify-start p-2">
            <div class="text-brand-red shrink-0">
                <svg class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
            </div>
            <div>
                <h4 class="font-bold text-sm md:text-base text-brand-dark">Tổng đài 1800.1234</h4>
                <p class="text-xs md:text-sm text-gray-500 mt-0.5">Hỗ trợ kỹ thuật 24/7</p>
            </div>
        </div>
    </div>
</section>