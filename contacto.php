<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/logoCapacitacion.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACTO</title>
    <link rel="stylesheet" href="css/contacto.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>

      <?php require_once('nav.php') ?>

<div class="linea"></div>
  <section id="contact">
      <div class="contact">
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3347.5747421146684!2d-60.6557552248596!3d-32.96223527267521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1b18c5ab6d56641%3A0x83681549be38c21!2sFAATRA%20-%20Federaci%C3%B3n%20Argentina%20de%20Asociaciones%20de%20Talleres%20Reparaciones%20de%20Automotores%20y%20Afines!5e0!3m2!1ses!2sar!4v1687352791980!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contact-cont">
          <div class="contact-head">
            <h1>CONTACTO</h1>
          </div>
          <div class="contact-form">
            <form action="mailto:xxxx@xxxxx.com" method="post">
              <div class="cf cf-name">
                <label for="name">NOMBRE</label>
                <input type="text" name="name" id="cf-name" />
              </div>
              <div class="cf cf-mail-add">
                <label for="name">E-MAIL</label>
                <input type="email" name="email" id="cf-email" />
              </div>
              <div class="cf cf-subject">
                <label for="name">ASUNTO</label>
                <input type="text" name="name" id="cf-subject" />
              </div>
              <div class="cf cf-message">
                <label for="name">MENSAJE</label>
                <textarea
                  name="message"
                  id="cf-message"
                  cols="30"
                  rows="10"
                ></textarea>
              </div>
              <div class="cf btn-cf">
                <button class="cf-btn" type="submit">ENVIAR</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <div class="linea"></div>
    <footer>
    <?php include_once ('footer.php'); ?>
    </footer>
</body>
</html>
