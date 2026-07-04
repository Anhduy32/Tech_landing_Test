<!-- ================= LEAD FORM / NEWSLETTER (DẠNG THẺ NỔI) ================= -->
<!-- ĐÃ SỬA: Thêm mb-12 md:mb-16 để tạo khoảng cách. Dùng container để bóp chiều rộng bằng với các khối trên -->
<section class="container mx-auto px-4 md:px-8 mb-12 md:mb-16" data-aos="fade-up">
    
    <!-- ĐÃ SỬA: Thêm rounded-2xl (bo góc) và shadow-2xl (bóng đổ) để tạo cảm giác lơ lửng -->
    <div class="bg-[#111111] rounded-2xl border border-gray-800 py-12 md:py-16 relative overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.2)]">
        
        <!-- Hiệu ứng nền sương mù đỏ -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] md:w-[600px] h-[300px] md:h-[600px] bg-brand-red/10 rounded-full blur-[100px]"></div>
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(rgba(255,255,255,.2) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.2) 1px, transparent 1px); background-size:30px 30px;"></div>
        </div>
        
        <!-- Nội dung -->
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8 px-6 md:px-12">
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-2xl md:text-3xl font-black uppercase mb-3 text-white tracking-wide">Đăng ký nhận tin</h2>
                <p class="text-gray-400 text-sm md:text-base">Nhận ngay mã giảm giá <strong class="text-brand-red text-lg">500.000đ</strong> cho đơn hàng đầu tiên.</p>
            </div>
            
            <div class="md:w-1/2 w-full max-w-md mx-auto md:mx-0">
                <div class="flex flex-col sm:flex-row gap-3">
                    <input type="email" id="lead-email-input" aria-label="Nhập địa chỉ email của bạn" placeholder="Nhập email của bạn..." required 
                           onkeypress="if(event.key === 'Enter') document.getElementById('btn-submit-lead').click();"
                           class="w-full px-5 py-4 rounded-md bg-gray-900 border border-gray-700 text-white outline-none focus:border-brand-red shadow-lg">
                    <button type="button" id="btn-submit-lead" aria-label="Gửi đăng ký nhận tin" 
                            class="bg-gradient-to-r from-red-600 to-red-500 text-white font-bold px-8 py-4 rounded-md hover:scale-105 transition-transform shadow-[0_5px_20px_rgba(215,0,24,.3)] uppercase text-sm shrink-0">
                        Đăng ký ngay
                    </button>
                </div>
            </div>
        </div>
        
    </div>
</section>