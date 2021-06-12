function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    window.alert("Cambiando a modo Médico, por favor espere...");
    setTimeout(function(){window.location.href="HomeMedico.html";},1000);
  } else {
    window.alert("Cambiando a modo Paciente, por favor espere...");
    setTimeout(function(){window.location.href="Home.html";},1000);
  }
}