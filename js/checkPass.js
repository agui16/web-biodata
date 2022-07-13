let numSer = document.getElementById("checkId");
let pass = document.getElementById("checkPass");
let btn = document.getElementById("btn");
let btnSalir = document.getElementById("btn-salir");

btnSalir.addEventListener("click", () => {
  sessionStorage.clear();
  window.location.href = "../index.html";
});

btn.addEventListener("click", async (e) => {
  e.preventDefault();
  try {
    var data = { id: numSer.value };
    var response = await fetch("../php/checkPass.php", {
      method: "POST",
      body: JSON.stringify(data),
      headers: {
        "Content-Type": "application/json",
      },
    });
    var respuesta = await response.json();
    var passW = await respuesta;
    pass.value = passW;
  } catch (err) {
    console.log(err);
  }
});
