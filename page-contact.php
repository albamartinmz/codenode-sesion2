<?php
/**
 * Template Name: Contact
 * Description: Plantilla para la página de contacto
 */

get_header(); ?>

<main id="site-content">
  <div class="section-inner thin">

    <section class="contact-section">

      <?php
      if ($_SERVER["REQUEST_METHOD"] === "POST") {

          $nombre    = trim(htmlspecialchars($_POST["nombre"]    ?? ""));
          $apellidos = trim(htmlspecialchars($_POST["apellidos"] ?? ""));
          $email     = trim(htmlspecialchars($_POST["email"]     ?? ""));
          $telefono  = trim(htmlspecialchars($_POST["telefono"]  ?? ""));
          $mensaje   = trim(htmlspecialchars($_POST["mensaje"]   ?? ""));

          $errores = [];

          if (empty($nombre)) {
              $errores[] = "El nombre es obligatorio.";
          } elseif (!preg_match('/^[a-zA-ZàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞŸăşţĂŞŢčšžČŠŽćđžĆĐŽłńśźżŁŃŚŹŻőűŐŰ\s\-\']+$/u', $nombre)) {
              $errores[] = "El nombre solo puede contener letras.";
          }

          if (empty($apellidos)) {
              $errores[] = "Los apellidos son obligatorios.";
          } elseif (!preg_match('/^[a-zA-ZàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞŸăşţĂŞŢčšžČŠŽćđžĆĐŽłńśźżŁŃŚŹŻőűŐŰ\s\-\']+$/u', $apellidos)) {
              $errores[] = "Los apellidos solo pueden contener letras.";
          }

          if (empty($email)) {
              $errores[] = "El email es obligatorio.";
          } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $errores[] = "El formato del email no es válido.";
          }

          if (!empty($telefono) && !preg_match('/^[+0-9\s\-]{7,15}$/', $telefono)) {
              $errores[] = "El formato del teléfono no es válido.";
          }

          if (empty($mensaje)) {
              $errores[] = "El mensaje es obligatorio.";
          }

          if (!empty($errores)): ?>
            <div class="form-result error">
              <h3>✕ Hay errores en el formulario</h3>
              <ul>
                <?php foreach ($errores as $error): ?>
                  <li><?= $error ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php else: ?>
            <div class="form-result exito">
              <h3>✓ Formulario recibido</h3>
              <p>Gracias <strong><?= $nombre ?> <?= $apellidos ?></strong>, nos pondremos en contacto contigo pronto.</p>
            </div>
          <?php endif;

      } else { ?>

        <form action="" method="POST" novalidate>

          <fieldset>
            <legend>Datos personales</legend>

            <div class="form-group">
              <label for="nombre">Nombre *</label>
              <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required />
              <span class="field-error" id="error-nombre">Solo se permiten letras y espacios.</span>
            </div>

            <div class="form-group">
              <label for="apellidos">Apellidos *</label>
              <input type="text" id="apellidos" name="apellidos" placeholder="Tus apellidos" required />
              <span class="field-error" id="error-apellidos">Solo se permiten letras y espacios.</span>
            </div>

            <div class="form-group">
              <label for="email">Email *</label>
              <input type="email" id="email" name="email" placeholder="tucorreo@ejemplo.com" required />
              <span class="field-error" id="error-email">Introduce un email válido.</span>
            </div>

            <div class="form-group">
              <label for="telefono">Teléfono</label>
              <input type="tel" id="telefono" name="telefono" placeholder="+34 600 000 000" />
              <span class="field-error" id="error-telefono">Formato inválido.</span>
            </div>

          </fieldset>

          <fieldset>
            <legend>Tu mensaje</legend>

            <div class="form-group">
              <label for="mensaje">Mensaje *</label>
              <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje..." required></textarea>
              <span class="field-error" id="error-mensaje">El mensaje no puede estar vacío.</span>
            </div>

          </fieldset>

          <p class="required-note">* Campos obligatorios</p>

          <button type="submit">Enviar mensaje</button>

        </form>

      <?php } ?>

    </section>

  </div>
</main>

<?php get_footer(); ?>