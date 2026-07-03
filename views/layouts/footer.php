<!-- Đã tối ưu tải ngầm CSS và JS của thư viện AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"></noscript>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    
    <?php 
        if (file_exists(__DIR__ . '/../components/chatbot.php')) {
            require __DIR__ . '/../components/chatbot.php'; 
        }
    ?>

    <footer class="bg-brand-dark pt-16 pb-8 w-full text-gray-300 border-t-4 border-brand-red">
        <div class="container mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
            
            <div>
                <h3 class="text-white text-xl font-bold mb-6 uppercase">Hệ thống cửa hàng HeliTech</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <svg class="h-5 w-5 text-brand-red flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        <span>123 Đường Thái Hà, Đống Đa, Hà Nội<br><span class="text-xs text-gray-300">Mở cửa: 8h00 - 22h00</span>
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
                <!-- ĐÃ SỬA: Chặn hành vi submit của form Footer -->
                <form id="footer-contact-form" onsubmit="event.preventDefault();" class="space-y-4">
                    <div>
                        <input type="text" id="contact-name" placeholder="Họ và tên *" class="w-full bg-gray-900 border border-gray-700 text-white p-3 rounded text-sm outline-none focus:border-brand-red transition" required>
                    </div>
                    <div>
                        <input type="tel" id="contact-phone" placeholder="Số điện thoại *" class="w-full bg-gray-900 border border-gray-700 text-white p-3 rounded text-sm outline-none focus:border-brand-red transition" required>
                    </div>
                    <div>
                        <textarea id="contact-message" rows="2" placeholder="Bạn cần hỗ trợ gì?" class="w-full bg-gray-900 border border-gray-700 text-white p-3 rounded text-sm outline-none focus:border-brand-red transition resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-brand-red text-white font-bold py-3 rounded hover:bg-red-700 transition uppercase text-sm">Gửi yêu cầu</button>
                </form>
            </div>

        </div>
        <div class="container mx-auto px-4 text-center border-t border-gray-800 pt-6 text-xs">
            <p>&copy; <?= date('Y') ?> HeliTech Store. Một dự án thực tập của Healthy Living Corp.</p>
        </div>
    </footer>

    <!-- KHU VỰC HIỂN THỊ THÔNG BÁO (TOAST) -->
    <div id="toast-container" class="fixed top-24 right-6 z-[100] flex flex-col gap-3 pointer-events-none"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            /* --- 1. KHỞI TẠO AOS ANIMATION --- */
            AOS.init({ duration: 800, once: true, offset: 100 });

            /* --- 2. HÀM TOAST THÔNG BÁO --- */
            function showToast(message, type = 'success') {
                const container = document.getElementById('toast-container');
                const toast = document.createElement('div');
                
                let bgColor = 'bg-green-600';
                if(type === 'error') bgColor = 'bg-red-600';
                if(type === 'info') bgColor = 'bg-blue-600';

                toast.className = `${bgColor} text-white px-6 py-3 rounded shadow-xl transform transition-all duration-500 translate-x-full opacity-0 font-bold text-sm flex items-center gap-2`;
                toast.innerHTML = `<span>${message}</span>`;
                container.appendChild(toast);
                
                setTimeout(() => toast.classList.remove('translate-x-full', 'opacity-0'), 10);
                setTimeout(() => { 
                    toast.classList.add('translate-x-full', 'opacity-0'); 
                    setTimeout(() => toast.remove(), 500);
                }, 3000);
            }

            /* --- 3. HÀM GỬI WEBHOOK --- */
            function trackEvent(eventType, payload) {
                fetch('api/webhook', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ event_type: eventType, payload: payload })
                }).catch(err => console.error("Webhook Error:", err));
            }

            /* --- 4. THEO DÕI FORM NHẬN TIN (LEAD FORM) --- */
            const btnSubmitLead = document.getElementById('btn-submit-lead');
            if (btnSubmitLead) {
                btnSubmitLead.addEventListener('click', function() {
                    const emailInput = document.getElementById('lead-email-input');
                    const emailValue = emailInput.value.trim();
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    
                    if (!emailValue || !emailRegex.test(emailValue)) {
                        showToast('Định dạng Email không hợp lệ!', 'error');
                        return;
                    }
                    showToast('Đăng ký thành công! Đã ghi nhận.', 'success');
                    trackEvent('Lead_Registration', { email: emailValue });
                    emailInput.value = ''; 
                });
            }

            /* --- 5. THEO DÕI FORM LIÊN HỆ FOOTER --- */
            const footerForm = document.getElementById('footer-contact-form');
            if (footerForm) {
                footerForm.addEventListener('submit', function(e) {
                    e.preventDefault(); // Chặn tải lại trang
                    const name = document.getElementById('contact-name').value;
                    const phone = document.getElementById('contact-phone').value;
                    const message = document.getElementById('contact-message').value;

                    showToast('Cảm ơn bạn! Yêu cầu tư vấn đã được gửi đi.', 'success');
                    trackEvent('Contact_Request', { name: name, phone: phone, message: message });
                    this.reset();
                });
            }

            /* --- 6. LOGIC GIỎ HÀNG MINI --- */
            const cartCountEl = document.getElementById('cart-count');
            const addToCartBtns = document.querySelectorAll('.add-to-cart-btn');

            function updateCartBadge() {
                let cart = JSON.parse(localStorage.getItem('helitech_cart')) || [];
                let totalItems = cart.reduce((total, item) => total + item.quantity, 0);
                if(cartCountEl) cartCountEl.innerText = totalItems;
            }

            addToCartBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    let cart = JSON.parse(localStorage.getItem('helitech_cart')) || [];
                    cart.push({ id: Date.now(), quantity: 1 });
                    localStorage.setItem('helitech_cart', JSON.stringify(cart));
                    updateCartBadge();
                    
                    showToast('Đã thêm sản phẩm vào giỏ!', 'success');
                    trackEvent('Click_Add_To_Cart', { detail: 'Khách hàng thêm vào giỏ' });

                    const originalText = this.innerText;
                    this.innerText = "✓ ĐÃ THÊM";
                    this.classList.add('bg-green-600', 'text-white', 'border-green-600');
                    setTimeout(() => {
                        this.innerText = originalText;
                        this.classList.remove('bg-green-600', 'text-white', 'border-green-600');
                    }, 2000);
                });
            });
            updateCartBadge();

            /* --- 7. THEO DÕI CUỘN TRANG --- */
            let hasTrackedScroll = false;
            window.addEventListener('scroll', function() {
                if (hasTrackedScroll) return;
                const scrollPos = window.scrollY + window.innerHeight;
                const docHeight = document.documentElement.scrollHeight;
                if (scrollPos / docHeight > 0.8) {
                    hasTrackedScroll = true;
                    showToast('Cảm ơn bạn đã quan tâm đến HeliTech!', 'info');
                    trackEvent('Scroll_Depth', { message: 'Cuộn tới 80% trang' });
                }
            });

            /* --- 8. CUỘN MƯỢT & ĐỔI MÀU MENU --- */
            const navLinks = document.querySelectorAll(".nav-link");
            navLinks.forEach(link => {
                link.addEventListener("click", function(e) {
                    const targetId = this.getAttribute("href").substring(1);
                    if (!targetId || targetId.includes("/")) return; 

                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        e.preventDefault(); 
                        const headerOffset = 80;
                        const elementPosition = targetSection.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.scrollY - headerOffset;
                        window.scrollTo({ top: offsetPosition, behavior: "smooth" });
                    }
                });
            });

            window.addEventListener("scroll", function() {
                const sections = document.querySelectorAll("section[id]");
                let currentSection = "";
                sections.forEach((section) => {
                    const sectionTop = section.offsetTop;
                    if (window.scrollY >= sectionTop - 150) {
                        currentSection = section.getAttribute("id");
                    }
                });
                navLinks.forEach((link) => {
                    link.classList.remove("text-tech-red", "border-tech-red");
                    link.classList.add("text-white", "border-transparent");
                    if (currentSection && link.getAttribute("href") === "#" + currentSection) {
                        link.classList.remove("text-white", "border-transparent");
                        link.classList.add("text-tech-red", "border-tech-red");
                    }
                });
            });
        });
    </script>
</body>
</html>