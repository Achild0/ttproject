<!DOCTYPE html>
<html lang="fr">
    <?php include __DIR__.'/../mendatory/head.php'; ?>
    <body>
        <div class="container">
            <h2 class="text-align-center mb-3">Page d'administration</h2>
        </div>
        <div class="container">
            <h3>Catégories</h3>
            <div class="container p-2 mb-3 border">
                <label for="inputCateg" class="form-label">Créer une nouvelle catégorie</label>
                <input type="text" class="form-control" id="inputCateg" placeholder="Nom de la nouvelle catégorie" />
                <button id="catcreate" class="btn btn-primary mt-2">Créer</button>
            </div>
            <div class="container mb-3 p-2 border">
                <label for="listCateg" class="form-label">Modifier une catégorie</label>
                <select id="listCateg" class="form-select">
                    <?php
                        foreach($categs as $cat){
                            print('<option value="'.$cat["id"].'">'. $cat["nom"].'</option>');
                          }
                    ?>
                    <option value="0" selected>Choisir une catégorie</option>
                </select>
                <div class="mt-2">
                    <label for="nomcat">Nom catégorie</label>
                    <input type="text" id="nomcat" class="form-control" disabled="true" />
                </div>
                <div class="mt-2">
                    <button id="modifiycateg" class = "btn btn-primary">Modifier</button>
                </div>
            </div>
            <h3>Créer un Produit</h3>
            <div class="container p-2 border">
                <label class="form-label" for="nom-prod">Nom produit</label>
                <input type="text" class="form-control" id="nom-prod" placeholder="Nom du nouveau produit"/>
                <label class="form-label mt-2" for="categ-prod">Choisir sa catégorie</label>
                <select id="categ-prod" class="form-select">
                    <option value="0" selected>Choisir une catégorie</option>
                    <?php
                        foreach($categs as $cat){print('<option value="'.$cat["id"].'">'. $cat["nom"].'</option>');}
                    ?>
                </select>
                <label class="form-label" for="desc-prod">Description</label>
                <textarea type="text" class="form-control" id="desc-prod" placeholder="Entrez une description"></textarea>
                <label class="form-label" for="prix-prod">Prix</label>
                <input type="number" class="form-control" id="prix-prod" step="0.01" placeholder="0.00"/>
                <div class="card mt-3">
                    <div class="card-header"><strong>Envoi de photos</strong></div>
                    <div class="card-body">

                    <!-- Standart Form -->
                    <h4>Selectionner une image sur l'ordinateur</h4>
                    <div>
                        <div class="input-group">
                            <input class="form-control" type="file" id="js-upload-files" accept="image/*">
                            <button class="btn btn-sm btn-primary" id="js-upload-submit">Importer l'image</button>
                        </div>
                    </div>

                    <!-- Upload Finished -->
                    <div class="js-upload-finished mt-2">
                        <h3>Images prêtes pour l'upload :</h3>
                        <div class="container" id="file_job">
                        </div>
                    </div>
                    </div>
                </div>
                <h3>Visuel final :</h3>
                <div class="card col-2 m-2" id="preview_card" style="width: 15rem;">
                    <img id="img_demo" src="" height="180" width="130" class="card-img-top">
                    <div class="card-body">
                    <h4 class="card-title" id="prd_nom">Nom Produit</h4>
                    <h5 id="prd_prix">0.00€</h5>
                    <p class="card-text" id="prd_desc">Petite description rapide</p>
                    <div class="btn btn-success" disabled>Voir</div>
                    </div>
                </div>
                <button class="btn btn-primary mt-3" id="create_prodct">Créer le Produit</button>
            </div>
            <h3>Modifier un produit</h3>
            <div class="container mb-3 p-2 border">
                <label class="form-label" for="prd_mdfy_sel_cat">Choisir la categorie du produit à modifier</label>
                <select class="form-select" id="prd_mdfy_sel_cat">
                    <option selected>Choisir une catégorie</option>
                    <?php foreach($categs as $cat){print('<option value="'.$cat["id"].'">'. $cat["nom"].'</option>');} ?>
                </select>
                <label class="form-label" for="prd_mdfy_sel">Choisir le produit à modifier</label>
                <select class="form-select" id="prd_mdfy_sel" disabled="true">
                    <option selected>Choisir un produit</option>
                </select>
                <div id="mod_prod_div" class="container mt-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="prd_mdfy_val" checked>
                    <label class="form-check-label" for="prd_mdfy_val">Produit valide/actif</label>
                </div>
                    <label class="form-label" for="nom-mod-prod">Nom produit</label>
                    <input type="text" class="form-control" id="nom-mod-prod" placeholder="Nom du nouveau produit"/>
                    <label class="form-label mt-2" for="categ-mod-prod">Choisir sa catégorie</label>
                    <select id="categ-mod-prod" class="form-select" aria-label="Default select example">
                        <?php foreach($categs as $cat){print('<option value="'.$cat["id"].'">'. $cat["nom"].'</option>');} ?>
                    </select>
                    <label class="form-label" for="desc-mod-prod">Description</label>
                    <textarea type="text" class="form-control" id="desc-mod-prod" placeholder="Entrez une description"></textarea>
                    <label class="form-label" for="prix-mod-prod">Prix</label>
                    <input type="number" class="form-control" id="prix-mod-prod" step="0.01" placeholder="0.00"/>
                    <p class="mt-2">Photos liés au produit (cliquer sur une photo l'enlevera de celui-ci) :</p>
                    <div class="container" id="prd-image-viewer">

                    </div>
                    <div class="card mt-3">
                        <div class="card-header"><strong>Envoi de photos</strong></div>
                        <div class="card-body">
                        <h4>Selectionner une image sur l'ordinateur</h4>
                        <div>
                            <div class="input-group">
                                <input class="form-control" type="file" id="js-upload-files-mod" accept="image/*">
                                <button class="btn btn-sm btn-primary" id="js-upload-submit-mod">Importer l'image</button>
                            </div>
                        </div>

                        <div class="js-upload-finished mt-2">
                            <h3>Images prêtes pour l'upload :</h3>
                            <div class="container" id="file_job">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <button id="btn_modif_prd" class="btn btn-primary m-1">Modifier le produit</button>
                        <button id="btn_delete_prd" class="btn btn-danger m-1">Supprimer le produit</button>
                    </div>
            </div>
        </div>

        <script>

            $(document).ready(function(){

                var stoken = "<?php echo $_SESSION['csrf_token']; ?>"
              
                var dropZone = $("#drop-zone");
                var uploadForm = $('#js-upload-form');
                var imgtextupload = $('#js-upload-files')

                var uploadFormMody = $("#")
                var imgtextuploadMody = $("#")
                var files = new Array();
                var remfiles = new Array();

                var prd_nom = "";
                var prd_cat;
                var prd_prix;
                var prd_desc = "";

                var product_to_modify;

                $("#mod_prod_div").hide();

                function refreshFiles(){
                    $("#file_job").text("");
                    for (let i = 0;i < files.length;i++){
                        $("#file_job").append('<div class="m-1 btn btn-secondary upload_img" value="'+i+'">Upload '+files[i].name+' Prêt</div>');
                    }
                    $(".upload_img").click(function(){ 
                    r = files.splice($(this).attr("value"))
                    $(this).remove()
                })
                }

                function createProduct(){
                    console.log("prd_nom = "+ prd_nom)
                    console.log("prd_cat = "+ prd_cat)
                    console.log("prd_prix = "+ prd_prix)
                    console.log("prd_desc = "+ prd_desc)
                    console.log("files_length = "+ files.length)
                    if((prd_nom != "" && prd_nom != null) && (prd_cat != null && prd_cat != "0") && (prd_prix != null && prd_prix != "") && prd_desc != "" && files.length > 0){
                        var formdata = new FormData();
                        formdata.append('token',stoken);
                        formdata.append('type','product_creation');
                        formdata.append('name',sanitizeString(prd_nom));
                        formdata.append('categ',sanitizeString(prd_cat));
                        formdata.append('prix',sanitizeString(prd_prix));
                        formdata.append('desc',sanitizeString(prd_desc));

                        for (let i = 0;i < files.length; i++){
                            formdata.append('imgs[]',files[i], files[i].name)
                        }

                        $.ajax({
                            url: '/adm',
                            data: formdata,
                            processData: false,
                            contentType: false,
                            type: 'POST',
                            success: function(data){
                                alert("Produit crée avec succès !");
                            },
                            error: function(data){
                                alert("Echec lors de la création du produit. Merci de contacter Virgile Lesbats !");
                            }
                        });
                        
                    }else{
                        alert("Il manque des informations pour créer le produit");
                    }
                }

                function fetchCategProduct(cat){
                    $.post("/adm",
                    {
                        type: "product_get_by_categ",
                        token: stoken,
                        categ: cat
                    },
                    function(data, status){        
                        product_to_modify = data
                        for (key in data){
                            $("#prd_mdfy_sel").append('<option key="'+key+'" value="'+ data[key].id + '">'+ data[key].nom +'</option>')
                        }   
                    },"json")
                }

                function fetchProduct(){
                    $.post("/adm",
                    {
                        type: "product_get",
                        token: stoken,
                        product: pa
                    },
                    function(data, status){        
                        console.log("Réponse : " + data);
                    })
                }

                $("#js-upload-submit").click(function(){
                    if (document.getElementById("js-upload-files-mod").files[0] == null){
                        return
                    }
                    for (let i = 0;i < files.length; i++){
                        if (document.getElementById("js-upload-files-mod").files[0].name == files[i].name){
                            return
                        }
                    }
                    files.push(document.getElementById("js-upload-files-mod").files[0]);
                    refreshFiles();
                    $("#js-upload-files").val("");
                })

                $("#js-upload-submit-mod").click(function(){
                    if (document.getElementById("js-upload-files").files[0] == null){
                        return
                    }
                    for (let i = 0;i < files.length; i++){
                        if (document.getElementById("js-upload-files").files[0].name == files[i].name){
                            return
                        }
                    }
                    files.push(document.getElementById("js-upload-files").files[0]);
                    refreshFiles();
                    $("#js-upload-files-mod").val("");
                })

                $(".upload_img").click(function(){
                    console.log("click s")
                    r = files.splice($(this).attr("value"))
                    $(this).remove()
                })

                $("#listCateg").change(function(){
                    $("#nomcat").prop("disabled",false);
                })

                $("#nom-prod").change(function(){
                    prd_nom = $("#nom-prod").val();
                    $("#prd_nom").text(prd_nom);
                })

                $("#desc-prod").change(function(){
                    prd_desc = $("#desc-prod").val();
                    $("#prd_desc").text(prd_desc);
                })

                $("#prix-prod").change(function(){
                    prd_prix = $("#prix-prod").val();
                    $("#prd_prix").text(prd_prix + "€");
                })

                $("#categ-prod").change(function(){
                    console.log("Product cat changed");
                    console.log($("#categ-prod"));
                    prd_cat = $("#categ-prod").val();
                    console.log(prd_cat);
                })

                $("#create_prodct").click(function(){createProduct()});

                $("#prd_mdfy_sel_cat").change(function(){
                    $("#prd_mdfy_sel").prop("disabled",false);

                    fetchCategProduct($("#prd_mdfy_sel_cat").val());
                })

                $("#prd_mdfy_sel").change(function(){
                    files = new Array();
                    //console.log(product_to_modify);
                    var arrkey = $("#prd_mdfy_sel").find(":selected").attr("key");
                    //console.log(arrkey);
                    //console.log(product_to_modify[arrkey]);
                    if (product_to_modify[arrkey].valide === "OUI"){
                        $("#prd_mdfy_val").prop("checked",true);
                    }else{
                        $("#prd_mdfy_val").prop("checked",false);
                    };
                    //console.log("Val ok");
                    $("#nom-mod-prod").val(product_to_modify[arrkey].nom);
                    //console.log("Nom ok");
                    $("#categ-mod-prod").val(product_to_modify[arrkey].categorie);
                    //console.log("Cat ok");
                    $("#desc-mod-prod").text(product_to_modify[arrkey].description);
                    //console.log("Desc ok");
                    $("#prix-mod-prod").val(product_to_modify[arrkey].prix);
                    //console.log("Prix ok");
                    for(var i = 0;i < product_to_modify[arrkey].photos.length;i++){
                        $("#prd-image-viewer").append('<img pid="'+ product_to_modify[key].photos[i][1] +'" src="/'+product_to_modify[key].photos[i][0]+'" height="100" width="100" class="m-1 prd_image"/>');
                    }
                     //console.log("Images ok");
                    $("#mod_prod_div").show();
                    
                   $(".prd_image").click(function(){
                        for(var i = 0;i < product_to_modify[arrkey].photos.length;i++){
                            if (parseInt($(this).attr("pid")) == product_to_modify[arrkey].photos[i][1]){
                                var lostpic = product_to_modify[arrkey].photos.splice(i,1)
                                remfiles.push(lostpic[1]);
                            }
                            console.log(product_to_modify[arrkey].photos)
                        $(this).remove();
                        }
                    });

                    $("#btn_modif_prd").click(function(){
                        var formdata = new FormData();
                        formdata.append('token',stoken);
                        formdata.append('id',sanitizeString($("#prd_mdfy_sel").find(":selected").val()));
                        formdata.append('type','product_modify');
                        if ($("#prd_mdfy_val").prop("checked")){
                            formdata.append('valide',"OUI")
                        }else{
                            formdata.append('valide',"NON")
                        }
                        formdata.append('name',sanitizeString($("#nom-mod-prod").val()));
                        formdata.append('categ',sanitizeString($("#categ-mod-prod").val()));
                        formdata.append('prix',sanitizeString($("#prix-mod-prod").val()));
                        formdata.append('desc',sanitizeString($("#desc-mod-prod").text()));
                        formdata.append('delpic',remfiles);
                        for (let i = 0;i < files.length; i++){
                            formdata.append('imgs[]',files[i], files[i].name)
                        }

                        $.ajax({
                            url: '/adm',
                            data: formdata,
                            processData: false,
                            contentType: false,
                            type: 'POST',
                            success: function(data){
                                alert("Produit crée avec succès !");
                            },
                            error: function(data){
                                alert("Echec lors de la création du produit. Merci de contacter Virgile Lesbats !");
                            }
                        });
                    })
                });

            });
            </script>
    </body>
</html>