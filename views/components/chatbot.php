<!-- NÚT BONG BÓNG CHAT -->
<div id="chatbot-toggle" class="fixed bottom-6 right-6 z-[60] cursor-pointer hover:scale-110 transition-transform duration-300">
    <div class="w-14 h-14 bg-brand-red rounded-full flex items-center justify-center shadow-[0_10px_25px_rgba(215,0,24,0.4)] border-2 border-gray-900">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
    </div>
    <!-- Chấm thông báo xanh nhấp nháy -->
    <span class="absolute top-0 right-0 w-3.5 h-3.5 bg-green-500 border-2 border-gray-900 rounded-full animate-pulse"></span>
</div>

<!-- CỬA SỔ CHATBOT (DARK MODE) -->
<div id="chatbot-window" class="fixed bottom-24 right-6 w-80 sm:w-96 bg-tech-dark rounded-2xl shadow-[0_15px_50px_rgba(0,0,0,0.5)] z-[60] overflow-hidden opacity-0 translate-y-10 pointer-events-none transition-all duration-300 border border-gray-800 flex flex-col h-[450px]">
    
    <!-- Header Chat -->
    <div class="bg-[#1a1a1a] p-4 flex justify-between items-center text-white border-b border-gray-800">
        <div class="flex items-center gap-3">
            <!-- Icon AI phát sáng nhẹ -->
            <div class="w-9 h-9 bg-brand-red/20 border border-brand-red/50 rounded-full flex items-center justify-center text-brand-red font-black text-xs shadow-[0_0_10px_rgba(215,0,24,0.3)]">AI</div>
            <div>
                <div class="font-bold text-sm tracking-wide">HeliTech Assistant</div>
                <div class="flex items-center gap-1.5 mt-0.5">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                    <p class="text-[10px] text-gray-400">Trực tuyến - Sẵn sàng tư vấn</p>
                </div>
            </div>
        </div>
        <button id="chatbot-close" aria-label="Đóng" class="text-gray-400 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <!-- Khu vực Tin nhắn (Nền tối) -->
    <div id="chat-messages" class="flex-1 p-4 overflow-y-auto bg-[#111111] flex flex-col gap-4">
        <!-- Tin nhắn mở đầu của AI -->
        <div class="flex gap-2 w-max max-w-[85%]">
            <div class="w-7 h-7 rounded-full bg-gray-800 border border-gray-700 text-brand-red flex shrink-0 items-center justify-center text-[10px] font-bold mt-1">AI</div>
            <div class="bg-gray-800 p-3 rounded-2xl rounded-tl-sm text-sm text-gray-200 border border-gray-700">
                Chào bạn! 👋 Mình là trợ lý AI của HeliTech. Mình có thể giúp bạn tìm thông tin về <strong class="text-white">iPhone 15</strong> hoặc các chương trình khuyến mãi hiện tại?
            </div>
        </div>
    </div>

    <!-- Khung Nhập tin nhắn -->
    <div class="p-3 border-t border-gray-800 bg-[#1a1a1a] flex gap-2">
        <input type="text" id="chat-input" placeholder="Nhập câu hỏi của bạn..." class="flex-1 bg-gray-900 border border-gray-700 text-white placeholder-gray-500 text-sm rounded-full px-4 py-2 outline-none focus:border-brand-red transition-colors">
        <button id="chat-send" aria-label="Gửi tin nhắn" class="w-10 h-10 bg-brand-red hover:bg-red-700 transition-colors rounded-full flex items-center justify-center text-white shadow-lg shrink-0">
            <svg class="w-4 h-4 transform -rotate-45 -ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
        </button>
    </div>
</div>

<!-- LOGIC ĐÓNG/MỞ VÀ CHAT TỰ ĐỘNG -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.getElementById('chatbot-toggle');
        const closeBtn = document.getElementById('chatbot-close');
        const chatWindow = document.getElementById('chatbot-window');
        const chatInput = document.getElementById('chat-input');
        const chatSend = document.getElementById('chat-send');
        const chatMessages = document.getElementById('chat-messages');

        // Mở/Đóng cửa sổ
        function toggleChat() {
            chatWindow.classList.toggle('opacity-0');
            chatWindow.classList.toggle('translate-y-10');
            chatWindow.classList.toggle('pointer-events-none');
        }

        toggleBtn.addEventListener('click', toggleChat);
        closeBtn.addEventListener('click', toggleChat);

        // Gửi tin nhắn
        function sendMessage() {
            const text = chatInput.value.trim();
            if(!text) return;

            // Tin nhắn của User (Bên phải - Màu đỏ HeliTech)
            const userMsg = `
                <div class="flex gap-2 w-max max-w-[85%] self-end">
                    <div class="bg-brand-red text-white p-3 rounded-2xl rounded-tr-sm text-sm shadow-[0_5px_15px_rgba(215,0,24,0.2)]">
                        ${text}
                    </div>
                </div>`;
            chatMessages.insertAdjacentHTML('beforeend', userMsg);
            chatInput.value = '';
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // Giả lập Bot đang gõ chữ (Dấu 3 chấm)
            const typingIndicatorId = 'typing-' + Date.now();
            const typingIndicator = `
                <div id="${typingIndicatorId}" class="flex gap-2 w-max max-w-[85%] mt-1">
                    <div class="w-7 h-7 rounded-full bg-gray-800 border border-gray-700 text-brand-red flex shrink-0 items-center justify-center text-[10px] font-bold">AI</div>
                    <div class="bg-gray-800 px-4 py-3 rounded-2xl rounded-tl-sm text-sm border border-gray-700 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce"></span>
                        <span class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
                        <span class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.4s"></span>
                    </div>
                </div>`;
            chatMessages.insertAdjacentHTML('beforeend', typingIndicator);
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // Xóa dấu 3 chấm và trả lời sau 1 giây
            setTimeout(() => {
                const typingEl = document.getElementById(typingIndicatorId);
                if(typingEl) typingEl.remove();

                const botMsg = `
                    <div class="flex gap-2 w-max max-w-[85%]">
                        <div class="w-7 h-7 rounded-full bg-gray-800 border border-gray-700 text-brand-red flex shrink-0 items-center justify-center text-[10px] font-bold mt-1">AI</div>
                        <div class="bg-gray-800 p-3 rounded-2xl rounded-tl-sm text-sm text-gray-200 border border-gray-700">
                            Cảm ơn bạn đã quan tâm! Hiện tại hệ thống đang được nâng cấp để kết nối với <strong class="text-white">Gemini AI</strong>. Bộ phận Dev sẽ hoàn thiện tính năng này trong phiên bản tiếp theo nhé! 🚀
                        </div>
                    </div>`;
                chatMessages.insertAdjacentHTML('beforeend', botMsg);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 1200);
        }

        chatSend.addEventListener('click', sendMessage);
        chatInput.addEventListener('keypress', function(e) {
            if(e.key === 'Enter') sendMessage();
        });
    });
</script>