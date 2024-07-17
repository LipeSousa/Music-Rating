<header>
        <div class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="avaliacao.php">Avaliações</a></li>
                <li><a href="musicoftheweek.php">Musica da Semana</a></li>
                    <div id="account-box">
                        <p><img src="img/username.png" width="30px" height="30px"><span>
                                <?php echo $_SESSION['name']; ?>
                            </span></p>
                        <p><img src="img/email.png" width="30px" height="30px"><span>
                                <?php echo $_SESSION['email']; ?>
                            </span></p>
                            <a href="logout.php" class="logout"><img src="img/logout.png" width="25px" height="25px"></a>
                    </div>
                    <a href="user.php"><img src="img/user-white.png" width="25px" height="25px"></a>
                </li>
            </ul>
        </div>
    </header>