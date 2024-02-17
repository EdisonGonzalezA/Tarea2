function init() {
  $("#form_sucursales").on("submit", (e) => {
    GuardarEditar(e);
  });
}

$().ready(() => {
  alert("hola");
  CargaLista();
});

var CargaLista = () => {
  var html = "";
  $.get(
    "../../controllers/sucursales.controller.php?op=todos",
    (ListaSucursales) => {
      ListaSucursales = JSON.parse(ListaSucursales);
      $.each(ListaSucursales, (index, sucursales) => {
        html += `<tr>
              <td>${index + 1}</td>
              <td>${sucursales.Nombre}</td>
              <td>${sucursales.Direccion}</td>
              <td>${sucursales.Telefono}</td>
              <td>${sucursales.Correo}</td>
              <td>${sucursales.Parroquia}</td>
              <td>${sucursales.Canton}</td>
              <td>${sucursales.Provincia}</td>
  <td>
  <button class='btn btn-primary' click='uno(${
    sucursales.SucursalId
  })'>Editar</button>
  <button class='btn btn-warning' click='eliminar(${
    sucursales.SucursalId
  })'>Eliminar</button>
              `;
      });
      $("#ListaSucursales").html(html);
    }
  );
};

var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioSucursales = new FormData($("#form_sucursales")[0]);
  var accion = "../../controllers/sucursales.controller.php?op=insertar";

  for (var pair of DatosFormularioSucursales.entries()) {
    console.log(pair[0] + ", " + pair[1]);
  }

  /**
   * if(SucursalId >0){editar   accion='ruta para editar'}
   * else
   * { accion = ruta para insertar}
   */
  $.ajax({
    url: accion,
    type: "post",
    data: DatosFormularioSucursales,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      if (respuesta == "ok") {
        alert("Se guardo con éxito");
        CargaLista();
        LimpiarCajas();
      } else {
        alert("no tu pendejada");
      }
    },
  });
};

var uno = () => {};
/*
var sucursales = () => {
  return new Promise((resolve, reject) => {
    var html = `<option value="0">Seleccione una opción</option>`;
    $.post(
      "../../controllers/sucursales.controllers.php?op=todos",
      async (ListaSucursales) => {
        ListaSucursales = JSON.parse(ListaSucursales);
        $.each(ListaSucursales, (index, sucursales) => {
          html += `<option value="${sucursales.SucursalId}">${sucursales.Nombre}</option>`;
        });
        await $("#SucursalId").html(html);
        resolve();
      }
    ).fail((error) => {
      reject(error);
    });
  });
};
*/
var eliminar = () => {};

var LimpiarCajas = () => {
  (document.getElementById("Nombre").value = ""),
    (document.getElementById("Direccion").value = ""),
    (document.getElementById("Telefono").value = ""),
    (document.getElementById("Correo").value = ""),
    (document.getElementById("Parroquia").value = ""),
    (document.getElementById("Canton").value = ""),
    (document.getElementById("Provincia").value = ""),
    $("#ModalSucursales").modal("hide");
};
init();
