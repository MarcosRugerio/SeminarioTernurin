<!--foother-->
<style>
  .footer-bg {
  background-color: #cce3c0;
}

.text-green {
  color: #2e5339;
  font-family: 'Helvetica', sans-serif;
  font-size: 0.9rem;
}

.footer-title {
  color: #4a7c59;
  font-family: 'Playfair Display', serif;
  font-size: 1.2rem;
  margin-bottom: 1rem;
  position: relative;
}

.footer-title::after {
  content: "";
  display: block;
  width: 40px;
  height: 2px;
  background-color: #4a7c59;
  margin-top: 6px;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 8px;
}

.footer-links a {
  color: #2e5339;
  text-decoration: none;
  transition: color 0.3s ease;
  display: inline-block;
}

.footer-links a:hover {
  color: #000;
  transform: translateX(2px);
}

.footer-text {
  margin-top: 10px;
  font-size: 0.85rem;
}

.footer-socials a {
  display: inline-block;
  margin-right: 10px;
  transition: transform 0.3s ease;
}

.footer-socials img {
  width: 32px;
  height: 32px;
  border-radius: 6px;
  transition: filter 0.3s ease, transform 0.3s ease;
}

.footer-socials a:hover img {
  filter: brightness(1.2);
  transform: scale(1.1);
}

.footer-divider {
  border-top: 2px solid #8c6f54;
  opacity: 0.7;
  margin-top: 30px;
}

/* Responsivo */
@media (max-width: 576px) {
  .footer-title {
    text-align: center;
  }

  .footer-links li,
  .footer-text,
  .footer-socials {
    text-align: center;
  }

  .footer-socials a {
    margin: 0 8px;
  }
}

  </style>


<footer class="footer-bg text-green">
  <div class="container py-5">
    <div class="row gy-4">
      <!-- Ubicación -->
      <div class="col-12 col-md-5">
        <h5 class="footer-title">Ubicación</h5>
        <iframe
          src="https://www.google.com/maps/embed?pb=..."
          width="100%" height="200"
          style="border:0; border-radius: 10px;" loading="lazy">
        </iframe>
        <p class="footer-text">Yerbabuena 6, 54694 Santa Teresa, Méx.</p>
      </div>

      <!-- Más información -->
      <div class="col-6 col-md-2">
        <h5 class="footer-title">Más información</h5>
        <ul class="footer-links">
          <li><a href="conocenos.php">Conócenos</a></li>
          <li><a href="terminosYcondiciones.php">Términos y condiciones</a></li>
          <li><a href="avisoPrivacidad.php">Aviso de privacidad</a></li>
        </ul>
      </div>

      <!-- Contacto -->
      <div class="col-6 col-md-2">
        <h5 class="footer-title">Contáctanos</h5>
        <ul class="footer-links">
          <li>Email</li>
          <li><a href="mailto:almarazaraceli777@gmail.com">almarazaraceli777@gmail.com</a></li>
          <li>WhatsApp</li>
          <li><a href="https://wa.me/525512603194">55-1260-3194</a></li>
        </ul>
      </div>

      <!-- Redes sociales -->
      <div class="col-12 col-md-3">
        <h5 class="footer-title">Síguenos</h5>
        <div class="footer-socials">
          <a href="#"><img src="img/facebook.png" alt="Facebook"></a>
          <a href="#"><img src="img/instagram.png" alt="Instagram"></a>
          <a href="#"><img src="img/whatsapp.png" alt="WhatsApp"></a>
        </div>
      </div>
    </div>

    <hr class="footer-divider">

    <div class="text-center mt-3">
      <h6>&copy; Hecho en México, todos los derechos reservados.</h6>
    </div>
  </div>
</footer>

