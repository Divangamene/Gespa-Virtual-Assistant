<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<title>Gespa Chat</title>

<style>

body{
    font-family: Arial;
    background:#f4f6f8;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

/* CHAT BOX */
#chat{
    width:360px;
    height:520px;
    background:white;
    border-radius:20px;
    box-shadow:0 20px 50px rgba(0,0,0,0.2);
    overflow:hidden;
    display:flex;
    flex-direction:column;
}

/* HEADER */
header{
    background:#0073aa;
    color:white;
    padding:12px;
    text-align:center;
}

/* BODY */
#body{
    flex:1;
    padding:10px;
    overflow-y:auto;
}

/* MSG */
.msg{
    padding:10px;
    margin:6px 0;
    border-radius:10px;
    max-width:80%;
}

.bot{background:#eee;}
.user{background:#0073aa;color:white;margin-left:auto;}

/* BUTTONS */
button{
    width:100%;
    margin:5px 0;
    padding:10px;
    border-radius:10px;
    border:2px solid #0073aa;
    background:white;
    cursor:pointer;
}

button:hover{background:#eaf4ff;}

</style>
</head>

<body>

<div id="chat">
    <header>Gespa Chat</header>
    <div id="body"></div>
</div>

<script>

const data = [
 {q:"Serviços", a:"Contabilidade e salários."},
 {q:"Valores", a:"Respeito e qualidade."},
 {q:"Consulta", a:"Sim, podes marcar reunião."},
 {q:"Empresas", a:"Trabalhamos com todas as empresas."}
];

const body = document.getElementById("body");

function start(){

    addBot("Olá 👋 Como posso ajudar?");

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
        addBot(item.a);
    }, 400);
}

function addBot(text){
    let div = document.createElement("div");
    div.className = "msg bot";
    div.innerHTML = text;
    body.appendChild(div);
}

function addUser(text){
    let div = document.createElement("div");
    div.className = "msg user";
    div.innerText = text;
    body.appendChild(div);
}

start();

</script>

</body>
</html>