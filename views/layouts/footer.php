<!-- Cấu hình CSS/JS nhẹ nhất -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" media="print" onload="this.media='all'">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    
    <?php 
        if (file_exists(__DIR__ . '/../components/chatbot.php')) {
            require __DIR__ . '/../components/chatbot.php'; 
        }
    ?>

    <footer class="bg-tech-dark pt-16 pb-8 w-full text-gray-300 border-t border-gray-800">
        <div class="container mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
            <div>
                <h3 class="text-white text-xl font-bold mb-6 uppercase">Hệ thống cửa hàng HeliTech</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <svg class="h-5 w-5 text-brand-red flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        <span>123 Đường Thái Hà, Đống Đa, Hà Nội<br><span class="text-xs text-gray-400">Mở cửa: 8h00 - 22h00</span></span>
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

            <div class="bg-brand-dark p-8 rounded-xl shadow-2xl border border-gray-800/60 relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-brand-red/10 rounded-full blur-2xl pointer-events-none"></div>
                <h3 class="text-white text-lg font-bold mb-6 uppercase relative z-10">Nhận tư vấn miễn phí</h3>
                <form id="footer-contact-form" onsubmit="event.preventDefault();" class="space-y-4 relative z-10">
                    <div><input type="text" id="contact-name" aria-label="Họ và tên" placeholder="Họ và tên *" class="w-full bg-gray-900 border border-gray-700 text-white p-3 rounded text-sm outline-none focus:border-brand-red" required></div>
                    <div><input type="tel" id="contact-phone" aria-label="Số điện thoại" placeholder="Số điện thoại *" class="w-full bg-gray-900 border border-gray-700 text-white p-3 rounded text-sm outline-none focus:border-brand-red" required></div>
                    <div><textarea id="contact-message" aria-label="Nội dung hỗ trợ" rows="2" placeholder="Bạn cần hỗ trợ gì?" class="w-full bg-gray-900 border border-gray-700 text-white p-3 rounded text-sm outline-none focus:border-brand-red resize-none"></textarea></div>
                    <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-500 text-white font-bold py-3 rounded hover:scale-105 transition-transform uppercase text-sm shadow-[0_5px_15px_rgba(215,0,24,.3)]">Gửi yêu cầu</button>
                </form>
            </div>
        </div>
        <div class="container mx-auto px-4 text-center border-t border-gray-800 pt-6 text-xs text-gray-500">
            <p>&copy; <?= date('Y') ?> HeliTech Store. Một dự án thực tập của Healthy Living Corp.</p>
        </div>
    </footer>

    <div id="toast-container" class="fixed top-24 right-6 z-[100] flex flex-col gap-3 pointer-events-none"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof AOS !== 'undefined') AOS.init({ duration: 800, once: true, offset: 100 });

            function showToast(msg, type = 'success') {
                const c = document.getElementById('toast-container');
                if(!c) return;
                const t = document.createElement('div');
                t.className = `${type === 'error' ? 'bg-red-600' : type === 'info' ? 'bg-blue-600' : 'bg-green-600'} text-white px-6 py-3 rounded shadow-xl transform transition-all duration-500 translate-x-full opacity-0 font-bold text-sm flex items-center gap-2`;
                t.innerHTML = `<span>${msg}</span>`;
                c.appendChild(t);
                setTimeout(() => t.classList.remove('translate-x-full', 'opacity-0'), 10);
                setTimeout(() => { t.classList.add('translate-x-full', 'opacity-0'); setTimeout(() => t.remove(), 500); }, 3000);
            }

            function trackEvent(type, payload) {
                fetch('api/webhook', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ event_type: type, payload: payload }) }).catch(() => {});
            }

            const btnLead = document.getElementById('btn-submit-lead');
            if (btnLead) {
                btnLead.addEventListener('click', () => {
                    const el = document.getElementById('lead-email-input');
                    const val = el ? el.value.trim() : '';
                    if (!val || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) return showToast('Email không hợp lệ!', 'error');
                    showToast('Đăng ký thành công!', 'success');
                    trackEvent('Lead_Registration', { email: val });
                    if(el) el.value = ''; 
                });
            }

            const fForm = document.getElementById('footer-contact-form');
            if (fForm) {
                fForm.addEventListener('submit', function(e) {
                    e.preventDefault(); 
                    showToast('Yêu cầu đã được gửi!', 'success');
                    trackEvent('Contact_Request', { name: document.getElementById('contact-name')?.value, phone: document.getElementById('contact-phone')?.value });
                    this.reset();
                });
            }

            const cartCountEl = document.getElementById('cart-count');
            function updateCart() {
                try {
                    let cart = JSON.parse(localStorage.getItem('helitech_cart')) || [];
                    if(cartCountEl) cartCountEl.innerText = cart.reduce((t, i) => t + i.quantity, 0);
                } catch(e) {}
            }

            document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    try {
                        let cart = JSON.parse(localStorage.getItem('helitech_cart')) || [];
                        cart.push({ id: Date.now(), quantity: 1 });
                        localStorage.setItem('helitech_cart', JSON.stringify(cart));
                        updateCart();
                        showToast('Đã thêm vào giỏ!', 'success');
                        
                        const og = this.innerText;
                        this.innerText = "✓ ĐÃ THÊM";
                        this.classList.add('bg-green-600', 'text-white', 'border-green-600');
                        setTimeout(() => { this.innerText = og; this.classList.remove('bg-green-600', 'text-white', 'border-green-600'); }, 2000);
                    } catch(e) {}
                });
            });
            updateCart();

            let tracked = false;
            window.addEventListener('scroll', () => {
                if (!tracked && (window.scrollY + window.innerHeight) / document.documentElement.scrollHeight > 0.8) {
                    tracked = true;
                    showToast('Cảm ơn bạn đã quan tâm đến HeliTech!', 'info');
                }
            }, { passive: true });

            const links = document.querySelectorAll(".nav-link");
            links.forEach(l => l.addEventListener("click", function(e) {
                const id = this.getAttribute("href")?.substring(1);
                if (!id || id.includes("/")) return; 
                const sec = document.getElementById(id);
                if (sec) { e.preventDefault(); window.scrollTo({ top: sec.getBoundingClientRect().top + window.scrollY - 80, behavior: "smooth" }); }
            }));

            window.addEventListener("scroll", () => {
                let cur = "";
                document.querySelectorAll("section[id]").forEach(s => { if (window.scrollY >= s.offsetTop - 150) cur = s.getAttribute("id"); });
                links.forEach(l => {
                    l.classList.remove("text-tech-red", "border-tech-red"); l.classList.add("text-white", "border-transparent");
                    if (cur && l.getAttribute("href") === "#" + cur) { l.classList.remove("text-white", "border-transparent"); l.classList.add("text-tech-red", "border-tech-red"); }
                });
            }, { passive: true });
        });
    </script>
</body>
</html>