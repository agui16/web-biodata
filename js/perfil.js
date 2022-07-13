let pass = document.getElementById("pass");
let newPass = document.getElementById("newPass");
let numSer = sessionStorage.getItem("numSer");
let btn = document.getElementById("btn");

btn.addEventListener("click", async (e) => {
  e.preventDefault();
  try {
    var data = { id: numSer, pass: pass.value, newPass: newPass.value };
    var response = await fetch("../php/newPass.php", {
      method: "POST",
      body: JSON.stringify(data),
      headers: {
        "Content-Type": "application/json",
      },
    });
    var respuesta = await response.json();
    console.log(respuesta);
    pass.value = "";
    newPass.value = "";
    alert(respuesta);
    window.location.href = "profile.html";
  } catch (err) {
    console.log(err);
  }
});