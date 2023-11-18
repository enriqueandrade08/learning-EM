<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Cursos</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/cursos.css">
  </head>
  <body class="p-3 m-0 border-0 bd-example">

    
    
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Lección 1: Introducción a HTML
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <h5>1.1 Estructura básica de un documento HTML</h5>

              <p>Un documento HTML se compone de elementos HTML que se organizan en una estructura jerárquica. A continuación, se muestra la estructura básica de un documento HTML:
               
                <br><br>

                <!---
                &lt;!DOCTYPE html
                  <html>
                  <head>
                      <title>Título del documento</title>
                  </head>
                  <body>
                      Aquí va el contenido de la página 
                  </body>
                  </html>-->
                  
                  •	La etiqueta &lt;!DOCTYPE html&gt;: Define la versión de HTML utilizada, que en este caso es HTML5.
                  <br><br>
                  •	La etiqueta &lt;html&gt;: Envuelve todo el contenido del documento HTML.
                  <br><br>
                  •	La etiqueta &lt;head&gt;: Contiene información sobre el documento, como el título de la página que se muestra en la pestaña del navegador.
                  <br><br>
                  •	La etiqueta &lt;body&gt;: Contiene el contenido visible de la página.
              </p>

              <br>

              <h5>1.2 Etiquetas HTML</h5>

              <p>Las etiquetas HTML se utilizan para marcar y estructurar el contenido de una página web. Aquí tienes algunos ejemplos de etiquetas comunes:
                  <br><br>
                  •	&lt;h1&gt;, &lt;h2&gt;, &lt;h3&gt;, &lt;h4&gt;, &lt;h5&gt;, &lt;h6&gt;: Se utilizan para los encabezados, siendo &lt;h1&gt; el más importante y &lt;h6&gt; el menos importante.
                  <br><br>
                  •	&lt;p&gt;: Se utiliza para los párrafos de texto.
                  <br><br>
                  •	&lt;br&gt;: Se utiliza para insertar un salto de línea dentro de un párrafo.
                  <br><br>
                  •	&lt;strong&gt;: Se utiliza para resaltar o enfatizar un texto.
                  <br><br>
                  •	&lt;em&gt;: Se utiliza para dar énfasis o resaltar un texto de manera más sutil.
              </p>

          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Lección 2: Trabajando con enlaces e imágenes
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>En esta lección, aprenderemos cómo crear enlaces a otras páginas y cómo insertar imágenes en una página web.</p>
  
              <h5>2.1 Creación de enlaces</h5>

              <p>Los enlaces son fundamentales para la navegación web y permiten a los usuarios moverse entre diferentes páginas. Aquí tienes un ejemplo de cómo crear un enlace:

                &lt;a&gt; href="https://www.ejemplo.com">Enlace a Ejemplo.com&lt;/a&gt;
                  
                  •	La etiqueta &lt;a&gt; se utiliza para crear un enlace.
                  •	El atributo href específica la URL de destino del enlace.
                  •	El texto entre las etiquetas de apertura y cierre &lt;a&gt; es el texto visible que se convierte en el enlace.
              </p>

              <h5>2.2 Inserción de imágenes</h5>

              <p>Las imágenes son elementos visuales importantes en las páginas web. Para insertar una imagen, se utiliza la etiqueta &lt;img&gt; de la siguiente manera:

                &lt;img src="ruta_de_la_imagen.jpg" alt="Texto alternativo"&gt;
                  
                  •	El atributo src específica la ruta de la imagen.
                  •	El atributo alt proporciona un texto alternativo que se muestra si la imagen no puede cargarse o para usuarios con discapacidad visual.
              </p>

        </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Lección 3: Tablas y listas
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>En esta lección, aprenderemos cómo crear enlaces a otras páginas y cómo insertar imágenes en una página web.</p>
  
              <h5>2.1 Creación de enlaces</h5>

              <p>Los enlaces son fundamentales para la navegación web y permiten a los usuarios moverse entre diferentes páginas. Aquí tienes un ejemplo de cómo crear un enlace:

                &lt;a&gt; href="https://www.ejemplo.com">Enlace a Ejemplo.com&lt;/a&gt;
                  
                  •	La etiqueta &lt;a&gt; se utiliza para crear un enlace.
                  •	El atributo href específica la URL de destino del enlace.
                  •	El texto entre las etiquetas de apertura y cierre &lt;a&gt; es el texto visible que se convierte en el enlace.
              </p>

              <h5>2.2 Inserción de imágenes</h5>

              <p>Las imágenes son elementos visuales importantes en las páginas web. Para insertar una imagen, se utiliza la etiqueta &lt;img&gt; de la siguiente manera:

                &lt;img src="ruta_de_la_imagen.jpg" alt="Texto alternativo"&gt;
                  
                  •	El atributo src específica la ruta de la imagen.
                  •	El atributo alt proporciona un texto alternativo que se muestra si la imagen no puede cargarse o para usuarios con discapacidad visual.
              </p>

        </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Lección 4: Formularios y elementos de entrada
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>En esta lección, aprenderemos cómo crear enlaces a otras páginas y cómo insertar imágenes en una página web.</p>
  
              <h5>2.1 Creación de enlaces</h5>

              <p>Los enlaces son fundamentales para la navegación web y permiten a los usuarios moverse entre diferentes páginas. Aquí tienes un ejemplo de cómo crear un enlace:

                &lt;a&gt; href="https://www.ejemplo.com">Enlace a Ejemplo.com&lt;/a&gt;
                  
                  •	La etiqueta &lt;a&gt; se utiliza para crear un enlace.
                  •	El atributo href específica la URL de destino del enlace.
                  •	El texto entre las etiquetas de apertura y cierre &lt;a&gt; es el texto visible que se convierte en el enlace.
              </p>

              <h5>2.2 Inserción de imágenes</h5>

              <p>Las imágenes son elementos visuales importantes en las páginas web. Para insertar una imagen, se utiliza la etiqueta &lt;img&gt; de la siguiente manera:

                &lt;img src="ruta_de_la_imagen.jpg" alt="Texto alternativo"&gt;
                  
                  •	El atributo src específica la ruta de la imagen.
                  •	El atributo alt proporciona un texto alternativo que se muestra si la imagen no puede cargarse o para usuarios con discapacidad visual.
              </p>

        </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Lección 5: Introducción a CSS
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
          </div>
        </div>
      </div>
    </div>


    


    
    
  </body>
</html>

      

   <!--- <h2>Lección 1: Introducción a HTML</h2>

    <p>HTML (HyperText Markup Language) es el lenguaje estándar utilizado para crear y estructurar el contenido de las páginas web. 
        En esta lección, aprenderemos la estructura básica de un documento HTML y algunas etiquetas fundamentales.
    </p>
    
    <h3>1.1 Estructura básica de un documento HTML</h3>

    <p>Un documento HTML se compone de elementos HTML que se organizan en una estructura jerárquica. A continuación, se muestra la estructura básica de un documento HTML:

        <!DOCTYPE html>
        <html>
        <head>
            <title>Título del documento</title>
        </head>
        <body>
             Aquí va el contenido de la página 
        </body>
        </html>
        
        •	La etiqueta <!DOCTYPE html> define la versión de HTML utilizada, que en este caso es HTML5.
        •	La etiqueta <html> envuelve todo el contenido del documento HTML.
        •	La etiqueta <head> contiene información sobre el documento, como el título de la página que se muestra en la pestaña del navegador.
        •	La etiqueta <body> contiene el contenido visible de la página.
    </p>

    <h3>1.2 Etiquetas HTML</h3>

    <p>Las etiquetas HTML se utilizan para marcar y estructurar el contenido de una página web. Aquí tienes algunos ejemplos de etiquetas comunes:
        •	<h1>, <h2>, <h3>, <h4>, <h5>, <h6>: se utilizan para los encabezados, siendo <h1> el más importante y <h6> el menos importante.
        •	<p>: se utiliza para los párrafos de texto.
        •	<br>: se utiliza para insertar un salto de línea dentro de un párrafo.
        •	<strong>: se utiliza para resaltar o enfatizar un texto.
        •	<em>: se utiliza para dar énfasis o resaltar un texto de manera más sutil.
        
    </p>
    
    <h2>Lección 2: Trabajando con enlaces e imágenes</h2>

    <p>En esta lección, aprenderemos cómo crear enlaces a otras páginas y cómo insertar imágenes en una página web.</p>
  
    <h3>2.1 Creación de enlaces</h3>

    <p>Los enlaces son fundamentales para la navegación web y permiten a los usuarios moverse entre diferentes páginas. Aquí tienes un ejemplo de cómo crear un enlace:

        <a href="https://www.ejemplo.com">Enlace a Ejemplo.com</a>
        
        •	La etiqueta <a> se utiliza para crear un enlace.
        •	El atributo href específica la URL de destino del enlace.
        •	El texto entre las etiquetas de apertura y cierre <a> es el texto visible que se convierte en el enlace.
    </p>

    <h3>2.2 Inserción de imágenes</h3>

    <p>Las imágenes son elementos visuales importantes en las páginas web. Para insertar una imagen, se utiliza la etiqueta <img> de la siguiente manera:

        <img src="ruta_de_la_imagen.jpg" alt="Texto alternativo">
        
        •	El atributo src específica la ruta de la imagen.
        •	El atributo alt proporciona un texto alternativo que se muestra si la imagen no puede cargarse o para usuarios con discapacidad visual.
    </p>

    <h2>Lección 3: Tablas y listas</h2>

    <p>En esta lección, aprenderemos cómo utilizar tablas y listas para organizar y presentar datos en una página web.</p>

    <h3>3.1 Creación de tablas</h3>

    <p>Las tablas se utilizan para presentar datos en filas y columnas. Aquí tienes un ejemplo básico de cómo crear una tabla:

        <table>
            <tr>
                <th>Encabezado 1</th>
                <th>Encabezado 2</th>
            </tr>
            <tr>
                <td>Dato 1</td>
                <td>Dato 2</td>
            </tr>
        </table>
        
        •	La etiqueta <table> se utiliza para crear una tabla.
        •	La etiqueta <tr> se utiliza para crear filas en la tabla.
        •	La etiqueta <th> se utiliza para los encabezados de la tabla.
        •	La etiqueta <td> se utiliza para los datos de la tabla.
    </p>

    <h3>3.2 Creación de listas</h3>
    
    <p>Las listas se utilizan para presentar elementos en forma de lista, ya sea ordenada o no ordenada. Aquí tienes un ejemplo de cómo crear listas:

        <ul>
            <li>Elemento 1</li>
            <li>Elemento 2</li>
        </ul>
        
        <ol>
            <li>Elemento 1</li>
            <li>Elemento 2</li>
        </ol>
        
        •	La etiqueta <ul> se utiliza para crear una lista no ordenada (viñetas).
        •	La etiqueta <ol> se utiliza para crear una lista ordenada (números).
        •	La etiqueta <li> se utiliza para cada elemento de la lista.
        
    </p>

    <h2>Lección 4: Formularios y elementos de entrada</h2>

    <p>En esta lección, aprenderemos cómo crear formularios en HTML y utilizar elementos de entrada para recopilar información del usuario.

    </p>
    <h3>4.1 Creación de formularios</h3>

    <p>Los formularios son elementos interactivos que permiten a los usuarios enviar datos al servidor web. Aquí tienes un ejemplo básico de cómo crear un formulario:

        <form>
             Aquí van los elementos de entrada 
            <input type="text" name="nombre" placeholder="Nombre completo">
            <input type="email" name="correo" placeholder="correo@example.com">
            <input type="submit" value="Enviar">
        </form>
        
        •	La etiqueta <form> se utiliza para crear un formulario.
        •	Los elementos de entrada, como <input>, se utilizan para recopilar datos del usuario.
        •	El atributo type específica el tipo de entrada (texto, correo electrónico, etc.).
        •	El atributo name proporciona un nombre para el campo de entrada.
        •	El atributo placeholder muestra un texto de ejemplo dentro del campo de entrada.
    </p>

    <h3>4.2 Uso de elementos de entrada</h3>

    <p>Los elementos de entrada se utilizan para capturar diferentes tipos de datos del usuario. Aquí tienes algunos ejemplos:

        <input type="text" name="nombre" placeholder="Nombre completo">
        <input type="email" name="correo" placeholder="correo@example.com">
        <input type="password" name="contrasena" placeholder="Contraseña">
        <input type="checkbox" name="acepto" id="acepto">
        <label for="acepto">Acepto los términos y condiciones</label>
        
        •	<input type="text"> se utiliza para capturar texto.
        •	<input type="email"> se utiliza para capturar direcciones de correo electrónico.
        •	<input type="password"> se utiliza para capturar contraseñas.
        •	<input type="checkbox"> se utiliza para capturar opciones de selección múltiple.
        
    </p>

    <h2>Lección 5: Introducción a CSS</h2>

    <p>En esta lección, aprenderemos los conceptos básicos de CSS y cómo aplicar estilos a elementos HTML.</p>

    <h3>5.1 Conceptos básicos de CSS</h3>

    <p>CSS (Cascading Style Sheets) se utiliza para aplicar estilos y dar formato a los elementos HTML. Aquí tienes un ejemplo básico de cómo vincular un archivo CSS externo a un documento HTML:

        <!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" href="estilos.css">
        </head>
        <body>
             Aquí va el contenido de la página 
        </body>
        </html>
        
        •	La etiqueta <link> se utiliza para vincular un archivo CSS externo.
        •	El atributo rel específica la relación del archivo vinculado (hoja de estilos).
        •	El atributo href específica la ubicación del archivo CSS.
    </p>

    <h3>5.2 Selección de elementos y aplicación de estilos</h3>

    <p>En CSS, se utilizan selectores para seleccionar elementos HTML y aplicar estilos a ellos. Aquí tienes algunos ejemplos de selectores y propiedades de estilo:

        /* Selector de etiqueta */
        h1 {
            color: blue;
        }
        
        /* Selector de clase */
        .clase-ejemplo {
            font-size: 16px;
        }
        
        /* Selector de ID */
        #id-ejemplo {
            background-color: yellow;
        }
        
        /* Selector descendente */
        div p {
            font-weight: bold;
        }
        
        /* Selector de atributo */
        input[type="text"] {
            border: 1px solid black;
        }
        
        •	El selector de etiqueta selecciona todos los elementos con una etiqueta específica (por ejemplo, h1 selecciona todos los encabezados <h1>).
        •	El selector de clase selecciona elementos con una clase específica (por ejemplo, .clase-ejemplo selecciona elementos con la clase clase-ejemplo).
        •	El selector de ID selecciona un elemento con un ID específico (por ejemplo, #id-ejemplo selecciona el elemento con el ID id-ejemplo).
        •	El selector descendente selecciona elementos secundarios dentro de un elemento padre (por ejemplo, div p selecciona todos los párrafos <p> dentro de un elemento <div>).
        •	El selector de atributo selecciona elementos que tienen un atributo específico (por ejemplo, input[type="text"] selecciona todos los elementos de entrada de tipo texto).
    </p>

    <p>Las propiedades de estilo, como color, font-size, background-color y border, se utilizan para cambiar el aspecto de los elementos seleccionados.
        Estos son solo conceptos básicos de HTML y CSS. Hay muchos más elementos y propiedades que puedes explorar para crear páginas web más complejas y estilizadas.
    </p>


    <h1>Curso de Python</h1>

    <h2>Lección 1: Introducción a Python</h2>

    <h3>1.1 ¿Qué es Python?</h3>

    <h3>1.2 Características y ventajas de Python</h3>

    <h3>1.3 Casos de uso comunes de Python</h3>


    <h2>Lección 2: Variables y Tipos de Datos en Python</h2>

    <h3>2.1	Declarar y asignar valores a variables</h3>

    <h3>2.2	Tipos de datos en Python</h3>

    <h3>2.3	Obtener el tipo de dato de una variable</h3>
    
    <h3>2.4 Conversión de tipos de datos</h3>-->
    