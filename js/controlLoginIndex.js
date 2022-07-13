window.addEventListener("scroll", (e) => {
  if (
    document.documentElement.scrollTop >= 600 &&
    document.documentElement.scrollTop <= 1000
  ) {
    console.log(document.documentElement.scrollTop);
    document.getElementById("logo").style.width = "81%";
    if (window.matchMedia("(max-width: 992px)").matches) {
      document.getElementById("logo").style.width = "810px";
      document.getElementById("logo").style.height = "200px";
      if (window.matchMedia("(max-width: 768px)").matches) {
        document.getElementById("logo-container").style.display = "none";
      }
    }
  } else if (document.documentElement.scrollTop <= 400) {
    document.getElementById("logo").style.width = "0%";
  } else if (document.documentElement.scrollTop >= 1160) {
    document.getElementById("logo").style.width = "0%";
  }
  // console.log(document.documentElement.scrollTop);
});
let idSession = sessionStorage.getItem("numSer");
let passSession = sessionStorage.getItem("pass");
let manual = document.getElementById("manuales");
let barra = document.getElementById("spanManual");

async function controlLogin(id, pass) {
  try {
    var data = { id: id, pass: pass };
    var response = await fetch("php/login.php", {
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
