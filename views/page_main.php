<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MVC - PHP</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
        <?php if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">'; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
    </head>
    <body>
        <header>
            <div class="p-3 d-flex justify-content-center" style="background-color: #EFFFE8">
                <span class="fs-4">Labdarúgás  - NB1 - WebProgramozás</span>
            </div>
            <div class="p-1 d-flex justify-content-left" style="background-color: green" id="user">
                <span class="fs-5 fst-italic fw-bolder"><?= $_SESSION['userlastname']." ".$_SESSION['userfirstname'] ?></span>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: green">
            <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="#navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                        <div class="collapse navbar-collapse" id="navbarColor02">
                            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
                    </div>
                </div>
            </div>
        </nav>
        <section class="container-md">
            <?php if($viewData['render']) include($viewData['render']);?>          
        </section>
        <footer>
            <div class="fixed-bottom text-bg-success p-3 d-flex justify-content-center">Copyright <?php echo date('Y'); ?> &copy; Labdarugo kft.</div>
        </footer>
    </body>
</html>
