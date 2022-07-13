let idSession = sessionStorage.getItem("numSer");
let passSession = sessionStorage.getItem("pass");
let manual = document.getElementById("manuales");
let barra = document.getElementById("spanManual");

async function controlLogin(id, pass) {
  try {
    var data = { id: id, pass: pass };
    var response = await fetch("../php/login.php", {
      method: "POST",
      body: JSON.stringify(data),
      headers: {
        "Content-Type": "application/json",
      },
    });
    // console.log(response);
    var respuesta = await response.json();

    if (respuesta.length === 0) {
      manual.style.display = "none";
      barra.style.display = "none";
    } else {
      manual.style.display = "inline";
      barra.style.display = "inline";
    }
  } catch (err) {
    console.log(err);
  }
}

if ((idSession == null) | (passSession == null)) {
  manual.style.display = "none";
  barra.style.display = "none";
} else if ((idSession != null) | (passSession != null)) {
  controlLogin(idSession, passSession);
}
