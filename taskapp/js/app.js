// Valida que el documento esté listo
$(document).ready(function(){
    let editar = false;
    // Carga las tareas
    listarTareas();
    // Permanece onsecuritypolicyviolation, se muestra sólo si existen resultados
    $('#resultado-tareas').hide();

    // Buscar Tarea por nombre
    // Al ingresar algo en el input:search con id buscar
    $('#buscar').keyup(function(e){
        if($('#buscar').val()){
            let buscar = $('#buscar').val();
            // console.log(buscar);
            $.ajax({
                url: 'buscar.php',
                type:'POST',
                data: {buscar: buscar},
                success: function(response) {
                    // Almacena las tareas
                    let tareas = JSON.parse(response);
                    // Plantilla
                    let template = '';
                    tareas.forEach(tarea => {
                        template += `
                            <li>${tarea.nombre}</li>
                            <li>${tarea.descripcion}</li>
                        `;
                    });

                    $('#contenedor-tareas').html(template);
                    // Se muestra sólo si existen resultados
                    $('#resultado-tareas').show();
                }
            })
        }
        
    })

    // Guardar Tarea
    $('#formulario').submit(function(e){
        e.preventDefault();
        // Sweet Alert
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "La tarea ha sido guardada",
            showConfirmButton: false,
            timer: 1500
          });
        const postData = {
            nombre: $('#nombre').val(),
            descripcion: $('#descripcion').val(),
            id: $('#tareaId').val()
        };
        let url = editar === false ? 'agregar.php' : 'editar.php';
        console.log(url);
        $.post(url, postData, function(res){
            console.log(res);
            // Carga las tareas
            listarTareas();
            $('#formulario').trigger('reset');
        });
    })

    // Listar Tareas
    function listarTareas(){
        $.ajax({
            url: 'listar.php',
            type: 'GET',
            success: function(res){
                // console.log(res);
                // Almacena las tareas
                let tareas = JSON.parse(res);
                // Plantilla
                let template = '';
                tareas.forEach(tarea => {
                    template += `
                    <tr tareaId="${tarea.id}">
                        <td>${tarea.id}</td>
                        <td>${tarea.nombre}</td>
                        <td>${tarea.descripcion}</td>
                        <td>
                            <button class="editar-tarea btn btn-warning"> Editar
                            </button>

                            <button class="eliminar-tarea btn btn-danger"> Eliminar
                            </button>
                        </td>
                    </tr>
                    `;
                });
    
                $('#tabla-tareas-body').html(template);
            }
        })
    }

    listarTareas();

    // Editar Tarea 
    $(document).on('click', '.editar-tarea', function(){
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('tareaId');
        // console.log(id);
        $.post('editar-tarea.php', {id}, function(res){
            // console.log(res);
            const tarea = JSON.parse(res);
            console.log(tarea);
            $('#nombre').val(tarea.nombre);
            $('#descripcion').val(tarea.descripcion);
            $('#tareaId').val(tarea.id);
            editar = true;
            // Carga las tareas
            listarTareas();
        });
        // console.log(elemento);
     })

    // Eliminar Tarea 
    $(document).on('click', '.eliminar-tarea', function(){
        Swal.fire({
            title: "¿Estás seguro de continuar?",
            text: "¡La tarea ha sido eliminada!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar"
        }).then((result) => {
            if (result.isConfirmed) {
            Swal.fire({
                title: "¡Eliminado!",
                text: "La tarea ha sido eliminada.",
                icon: "success"
            });
            // Elimina la tarea con base al id 
            let elemento = $(this)[0].parentElement.parentElement;
            let id = $(elemento).attr('tareaId');
            // console.log(id);
            $.post('eliminar.php', {id}, function(res){
                console.log(res);
                // Carga las tareas
                listarTareas();
            });
            }
            
        });
        
        })
    
});