<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<title>Gespa Chat</title>

<style>

body{
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg,#e9f1ff,#f4f6f8);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

/* CHAT CONTAINER */
#chat{
    width:380px;
    height:600px;
    background:rgba(255,255,255,0.85);
    backdrop-filter: blur(10px);
    border-radius:25px;
    box-shadow:0 25px 60px rgba(0,0,0,0.15);
    overflow:hidden;
    display:flex;
    flex-direction:column;
}

/* HEADER */
header{
    background: linear-gradient(135deg,#0073aa,#00aaff);
    color:white;
    padding:14px;
    display:flex;
    align-items:center;
    gap:10px;
}

/* AVATAR */
.avatar{
    width:42px;
    height:42px;
    border-radius:50%;
    background: white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    color:#0073aa;
    box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

/* TITULO */
.title{
    font-size:16px;
    font-weight:bold;
}
.subtitle{
    font-size:12px;
    opacity:0.8;
}

/* BODY */
#body{
    flex:1;
    padding:12px;
    overflow-y:auto;
    display:flex;
    flex-direction:column;
    gap:8px;
}

/* MSG */
.msg{
    padding:10px 12px;
    border-radius:16px;
    max-width:80%;
    font-size:14px;
    animation: fade 0.3s ease;
}

.bot{
    background:#f1f5f9;
    align-self:flex-start;
}

.user{
    background:#0073aa;
    color:white;
    align-self:flex-end;
}

/* BOTÕES */
button{
    width:100%;
    padding:10px;
    margin-top:6px;
    border-radius:12px;
    border:1px solid #0073aa;
    background:white;
    cursor:pointer;
    transition:0.2s;
    font-weight:500;
}

button:hover{
    background:#0073aa;
    color:white;
}

/* ANIMAÇÃO */
@keyframes fade{
    from{opacity:0; transform:translateY(8px);}
    to{opacity:1; transform:translateY(0);}
}

</style>
</head>

<body>

<div id="chat">

    <header>
        <div class="avatar">G</div>
        <div>
            <div class="title">Gespa</div>
            <div class="subtitle">Assistente virtual</div>
        </div>
    </header>

    <div id="body"></div>

</div>

<script>

const data = [
 {q:"Serviços", a:"Contabilidade e processamento de salários para empresas."},
 {q:"Valores", a:"Trabalhamos com respeito, qualidade e confiança."},
 {q:"Consulta", a:"Sim, podes marcar uma consulta inicial connosco."},
 {q:"Empresas", a:"Atendemos empresas grandes e pequenas."}
];

const body = document.getElementById("body");

function start(){

    addBot("Olá 👋 Sou a Gespa. Como posso ajudar-te hoje?");

    data.forEach((item, i) => {

        let btn = document.createElement("button");
        btn.innerText = item.q;

        btn.onclick = () => responder(i);

        body.appendChild(btn);
    });
}

function responder(i){

    const item = data[i];

    addUser(item.q);

    setTimeout(() => {
        addBot(item.a + "<br><br>📅 <a href='https://calendar.app.google/rUEH2jdLWfh8Jnt19' target='_blank'>Marcar reunião</a>");
    }, 400);
}

function addBot(text){
    let div = document.createElement("div");
    div.className = "msg bot";
    div.innerHTML = text;
    body.appendChild(div);
    body.scrollTop = body.scrollHeight;
}

function addUser(text){
    let div = document.createElement("div");
    div.className = "msg user";
    div.innerText = text;
    body.appendChild(div);
    body.scrollTop = body.scrollHeight;
}

start();

</script>

</body>
</html>