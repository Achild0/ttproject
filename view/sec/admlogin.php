<!DOCTYPE html>
<html lang="fr">
    <?php include __DIR__.'view/mendatory/head.php'; ?>
    <body>
        <section class="container mt-5">
            <div class="row g-3">
                <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden">Mot de passe</label>
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Mot de passe"/>
                </div>
                <div class="col-auto">
                    <button id="logBtn" type="button" onclick="sendPass()" class="btn btn-primary mb-3">Se Connecter</button>
                </div>
            </div>
        </section>
        <script>
            function sendPass(){
                var pa = sanitizeString($("#inputPassword2").val());
                var stoken = "<?php echo $_SESSION['csrf_token']; ?>"
                $.post("/login",
                {
                    type: "login",
                    token: stoken,
                    password: pa
                },
                function(data, status){        
                    console.log("Réponse : " + data);
                    if(status === "success"){
                        window.location.href = "/adm";
                    } else {
                        alert("Erreur : " + data);
                    }});
                }
        </script>
    </body>
</html>