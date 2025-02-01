const reacao = document.querySelectorAll(".boxReacao")

function clickRed() {
    if (reacao[0].style.backgroundColor == "red") {
        reacao[0].style.backgroundColor = "white"
    } else {
        reacao[0].style.backgroundColor = "red"
        reacao[0].style.transition = "1s"
    }
}

function clickBlue() {
    if (reacao[1].style.backgroundColor == "rgb(0, 89, 255)") {
        reacao[1].style.backgroundColor = "white"
    } else {
        reacao[1].style.backgroundColor = "rgb(0, 89, 255)"
        reacao[1].style.transition = "1s"
    }
}

function clickGreen() {
    if (reacao[2].style.backgroundColor == "rgb(0, 153, 21)") {
        reacao[2].style.backgroundColor = "white"
    } else {
        reacao[2].style.backgroundColor = "rgb(0, 153, 21)"
        reacao[2].style.transition = "1s"
    }
}

function clickYellow() {
    if (reacao[3].style.backgroundColor == "rgb(255, 187, 0)") {
        reacao[3].style.backgroundColor = "white"
    } else {
        reacao[3].style.backgroundColor = "rgb(255, 187, 0)"
        reacao[3].style.transition = "1s"
    }
}


var navbar = document.querySelector('.navbar')
var rodape = document.querySelector('.rodape')
var contRelatos = document.querySelector('.ContainerRelatos')
var form = document.querySelector('.containerForm')
var body = document.querySelector('body')



function formRelatos() {
    navbar.style.display = "none"
    rodape.style.display = "none"
    contRelatos.style.display = "none"
    form.style.display = "block"
    body.style.height = "100vh"
}

function formRelatosclose() {
    navbar.style.display = ""
    rodape.style.display = ""
    contRelatos.style.display = ""
    form.style.display = "none"
}

