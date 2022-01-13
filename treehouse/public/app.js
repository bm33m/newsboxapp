//
//app.js
//

var action = document.getElementById("formAction").value;
var lblName = document.getElementById("lblName");
var lblEmail = document.getElementById("lblEmail");

if(action == "true"){
  console.log("Errors: ", validation());
} else {
  console.log("Validate: ", action);
}

function validation() {
  var info = 0;
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  console.log("name: ", name);
  console.log("email: ", email);
  if(name.trim(" ") == ""){
    lblName.innerHTML = "name required.";
    lblName.style.color = "red";
    info += 1;
  }
  if(email.trim(" ") == ""){
    lblEmail.innerHTML = "email required.";
    lblEmail.style.color = "red";
    info += 1;
  }
  if(info > 0){
    console.log("name: ", name.trim(" "));
    console.log("email: ", email.trim(" "));
  }
  return info;
}
