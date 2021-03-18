<?php require_once('partials/header.inc');?>

            <div >

                <h1 class="text-center mt-4 mb-5">Formulaire de contact</h1>
                <div class="row">
                    <div class="col-4 offset-2 border border-dark rounded p-3">
                        <form action="/ma-page-de-traitement" method="post">

                            <div>
                                <label for="nom" class="form-label">Nom :</label>
                                <input type="text" class="form-control" id="nom" name="user_name" />
                            </div>
                            <div>
                                <label for="prenom" class="form-label">Prénom :</label>
                                <input type="text" class="form-control" id="prenom" name="user_name" />
                            </div>
                            <div>
                                <label for="mail" class="form-label">E-mail :</label>
                                <input type="email" class="form-control" id="mail" name="user_mail" />
                            </div>
                            <div>
                                <label for="msg" class="form-label">Message :</label>
                                <textarea id="msg" class="form-control" name="user_message"></textarea>
                            </div>
                            <button class="btn btn-dark mt-3 col-12" type="submit">Envoyer le message</button>
                        </form>
                    </div>

                    <div class="text-center col-4  rounded ms-2 mt-4 p-3">
                        <h3>Bajazet Kevin</h3>
                        <p>Résidence les bords du lac <br /> 91080 Evry-Courcouronnes</p>
                        <div class="tel"><a href="tel:+33682429132" class="text-dark">
                            <img src="assets/images/iphone.png" alt="phone" />
                            <p> 06 82 42 91 32</p>
                        </a></div>
                        <div class="mail"><a href="mailto:kevin.baj@gmail.com" class="text-dark"><img src="assets/images/email.png" alt="email" />
                            <p> kevin.baj@gmail.com</p>
                        </a></div>
                    </div>
                </div>
                <div class="text-center mt-5 mb-5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41629.37866061079!2d2.3966559994225274!3d48.60680543631021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e5de728acdadfd%3A0x40b82c3688b47b0!2sCourcouronnes%2C%2091080%20%C3%89vry-Courcouronnes!5e0!3m2!1sfr!2sfr!4v1606398147551!5m2!1sfr!2sfr"
                        width="990" height="600" frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>

            </div>
<?php require_once('partials/footer.inc');?>
