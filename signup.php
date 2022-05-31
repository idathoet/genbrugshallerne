<?php 
    include_once 'header.php';
?>

    <section class="signup-form">
        <h2>Sign up</h2>
        <div class="signup-form-form">
         <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name...">
            <input type="text" name="email" placeholder="E-mail adresse...">
            <input type="text" name="phone" placeholder="Telefon nummer...">
            <input type="text" name="street" placeholder="Addresse...">
            <input type="text" name="city" placeholder="By...">
            <input type="text" name="uid" placeholder="Brugernavn...">
            <input type="password" name="pwd" placeholder="Kodeord...">
            <input type="password" name="pwdrepeat" placeholder="Gentag kodeord...">
            <button type="submit" name="submit">Sign up</button>
        </form>
      </div>
    </section>



<?php 
    include_once 'footer.php';
?>