function logoValidation(id) {
    var fileInput =document.getElementById(id);
    var filePath = fileInput.value;
  
    // Allowing file type
    var allowedExtensions = /(\.png|\.jpg)$/i;
    
    if (!allowedExtensions.exec(filePath)) {
        document.getElementById(id).classList.add('is-invalid');
        document.getElementById(id).classList.remove('is-valid');
        fileInput.value = '';
        return false;
    }else{
      document.getElementById(id).classList.add('is-valid');
      document.getElementById(id).classList.remove('is-invalid');
      return true;
    }
}

function cvValidation(id) {
    var fileInput =document.getElementById(id);
    var filePath = fileInput.value;
  
    // Allowing file type
    var allowedExtensions = /(\.pdf)$/i;
    
    if (!allowedExtensions.exec(filePath)) {
        document.getElementById(id).classList.add('is-invalid');
        document.getElementById(id).classList.remove('is-valid');
        fileInput.value = '';
        return false;
    }else{
      document.getElementById(id).classList.add('is-valid');
      document.getElementById(id).classList.remove('is-invalid');
      return true;
    }
}