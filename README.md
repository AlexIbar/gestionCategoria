
![Logo](https://www.redttu.edu.co/es/wp-content/uploads/2019/03/11.-IU-DIGITAL.png)

## Definición de la Actividad. Segunda Opción
## Gestion de Categorias y Posts 

API que permite la gestión de Categorías y Posts por parte 
de una serie de usuarios en función de roles específicos.

## Authors

- [@AlexIbar](https://github.com/AlexIbar)
Edwin Alexander Ibarra Ortiz - PREELEC2202PC-TDS0033 
- [@chechorios2008](https://github.com/chechorios2008)
Sergio Andres Rios Gomez - PREELEC2202PC-TDS0033


## Repositorio GitHub
[![portfolio](https://pythonforundergradengineers.com/posts/git/images/git_and_github_logo.png)](https://github.com/)
Enlace: https://github.com/AlexIbar/gestionCategoria.git

# Descripción de rutas

### Authentication
- POST: api/auth - Permite loguear un usuario
### Rol Controller
- GET: api/rol - Envia toda la información del controller
- GET: api/rol/id - Envia el ID del controller
- POST: api/rol - cambia el valor del rol
- PUT: api/rol/id - Reemplaza el rol por ID
- DELETE: api/rol/id - Elimina del rol creado por ID
### Categoria Controller
- GET: api/categoria - Envia toda la información de Categoria
- GET: api/categoria/id - Envia el ID de Categoria
- POST: api/categoria - cambia el valor de Categoria
- PUT: api/categoria/id - Reemplaza categoria por ID
- DELETE: api/categoria/id - Elimina del categoria por ID
### Usuario Controller
- GET: api/usuario - Envia toda la información de Usuario
- GET: api/usuario/id - Envia el ID de Usuario
- POST: api/usuario - cambia el valor de usuario
- PUT: api/usuario/id - Reemplaza usuario por ID
- DELETE: api/usuario/id - Elimina usuario por ID
### Post Controller
- GET: api/post - Envia toda la información del post
- GET: api/post/id - Envia el ID de post
- POST: api/post - cambia el valor de post
- PUT: api/post/id - Reemplaza post por ID
- DELETE: api/post/id - Elimina del post por ID

