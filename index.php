/*
Plugin Name: Gespa Chat Real Avatar
Version: 14.0
*/
add_action('wp_footer', function() {
    <div id="gespa-fab" onclick="toggleChat()">
    <img src="...">
</div>

<div id="gespa-chat">
    <div class="header">...</div>
    <div id="chat-body"></div>
</div>
#gespa-fab { animation: pulse 2s infinite; }
@keyframes pulse { ... }

#gespa-chat { border-radius, shadow, transition }
.header { gradient }
.msg { bot/user styles }
const data = [
  { q: "...", a: "..." }
];

function startChat() {
    addBot(...)
}

function addBot()
function addUser()