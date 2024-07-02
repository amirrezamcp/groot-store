let $ = document
let errorTitle = $.querySelector('.error-Title').innerHTML
let errorDescription = $.querySelector('.error-Description')

if (errorTitle == '500') {
    errorDescription.innerHTMl = 'خطای سرور! لطفا صفحه را مجددا بار گزاری کنید.'
}
if (errorTitle == '401' || errorTitle == '403') {
    errorDescription.innerHTML = 'شما مجاز به بازدید از این صفحه نیستید!'
}
if (errorTitle == '400') {
    errorDescription.innerHTML = 'از پایدار بودن اتصال اینترنتتان مطمعن شوید!'
}
if (errorTitle == '404') {
    errorDescription.innerHTML = ' اطلاعات موجود نیست!'
}