<?php
require_once 'config.php';

include "header.php";

echo "<h2 class='mb-3'>Listado de productos</h2><br>";
$consulta = "SELECT * FROM productos";
$stmt = $pdo->prepare($consulta);

$stmt->execute();

echo "<table class='table table-striped table-bordered'>";
echo "<thead>
      <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Stock</th>
      <th>Acciones</th>
      </tr>
      <thead>
      <tbody class='table-group-divider'>";
$resultados = $stmt->fetchAll();
foreach ($resultados as $producto){
  echo "<tr>";
  echo "<td>{$producto['id']}</td>";
  echo "<td>{$producto['Nombre']}</td>";
  echo "<td>{$producto['Precio']}</td>";
  echo "<td>{$producto['Stock']}</td>";
 
  echo "<td>";
  echo "<a href='editar.php?id={$producto['id']}'class='btn btn-sm btn-warning'>✏️ Editar</a>"; 

  echo "<button type='button' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirmDeleteModal' data-id='"
  . $producto['id']
  ."'>🗑️ Eliminar</button>"; 
  // aquí lo que importa es data-bs-target=#confirmDeleteModal, esto tiene que ser igual que en el id del modal.
  // le pasamos el id del producto a través del atributo data-id que lo creo yo así, pero tiene que 
  // empezar por data-   

  echo "</td>";

  echo "</tr>";

}
echo "</tbody>
      </table>";
?>
<!-- Modal Confirmar Borrado -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="eliminar.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteLabel">Confirmar borrado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          ¿Seguro que deseas eliminar este producto?
          <input type="hidden" name="id" id="deleteProductId" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Código Javascript para el modal -->
<script>
const confirmDeleteModal = document.getElementById('confirmDeleteModal');

confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
  const button = event.relatedTarget; // Botón que disparó el modal
  const idProducto = button.getAttribute('data-id'); // Obtener id del producto del atributo personalizado en el botón
  const inputId = confirmDeleteModal.querySelector('#deleteProductId'); // Input oculto que hemos puesto en el modal
  inputId.value = idProducto; // Pasar el id al input
});
</script>



<?php include 'footer.php';?>