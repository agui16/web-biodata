let mainContainer = document.getElementById("contenedorPrincipal");

async function verModulos() {
  try {
    var response = await fetch("../../php/modulos.php");

    var respuesta = await response.json();

    // Agregar modulos en la pagina
    respuesta.forEach((modulo) => {
      mainContainer.innerHTML += `<section class="manual" id="contenedor${modulo[0]}">
      <div class="manual-left" id="text${modulo[0]}">
        <h3 class="manual-titulo">${modulo[1]}</h3>
        <p class="manual-resumen">
        ${modulo[2]}
        </p>
      </div>
      <div class="manual-right">
        <button class="manual-descarga" id="${modulo[0]}">Ver mas</button>
      </div>
    </section>`;
    });
    funciones();
  } catch (err) {
    mainContainer.innerHTML += `<p class="error-carga">Hubo un error al cargar la pagina, intente nuevamente en unos minutos</p>`;
  }
}

verModulos();

//funciones

function funciones() {
  let boton = document.querySelectorAll(".manual-descarga");
  let contenedores = document.querySelectorAll(".manual");

  botonVerMas(contenedores);
  boton.forEach((buttn) => {
    buttn.addEventListener("click", (e) => {
      verMas(buttn);
    });
  });
}

// Pone o saca el boton ver mas segun si es necesario o no

function botonVerMas(cont) {
  cont.forEach((contenedorManual) => {
    if (contenedorManual.getBoundingClientRect().height < 49) {
      let contenedorId = contenedorManual.id;
      let idBoton;
      if (contenedorId.length > 11) {
        idBoton = contenedorId.substring(10, 12);
      } else {
        idBoton = contenedorId.substring(10, 11);
      }

      document.getElementById(idBoton).style.display = "none";
    }
  });
}

// Agranda la altura del contenedor en caso de que el texto sea mayor al contenedor

function verMas(btnPress) {
  let idBtn = btnPress.id;
  let btn = document.getElementById(idBtn);
  let container = document.getElementById("contenedor" + idBtn);
  let texto = document.getElementById("text" + idBtn);
  if (container.getBoundingClientRect().height > 80) {
    container.style.transition = "all .8s";
    container.style.maxHeight = "50px";
    btn.innerHTML = "Ver mas";
  } else {
    container.style.transition = "all 1s";
    let alto = texto.getBoundingClientRect().height + 30;
    container.style.maxHeight = alto + "px";
    btn.innerHTML = "Menos";
  }
}
