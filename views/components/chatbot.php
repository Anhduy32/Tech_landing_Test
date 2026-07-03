<!-- NÚT BONG BÓNG CHAT -->
<div id="chatbot-toggle" class="fixed bottom-6 right-6 z-[60] cursor-pointer hover:scale-110 transition-transform duration-300">
    <div class="w-14 h-14 bg-tech-red rounded-full flex items-center justify-center shadow-2xl border-2 border-white">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
    </div>
    <!-- Chấm thông báo đỏ -->
    <span class="absolute top-0 right-0 w-3 h-3 bg-green-400 border-2 border-white rounded-full"></span>
</div>

<!-- CỬA SỔ CHATBOT (Mặc định ẩn) -->
<div id="chatbot-window" class="fixed bottom-24 right-6 w-80 sm:w-96 bg-white rounded-2xl shadow-2xl z-[60] overflow-hidden opacity-0 translate-y-10 pointer-events-none transition-all duration-300 border border-gray-200 flex flex-col h-[450px]">
    
    <!-- Header Chat -->
    <div class="bg-gradient-to-r from-tech-red to-red-800 p-4 flex justify-between items-center text-white">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-tech-red font-black text-xs">AI</div>
            <div>
                <div class="font-bold text-sm">HeliTech Assistant</div>
                <p class="text-[10px] text-red-200">Trực tuyến - Sẵn sàng tư vấn</p>
            </div>
        </div>
        <button id="chatbot-close" aria-label="Đóng" class="text-white hover:text-gray-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <!-- Khu vực Tin nhắn -->
    <div id="chat-messages" class="flex-1 p-4 overflow-y-auto bg-gray-50 flex flex-col gap-3">
        <!-- Tin nhắn của Bot -->
        <div class="flex gap-2 w-max max-w-[85%]">
            <div class="w-6 h-6 rounded-full bg-tech-red text-white flex shrink-0 items-center justify-center text-[10px] font-bold mt-1">AI</div>
            <div class="bg-white p-3 rounded-2xl rounded-tl-sm text-sm text-gray-700 shadow-sm border border-gray-100">
                Chào bạn! 👋 Mình là trợ lý AI của HeliTech. Mình có thể giúp bạn tìm thông tin về iPhone 15 hoặc các chương trình khuyến mãi hiện tại?
            </div>
        </div>
    </div>

    <!-- Khung Nhập tin nhắn -->
    <div class="p-3 border-t border-gray-200 bg-white flex gap-2">
        <input type="text" id="chat-input" placeholder="Nhập câu hỏi của bạn..." class="flex-1 bg-gray-100 text-sm rounded-full px-4 py-2 outline-none focus:ring-1 focus:ring-tech-red">
        <button id="chat-send" aria-label="Gửi tin nhắn" class="w-10 h-10 bg-tech-red rounded-full flex items-center justify-center text-white">>
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

            // In tin nhắn của User (Bên phải)
            const userMsg = `
                <div class="flex gap-2 w-max max-w-[85%] self-end">
                    <div class="bg-tech-red text-white p-3 rounded-2xl rounded-tr-sm text-sm shadow-sm">
                        ${text}
                    </div>
                </div>`;
            chatMessages.insertAdjacentHTML('beforeend', userMsg);
            chatInput.value = '';
            chatMessages.scrollTop = chatMessages.scrollHeight; // Cuộn xuống cuối

            // Giả lập Bot đang typing và trả lời (Trong thực tế sẽ gọi fetch() tới Gemini API)
            setTimeout(() => {
                const botMsg = `
                    <div class="flex gap-2 w-max max-w-[85%]">
                        <div class="w-6 h-6 rounded-full bg-tech-red text-white flex shrink-0 items-center justify-center text-[10px] font-bold mt-1">AI</div>
                        <div class="bg-white p-3 rounded-2xl rounded-tl-sm text-sm text-gray-700 shadow-sm border border-gray-100">
                            Cảm ơn bạn đã quan tâm. Để kết nối với Gemini API, bộ phận Dev sẽ tích hợp Webhook vào Form này trong phiên bản tiếp theo nhé! 😊
                        </div>
                    </div>`;
                chatMessages.insertAdjacentHTML('beforeend', botMsg);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 1000);
        }

        chatSend.addEventListener('click', sendMessage);
        chatInput.addEventListener('keypress', function(e) {
            if(e.key === 'Enter') sendMessage();
        });
    });
</script>