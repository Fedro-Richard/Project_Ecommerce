<style>
    /* Tombol Chat Melayang */
    #chat-floating-btn {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 9999;
        background: linear-gradient(45deg, #D2691E, #A0522D); /* Warna Coklat Cookies */
        color: white;
        border: none;
        width: 65px;
        height: 65px;
        border-radius: 50%;
        font-size: 30px;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        transition: transform 0.3s;
    }
    #chat-floating-btn:hover { transform: scale(1.1); }

    /* Kotak Chat Utama */
    #chat-box {
        position: fixed;
        bottom: 100px;
        right: 30px;
        z-index: 9999;
        width: 360px;
        height: 500px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        display: none; /* Awalnya sembunyi */
        flex-direction: column;
        overflow: hidden;
        font-family: sans-serif;
        border: 1px solid #eee;
    }

    /* Header Chat */
    #chat-header {
        background: #D2691E;
        color: white;
        padding: 15px 20px;
        font-weight: bold;
        font-size: 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* Area Pesan (Scrollable) */
    #chat-messages {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
        background-color: #f8f9fa;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    /* Bubble Chat Bot */
    .msg-bot {
        align-self: flex-start;
        background: #ffffff;
        color: #333;
        padding: 10px 15px;
        border-radius: 15px 15px 15px 0;
        max-width: 85%;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        border: 1px solid #eee;
        line-height: 1.5;
    }

    /* Bubble Chat User */
    .msg-user {
        align-self: flex-end;
        background: #D2691E;
        color: white;
        padding: 10px 15px;
        border-radius: 15px 15px 0 15px;
        max-width: 85%;
        box-shadow: 0 2px 5px rgba(210, 105, 30, 0.3);
        line-height: 1.5;
    }

    /* Input Area */
    #chat-input-area {
        padding: 15px;
        background: white;
        border-top: 1px solid #f0f0f0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #user-input {
        flex: 1;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 25px;
        outline: none;
    }
    #user-input:focus { border-color: #D2691E; }

    .chat-action-btn {
        background: none; border: none; cursor: pointer; font-size: 20px; color: #666;
    }
    .chat-send-btn {
        background: #D2691E; color: white; border: none; 
        padding: 10px 15px; border-radius: 20px; cursor: pointer;
    }
</style>

<button id="chat-floating-btn" onclick="toggleChat()">💬</button>

<div id="chat-box">
    <div id="chat-header">
        <span>🍪 CS Delicious Cookies</span>
        <span onclick="toggleChat()" style="cursor:pointer; font-size: 18px;">✕</span>
    </div>
    
    <div id="chat-messages">
        <div class="msg-bot">
            Halo! Selamat datang di Delicious Cookies. 🍪<br>
            Ada yang bisa saya bantu? Mau tanya menu atau cek pesanan?
        </div>
    </div>

    <div id="chat-input-area">
        <label for="file-upload" class="chat-action-btn" title="Kirim Bukti Transfer">📎</label>
        <input type="file" id="file-upload" style="display: none;" accept="image/*">
        
        <input type="text" id="user-input" placeholder="Tulis pesan..." onkeypress="handleEnter(event)">
        
        <button class="chat-send-btn" onclick="sendMessage()">➤</button>
    </div>
</div>

<script>
    // Fungsi Buka/Tutup Chat
    function toggleChat() {
        const box = document.getElementById('chat-box');
        const btn = document.getElementById('chat-floating-btn');
        
        if (box.style.display === 'none' || box.style.display === '') {
            box.style.display = 'flex';
            btn.style.display = 'none'; // Sembunyikan tombol bulat saat chat terbuka
        } else {
            box.style.display = 'none';
            btn.style.display = 'block';
        }
    }

    // Fungsi Enter = Kirim
    function handleEnter(e) {
        if (e.key === 'Enter') sendMessage();
    }

    // Fungsi Kirim Pesan
    async function sendMessage() {
        const input = document.getElementById('user-input');
        const fileInput = document.getElementById('file-upload');
        const msgDiv = document.getElementById('chat-messages');
        
        const message = input.value.trim();
        const file = fileInput.files[0];

        // Validasi: Jangan kirim kalau kosong
        if (!message && !file) return;

        // 1. Tampilkan Pesan User di Layar
        let userHtml = `<div class="msg-user">`;
        if (file) {
            userHtml += `📁 <i>Mengirim gambar: ${file.name}</i><br>`;
        }
        userHtml += `${message}</div>`;
        msgDiv.innerHTML += userHtml;
        
        // Reset Input
        input.value = ''; 
        fileInput.value = ''; // Reset file input
        msgDiv.scrollTop = msgDiv.scrollHeight; // Auto scroll ke bawah

        // 2. Tampilkan Indikator Loading
        const loadId = 'loading-' + Date.now();
        msgDiv.innerHTML += `<div id="${loadId}" class="msg-bot" style="color:#888;"><i>Sedang mengetik...</i></div>`;
        msgDiv.scrollTop = msgDiv.scrollHeight;

        // 3. Persiapkan Data untuk Backend
        const formData = new FormData();
        formData.append('message', message); // Pastikan key ini sama dengan di Controller ($request->input('message'))
        formData.append('_token', "{{ csrf_token() }}"); // Wajib untuk Laravel
        if (file) {
            formData.append('payment_proof', file); // Key ini harus sama dengan Controller ($request->file('payment_proof'))
        }

        try {
            // 4. Kirim ke Route Laravel
            const response = await fetch("{{ route('chatbot.send') }}", {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();

            // 5. Hapus Loading & Tampilkan Balasan Bot
            document.getElementById(loadId).remove();
            
            // Ubah baris baru (\n) dari database/AI menjadi <br> HTML
            const replyFormatted = data.reply.replace(/\n/g, '<br>');
            
            msgDiv.innerHTML += `<div class="msg-bot">${replyFormatted}</div>`;
            msgDiv.scrollTop = msgDiv.scrollHeight;

        } catch (error) {
            document.getElementById(loadId).innerHTML = `<span style="color:red">Gagal mengirim pesan. Cek koneksi.</span>`;
            console.error(error);
        }
    }
</script>