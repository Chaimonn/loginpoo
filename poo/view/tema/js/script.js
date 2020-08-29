const url = "http://localhost/poo/"

function editar(id){
    const formula = document.querySelector("#formula")
    formula.style.display="block"

    const botaoeditar = document.querySelector("#botaoenviar")
    botaoeditar.onclick = function (){
        window.location.href = url+"usuario/editar/"+id+"!"+document.querySelector("#inputEmailTrocar").value+"!"+document.querySelector("#inputNomeTrocar").value
    }
}