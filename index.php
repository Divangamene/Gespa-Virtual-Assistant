<?php
/*
Plugin Name: Gespa Chat Real Avatar
Version: 14.0
*/

add_action('wp_footer', function() {
?>

<!-- BOTÃO FLUTUANTE -->
<div id="gespa-fab" onclick="toggleChat()">
    <img src="<?php echo plugin_dir_url(__FILE__) . 'logo.jpeg'; ?>">
</div>

<!-- CHAT -->
<div id="gespa-chat">

    <div class="header">
        <img src="<?php echo plugin_dir_url(__FILE__) . 'logo.jpeg'; ?>">
        <div>
            <strong>Gespa</strong><br>
            <small>Assistente virtual</small>
        </div>
    </div>

    <div id="chat-body"></div>

</div>

<style>

/* Z-INDEX MÁXIMO */
#gespa-fab, #gespa-chat{
    z-index: 999999 !important;
}

/* BOTÃO FLUTUANTE */
#gespa-fab{
    position:fixed;
    bottom:20px;
    left:20px;
    width:65px;
    height:65px;
    border-radius:50%;
    overflow:hidden;
    cursor:pointer;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
    animation:pulse 2s infinite;
}

#gespa-fab img{
    width:100%;
    height:100%;
    object-fit:cover;
    border-radius:50%;
}

@keyframes pulse{
    0%{transform:scale(1)}
    50%{transform:scale(1.08)}
    100%{transform:scale(1)}
}

/* CHAT */
#gespa-chat{
    position:fixed;
    bottom:100px;
    left:20px;
    width:350px;
    height:520px;
    background:white;
    border-radius:20px;
    box-shadow:0 25px 50px rgba(0,0,0,0.3);
    font-family:Arial;
    overflow:hidden;

    opacity:0;
    transform:translateY(40px);
    transition:all .4s ease;
    pointer-events:none;
}

#gespa-chat.active{
    opacity:1;
    transform:translateY(0);
    pointer-events:auto;
}

/* HEADER */
.header{
    background:linear-gradient(135deg,#0073aa,#005f8d);
    color:white;
    padding:12px;
    display:flex;
    gap:10px;
    align-items:center;
}

.header img{
    width:40px;
    height:40px;
    border-radius:50%;
    object-fit:cover;
}

/* BODY */
#chat-body{
    padding:12px;
    height:calc(100% - 60px);
    overflow-y:auto;
}

/* MENSAGENS */
.msg{
    margin:8px 0;
    padding:10px;
    border-radius:12px;
    max-width:85%;
    animation:fade .3s ease;
}

.bot{background:#f1f5f9}
.user{background:#0073aa;color:white;margin-left:auto}

@keyframes fade{
    from{opacity:0; transform:translateY(10px)}
    to{opacity:1; transform:translateY(0)}
}

/* BOTÕES */
.q-btn{
    display:block;
    width:100%;
    margin:6px 0;
    padding:10px;
    border-radius:12px;
    border:2px solid #0073aa;
    background:white;
    color:#0073aa;
    cursor:pointer;
    text-align:left;
    transition:0.2s;
    outline:none !important;
    box-shadow:none !important;
}

.q-btn:hover{
    background:#eef7ff;
}

.q-btn.active{
    background:#0073aa;
    color:white;
}

</style>

<script>

const data = [
{
q:"Quais são os serviços da Gespensa?",
a:"Prestamos serviços de contabilidade e processamento de salários adaptados às necessidades de cada cliente."
},
{
q:"Quais são os valores da Gespensa?",
a:"Os nossos valores incluem respeito, compromisso com a qualidade e relações de confiança."
},
{
q:"Posso entrar em contato para uma consulta inicial?",
a:"Sim, estamos disponíveis para agendar uma consulta inicial."
},
{
q:"A Gespensa atende tanto empresas grandes como pequenas?",
a:"Sim, atendemos empresas de qualquer dimensão."
},
{
q:"Como posso saber mais sobre os serviços da Gespensa?",
a:"Pode consultar o nosso site ou entrar em contacto connosco."
}
];

let chatInitialized = false;

document.addEventListener("DOMContentLoaded", function(){
    // não abre automaticamente
});

function toggleChat(){

    const chat = document.getElementById("gespa-chat");
    chat.classList.toggle("active");

    if (!chatInitialized) {
        startChat();
        chatInitialized = true;
    }
}

function startChat(){

    addBot("Olá 👋 Sou a Gespa, assistente virtual da Gespensa. Em que posso ajudar?");

    let body = document.getElementById("chat-body");

    let container = document.createElement("div");

    data.forEach((item, index) => {

        let btn = document.createElement("button");
        btn.className = "q-btn";
        btn.innerText = item.q;

        btn.onclick = function(){
            responder(index, btn);
        };

        container.appendChild(btn);
    });

    body.appendChild(container);
}

function addBot(text){

    let body = document.getElementById("chat-body");

    let div = document.createElement("div");
    div.className = "msg bot";
    div.innerHTML = text;

    body.appendChild(div);
    body.scrollTop = body.scrollHeight;
}

function addUser(text){

    let body = document.getElementById("chat-body");

    let div = document.createElement("div");
    div.className = "msg user";
    div.innerText = text;

    body.appendChild(div);
    body.scrollTop = body.scrollHeight;
}

function responder(index, btn){

    let item = data[index];

    btn.classList.add("active");

    addUser(item.q);

    setTimeout(() => {
        addBot(
            item.a +
            "<br><br>📅 Caso não tenha ficado esclarecido,<br>" +
            "<a href='https://calendar.app.google/rUEH2jdLWfh8Jnt19' target='_blank'>👉 Marcar reunião</a>"
        );
    }, 400);

}

</script>

<?php
});