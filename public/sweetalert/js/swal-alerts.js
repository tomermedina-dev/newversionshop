function swalWentWrong(error) {
  if(error){
    console.log(error);
  }
  Swal.fire({
    icon: 'error',
    title: 'Oops... Something went wrong.',
    text:  'Please contact the web admin.',
            // footer: '<a href>Why do I have this issue?</a>'
    })
}


function swalLoading(message) {
    let timerInterval
    swal.fire({
        title: '',
        html: '<div class="nv-swal-message-holder"><h5>'+message+'</h5></div>',

        onBeforeOpen: function()  {

            Swal.showLoading()
        },
        allowOutsideClick : false
    }).then(function(response) {})
}
function swalError(message) {
    Swal.fire({
        icon : 'error' ,
        title: '',
        html: '<div class="nv-swal-message-holder"><h5>'+message+'</h5></div>',
    })
}
function swalSuccess(message) {
    Swal.fire({
        icon : 'success' ,
        title: '',
        html: '<div class="nv-swal-message-holder"><h5>'+message+'</h5></div>',
    })
}
function swalWarning(message) {
    Swal.fire({
        icon : 'warning' ,
        title: '',
        html: '<div class="nv-swal-message-holder"><h5>'+message+'</h5></div>',
    })
}
