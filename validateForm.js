function validateForm(){
  let password = document.forms['signup_form']['password'].value;
  let password_2 = document.forms['signup_form']['password_2'].value;

  if(password != password_2){
    alert('Le password devono coincidere');
    return false;
  }
  return true;
}
