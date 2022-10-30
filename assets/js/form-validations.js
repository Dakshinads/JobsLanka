

(function () {
  var forms = document.querySelectorAll('.needs-validation');
 
  for (let form of forms) {
    form.addEventListener(
      'submit',
      function (event) {
        if (!form.checkValidity() || !checkPasswordConfirmation(form.querySelectorAll("input[type='password']")[0].id,
        form.querySelectorAll("input[type='password']")[1].id)) {
          
          event.preventDefault();
          event.stopPropagation();
        } 
          form.classList.add('was-validated');
        
      },
      false
    );
  }
})();

function checkPasswordConfirmation(pw1,pw2){
  var pw1v = document.getElementById(pw1).value;
  var pw2v = document.getElementById(pw2).value;

  if(pw1v !== pw2v){
    document.getElementById(pw2).classList.add('is-invalid');
    document.getElementById(pw2).classList.remove('is-valid');
    return false;
  }else{
    document.getElementById(pw2).classList.add('is-valid');
    document.getElementById(pw2).classList.remove('is-invalid');
    return true;
  }
}






