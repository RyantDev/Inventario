



var secciones = [];
    var carrito = [];

    function openTab(evt, tabName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";

      if (tabName === 'productos') {
        mostrarProductos();
      } else if (tabName === 'editar') {
        mostrarSeccionesEditar();
      } else if (tabName === 'carrito') {
        calcularTotalCarrito();
      }
    }

    function mostrarSeccionesEditar() {
      var selectSeccion = document.getElementById('nuevo-producto-seccion');
      selectSeccion.innerHTML = '';
      secciones.forEach(function(seccion) {
        var option = document.createElement('option');
        option.value = seccion.nombre;
        option.textContent = seccion.nombre;
        selectSeccion.appendChild(option);
      });
    }

    function agregarNuevaSeccion() {
      var nuevaSeccionNombre = document.getElementById('nueva-seccion-nombre').value;
      var nuevaSeccion = {
        nombre: nuevaSeccionNombre,
        productos: []
      };
      secciones.push(nuevaSeccion);
      mostrarProductos();
    }

    function agregarNuevoProducto() {
      var nuevoProductoNombre = document.getElementById('nuevo-producto-nombre').value;
      var nuevoProductoPrecio = parseFloat(document.getElementById('nuevo-producto-precio').value);
      var nuevaSeccionNombre = document.getElementById('nuevo-producto-seccion').value;
      var nuevaImagen = document.getElementById('nuevo-producto-imagen').files[0];

      if (!isNaN(nuevoProductoPrecio) && nuevoProductoNombre && nuevaSeccionNombre && nuevaImagen) {
        var seccion = secciones.find(function(s) {
          return s.nombre === nuevaSeccionNombre;
        });
        if (seccion) {
          var reader = new FileReader();
          reader.onload = function(e) {
            var nuevoProducto = {
              nombre: nuevoProductoNombre,
              precio: nuevoProductoPrecio,
              imagen: e.target.result
            };
            seccion.productos.push(nuevoProducto);
            mostrarProductos();
          };
          reader.readAsDataURL(nuevaImagen);
        } else {
          alert('La sección especificada no existe.');
        }
      } else {
        alert('Por favor, complete todos los campos correctamente.');
      }
    }

    function agregarAlCarritoDesdeProductos(nombreProducto) {
      var producto = null;
      secciones.forEach(function(seccion) {
        var encontrado = seccion.productos.find(function(producto) {
          return producto.nombre === nombreProducto;
        });
        if (encontrado) {
          producto = encontrado;
        }
      });
      if (producto) {
        agregarAlCarrito(producto, 1);
      }
    }

    function agregarAlCarrito(producto, cantidad) {
      var itemExistente = carrito.find(item => item.producto.nombre === producto.nombre);
      if (itemExistente) {
        itemExistente.cantidad += cantidad;
      } else {
        carrito.push({ producto: producto, cantidad: cantidad });
      }
      mostrarCarrito();
    }

    function quitarDelCarrito(index) {
      carrito.splice(index, 1);
      mostrarCarrito();
    }

    function mostrarCarrito() {
      var listaCarrito = document.getElementById('lista-carrito');
      listaCarrito.innerHTML = '';
      carrito.forEach(function(item, index) {
        var li = document.createElement('li');
        var cantidad = item.cantidad;
        var producto = item.producto;
        li.textContent = `${cantidad}x ${producto.nombre} - $${producto.precio * cantidad}`;
        var botonEliminar = document.createElement('button');
        botonEliminar.textContent = 'Eliminar';
        botonEliminar.addEventListener('click', function() {
          quitarDelCarrito(index);
        });
        li.appendChild(botonEliminar);
        listaCarrito.appendChild(li);
      });
      calcularTotalCarrito();
    }

    function calcularTotalCarrito() {
      var total = 0;
      carrito.forEach(function(item) {
        total += item.producto.precio * item.cantidad;
      });
      document.getElementById('total').textContent = '$' + total.toFixed(2);
    }

    function mostrarProductos() {
      var listaSecciones = document.getElementById('lista-secciones');
      listaSecciones.innerHTML = '';
      secciones.forEach(function(seccion) {
        var divSeccion = document.createElement('div');
        divSeccion.innerHTML = '<h3>' + seccion.nombre + '</h3><ul id="lista-' + seccion.nombre.toLowerCase() + '"></ul>';
        listaSecciones.appendChild(divSeccion);
        mostrarProductosPorSeccion(seccion);
      });
    }

    function mostrarProductosPorSeccion(seccion) {
      var listaProductos = document.getElementById('lista-' + seccion.nombre.toLowerCase());
      listaProductos.innerHTML = '';
      seccion.productos.forEach(function(producto) {
        var li = document.createElement('li');
        li.textContent = producto.nombre + ' - $' + producto.precio;
        var imagen = document.createElement('img');
        imagen.src = producto.imagen;
        imagen.alt = producto.nombre;
        imagen.style.width = '50px'; // Ajusta el tamaño de la imagen según sea necesario
        li.appendChild(imagen);
        var botonAgregar = document.createElement('button');
        botonAgregar.textContent = 'Agregar al carrito';
        botonAgregar.addEventListener('click', function() {
          agregarAlCarrito(producto, 1);
        });
        li.appendChild(botonAgregar);
        listaProductos.appendChild(li);
      });
    }