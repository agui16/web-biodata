let container = document.getElementById("container-descargas");

async function verinterfases() {
  try {
    var response = await fetch("../php/interfases.php");

    var respuesta = await response.json();

    // Agregar descargas en la pagina
    respuesta.forEach((interfase) => {
      container.innerHTML += `<section class="manual interfase">
        <div class="manual-left ">
          <h3 class="manual-titulo">${interfase[0]}</h3>
        </div>
      </section>`;
    });
  } catch (err) {
    console.log(err);
    container.innerHTML += `<p class="error-carga">Hubo un error al cargar la pagina, intente nuevamente en unos minutos</p>`;
  }
}

verinterfases();
