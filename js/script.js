function trocarCor() {
    var clarobody = document.body;
    var navbar = document.querySelector(".nav-bar");
    var content = document.querySelectorAll(".content");

    if (document.body.classList.contains("claro")){ //MODO ESCURO
        clarobody.style.backgroundColor = "rgb(26, 25, 25)"; //Fundo
        navbar.style.backgroundColor = "rgb(45, 39, 63)";// navbar

        for (var i = 0; i < content.length; i++) {
            content[i].style.backgroundColor = "rgb(45, 39, 63)";//Cor das Navbar
        }

        document.body.classList.remove("claro");//adiciona a classe claro ao body
    }
    else{ // MODO CLARO -- SOCORRO TO A 2 HORAS FAZENDO ISSO
        clarobody.style.backgroundColor = "rgb(171, 154, 154)"; //Fundo
        navbar.style.backgroundColor = "rgb(110, 107, 107)";// navbar

        for (var i = 0; i < content.length; i++) {
            content[i].style.backgroundColor = "rgb(110, 107, 107)";//Cor das Navbar
        }
        document.body.classList.add("claro");//adiciona a classe claro ao body
    }
}   

function calcularG(){
    var m = document.getElementById("metros").value;
    var t = document.getElementById("tempo").value;

    if (t <= 0){
        document.getElementById('resultado').innerText = "O tempo tem que ser maior que zero!";

    }
    else{
        const G = (2 * m) / (t * t);
            document.getElementById('resultado').innerText = `Resultado: G = ${G.toFixed(2)} m/s²`;

    }
}
