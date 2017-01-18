(function(window, undefined) {
  var dictionary = {
    "3454fcdd-d844-4118-8ca2-79e784c9d963": "Club-VisualizarClub",
    "c4b25d68-99db-47a6-beb2-c9e57be9cf1d": "Pasantes-Mostrar",
    "382ca640-0de4-4201-9667-e38d9d75483e": "Proyectos-Mostrar",
    "79fdfb4a-e56b-42ab-a819-f2a0406e66d0": "Estudiantes-AgregarEstudiante",
    "4b69c018-e8e2-49eb-be5c-4421f85da86a": "Colaboradores-VisualizarColaborador",
    "f167fc0d-ba33-4ee1-b951-9580698fe70b": "Voluntarios-AgregarVoluntario",
    "1265341e-c112-407c-9eaf-ecbb142c4870": "Profesor-AgregarProfesor",
    "54652830-6a41-42c5-a6c2-deb305d6c62e": "Colaboradores-AgregarColaborador",
    "4806e588-82b0-4165-9b40-79ab63e3e8c2": "Estudiantes-Mostrar",
    "c4787f18-1d83-4bfe-943c-4d90a7b4f660": "Estudiantes-VisualizarEstudiante",
    "6ebe3329-1d16-4754-ada3-4c94e53668f0": "Pasantes-VisualizarPasante",
    "53fce2b3-d0fc-4159-be33-5f3a415a0924": "Voluntarios-Mostrar",
    "3284ed89-d2d9-42c4-b6cf-5b5efb8788a1": "EmpresasSocias-AgregarEmpresa",
    "eabfde77-4b2c-4d00-8621-5df0069b5f46": "Proyectos-VisualizarProyecto",
    "0e814399-a19f-45c2-b3ab-9a6d8edb8cf2": "Colegio-AgregarColegio",
    "032d8f3a-19d2-464a-b27f-d2e5663edd99": "Colegios-Mostrar",
    "9578a960-ed23-424e-a128-8b12e0670488": "Proyectos-AgregarProyecto",
    "33b5b69f-a8ce-416e-a7d1-752bcfebb470": "Inicio",
    "f86434c1-bc31-48b9-9722-f8c992b69e16": "Profesores-Mostrar",
    "a14e6092-9e2c-438c-b8d8-1f219e040018": "Club-AgregarClub",
    "1ec5e3f3-ebf0-41c1-b0ac-1754effc5e0d": "EmpresasSocias-Mostrar",
    "f980a576-9a8f-4d0f-8a2a-f3fb030fb2a2": "Voluntarios-VisualizarVoluntario",
    "912da97e-37d1-457b-a315-1e24b59f31c3": "Club-Mostrar",
    "84306bee-7d62-420c-a5bb-105ee2183b75": "Colaboradores-Mostrar",
    "9c61ec3c-2458-4c5a-8134-eefc75685d8f": "Pasantes-AgregarPasante",
    "eede725e-bec1-4e5c-8826-7e4f769c23d4": "EmpresasSocias-VisualizarEmpresa",
    "9bbfe5e9-67f9-495a-8dfa-d4bebc36cc39": "Profesores-VisualizarProfesor",
    "8daee725-f36d-4866-ae75-3ab4fb8697c5": "Colegio-VisualizarColegio",
    "c4265c0b-762e-4caf-934d-36b991ca4b4d": "960 grid - 16 columns",
    "08342d30-eb93-485e-b91f-915c54d9e639": "960 grid - 12 columns",
    "9567cee6-e958-4e7c-80ba-bcab843915e7": "Template 1",
    "bb8abf58-f55e-472d-af05-a7d1bb0cc014": "default"
  };

  var uriRE = /^(\/#)?(screens|templates|masters|scenarios)\/(.*)(\.html)?/;
  window.lookUpURL = function(fragment) {
    var matches = uriRE.exec(fragment || "") || [],
        folder = matches[2] || "",
        canvas = matches[3] || "",
        name, url;
    if(dictionary.hasOwnProperty(canvas)) { /* search by name */
      url = folder + "/" + canvas;
    }
    return url;
  };

  window.lookUpName = function(fragment) {
    var matches = uriRE.exec(fragment || "") || [],
        folder = matches[2] || "",
        canvas = matches[3] || "",
        name, canvasName;
    if(dictionary.hasOwnProperty(canvas)) { /* search by name */
      canvasName = dictionary[canvas];
    }
    return canvasName;
  };
})(window);