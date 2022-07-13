const id = document.getElementById("id");
const pass = document.getElementById("pass");
const btn = document.getElementById("btn-login");
const err = document.getElementById("err");

// verDatos();

async function enviarForm() {
  if (id.value == "biodata" && pass.value == "erlen2020mayer") {
    sessionStorage.setItem("numSer", id.value);
    sessionStorage.setItem("pass", pass.value);
    window.location.href = "checkPass.html";
  } else {
    try {
      var data = { id: id.value, pass: pass.value };
      var response = await fetch("../php/login.php", {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
          "Content-Type": "application/json",
        },
      });
      // console.log(response);
      var respuesta = await response.json();
      console.log(respuesta);
      if (respuesta.length === 0) {
        id.style.borderColor = "red";
        pass.style.borderColor = "red";
      } else {
        id.style.borderColor = "#8ac597";
        pass.style.borderColor = "#8ac597";
        sessionStorage.setItem("numSer", id.value);
        sessionStorage.setItem("pass", pass.value);
        window.location.href = "profile.html";
      }
    } catch (err) {
      console.log(err);
    }
  }
}

btn.addEventListener("click", async () => {
  enviarForm();
});

pass.addEventListener("keypress", async (e) => {
  if (e.key == "Enter") {
    enviarForm();
  }
});
