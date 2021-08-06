<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["name"]) || !isset($_SESSION["class"]) || !isset($_SESSION["race"]) || !isset($_SESSION["origin"]) || !isset($_SESSION["divinity"])){
        header("Location: index.php");
        exit();
    }
    ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="../images/verumlogo.png">
   <link rel="stylesheet" href="../normalize.css">
   <link rel="stylesheet" href="showcharacter.css">
   <link rel="stylesheet" href="../SlickNav/dist/slicknav.css">
   <title><?php echo $_SESSION["name"]; ?>'s Sheet</title>
   <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
   <script src="../SlickNav/dist/jquery.slicknav.js"></script>
   <script type="text/javascript">
       $(function(){
           $('#nav_menu').slicknav();
       });
   </script>
</head>
<body>
<header>
    <div id="icon">
        <a href="../index.html"><img src="../images/verumlogo.png" alt="Verum Logo" width="90px" height="90px"></a>
    </div>
    <nav>
        <nav id="mobile_menu" class="slicknav_menu" style="display:none;"></nav>
        <nav id="nav_menu">
            <ul id="menu">
                <li><a href="../index.html">Home</a></li>
                <li><a href="../classes/index.html">Classes</a> 
                    <ul>
                        <li><a href="../classes/barbarian.html">Barbarian</a></li>
                        <li><a href="../classes/bard.html">Bard</a></li>
                        <li><a href="../classes/cleric.html">Cleric</a></li>
                        <li><a href="../classes/druid.html">Druid</a></li>
                        <li><a href="../classes/fighter.html">Fighter</a></li>
                        <li><a href="../classes/monk.html">Monk</a></li>
                        <li><a href="../classes/paladin.html">Paladin</a></li>
                        <li><a href="../classes/ranger.html">Ranger</a></li>
                        <li><a href="../classes/rogue.html">Rogue</a></li>
                        <li><a href="../classes/sorcerer.html">Sorcerer</a></li>
                        <li><a href="../classes/warlock.html">Warlock</a></li>
                        <li><a href="../classes/wizard.html">Wizard</a></li>
                    </ul>
                </li>
                <li><a href="../origins/index.html">Origins</a>
                    <ul>
                        <li><a href="../origins/krazak.html">Krazak</a></li>
                        <li><a href="../origins/dolten.html">Dolten</a></li>
                        <li><a href="../origins/bloodwavebay.html">Bloodwave Bay</a></li>
                        <li><a href="../origins/therift.html">The Rift</a></li>
                        <li><a href="../origins/steton.html">Steton</a></li>
                        <li><a href="../origins/daborak.html">Daborak</a></li>
                        <li><a href="../origins/badlands.html">Badlands</a></li>
                        <li><a href="../origins/orde.html">Orde</a></li>
                        <li><a href="../origins/khao.html">Khao</a></li>
                        <li><a href="../origins/majital.html">Majital</a></li>
                    </ul>
                </li>
                <li><a href="../races/index.html">Races</a>
                    <ul>
                        <li><a href="../races/dragonborn.html">Dragonborn</a></li>
                        <li><a href="../races/dwarves.html">Drawves</a></li>
                        <li><a href="../races/elves.html">Elves</a></li>
                        <li><a href="../races/fey.html">Fey</a></li>
                        <li><a href="../races/giantkin.html">Giantkin</a></li>
                        <li><a href="../races/gnomes.html">Gnomes</a></li>
                        <li><a href="../races/greenskin.html">Greenskin</a></li>
                        <li><a href="../races/halflings.html">Halflings</a></li>
                        <li><a href="../races/humans.html">Humans</a></li>
                        <li><a href="../races/lizardfolk.html">Lizardfolk</a></li>
                        <li><a href="../races/other.html">Other</a></li>
                        <li><a href="../races/planetouched.html">Planetouched</a></li>
                        <li><a href="../races/skinwalker.html">Skinwalker</a></li>
                    </ul>
                </li>
                <li><a href="../divinity/index.html">Divinity</a>
                    <ul>
                        <li><a href="../divinity/white.html">White Pantheon</a></li>
                        <li><a href="../divinity/gray.html">Gray Pantheon</a></li>
                        <li><a href="../divinity/green.html">Green Pantheon</a></li>
                        <li><a href="../divinity/blue.html">Blue Pantheon</a></li>
                        <li><a href="../divinity/black.html">Black Pantheon</a></li>
                    </ul>
                </li>
                <li><a href="../create/index.php">Create</a>
                </li>
                <li><a href="../about/index.html">About</a>
                </li>
            </ul>
        </nav>
    </nav>
    <div id="links">
        <a href="https://discord.com/invite/MPuw5fW" target="_blank"><img src="../images/discordlogo.png" alt="Arcadum Discord Link" height="30px" width="30px"></a>
        <a href="https://www.patreon.com/m/Arcadum" target="_blank"><img src="../images/patreonlogo.png" alt="Arcadum Patreon Link" height="25px" width="25px" style="padding-top: 1px;"></a>
        <a href="https://www.twitch.tv/arcadum" target="_blank"><img src="../images/twitchlogo.png" alt="Arcadum Twitch Link" height="25px" width="25px" style="padding-top: 1px;"></a>
        <a href="https://twitter.com/GloriousArcadum" target="_blank"><img src="../images/twitterlogo.png" alt="Arcadum Twitter Link" height="25px" width="25px" style="padding-top: 1px;"></a>
        <a href="https://www.youtube.com/c/Arcadum" target="_blank"><img src="../images/youtubelogo.png" alt="Arcadum Youtube Link" height="25px" width="25px" style="padding-top: 1px;"></a>
    </div>
</header>
<main>
    <div id="content">
        <div id="characterselected">
            <p><b>Name: </b><?php echo $_SESSION["name"]; ?></p>
            <p><b>Class: </b><?php echo $_SESSION["class"]; ?></p>
            <p><b>Race: </b><?php echo $_SESSION["race"]; ?></p>
            <p><b>Origin: </b><?php echo $_SESSION["origin"]; ?></p>
            <p><b>Divinity: </b><?php echo $_SESSION["divinity"]; ?></p>
            <p><b>Hitpoints: </b><?php echo $_SESSION["hitpoints"]; ?></p>
            <p><b>Speed: </b><?php echo $_SESSION["speed"]; ?></p>
            <p><b>Size: </b><?php echo $_SESSION["size"]; ?></p>
        </div>
        <div id="characterinfo">
            <div class="stats">
                <p>
                    <label for="statarray"><b>Stat Array:</b></label><br>
                    <select id="statarray" name="statarray">
                        <option value="" selected disabled hidden>Choose Stat Array</option>
                        <option value="specialist">The Specialist: 17/12/12/11/10/10</option>
                        <option value="madman">The Mad Man: 15/15/14/11/11/10</option>
                        <option value="razzledazzle">The Razzle Dazzle: 13/13/13/13/13/13</option>
                    </select>
                </p>
                <p><label for="strength"><b>Strength:</b></label><input id="strength" name="strength" size="1"> + <?php echo $_SESSION["strength"]; ?></p>
                <p><label for="dexterity"><b>Dexterity:</b></label><input id="dexterity" name="dexterity" size="1"> + <?php echo $_SESSION["dexterity"]; ?></p>
                <p><label for="constitution"><b>Constitution:</b></label><input id="constitution" name="constitution" size="1"> + <?php echo $_SESSION["constitution"]; ?></p>
                <p><label for="intelligence"><b>Intelligence:</b></label><input id="intelligence" name="intelligence" size="1"> + <?php echo $_SESSION["intelligence"]; ?></p> 
                <p><label for="charisma"><b>Charisma:</b></label><input id="charisma" name="charisma" size="1"> + <?php echo $_SESSION["charisma"]; ?></p>
                <p><label for="wisdom"><b>Wisdom:</b></label><input id="wisdom" name="wisdom" size="1"> + <?php echo $_SESSION["wisdom"]; ?></p>
                <p style="height:1.594em"><label for="availablepoints"><b>Available Points:</b></label><?php echo $_SESSION["availablepoints"]; ?><br><?php echo $_SESSION["availablepointstext"]; ?></p>
            </div>
            <div class="stats">
                <p><b>Notes:</b>
                    <?php echo $_SESSION["notes"]; ?>
                </p>
                <p><b>Special:</b>
                    <?php echo $_SESSION["special"]; ?>
                </p>
            </div>
            <div class="stats">
                <label for="spells"><b>Spells:</b></label>
                <textarea id="spells" name="spells"></textarea>
                <label for="features"><b>Features and Traits:</b></label>
                <textarea id="features" name="feautyu"></textarea>
            </div>
        </div>
    </div>
    <form action="start_over.php" method="POST">
            <button type="submit">Start Over</button>
    </form>
</main>
<footer>
    <h1>All creative rights of Verum belong to <a href="https://twitter.com/GloriousArcadum" target="_blank">Arcadum</a> &#169;</h1>
    <p>All art is created by the community - Links to artists are provided below each picture
    This site was designed and created by Jordan Kottmyer for their Spring 2021 CIS 119 final project</p>
</footer>
</body>