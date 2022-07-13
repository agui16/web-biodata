let container = document.getElementById("container-novedades");

async function vernovedades() {
  try {
    var response = await fetch("php/novedades.php");

    var respuesta = await response.json();

    // Agregar novedades en la pagina
    respuesta.forEach((novedad) => {
      let boton = document.createElement("button");
      let contenedor = document.createElement("div");
      let texto = document.createElement("p");

      boton.className = "accordion";
      contenedor.className = "panel";

      boton.innerHTML = `${novedad[1]}`;
      texto.innerHTML = `${novedad[2]}`;
      contenedor.appendChild(texto);
      container.appendChild(boton);
      container.appendChild(contenedor);
    });

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  } catch (err) {
    container.innerHTML += `<p class="error-carga">Hubo un error al cargar la novedades, intente nuevamente en unos minutos</p>`;
  }
}

vernovedades();
