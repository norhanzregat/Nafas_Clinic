<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart Messaging Center - Nafas Clinic</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="sidebar-header">Chats</div>
    <div class="sidebar-guide">
      <b>Welcome!</b><br>
      Use the tabs to switch between doctors, support, and AI assistant. Search contacts below.
    </div>
    <div class="tabs">
      <div class="tab active" data-short="D" onclick="switchTab('doctors')"><i class="fa-solid fa-user-doctor"></i> Doctors</div>
      <div class="tab" data-short="S" onclick="switchTab('general')"><i class="fa-solid fa-headset"></i> Support</div>
      <div class="tab" data-short="A" onclick="switchTab('ai')"><i class="fa-solid fa-robot"></i> AI</div>
    </div>
    <div class="search-box">
      <input type="text" id="searchInput" placeholder="Search contact..." onkeyup="filterChats()">
      <div class="search-guide">Type a name to filter the list.</div>
    </div>
    <div class="chat-list" id="chat-list"></div>
  </div>

  <!-- Chat Area -->
  <div class="chat-area">
    <div class="chat-header" id="chat-header">
      Smart Messaging Center
      <span class="header-guide" id="header-guide">Select a chat to start.</span>
    </div>
    <div class="chat-messages" id="chat-messages"></div>
    <div class="chat-input">
      <input type="text" id="message-input" placeholder="Type your message...">
      <button title="Send" onclick="sendMessage()"><i class="fa-solid fa-paper-plane"></i></button>
      <button class="ai-btn" title="Ask AI" onclick="sendAI()"><i class="fa-solid fa-robot"></i></button>
      <span class="input-guide">Send your message or ask the AI assistant.</span>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    // Default chat data
    const chatData = {
      doctors: [
        { name: "Dr. Ahmed", icon: "fa-user-doctor" },
        { name: "Dr. Sarah", icon: "fa-user-doctor" },
        { name: "Dr. Khaled", icon: "fa-user-doctor" }
      ],
      general: [
        { name: "Technical Support", icon: "fa-headset" },
        { name: "Reception", icon: "fa-building" }
      ],
      ai: [
        { name: "AI Assistant", icon: "fa-robot" }
      ]
    };

    let currentTab = 'doctors';
    let currentChat = '';
    let chatHistory = {};

    const chatListDiv = document.getElementById("chat-list");
    const chatMessages = document.getElementById("chat-messages");
    const messageInput = document.getElementById("message-input");
    const headerGuide = document.getElementById("header-guide");
    const chatHeader = document.getElementById("chat-header");

    function renderChatList() {
      chatListDiv.innerHTML = "";
      const list = chatData[currentTab];
      list.forEach(item => {
        const div = document.createElement("div");
        div.className = "chat-item" + (currentChat === item.name ? " active" : "");
        div.innerHTML = `<i class="fa-solid ${item.icon}"></i> ${item.name}`;
        div.onclick = () => openChat(item.name);
        chatListDiv.appendChild(div);
      });
    }

    function switchTab(tab) {
      if (currentTab === tab) return;
      currentTab = tab;
      document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
      document.querySelectorAll('.tab')[["doctors","general","ai"].indexOf(tab)].classList.add('active');
      currentChat = '';
      renderChatList();
      chatMessages.innerHTML = "";
      chatHeader.innerHTML = tab === "doctors" ? "Doctors" :
                             tab === "general" ? "Support" : "AI Assistant";
      headerGuide.innerText = "Select a chat to start.";
    }

    function filterChats() {
      const val = document.getElementById("searchInput").value.trim().toLowerCase();
      Array.from(chatListDiv.children).forEach(div => {
        div.style.display = div.textContent.toLowerCase().includes(val) ? "" : "none";
      });
    }

    function openChat(name) {
      currentChat = name;
      renderChatList();
      chatHeader.innerHTML = `Chat with ${name} <span class="header-guide" id="header-guide">${getGuide(name)}</span>`;
      chatMessages.innerHTML = "";
      if (!chatHistory[name]) chatHistory[name] = [];
      chatHistory[name].forEach(msg => addMessage(msg.type, msg.text, false));
      if (chatHistory[name].length === 0) {
        addSystemMessage(`You are now chatting with <b>${name}</b>.`);
        if (name.startsWith("Dr.")) {
          addMessage("doctor", `Hello! I'm ${name}. How can I help you today?`);
          addMessage("system", "Tip: Please describe your symptoms or inquiry clearly.");
        } else if (name === "Technical Support" || name === "Reception") {
          addMessage("general", "Welcome to support. How can we assist you?");
        } else if (name === "AI Assistant") {
          addMessage("ai", "Hello! I'm here to answer your medical or general questions.");
        }
      }
    }

    function addMessage(type, text, save = true) {
      const div = document.createElement("div");
      div.className = "message " + type;
      div.innerHTML = text;
      chatMessages.appendChild(div);
      chatMessages.scrollTop = chatMessages.scrollHeight;
      if (save && currentChat) chatHistory[currentChat].push({ type, text });
    }

    function addSystemMessage(text) {
      addMessage("system", text);
    }

    function sendMessage() {
      const text = messageInput.value.trim();
      if (!text || !currentChat) return;
      addMessage("patient", text);
      chatHistory[currentChat].push({ type: "patient", text });
      messageInput.value = "";
      if (currentTab === "doctors") {
        setTimeout(() => addMessage("doctor", "Thank you for reaching out. You will get a reply soon."), 700);
      } else if (currentTab === "general") {
        setTimeout(() => addMessage("general", "Your message has been received. We will assist you shortly."), 700);
      }
    }

    function sendAI() {
      if (currentTab !== "ai" || currentChat !== "AI Assistant") {
        alert("Please open the AI Assistant chat first!");
        return;
      }
      const text = messageInput.value.trim();
      if (!text) return;
      addMessage("patient", text);
      chatHistory[currentChat].push({ type: "patient", text });
      messageInput.value = "";

      // Simple AI responses
      const isArabic = /[\u0600-\u06FF]/.test(text);
      let response = "";
      if (isArabic) {
        if (text.includes("موعد") || text.includes("الحجز")) {
          response = "🤖 يمكنك حجز أو تعديل موعدك من صفحة (مواعيدي).";
        } else if (text.includes("أعراض") || text.includes("عرَض")) {
          response = "🤖 إذا كان لديك حرارة مرتفعة أو ألم في الصدر أو صداع شديد، يُفضل مراجعة الطبيب فورًا.";
        } else if (text.includes("الدوام") || text.includes("ساعات")) {
          response = "🤖 ساعات العمل لدينا من الساعة 8 صباحًا حتى 6 مساءً، من الأحد إلى الخميس.";
        } else {
          response = "🤖 عذرًا، لا أملك إجابة حالياً.";
        }
      } else {
        if (text.toLowerCase().includes("appointment")) {
          response = "🤖 You can book or reschedule your appointment from the 'My Appointments' page.";
        } else if (text.toLowerCase().includes("symptom")) {
          response = "🤖 If you have high fever, chest pain, or severe headache, please visit a doctor immediately.";
        } else if (text.toLowerCase().includes("hours")) {
          response = "🤖 Our working hours are from 8 AM to 6 PM, Sunday to Thursday.";
        } else {
          response = "🤖 Sorry, I don’t have an answer.";
        }
      }

      setTimeout(() => addMessage("ai", response), 500);
    }

    // Helper for guides
    function getGuide(name) {
      if (name.startsWith("Dr.")) return "Doctor consultation chat.";
      if (name === "Technical Support") return "Support chat.";
      if (name === "Reception") return "Reception desk chat.";
      if (name === "AI Assistant") return "Ask AI anything.";
      return "";
    }

    // Initialize
    renderChatList();
  </script>
</body>
</html>
