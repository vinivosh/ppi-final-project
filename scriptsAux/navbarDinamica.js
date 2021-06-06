export function navbarDin(isLogged,tipoDeUsuario) {
  // Modifica a navbar de acordo com se o usuário está logado ou não e com seu tipo de conta

  let apenasLoggedOff = document.querySelector('.apenasLoggedOff')
  apenasLoggedOff.style.display = 'inline'

  // if (isLogged){
  if (tipoDeUsuario == 'medico'){
    let apenasMedi = document.querySelectorAll('.apenasMedi')
    apenasMedi.forEach((item) => item.style.display = 'inline')
    apenasMedi = document.querySelectorAll('.apenasFunc')
    apenasMedi.forEach((item) => item.style.display = 'inline')

    apenasLoggedOff.style.display = 'none'
    
  }else if (tipoDeUsuario == 'funcionario'){
    let apenasFunc = document.querySelectorAll('.apenasFunc')
    apenasFunc.forEach((item) => item.style.display = 'inline')

    apenasLoggedOff.style.display = 'none'
  }
  // }
}