<h2>Regisztráció</h2>
    <span class="fs-6 text-bg-danger rounded"><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?></span>
    <br><br>
    <form action="<?= SITE_ROOT ?>regisztral"  method="post">
        <input class="form-control" type="text" name="login" id="login" placeholder="Felhasználónév" title="Adjon meg egy felhasználónevet, ami minimum 5 karakterből kell álljon." required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+"><br>
        <input class="form-control" type="password" name="password" id="password" placeholder="Jelszó" title="Legalább egy számot, egy nagybetűt és minimum 8 karaktert kell tartalmazni a megadott jelszónak." required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br>
        <input class="form-control" type="text" name="veznev" id="veíznev" placeholder="Vezetéknév" title="Adjon meg a vezetéknevét." required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+"><br>
        <input class="form-control" type="text" name="utonev" id="utonev" placeholder="Keresztnév" title="Adjon meg a keresztnevét." required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+"><br>
        <input class="form-control" type="email" name="email" id="email" placeholder="E-mail cím" title="Adjon meg valós e-mail címet." required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
        <input class="btn btn-success" type="submit" value="Regisztráció">
    </form>