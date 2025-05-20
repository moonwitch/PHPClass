<div class="contact-wrapper">
    <div class="contact-info">
        <h3>Contactgegevens</h3>
        <div class="info-block">
            <h4>Adres</h4>
            <address>
                Zeis en Bijl<br>
                Groenstraat 123<br>
                3500 Hasselt<br>
                België
            </address>
        </div>

        <div class="info-block">
            <h4>Contact</h4>
            <p>Telefoon: <a href="tel:+32123456789">+32 123 45 67 89</a></p>
            <p>Email: <a href="mailto:info@zeisenbijl.be">info@zeisenbijl.be</a></p>
        </div>

        <div class="info-block">
            <h4>Openingsuren</h4>
            <p>Maandag - Vrijdag: 9:00 - 17:00</p>
            <p>Zaterdag: 10:00 - 15:00</p>
            <p>Zondag: Gesloten</p>
        </div>
    </div>

    <div class="contact-form">
        <?php if ($formSubmitted): ?>
            <div class="success-message">
                <h3>Bedankt voor uw bericht!</h3>
                <p>We nemen zo snel mogelijk contact met u op.</p>
            </div>
        <?php else: ?>
            <h3>Stuur ons een bericht</h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <label for="name">Naam</label>
                    <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    <?php if (isset($formErrors['name'])): ?>
                        <span class="error"><?php echo $formErrors['name']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    <?php if (isset($formErrors['email'])): ?>
                        <span class="error"><?php echo $formErrors['email']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="message">Bericht</label>
                    <textarea id="message" name="message" rows="5"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                    <?php if (isset($formErrors['message'])): ?>
                        <span class="error"><?php echo $formErrors['message']; ?></span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn-primary">Versturen</button>
            </form>
        <?php endif; ?>
    </div>
</div>