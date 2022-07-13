let container = document.getElementById("container-manuales");

async function verManuales() {
  try {
    var response = await fetch("../php/notasTecnicas.php");

    var respuesta = await response.json();

    // Agregar manuales en la pagina
    respuesta.forEach((manual) => {
      container.innerHTML += `<section class="manual" id="container${manual[0]}">
        <div class="manual-left" id="manualtxt${manual[0]}">
          <h3 class="manual-titulo">${manual[1]}</h3>
          <p class="manual-resumen">
          ${manual[2]}
          </p>
        </div>
        <div class="manual-right">
          <a class="manual-descarga" href="../downloads/notasTecnicas/${manual[3]}" target="_blank">Descargar</a>
        </div>
      </section>`;
    });
  } catch (err) {
    container.innerHTML += `<p class="error-carga">Hubo un error al cargar la pagina, intente nuevamente en unos minutos</p>`;
  }
}

verManuales();
