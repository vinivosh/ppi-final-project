export function navbarDin(isLogged,tipoDeUsuario) {
    console.log("chegou aqui")
    // let isLogged = "<?php echo json_encode($isLogged); ?>"
    // Modifica a navbar de acordo com o tipo de usuário logado
    if (isLogged){          
        console.log("esta logado")      
        if (tipoDeUsuario == 'medico'){
            console.log("Eh mdico")
            let apenasMedi = document.querySelectorAll('.apenasMedi')
            apenasMedi.forEach((item) => item.style.display = 'inline')
            apenasMedi = document.querySelectorAll('.apenasFunc')
            apenasMedi.forEach((item) => item.style.display = 'inline')
            console.log("Medico logado"+apenasMedi)
            
        }else if (tipoDeUsuario == 'funcionario'){
            console.log("Eh func")
            let apenasFunc = document.querySelectorAll('.apenasFunc')
            apenasFunc.forEach((item) => item.style.display = 'inline')
        }
    }
}