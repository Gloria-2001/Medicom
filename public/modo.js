// Get the modal
var modal = document.getElementById("my-modal");
// Get the <span> element that closes the modal
var span = document.getElementById("close-span");
// Get the checkbox
var checkBox = document.getElementById("myCheck");

checkBox.addEventListener("click",myFunction,false);
  
function myFunction() {
  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    document.getElementById("text-head").innerHTML="ATENCIÓN";
    document.getElementById("text-modal").innerHTML ="Cambiando a modo Médico, por favor espere...";
    //The modal is display
    modal.style.display = "block";
    setTimeout(function(){window.location.href="HomeMedico.html";},2000);
  } else {
    document.getElementById("text-head").innerHTML="ATENCIÓN";
    document.getElementById("text-modal").innerHTML ="Cambiando a modo Paciente, por favor espere...";
    //The modal is display
    modal.style.display = "block";
    setTimeout(function(){window.location.href="index.html";},2000);
  }
}

span.addEventListener("click", e => {
  e.preventDefault();
  modal.style.display = "none";
})