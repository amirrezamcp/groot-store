
let $ = document
let loginForm = $.querySelector('.login-Form')
let singUpForm = $.querySelector('.singUp-Form')
let singUpClick = $.querySelector('.singUp-Page')
let loginClick = $.querySelector('.login-Page')
let singUpBtn = $.querySelector('.singUp-Btn')
let eyeIcon = $.querySelectorAll('.eye-Icon')
let passwordInput = $.querySelectorAll('.password-Input')

let eyeIconClick = 0

eyeIcon.forEach(el => {
    el.addEventListener('click', function() {
        eyeIconClick ++ 
        if (eyeIconClick % 2 == 0)
            passwordInput.forEach(e => {
                e.setAttribute('type', 'password')
            });
        else
        passwordInput.forEach(e => {
            e.setAttribute('type', 'text')
        });
    })   
});

loginClick.addEventListener('click', function() {
    loginForm.style.display = 'flex'
    singUpForm.style.display = 'none'
})
singUpClick.addEventListener('click', function() {
    loginForm.style.display = 'none'
    singUpForm.style.display = 'flex'
})
singUpBtn.addEventListener('click', function() {
    singUpForm.submit()
    
})

