let container = document.getElementById("container-descargas");

async function verdescargas() {
  try {
    var response = await fetch("../php/descargas.php");

    var respuesta = await response.json();

    // Agregar descargas en la pagina
    respuesta.forEach((descarga) => {
      container.innerHTML += `<section class="manual">
        <div class="manual-left">
          <h3 class="manual-titulo">${descarga[1]}</h3>
          <p class="manual-resumen">
          ${descarga[2]}
          </p>
        </div>
        <div class="manual-right">
          <a class="manual-descarga" href="../downloads/descargas/${descarga[3]}" download>Descargar</a>
        </div>
      </section>`;
    });
  } catch (err) {
    container.innerHTML += `<p class="error-carga">Hubo un error al cargar la pagina, intente nuevamente en unos minutos</p>`;
  }
}

verdescargas();
