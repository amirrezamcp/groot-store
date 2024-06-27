let $ = document
let loginForm = $.querySelector('.login-Form')
let singUpForm = $.querySelector('.singUp-Form')
let singUpClick = $.querySelector('.singUp-Page')
let loginClick = $.querySelector('.login-Page')

loginClick.addEventListener('click', function() {
    loginForm.style.display = 'flex'
    singUpForm.style.display = 'none'
})
singUpClick.addEventListener('click', function() {
    loginForm.style.display = 'none'
    singUpForm.style.display = 'flex'
})
