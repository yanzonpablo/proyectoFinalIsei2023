<?php
    require_once ('bd/conexion.php');
if (isset($_POST['submit'])) {
    
    $email = $_POST['email'];

    $query = $pdo->prepare('INSERT INTO newsletters (email) VALUES (:email)');
        
        $query->bindParam(':email', $email);

        $query->execute();
        $pdo-> null;
}
?>
<footer class="footer">
        <form action="" method="POST" class="footer-item ">
            <h2 class="footer-title">Contactanos</h2>
            <ul>
                <li> La Paz 1864, Rosario (2000) </li>
                <li> Tel: 0341-4808080 / 8081 </li>
                <li> E-mail: info@faatra.org.ar </li>
                <li><a href="www.faatra.org.ar" class="web">Web: www.faatra.org.ar</a></li>
            </ul>
        </form>
        <div class="footer-item redes">
            <h2 class="footer-title"> Redes Sociales </h2>
            <ul>
                <li><i class="fab fa-youtube"></i> Youtube
                <li><i class="fab fa-instagram"></i> Instagram
                <li><i class="fab fa-facebook"></i> facebook
                <li><i class="fab fa-linkedin"></i> Linkedin
            </ul>
        </div>
        <form class="footer-item newsletter" method="POST">
            <h2 class="footer-title"> Newsletter </h2>
            <ul class="news-input">
                <li>Recibí todas las novedades</li>
                <input type="email" class="input-news"  placeholder="Ingrese e-mail" name="email">
                <button type="submit" value="suscribirse" name="submit" class="btnNews">Suscribirse
            </ul>
</form>
        </form>
    </footer>