<?php
    ob_start();
    session_start();
    ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="../images/verumlogo.png">
   <link rel="stylesheet" href="../normalize.css">
   <link rel="stylesheet" href="charactercreationstyles.css">
   <link rel="stylesheet" href="../SlickNav/dist/slicknav.css">
   <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
   <script src="../SlickNav/dist/jquery.slicknav.js"></script>
   <script type="text/javascript">
       $(function(){
           $('#nav_menu').slicknav();
       });
   </script>
   <title>Create a Character</title>
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
                    <li><a href="../classes/classes.html">Classes</a> 
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
                    <li><a href="../origins/origins.html">Origins</a>
                        <ul>
                            <li><a href="../origins/krazak.html">Krazak</a></li>
                            <li><a href="../origins/dolten.html">Dolten</a></li>
                            <li><a href="../origins/bloodwaybay.html">Bloodway Bay</a></li>
                            <li><a href="../origins/therift.html">The Rift</a></li>
                            <li><a href="../origins/steton.html">Steton</a></li>
                            <li><a href="../origins/daborak.html">Daborak</a></li>
                            <li><a href="../origins/badlands.html">Badlands</a></li>
                            <li><a href="../origins/orde.html">Orde</a></li>
                            <li><a href="../origins/khao.html">Khao</a></li>
                            <li><a href="../origins/majital.html">Majital</a></li>
                        </ul>
                    </li>
                    <li><a href="../races/races.html">Races</a>
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
                            <li><a href="../races/sharkai.html">Sharkai</a></li>
                            <li><a href="../races/skinwalker.html">Skinwalker</a></li>
                        </ul>
                    </li>
                    <li><a href="../divinity/divinity.html">Divinity</a>
                        <ul>
                            <li><a href="../divinity/white.html">White Pantheon</a></li>
                            <li><a href="../divinity/gray.html">Gray Pantheon</a></li>
                            <li><a href="../divinity/green.html">Green Pantheon</a></li>
                            <li><a href="../divinity/blue.html">Blue Pantheon</a></li>
                            <li><a href="../divinity/black.html">Black Pantheon</a></li>
                        </ul>
                    </li>
                    <li><a href="../create/charactercreation.php">Create</a>
                    </li>
                    <li><a href="../about/about.html">About</a>
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
        <h1>Character Sheet Creation</h1>
        <form action="process_character.php" method="POST" id="charactercreation">
            <div id="namediv">
                <label for="name">Character name:</label>
                <input type="text" id="name" name="name" size="15" required>
            </div>
            <div class="dropdown">
                <label for="class">Class:</label>
                <select id="class" name="class" required>
                    <option value="" selected disabled hidden>Choose Class</option>
                    <option value="Barbarian">Barbarian</option>
                    <option value="Bard">Bard</option>
                    <option value="Cleric">Cleric</option>
                    <option value="Druid">Druid</option>
                    <option value="Fighter">Fighter</option>
                    <option value="Monk">Monk</option>
                    <option value="Paladin">Paladin</option>
                    <option value="Ranger">Ranger</option>
                    <option value="Rogue">Rogue</option>
                    <option value="Sorcerer">Sorcerer</option>
                    <option value="Warlock">Warlock</option>                   
                    <option value="Wizard">Wizard</option> 
                </select>
            </div>
            <div class="dropdown">
                <label for="race">Race:</label>
                <select id="race" name="race" required>
                <option value="" selected disabled hidden>Choose Race</option>
                    <optgroup label="Humans">
                        <option value="Variant Human">Variant Human</option>
                        <option value="Human Illithari">Human Illithari</option>
                        <option value="Nikira-Soprano">Nikira-Soprano</option>
                        <option value="Nikira-Alto">Nikira-Alto</option>
                        <option value="Nikira-Tenor">Nikira-Tenor</option>
                        <option value="Nikira-Bass">Nikira-Bass</option>
                    </optgroup>
                    <optgroup label="Elves">
                        <option value="Half-Elf">Half-Elf</option>
                        <option value="Half-Elf-Aquatic">Half-Elf-Aquatic</option>
                        <option value="Half-Elf-Dark Elf">Half-Elf-Dark Elf</option>
                        <option value="Half-Elf-High Elf">Half-Elf-High Elf</option>
                        <option value="Half-Elf-Wood Elf">Half-Elf-Wood Elf</option>
                        <option value="High Elf">High Elf</option>
                        <option value="Wood Elf">Wood Elf</option>
                        <option value="Dark Elf">Dark Elf</option>
                        <option value="Sea Elf">Sea Elf</option>
                        <option value="Shar'Kai">Shar'Kai</option>
                    </optgroup>
                    <optgroup label="Gnomes">
                        <option value="Forest Gnome">Forest Gnome</option>
                        <option value="Rock Gnome">Rock Gnome</option>
                        <option value="Svirfneblin">Svirfneblin</option>
                    </optgroup>
                    <optgroup label="Giant-Kin">
                        <option value="Firbolg">Firbolg</option>
                        <option value="Goliath">Goliath</option>
                        <option value="Minotaur">Minotaur</option>
                    </optgroup>
                    <optgroup label="Skinwalkers"> <!-- sub races -->
                        <option value="Grippli">Grippli</option>
                        <option value="Ratfolk-Diseased One">Ratfolk-Diseased One</option>
                        <option value="Ratfolk-Cunning One">Ratfolk-Cunning One</option>
                        <option value="Scaleheart">Scaleheart</option>
                        <option value="Aarakocra">Aarakocra</option>
                        <option value="Kitsune-Vulpin">Kitsune-Vulpin</option>
                        <option value="Kitsune-Seishin">Kitsune-Seishin</option>
                        <option value="Witchwolf-Wolf">Witchwolf-Wolf</option>
                        <option value="Witchwolf-Hound">Witchwolf-Hound</option>
                        <option value="Kenku">Kenku</option>
                        <option value="Tabaxi">Tabaxi</option>
                        <option value="Tortle">Tortle</option>
                    </optgroup>
                    <optgroup label="Dwarves">
                        <option value="Mountain Dwarf">Mountain Dwarf</option>
                        <option value="Hill Dwarvf">Hill Dwarf</option>
                        <option value="Duergar">Duergar</option>
                    </optgroup>
                    <optgroup label="Halflings">
                        <option value="Lightfoot Halflings">Lightfoot Halflings</option>
                        <option value="Stout Halflings">Stout Halflings</option>
                        <option value="Songsworn">Songsworn</option>
                        <option value="Ghostwise">Ghostwise</option>
                    </optgroup>
                    <optgroup label="Greenskins">
                        <option value="Half-Orc">Half-Orc</option>
                        <option value="Bugbear">Bugbear</option>
                        <option value="Hobgoblin">Hobgoblin</option>
                        <option value="Orc">Orcs</option>
                        <option value="Red Orc">Red Orc</option>
                        <option value="Goblin">Goblin</option>
                    </optgroup>
                    <optgroup label="Dragonborn">
                        <option value="Dragonborn">Dragonborn</option>
                    </optgroup>
                    <optgroup label="Plane-Touched">
                        <option value="Triton">Triton</option>
                        <optgroup label="&nbsp;&nbsp;Genasi"> <!-- sub group -->
                            <option value="Earth Genasi">Earth Genasi</option>
                            <option value="Water Genasi">Water Genasi</option>
                            <option value="Air Genasi">Air Genasi</option>
                            <option value="Fire Genasi">Fire Genasi</option>
                        </optgroup>
                        <optgroup label="&nbsp;&nbsp;Tieflings"> <!-- sub group -->
                            <option value="Asmodeus">Asmodeus</option>
                            <option value="Baalzebul">Baalzebul</option>
                            <option value="Dispater">Dispater</option>
                            <option value="Fierna">Fierna</option>
                            <option value="Glasya">Glasya</option>
                            <option value="Levistus">Levistus</option>
                            <option value="Mammon">Mammon</option>
                            <option value="Mepthistopheles">Mephistopheles</option>
                            <option value="Zariel">Zariel</option>
                            <option value="Variant-Infernal Legacy">Variant-Infernal Legacy</option>
                            <option value="Variant-Devil's Tongue">Variant-Devil's Tongue</option>
                            <option value="Variant-Hellfire">Variant-Hellfire</option>
                            <option value="Variant-Winged">Variant-Winged</option>
                        </optgroup>
                        <optgroup label="&nbsp;&nbsp;Aasimar"> <!-- sub group -->
                            <option value="Fallen">Fallen</option>
                            <option value="Protector">Protector</option>
                            <option value="Scourge">Scourage</option>
                        </optgroup>
                    </optgroup>
                    <optgroup label="Lizardfolk"> 
                        <option value="Yuan-Ti">Yuan-Ti</option>
                        <option value="Kobold">Kobold</option>
                    </optgroup>
                    <optgroup label="Fey"> 
                        <option value="Changeling">Changeling</option>
                        <option value="Satyr-Ram">Satyr-Ram</option>
                        <option value="Satyr-Mountain">Satyr-Mountain</option>
                        <option value="Satyr-Dragon">Satyr-Dragon</option>
                        <option value="Satyr-Regal">Satyr-Regal</option>
                        <option value="Satyr-Crown">Satyr-Crown</option>
                        <option value="Satyr-Antlers">Satyr-Antlers</option>
                        <option value="Satyr-Fel">Satyr-Fel</option>
                        <option value="Sprite">Sprite</option>
                    </optgroup>
                    <optgroup label="Other">
                        <option value="Dhampir-Feral">Dhampir-Feral</option>
                        <option value="Dhampir-Royal">Dhampir-Royal</option>
                        <option value="Siren-Sailer's Bane">Siren-Sailer's Bane</option>
                        <option value="Siren-Harpy">Siren-Harpy</option>
                        <option value="Siren-Medusa">Siren-Medusa</option>
                        <option value="Kuo-Toa-Goggles">Kuo-Toa-Goggles</option>
                        <option value="Kuo-Toa-Whips">Kuo-Toa-Whips</option>
                    </optgroup>
                </select>
            </div>
            <div class="dropdown">
                <label for="origin">Origin:</label>
                <select id="origin" name="origin" required>
                <option value="" selected disabled hidden>Choose Origin</option>
                    <optgroup label="Krazak">
                        <option value="Lowlander">Lowlander</option>
                        <option value="Legionnaire">Legionnaire</option>
                        <option value="Peakfolk">Peakfolk</option>
                        <option value="Greenskin-Bane">Greenskin-Bane</option>
                        <option value="Forgechild">Forgechild</option>
                        <option value="Rangeroamer">Rangeroamer</option>
                        <option value="Minesworn">Minesworn</option>
                        <option value="Songport Arrival-Krazak">Songport Arrival</option>
                    </optgroup>
                    <optgroup label="Dolten">
                        <option value="Night Guard Aspirant">Night Guard Aspirant</option>
                        <option value="Gravewatcher">Gravewatcher</option>
                        <option value="Ward of Witchtown">Ward of Witchtown</option>
                        <option value="Bleak Blessed">Bleak Blessed</option>
                        <option value="Gambler Born">Gambler Born</option>
                        <option value="The Skittering">The Skittering</option>
                        <option value="Fangs in the Night">Fangs in the Night</option>
                        <option value="Dark Howler">Dark Howler</option>
                        <option value="Fae-Lost">Fae-Lost</option>
                    </optgroup>
                    <optgroup label="Bloodwave Bay">
                        <option value="Mage Coast">Mage Coast</option>
                        <option value="NAavigator">Navigator</option>
                        <option value="Spelunker">Spelunker</option>
                        <option value="Copper Coveman">Copper Coveman</option>
                        <option value="Ship Wreckdiver">Shipwreck Diver</option>
                        <option value="Privateer">Privateer</option>
                        <option value="Brutal Coast">Brutal Coast</option>
                        <option value="Whispering Isles">Whispering Isles</option>
                    </optgroup>
                    <optgroup label="The Rift">
                        <option value="Divini">Divini</option>
                        <option value="Lu'Us">Lu'Us</option>
                        <option value="Envus">Envus</option>
                        <option value="Priend">Priend</option>
                        <option value="Gla'Ton">Gla'Ton</option>
                        <option value="Gri'Id">Gri'Id</option>
                        <option value="Vrath">Vrath</option>
                        <option value="Slog">Slog</option>
                    </optgroup>
                    <optgroup label="Steton">
                        <option value="Bulette Slayer">Bulette Slayer</option>
                        <option value="Dragonslayer">Dragonslayer</option>
                        <option value="Floating Nomad">Floating Nomad</option>
                        <option value="Giant Slayer">Giant Slayer</option>
                        <option value="Manticore Hunter">Manticore Hunter</option>
                        <option value="Hide Flayer">Hide Flayer</option>
                        <option value="Roc Tracker">Roc Tracker</option>
                        <option value="Chimera Hunter">Chimera Hunter</option>
                    </optgroup>
                    <optgroup label="Daborak">
                        <option value="Riverrunner">Riverrunner</option>
                        <option value="Bandit of the Rolling Wastes">Bandit of the Rolling Wastes</option>
                        <option value="Daborakian Noble">Daborakian Noble</option>
                        <option value="Stable Master">Stablemaster</option>
                        <option value="Calvaryman">Calvaryman</option>
                        <option value="Courier">Courier</option>
                        <option value="Soldier in Training">Soldier in Training</option>
                        <option value="Plainsrunner">Plainsrunner</option>
                    </optgroup>
                    <optgroup label="Badlands">
                        <option value="Wendigo Soul">Wendigo Soul</option>
                        <option value="Doomsayer">Doomsayer</option>
                        <option value="Banshee Born">Banshee Born</option>
                        <option value="Woeful Warrior">Woeful Warrior</option>
                        <option value="Twice Cursed">Twice Cursed</option>
                    </optgroup>
                    <optgroup label="Skar'Kai">
                        <option value="The Path of the Ael">The Path of the Ael</option>
                        <option value="The Path of the Scion">The Path of the Scion</option>
                        <option value="The Path of the Gilded">The Path of the Gilded</option>
                        <option value="The Path of the Forsaken">The Path of the Forsaken</option>
                    </optgroup>
                    <optgroup label="Orde">
                        <option value="Paladin in Training">Paladin in Training</option>
                        <option value="Church Child">Church Child</option>
                        <option value="In Plain Sight">In Plain Sight</option>
                        <option value="Ex-Priest">Ex-Priest</option>
                        <option value="Lineage of the Barrister">Lineage of the Barrister</option>
                        <option value="Wall Born">Wall Born</option>
                        <option value="Lineage of Coin">Lineage of Coin</option>
                    </optgroup>
                    <optgroup label="Khao">
                        <option value="Tracker">Tracker</option>
                        <option value="Mender">Mender</option>
                        <option value="Exile">Exile</option>
                        <option value="Druid in Training">Druid in Training</option>
                        <option value="Forager">Forager</option>
                        <option value="Dark One">Dark One</option>
                        <option value="Enforcer">Enforcer</option>
                    </optgroup>
                    <optgroup label="Majital">
                        <option value="Arcane Student">Arcane Student</option>
                        <option value="Merchant of Magic">Merchant of Magic</option>
                        <option value="Portal Born">Portal Born</option>
                        <option value="Mirage Born">Mirage Born</option>
                        <option value="Guild Born">Guild Born</option>
                        <option value="Sand Strider">Sand Strider</option>
                        <option value="Oasis Native">Oasis Native</option>
                        <option value="Ruin Dweller">Ruin Dweller</option>
                        <option value="Songport Arrival-Majital">Songport Arrival</option>
                    </optgroup>
                </select>
            </div>
            <div class="dropdown">
                <label for="divinity">Divinity:</label>
                <select id="divinity" name="divinity" required>
                <option value="" selected disabled hidden>Choose Divinity</option>
                    <option value="none">None</option>
                    <optgroup label="White Pantheon">
                        <option value="Viderick">Viderick</option>
                        <option value="Vavren">Vavren</option>
                        <option value="Glory">Glory</option>
                        <option value="Runethares">Runethares</option>
                        <option value="The Seven">The Seven</option>
                    </optgroup>
                    <optgroup label="Grey Pantheon">
                        <option value="Iass">Iass</option>
                        <option value="Oun">Oun</option>
                        <option value="Ezokhine">Ezokhine</option>
                        <option value="Kaheeli">Kaheeli</option>
                        <option value="Wondox">Wondox</option>
                        <option value="Sekelcuse">Sekelcuse</option>
                        <option value="Matron of Fate">Matron of Fate</option>
                        <option value="Nero">Nero</option>
                    </optgroup>
                    <optgroup label="Green Pantheon">
                        <option value="Vinsc">Vinsc</option>
                        <option value="Inca">Inca</option>
                        <option value="Silloway">Silloway</option>
                        <option value="Lorn">Lorn</option>
                        <option value="Gazenaroc">Gazenaroc</option>
                        <option value="Gwaina">Gwaina</option>
                        <option value="Talven">Talven</option>
                    </optgroup>
                    <optgroup label="Blue Pantheon">
                        <option value="Tilt">Tilt</option>
                        <option value="Falaael">Falaael</option>
                        <option value="Cassius">Cassius</option>
                        <option value="Astaroth">Astaroth</option>
                        <option value="Raquel">Raquel</option>
                    </optgroup>
                    <optgroup label="Black Pantheon">
                        <option value="Lorita">Lorita</option>
                        <option value="Oleken'Hai">Oloken'Hai</option>
                        <option value="Wode">Wode</option>
                        <option value="Babylon">Babylon</option>
                        <option value="Crowley">Crowley</option>
                    </optgroup>
                </select>
            </div>
            <div id="submitdiv">
                <button type="submit">Create Character</button>
            </div>
        </form>
        <div id="informationcolumn">
            <div class="informationrows">
                <div class="info"><h1>Class</h1><p class="infopar">Every adventurer is a member of a class. Class broadly describes what a character can do and their roles within the game. Your character receives a number of benefits from your choice of class. Many of these benefits are class features-capabilities (including spellcasting) that set your character apart from members of other classes. In Verum, there exists those found in standard 5e with additional subclasses included for specific classes. More information can be found on the <a href="../classes/classes.html">Classes page.</a>
                </p></div>
                <div class="info"><h1>Race</h1><p class="infopar">Every D&D character belongs to race and each race has it's own unique identity. Your character's race grants particular racial traits, such as special senses, proficiency with certain weapons or tools, proficiency in one or more skills, or the ability to use minor spells. Your race can also increase one or more of your ability scores. In Verum, there exists those found in standard 5e in addition to many unique to Verum. More information can be found on the <a href="../races/races.html">Races page.</a>
                </p></div>
            </div>
            <div class="informationrows">
                <div class="info"><h1>Origin</h1><p class="infopar">Origins are an important choice for your character, since they entail what has shaped them to be who they are just before the start of their adventuring life. They depict what skills and abilities were gained as your character grew into adulthood. Origins replace backgrounds as a character feature, but backstories can still potentially play a role later in your character's life. More information can be found on the <a href="../origins/origins.html">Origins page.</a>
                </p></div>
                <div class="info"><h1>Divinity</h1><p class="infopar">Verum is host to completely customized deities and pantheons, each with their own ideals and ambitions.Whenever you choose a deity to follow you receive the Lip Service benefit of that deity, which is generally a free skill proficiency. If you have the option to choose, your choice is locked-in once made and cannot be changed as long as you worship that deity. You can change which god you worship, and thus the respective lip service, at any time. More information can be found on the <a href="../divinity/divinity.html">Divinity page.</a>
                </p></div>
            </div>
        </div>
    </div>
</main>
<footer>
    <h1>All creative rights of Verum belong to <a href="https://twitter.com/GloriousArcadum" target="_blank">Arcadum</a></h1>
    <p>All art is created by the community - Links to artists are provided below each picture
    This site was designed and created by Jordan Kottmyer for their Spring 2021 CIS 119 final project</p>
</footer>
</body>
</html>
