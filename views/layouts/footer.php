<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
<?php 
        if (file_exists(__DIR__ . '/../components/chatbot.php')) {
            require __DIR__ . '/../components/chatbot.php'; 
        }
    ?>


        
        <footer class="bg-brand-dark pt-16 pb-8 w-full text-gray-400 border-t-4 border-brand-red">
            <div class="container mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
                
                <div>
                    <h3 class="text-white text-xl font-bold mb-6 uppercase">Hệ thống cửa hàng HeliTech</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-3">
                            <svg class="h-5 w-5 text-brand-red flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span>123 Đường Thái Hà, Đống Đa, Hà Nội<br><span class="text-xs text-gray-500">Mở cửa: 8h00 - 22h00</span></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="h-5 w-5 text-brand-red flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            <span>Hotline mua hàng: <strong class="text-white">1800.1234</strong></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="h-5 w-5 text-brand-red flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            <span>Bảo hành & Khiếu nại: cskh@helitech.vn</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-[#1a1a1a] p-8 rounded-lg shadow-xl border border-gray-800">
                    <h3 class="text-white text-lg font-bold mb-6 uppercase">Nhận tư vấn miễn phí</h3>
                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <input type="text" placeholder="Họ và tên *" class="w-full bg-gray-900 border border-gray-700 text-white p-3 rounded text-sm outline-none focus:border-brand-red transition" required>
                        </div>
                        <div>
                            <input type="tel" placeholder="Số điện thoại *" class="w-full bg-gray-900 border border-gray-700 text-white p-3 rounded text-sm outline-none focus:border-brand-red transition" required>
                        </div>
                        <div>
                            <textarea rows="2" placeholder="Bạn cần hỗ trợ gì?" class="w-full bg-gray-900 border border-gray-700 text-white p-3 rounded text-sm outline-none focus:border-brand-red transition resize-none"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-brand-red text-white font-bold py-3 rounded hover:bg-red-700 transition uppercase text-sm">Gửi yêu cầu</button>
                    </form>
                </div>

            </div>
            <div class="container mx-auto px-4 text-center border-t border-gray-800 pt-6 text-xs">
                <p>&copy; <?= date('Y') ?> HeliTech Store. Một dự án thực tập của Healthy Living Corp.</p>
            </div>
        </footer>

        
<script>

        document.addEventListener("DOMContentLoaded", function() {
            // Khởi tạo hiệu ứng AOS
            AOS.init({
                duration: 800, // Thời gian chạy animation (800ms)
                once: true,    // Chỉ chạy 1 lần khi cuộn tới
                offset: 100    // Kích hoạt khi cách màn hình 100px
            });

            /* ==========================================
               LOGIC GIỎ HÀNG MINI (LOCALSTORAGE)
               ========================================== */
            const cartCountEl = document.getElementById('cart-count');
            const addToCartBtns = document.querySelectorAll('.add-to-cart-btn');

            // Cập nhật số lượng hiển thị trên Header
            function updateCartBadge() {
                let cart = JSON.parse(localStorage.getItem('helitech_cart')) || [];
                let totalItems = cart.reduce((total, item) => total + item.quantity, 0);
                if(cartCountEl) cartCountEl.innerText = totalItems;
            }

            // Sự kiện khi bấm "Thêm vào giỏ"
            addToCartBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Lấy thông tin sản phẩm giả định (Trong thực tế sẽ lấy ID)
                    let cart = JSON.parse(localStorage.getItem('helitech_cart')) || [];
                    cart.push({ id: Date.now(), quantity: 1 }); // Thêm 1 sản phẩm
                    
                    localStorage.setItem('helitech_cart', JSON.stringify(cart));
                    updateCartBadge();

                    // Hiệu ứng nút bấm thành công
                    const originalText = this.innerText;
                    this.innerText = "✓ ĐÃ THÊM";
                    this.classList.add('bg-green-600', 'text-white', 'border-green-600');
                    setTimeout(() => {
                        this.innerText = originalText;
                        this.classList.remove('bg-green-600', 'text-white', 'border-green-600');
                    }, 2000);
                });
            });

            // Chạy lần đầu khi load web
            updateCartBadge();
            

            const navLinks = document.querySelectorAll(".nav-link");

            // 1. XỬ LÝ CLICK CUỘN MƯỢT
            navLinks.forEach(link => {
                link.addEventListener("click", function(e) {
                    const targetId = this.getAttribute("href").substring(1);
                    if (!targetId || targetId.includes("/")) return; 

                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        e.preventDefault(); 
                        
                        const headerOffset = 80;
                        // Tính toán chính xác vị trí tuyệt đối của phần tử trên trang
                        const elementPosition = targetSection.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.scrollY - headerOffset;
                        
                        window.scrollTo({
                            top: offsetPosition,
                            behavior: "smooth"
                        });
                    }
                });
            });

            // 2. SCROLL SPY - ĐỔI MÀU MENU
            window.addEventListener("scroll", function() {
                // Lấy lại danh sách section mỗi lần cuộn để đề phòng DOM thay đổi
                const sections = document.querySelectorAll("section[id]");
                let currentSection = "";

                sections.forEach((section) => {
                    const sectionTop = section.offsetTop;
                    // Bù trừ 150px để đổi màu sớm khi mắt vừa nhìn thấy tiêu đề
                    if (window.scrollY >= sectionTop - 150) {
                        currentSection = section.getAttribute("id");
                    }
                });

                navLinks.forEach((link) => {
                    link.classList.remove("text-brand-red", "border-brand-red");
                    link.classList.add("text-white", "border-transparent");
                    
                    if (currentSection && link.getAttribute("href") === "#" + currentSection) {
                        link.classList.remove("text-white", "border-transparent");
                        link.classList.add("text-brand-red", "border-brand-red");
                    }
                });
            });
        });
    </script>
</body>
</html>