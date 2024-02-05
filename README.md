# REST API para Gestión de Productos y Categorías

## Description
Este documento describe la configuración y el uso de una API REST construida con PHP para la gestión de productos y categorías en una base de datos. La API ofrece funcionalidades para añadir, obtener, actualizar y eliminar productos y categorías, facilitando el manejo de estos datos en aplicaciones cliente.

# Table of Contents
- [Descripción](#descripción)
- [Configuración del Servidor](#configuración-del-servidor)
  - [Archivos y Dependencias](#archivos-y-dependencias)
  - [Configuración de CORS](#configuración-de-cors)
- [Servicios](#servicios)
  - [Productos](#productos)
    - [Obtener Todos los Productos](#obtener-todos-los-productos)
    - [Obtener Producto por ID](#obtener-producto-por-id)
    - [Insertar Producto](#insertar-producto)
    - [Actualizar Producto](#actualizar-producto)
    - [Eliminar Producto](#eliminar-producto)
  - [Categorías](#categorías)
    - [Obtener Todas las Categorías](#obtener-todas-las-categorías)
    - [Obtener Categoría por ID](#obtener-categoría-por-id)
    - [Insertar Categoría](#insertar-categoría)
    - [Actualizar Categoría](#actualizar-categoría)
    - [Eliminar Categoría](#eliminar-categoría)
- [Uso](#uso)
  - [Servidor](#servidor)
  - [Cliente](#cliente)
- [Depuración](#depuración)
- [Notas de Seguridad](#notas-de-seguridad)
- [Conclusión](#conclusión)


## Configuración del Servidor
### Archivos y Dependencias
- La API está construida con PHP puro, sin dependencias externas. Asegúrate de tener PHP instalado en tu servidor.
- Modelos (/app/models): Contienen la lógica para interactuar con la base de datos.
- Controladores (/app/controllers): Manejan las solicitudes entrantes y devuelven respuestas a través de la API.

### Configuración de CORS
Para permitir solicitudes de origen cruzado, es posible que necesites configurar los encabezados CORS en tu servidor o directamente en tus scripts PHP, dependiendo de tu entorno de alojamiento.

## Services
### Productos
- Obtener Todos los Productos

        GET /api/getAllProductos
    
- Obtener Producto por ID

        POST /api/getProductoById 
        con pro_id en el cuerpo de la solicitud.

- Insertar Producto

        POST /api/insertProducto 
        con los datos del producto en el cuerpo de la solicitud.

- Actualizar Producto

        POST /api/updateProducto 
        con los datos actualizados del producto en el cuerpo de la solicitud.
    
- Eliminar Producto
        
        POST /api/deleteProducto 
        con pro_id en el cuerpo de la solicitud.

### Categorías
- Obtener Todas las Categorías

        GET /api/getAllCategorias

- Obtener Categoría por ID

        POST /api/getCategoriaById 
        con cat_id en el cuerpo de la solicitud.

- Insertar Categoría

        POST /api/insertCategoria 
        con los datos de la categoría en el cuerpo de la solicitud.

- Actualizar Categoría

        POST /api/updateCategoria 
        con los datos actualizados de la categoría en el cuerpo de la solicitud.

- Eliminar Categoría

        POST /api/deleteCategoria 
        con cat_id en el cuerpo de la solicitud.

## Uso
### Servidor
Despliega los scripts PHP en tu servidor. Asegúrate de que la estructura de tu base de datos esté configurada según los modelos.
### Cliente
Los clientes pueden consumir la API enviando solicitudes HTTP a los endpoints definidos, utilizando herramientas como cURL, Postman o desde aplicaciones cliente construidas en cualquier tecnología que soporte llamadas HTTP.

## Depuración
Para depurar, puedes imprimir las solicitudes y respuestas en tus controladores o habilitar los logs de errores de PHP en tu servidor.

## Notas de Seguridad
Asegúrate de validar y sanear todas las entradas para prevenir inyecciones SQL.
Considera implementar autenticación y autorización para proteger tu API.

## Conclusión
Esta API REST ofrece una interfaz flexible y potente para la gestión de productos y categorías, permitiendo a los desarrolladores integrar y extender la funcionalidad según las necesidades de su aplicación.