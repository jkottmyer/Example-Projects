<?php
    ob_start();
    session_start();
    function Sanitize($userString){
        $userString = trim($userString);
        $userString = stripslashes($userString);
        $userString = htmlspecialchars($userString);
        return $userString;
    }
    $name = Sanitize($_POST["name"]);

    if(isset($name))
        $_SESSION["name"] = $name;
    if(isset($_POST["class"]))
        $_SESSION["class"] = $_POST["class"];
    if(isset($_POST["race"]))
        $_SESSION["race"] = $_POST["race"];
    if(isset($_POST["origin"]))
        $_SESSION["origin"] = $_POST["origin"];
    if(isset($_POST["divinity"]))
        $_SESSION["divinity"] = $_POST["divinity"];
    if(!isset($name) || !isset($_POST["class"]) || !isset($_POST["race"]) || !isset($_POST["origin"]) || !isset($_POST["divinity"])){
        header("Location: index.php");
        exit();
    }

    unset($_SESSION["strenth"]);
    $strenth = 0;
    
    unset($_SESSION["dexterity"]);
    $dexterity = 0;

    unset($_SESSION["constitution"]);
    $constitution = 0;

    unset($_SESSION["intelligence"]);
    $intelligence = 0;

    unset($_SESSION["wisdom"]);
    $wisdom = 0;

    unset($_SESSION["charisma"]);
    $charisma = 0;

    unset($_SESSION["hitpoints"]);
    $hitpoints = 0;

    unset($_SESSION["speed"]);
    $speed = 0;

    unset($_SESSION["availablepoints"]);
    $availablepoints = 0;

    unset($_SESSION["availablepointstext"]);
    $availablepointstext = null;

    unset($_SESSION["size"]);
    $size = null;

    unset($_SESSION["notes"]);
    $notes = null;

    unset($_SESSION["special"]);
    $special = null;

    /*Class Notes*/
    if($_SESSION["class"] == "Barbarian"){
        $hitpoints = $hitpoints + 12;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Armor: Light armor, medium armor, shields<br>Weapson: Simple weapons and martial weapons<br>Saving throws: Strength and Constitution<br>Skills:<br>Choose two from Animal Handling, Athletics, Intimidation, Nature, Perception, Survival<br>Starting Equipment:<br>&#8226;A greataxe or any martial melee weapon<br>&#8226;Two handaxes or any simple weapon<br>&#8226;An explorer's pack, and four javelins";
    }

    if($_SESSION["class"] == "Bard"){
        $hitpoints = $hitpoints + 8;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Armor: Light armor<br>Weapons: Simple weapons, hand crossbows, longswords, rapiers, and shortswords<br>Tools: Three musical instruments of your choice<br>Saving throws: Dexterity and Charisma<br>Skills: Choose any 3<br>Starting Equipment:<br>&#8226;A rapier, a longsword, or any simple weapon<br>&#8226;A diplomat's pack or an entertainer's pack<br>&#8226;A lute or any other musical instrument<br>&#8226;Leather armor and a dagger";
    }

    if($_SESSION["class"] == "Cleric"){
        $hitpoints = $hitpoints + 8;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Armor: Light armor, medium armor, shields<br>Weapson: Simple weapons<br>Saving throws: Wisdom and Charisma<br>Skills:<br>Choose 2 from History, Insight, Medicine, Persuassion, and Religion<br>Starting Equipment:<br>&#8226;A mace or a warhammer(if proficient)<br>&#8226;Scale mail, leather armor, or chain mail(if proficient)<br>&#8226;A light crossbow and 20 bolts or a simple weapon<br>&#8226;A priest's pack or an explorer's pack<br>&#8226;A shield and holy symbol";
    }

    if($_SESSION["class"] == "Druid"){
        $hitpoints = $hitpoints + 8;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Armor: Light armor, medium armor, shields (druids will not wear armor or use shields made of metal)<br>Weapson: Clubs, daggers, darts, javelins, maces, quarterstaffs, scimitars, sickles, slings, and spears<br>Tools: Herbalism kit<br>Saving throws: Intelligence and Wisdom<br>Skills:<br>Choose 2 from Arcana, Animal Handling, Insight, Medicine, Nature, Perception, Religion, and Survival<br>Starting Equipment:<br>&#8226;A wooden shield or any simple weapon<br>&#8226;A scimitar or any simple melee weapon<br>&#8226;Leather armor, an explorer's pack, and a druidic focus";
    }

    if($_SESSION["class"] == "Fighter"){
        $hitpoints = $hitpoints + 10;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Armor: Light armor, medium armor, heavy armor, shields<br>Weapson: Simple weapons and martial weapons<br>Saving throws: Strength and Constitution<br>Skills:<br>Choose 2 from Acrobatics, Animal Handling, Athletics, History, Insight, Intimidation, Perception, and Survival<br>Starting Equipment:<br>&#8226;Chain mail or leather armor, longbow, and 20 arrows<br>&#8226;A martial weapon and a shield or two martial weapons<br>&#8226;A light crossbow and 20 bolts or two handaxes<br>&#8226;A dungeoneer's pack or an explorer's pack";
    }

    if($_SESSION["class"] == "Monk"){
        $hitpoints = $hitpoints + 8;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Weapson: Simple weapons and shortswords<br>Saving throws: Strength and Dexterity<br>Skills:<br>Choose 2 from Acrobatics, Athletics, History, Insight, Religion, and Stealth<br>Starting Equipment:<br>&#8226;A shortsword or any simple weapon<br>&#8226;A dongeoneer's pack or an explorer's kit<br>&#8226;10 darts";
    }

    if($_SESSION["class"] == "Paladin"){
        $hitpoints = $hitpoints + 10;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Armor: Light armor, medium armor, heavy armor, and shields<br>Weapson: Simple weapons and martial weapons<br>Saving throws: Wisdom and Charisma<br>Skills:<br>Choose 2 from Athletics, Insight, Intimidation, Medicine, Persuasion, and Religion<br>Starting Equipment:<br>&#8226;A martial weapon and a shield or two martial weapons<br>&#8226;Five javelins or any simple melee weapon<br>&#8226;A priest's pack or an explorer's pack<br>&#8226;Chain mail and a holy symbol";
    }

    if($_SESSION["class"] == "Ranger"){
        $hitpoints = $hitpoints + 10;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Armor: Light armor, medium armor, and shields<br>Weapson: Simple weapons and martial weapons<br>Saving throws: Strength and Dexterity<br>Skills:<br>Choose 3 from Animal Handling, Athletics, Insight, Investigation, Nature, Perception, Stealth, and Survival<br>Starting Equipment:<br>&#8226;Scale mail or leather armor<br>&#8226;Two shortswords or two simple melee weapons<br>&#8226;A dungeoneer's pack or an explorer's pack<br>&#8226;A longbow and a quiver of 20 arrows";
    }

    if($_SESSION["class"] == "Rogue"){
        $hitpoints = $hitpoints + 8;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Armor: Light armor<br>Weapson: Simple weapons, hand crossbows, longswords, rapiers, and shortswords<br>Tools: Thieves' tools<br>Saving throws: Dexterity and Intelligence<br>Skills:<br>Choose 4 from Acrobatics, Athletics, Deception, Insight, Intimidation, Investigation, Perception, Performance, Persuasion, Sleight of Hand, and Stealth<br>Starting Equipment:<br>&#8226;A rapier or a shortsword<br>&#8226;A shortbow and quiver of 20 arrows or a shortsword<br>&#8226;A burglar's pack, dungeoneer's pack, or an explorer's pack<br>&#8226;Leather armor, two daggers, and thieves' tools";
    }

    if($_SESSION["class"] == "Sorcerer"){
        $hitpoints = $hitpoints + 6;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Weapons: Daggers, darts, slings, quarterstaffs, and light crossbows<br>Saving throws: Constitution and Charisma<br>Skills:<br>Choose 2 from Arcana, Deception, Insight, Intimidation, Persuasion, and Religion<br>Starting Equipment:<br>&#8226;A light crossbow and 20 bolts or any simple weapon<br>&#8226;A component pouch or an arcane focus<br>&#8226;A dungeoneer's pack or an explorer's pack<br>&#8226;Two daggers";
    }

    if($_SESSION["class"] == "Warlock"){
        $hitpoints = $hitpoints + 8;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Armor: Light armor<br>Weapons: Simple weapons<br>Saving throws: Wisdom and Charisma<br>Skills:<br>Choose 2 from Arcana, Deception, History, Intimidation, Investigation, Nature, and Religion<br>Starting Equipment:<br>&#8226;A light crossbow and 20 bolts or any simple weapon<br>&#8226;A component pouch or an arcane focus<br>&#8226;A scholar's pack or a dungeoneer's pack<br>&#8226;Leather armor, any simple weapon, and two daggers";
    }

    if($_SESSION["class"] == "Wizard"){
        $hitpoints = $hitpoints + 6;
        $notes .= "<br><b>Class Features</b><br>Proficiencies<br>Weapson: Daggers, darts, slings, quarterstafffs, and light crossbows<br>Saving throws: Intelligence and Wisdom<br>Skills:<br>Choose 2 from Arcana, History, Insight, Investigation, Medicine, and Religion<br>Starting Equipment:<br>&#8226;A quarterstaff or a dagger<br>&#8226;A component pouch or an arcane focus<br>&#8226;A scholar's pack or a explorer's pack<br>&#8226;A spellbook";
    }

    /*Race Races*/
    if($_SESSION["race"] == "Human"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 1;
        $dexterity = $dexterity + 1;
        $constitution = $constitution + 1;
        $intelligence = $intelligence + 1;
        $wisdom = $wisdom + 1;
        $charisma = $charisma + 1;
        $notes .= "<br><b>Race Features</b><br>Humans can speak, read, and write Common and one extra language of your choice. Humans typically learn the languages of other peoples they deal with, including obscure dialects. They are fond of sprinkling their speech with words borrowed from other tongues: Orc curses, Elvish musical expressions, Dwarvish military phrases, and so on.";
    }

    if($_SESSION["race"] == "Variant Human"){
        $size = "Medium";
        $speed = "30";
        $availablepoints = $availablepoints + 2;
        $availablepointstext .= "Choose any two unique +1<br>";
        $notes .= "<br><b>Race Features</b><br>Select one skill to gain proficiency in<br>Select one feat of your choice<br>Variant Human can speak, read, and write Common and one extra language of your choice";
    }

    if($_SESSION["race"] == "Human Illithari"){
        $size = "Medium";
        $speed = "30";
        $notes .= "<br><b>Race Features</b><br>Select one skill to gain proficiency in<br>Illithari have one additional attunement slot<br>You can speak, read, and write Common and one extra language of your choice<br>Illithari can choise either a Psionics or Shatter trait(see race page)";
    }

    if($_SESSION["race"] == "Nikira-Soprano"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $intelligence = $intelligence + 1;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Presence Presented: As a bonus action, the next time you roll for a persuasion, deception, intimidation or performance skill check, you can treat all d20 rolls of 14 or lower as a 15. You can't use this feature again until you finish a long rest";
    }

    if($_SESSION["race"] == "Nikira-Alto"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $dexterity = $dexterity + 1;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Allegro Immedia: As a reaction at any time, you can move up to twice your speed as a reaction without provoking an attack of opportunity. You can't use this feature again until you finish a long rest";
    }

    if($_SESSION["race"] == "Nikira-Tenor"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $constitution = $constitution + 1;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Indefatigable Tempo: When you are reduced to 0 hit points but not killed outright, you can drop to 1 hit point instead. You can't use this feature again until you finish a long rest";
    }

    if($_SESSION["race"] == "Nikira-Bass"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $constitution = $constitution + 1;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Critical Crescendo: When you score a critical hit with an attack, you can use this ability to deal additional thunder damage to the target. The amount of damage is 1d8 per point of proficiency bonus. You can't use this feature again until you finish a long rest";
    }

    if($_SESSION["race"] == "Half-Elf"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $availablepoints = $availablepoints + 2;
        $availablepointstext .= "Choose any two unique +1<br>";
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your elf blood, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.<br>Skill Versatility: You gain proficiency in two skills of your choice<br>Half-Elves can speak, read, and write Common, Elven and one extra language of your choice";
    }

    if($_SESSION["race"] == "Half-Elf-Aquatic"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $availablepoints = $availablepoints + 2;
        $availablepointstext .= "Choose any two unique +1<br>";
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your elf blood, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.<br>Swimming Speed: A half-elf of aquatic heritage has a swimming speed of 30 feet<br>Half-Elves can speak, read, and write Common, Elven and one extra language of your choice";
    }

    if($_SESSION["race"] == "Half-Elf-Dark Elf"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $availablepoints = $availablepoints + 2;
        $availablepointstext .= "Choose any two unique +1<br>";
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your elf blood, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.<br>Choose one of the following features:<br>Elf Weapon Training: You have proficiency with the longsword, shortsword, shortbow, and longbow<br>Cantrip: You know one cantrip of your choice from the wizard spell list. Intelligence is your spellcasting ability for it<br>Half-Elves can speak, read, and write Common, Elven and one extra language of your choice";
    }

    if($_SESSION["race"] == "Half-Elf-Wood Elf"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $availablepoints = $availablepoints + 2;
        $availablepointstext .= "Choose any two unique +1<br>";
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your elf blood, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.<br>Choose one of the following features:<br>Elf Weapon Training: You have proficiency with the longsword, shortsword, shortbow, and longbow<br>Fleet of Foot: Your base walking speed increases to 35 feet<br>Mask of the Wild: You can attempt to hide when you are lightly obscured by foliage, heavy rain, falling snow, mist, and other natural phenomena<br>Half-Elves can speak, read, and write Common, Elven and one extra language of your choice";
    }

    if($_SESSION["race"] == "Half-Elf-High Elf"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $availablepoints = $availablepoints + 2;
        $availablepointstext .= "Choose any two unique +1<br>";
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your elf blood, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.<br>Dark Elf Magic: A half-elf of drow descent know the dancing lights cantrip. When you reach 3rd level, you can cast the faerie fire spell once with this trait and regain the ability to do so when you finish a long rest. When you reach 5th level, you can cast the darkness spell once with this trait and regain the ability to do so when you finish a long rest. Charisma is your spellcasting ability for these spells<br>Half-Elves can speak, read, and write Common, Elven and one extra language of your choice";
    }

    if($_SESSION["race"] == "High Elf"){
        $size = "Medium";
        $speed = "30";
        $dexterity = $dexterity + 2;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Keen Senses: You have proficiency in the Perception skill.<br>Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.<br>Trance: Elves don't need to sleep. Instead, they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is 'trance.') While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years of practice. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.<br>Elf Weapon Training: You have proficiency with the longsword, shortsword, shortbow, and longbow.<br>Cantrip: You know one cantrip of your choice from the wizard spell list. Intelligence is your spellcasting ability for it.<br>Emperor’s Gift: You gain a +2 to your initiative rolls.<br>High Elves can speak, read, and write Common, Elven, and one extra language of your choice";
    }

    if($_SESSION["race"] == "Wood Elf"){
        $size = "Medium";
        $speed = "35";
        $dexterity = $dexterity + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Keen Senses: You have proficiency in the Perception skill.<br>Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.<br>Trance: Elves don't need to sleep. Instead, they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is 'trance.') While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years of practice. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.<br>Elf Weapon Training: You have proficiency with the longsword, shortsword, shortbow, and longbow.<br>Mask of the Wild: You can attempt to hide even when you are only lightly obscured by foliage, heavy rain, falling snow, mist, and other natural phenomena.<br>Emperor’s Gift: You gain a +2 to your initiative rolls.<br>Wood Elves can speak, read, and write Common and Elven";
    }

    if($_SESSION["race"] == "Dark Elf"){
        $size = "Medium";
        $speed = "30";
        $dexterity = $dexterity + 2;
        $charisma = $charisma + 1;
        $notes .= "<br><b>Race Features</b><br>Superior Darkvision: Accustomed to the depths of the Underdark, you have superior vision in dark and dim conditions. You can see in dim light within 120 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Keen Senses: You have proficiency in the Perception skill.<br>Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.<br>Trance: Elves don't need to sleep. Instead, they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is 'trance.') While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years of practice. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.<br>Drow Weapon Training: You have proficiency with rapiers, shortswords, and hand crossbows. <br>Sunlight Sensitivity: You have disadvantage on attack rolls and on Wisdom (Perception) checks that rely on sight when you, the target of your attack, or whatever you are trying to perceive is in direct sunlight.<br>Drow Magic: You know the dancing lights cantrip. When you reach 3rd level, you can cast the faerie fire spell once per day; you must finish a long rest in order to cast the spell again using this trait. When you reach 5th level, you can also cast the darkness spell once per day; you must finish a long rest in order to cast the spell again using this trait. Charisma is your spellcasting ability for these spells.<br>Emperor’s Gift: You gain a +2 to your initiative rolls.<br>Dark Elves can speak, read, and write Common and Elven";
    }

    if($_SESSION["race"] == "Sea Elf"){
        $size = "Medium";
        $speed = "30";
        $dexterity = $dexterity + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Keen Senses: You have proficiency in the Perception skill.<br>Fey Ancestry: You have advantage on saving throws against being charmed, and magic can't put you to sleep.<br>Trance: Elves don't need to sleep. Instead, they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is 'trance.') While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years of practice. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.<br>Sea Elf Training: You have proficiency with the spear, trident, light crossbow, and net.<br>Child of the Sea: You have a swimming speed of 30 feet, and you can breathe air and water.<br>Friend of the Sea: Using gestures and sounds, you can communicate simple ideas with any beast that has an innate swimming speed.<br>Emperor’s Gift: You gain a +2 to your initiative rolls.<br>Sea Elves can speak, read, and write Common, Elven, and Aquan";
    }

    if($_SESSION["race"] == "Shar'Kai"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 2;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Keen Senses: You have proficiency in the Perception skill.<br>Not Yet: You have advantage on death saving throws. <br>Trance: Elves don't need to sleep. Instead, they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is 'trance.') While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years of practice. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.<br>Sharkai Weapon Training: You have proficiency in three two-handed weapons of your choice.<br>Glory of Aladine: When you defeat a creature, you are healed for a total amount of hit points equal to your character level + your Constitution modifier. Once this ability is triggered, it cannot be triggered again until you complete a short or long rest.<br>Unbroken: You ignore the first level of exhaustion you would take. You must complete a long rest before you can use this ability again.<br>Shar'Kai can speak, read, and write Common and Shar'Kai";
    }

    if($_SESSION["race"] == "Forest Gnome"){
        $size = "Small";
        $speed = "25";
        $intelligence = $intelligence + 2;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to life underground, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Gnome Cunning: You have advantage on all Intelligence, Wisdom, and Charisma saving throws against magic.<br>Natural Illusionist: You know the minor illusion cantrip. Intelligence is your spellcasting ability for it.<br>Speak with Small Beasts: Through sounds and gestures, you can communicate simple ideas with Small or smaller beasts. Forest gnomes love animals and often keep squirrels, badgers, rabbits, moles, woodpeckers, and other creatures as beloved pets.<br>Forest Gnomes can speak, read, and write Common and Gnomish.";
    }
    
    if($_SESSION["race"] == "Rock Gnome"){
        $size = "Small";
        $speed = "25";
        $intelligence = $intelligence + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to life underground, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Gnome Cunning: You have advantage on all Intelligence, Wisdom, and Charisma saving throws against magic.<br>Artificer's Lore: Whenever you make an Intelligence (History) check related to magic items, alchemical objects, or technological devices, you can add twice your proficiency bonus, instead of any proficiency bonus you normally apply.<br>Tinker: You have proficiency with artisan's tools (tinker's tools). Using those tools, you can spend 1 hour and 10 gp worth of materials to construct a Tiny clockwork device (AC 5, 1 hp). The device ceases to function after 24 hours (unless you spend 1 hour repairing it to keep the device functioning), or when you use your action to dismantle it; at that time, you can reclaim the materials used to create it. You can have up to three such devices active at a time.<br>&#8226;Clockwork Toy: This toy is a clockwork animal, monster, or person, such as a frog, mouse, bird, dragon, or soldier. When placed on the ground, the toy moves 5 feet across the ground on each of your turns in a random direction. It makes noises as appropriate to the creature it represents.<br>&#8226;Fire Starter: The device produces a miniature flame, which you can use to light a candle, torch, or campfire. Using the device requires your action.<br>&#8226;Music Box: When opened, this music box plays a single song at a moderate volume. The box stops playing when it reaches the song's end or when it is closed.<br>Rock Gnomes can speak, read, and write Common and Gnomish.";
    }

    if($_SESSION["race"] == "Svirfneblin"){
        $size = "Small";
        $speed = "25";
        $intelligence = $intelligence + 2;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Race Features</b><br>Superior Darkvision: Accustomed to life underground, you have superior vision in dark and dim conditions. You can see in dim light within 120 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray.<br>Gnome Cunning: You have advantage on all Intelligence, Wisdom, and Charisma saving throws against magic.<br>Stone Camouflage: You have advantage on Dexterity (Stealth) checks to hide in rocky terrain.<br>Svirfneblin can speak, read, and write Common, Gnomish, and Undercommon";
    }

    if($_SESSION["race"] == "Firbolg"){
        $size = "Medium";
        $speed = "30";
        $wisdom = $wisdom + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Firbolg Magic: You can cast detect magic and disguise self with this trait, using Wisdom as your spellcasting ability for them. Once you cast either spell, you can't cast it again with this trait until you finish a short or long rest. When you use this version of disguise self, you can seem up to 3 feet shorter than normal, allowing you to more easily blend in with humans and elves.<br>Hidden Step: As a bonus action, you can magically turn invisible until the start of your next turn or until you attack, make a damage roll, or force someone to make a saving throw. Once you use this trait, you can't use it again until you finish a short or long rest.<br>Powerful Build: You count as one size larger when determining your carrying capacity and the weight you can push, drag, or lift.<br>Speech of Beast and Leaf: You have the ability to communicate in a limited manner with beasts and plants. They can understand the meaning of your words, though you have no special ability to understand them in return. You have advantage on all Charisma checks you make to influence them.<br>Firbolg can speak, read, and write Common, Elven, and Giant";
    }

    if($_SESSION["race"] == "Goliath"){
        $size = "Medium";
        $speed = "30";
        $wisdom = $wisdom + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Natural Athlete: You have proficiency in the Athletics skill.<br>Stone's Endurance: You can focus yourself to occasionally shrug off injury. When you take damage, you can use your reaction to roll a d12. Add your Constitution modifier to the number rolled, and reduce the damage by that total. After you use this trait, you can't use it again until you finish a short or long rest.<br>Powerful Build: You count as one size larger when determining your carrying capacity and the weight you can push, drag, or lift.<br>Mountain Born: You're acclimated to high altitude, including elevations above 20,000 feet. You're also naturally adapted to cold climates, as described in chapter 5 of the Dungeon Master's Guide.<br>Goliaths can speak, read, and write Common and Giant";
    }

    if($_SESSION["race"] == "Minotaur"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>The Labyrinth: Minotaurs have advantage on Wisdom (Survival) checks made to avoid getting lost and are immune to the Maze spell.<br>The Sin of Tyre: Minotaurs have a deep hatred of arcane magic, they rage against it whenever possible. Minotaurs can add their Strength modifier to Intelligence and Charisma saving throws.<br>Powerful Build: You count as one size larger when determining your carrying capacity and the weight you can push, drag, or lift.<br>Astaroth's Chosen: The god Astaroth in a rare moment of compassion, with assistance from Cassius, released the Minotaurs from the terrors of the wizard Tyre. In return the Minotaurs are blessed with some of the two deities divinity. Minotaurs automatically succeed on non-contested Strength checks with a DC of 20 or below to break their chains or the chains of others. They have advantage on all other Strength checks.<br>Menacing: You have proficiency in the Intimidation skill.<br>Hybrid Nature: You have two creature types: humanoid and monstrosity. You can be affected by a game effect if it works on either of your creature types.<br>Minotaurs can speak, read, and write Common and Giant";
    }

    if($_SESSION["race"] == "Grippli"){
        $size = "Small";
        $speed = "30";
        $constitution = $constitution + 2;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Race Features</b><br>Prehensile Tongue - You can grasp things with your tongue. It has a reach of 15 feet, and it can lift a number of pounds equal to five times your Strength score. You can use it to do the following simple tasks: lift, drop, hold, push, or pull an object or a creature; open or close a door or a container; grapple someone; or make an unarmed strike; and other DM approved tasks. Your tongue can't wield weapons or shields or do anything that requires manual precision, such as using tools or magic items or performing the somatic components of a spell.<br>Hops for days: You have proficiency in the Athletics skill and advantage on any check made to jump.<br>Weapon Familiarity: You are proficient in the use of nets.<br>Amphibious: You can breathe air and water.<br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You cannot discern color in darkness, only shades of grey.<br>Grippli have a swimming speed of 30ft<br>Grippli can speak, read, and write Common and Sylvan(Moon)";
    }

    if($_SESSION["race"] == "Ratfolk-Diseased One"){
        $size = "Small";
        $speed = "30";
        $dexterity = $dexterity + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Sneaky: You are proficient in the Stealth skill<br>Keen Smell: You have advantage on Wisdom (Perception) checks that rely on smell<br>Plague Doctor: You have proficiency with Poisoner’s Kit<br>Enfeebling Bite: Your bite is a natural weapon you can use to make unarmed strikes. Your bite counts as a finesse weapon, and as such, you deal piercing damage equal to 1d4 + your Strength or Dexterity modifier. When you hit with your bite, you can have the enemy make a Constitution save against a DC equal to 8 + your proficiency + your Wisdom modifier or they deal only half damage with weapon attacks that use Strength until the start of your next turn. You can use this ability a number of times equal to your proficiency and you regain all uses when you finish a short or long rest<br>Ratfolk can speak, read, and write Common, Beastspeak, and one other language of your choice";
    }

    if($_SESSION["race"] == "Ratfolk-Cunning One"){
        $size = "Small";
        $speed = "30";
        $dexterity = $dexterity + 2;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Sneaky: You are proficient in the Stealth skill<br>Keen Smell: You have advantage on Wisdom (Perception) checks that rely on smell<br>Scientist: You have proficiency with Tinker's Tools<br>Cunning Plan: You can spend 1 minute telling your comrades your latest cunning plan. You can choose one skill for your allies or choose a skill for each ally separately (maximum of 5 allies). For the next hour, your chosen allies can reroll one d20 for the chosen skill check. The new roll must be used. Once you use this trait, you can't use it again until you finish a long rest<br>Ratfolk can speak, read, and write Common, Beastspeak, and one other language of your choice";
    }

    if($_SESSION["race"] == "Scaleheart"){
        $size = "Medium";
        $speed = "30";
        $constitution = $constitution + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Advanced Lung Capacity: You can hold your breath for up to one hour.<br>Musclebound: You gain proficiency in Athletics.<br>Improved Senses: You gain 60 ft. Darkvision and you gain Tremorsense of 30 ft. when in a body of water at least two feet deep. This Tremorsense can only detect creatures in the same body of water as you.<br>Suit of Scales: You gain a swim speed of 30 ft. You have advantage on Dexterity (Stealth) checks while motionless in a body of water at least two feet deep.<br>Ten-Thousand Pound Bite: For the purposes of grappling, you count as one size category larger. You can use your mouth to grapple. While you have a creature grappled in your mouth, you cannot perform the verbal components of spells. You can deal bludgeoning damage equal to your strength modifier at the start of your turn against one target you are grappling in your mouth.<br>Scalehearts can speak, read, and write Common and Sylvan (Moon)";
    }

    if($_SESSION["race"] == "Aarakocra"){
        $size = "Medium";
        $speed = "25";
        $dexterity = $dexterity + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Flight: You have a flying speed of 50 feet. To use this speed, you can't be wearing medium or heavy armor.<br>Talons: You are proficient with your unarmed strikes, which deal 1d4 slashing damage on a hit.<br>Aarokocra can speak, read, and write Common, Aarakocra, and Auran";
    }

    if($_SESSION["race"] == "Kitsune-Vulpin"){
        $size = "Medium";
        $speed = "30";
        $wisdom = $wisdom + 2;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to a nocturnal lifestyle, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Fox’s Cunning: You have proficiency in the Investigation skill<br>Trickster: You are a natural at getting into places you shouldn’t be. On your turn, you can move through any space at least 3 inches in diameter and do so without squeezing. When you stop moving, the regular squeezing rules apply if you are in a space one size smaller than you. You cannot willingly stop in a space smaller than that, and if forced to do so, you immediately flow to the nearest space you can fit. You can use this feature a number of times equal to your proficiency bonus and you regain all uses upon finishing a short or long rest. This ability also grants advantage to escaping manacles (Dexterity check)<br>Go for the Throat: You are an expert in attacking when people don’t expect it and bite where it most hurts. Once per attack action, when you make a melee weapon attack with advantage and hit, you can deal 1d4 piercing damage to a target within 5 ft. of you that you can see. You do not need advantage on the attack roll if another enemy of the target is within 5 ft. of it, that enemy is not incapacitated, and you don’t have disadvantage on the attack roll<br>Kitsune can speak, read, and write Common and Sylvan (Moon)";
    }

    if($_SESSION["race"] == "Kitsune-Seishin"){
        $size = "Medium";
        $speed = "30";
        $wisdom = $wisdom + 2;
        $charisma = $charisma + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to a nocturnal lifestyle, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Fox’s Cunning: You have proficiency in the Investigation skill<br>Will-o-wisp: As a bonus action, you can call forth a mote of light to follow you, one for each tail you have. These motes occupy the same space as you and emit 20 ft. dim light. As an action, you can combine all motes together to make a target you can see within 30 ft. of you. This target must make a DC 14 Wisdom saving throw. Upon failure, the target takes 1d6 + your Charisma modifier of Radiant damage, and half as much on a successful one. Multiple motes do not increase damage. You must re-summon the motes after having made an attack with them. If you have multiple attacks within an attack action, this replaces one of them<br>Clandestine: You are able to hide the fact that you are a Kitsune and Skinwalker, and instead appear Human. As an action, you can magically hide your ears, fur, and tail(s), and visually replace them with human equivalents. You may drop the illusion as a free action<br>Kitsune can speak, read, and write Common and Sylvan (Moon)";
    }


    if($_SESSION["race"] == "Witchwolf-Hound"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Senses: A lineage of night hunters has given you excellent hunting senses. You gain 60 ft. Darkvision and gain a Scent sense with a range of 30 ft.<br>Tenacious: You critically succeed on death saving throws on a 18, 19, or 20<br>Clawed: You have sharp claws which you can use to make unarmed strikes. On a hit, they deal 1d6 slashing damage + your Strength modifier<br>Tireless: You gain proficiency in Athletics<br>Subdue Prey: If you move 20 feet straight towards a target and then grapple the target successfully immediately afterwards, both you and the target become prone (the target is still grappled)<br>Frenzied Howl: A snarling, ferocious howl erupts from you as an action. All hostile creatures within 30 feet of you must make a Wisdom saving throw against DC 12 + proficiency or be frightened of you for 1 minute. They can repeat this save at the end of each of their turns. After using this ability, your movement speed is increased by 10 feet for the next minute. Once you use this trait, you can't use it again until you finish a long rest<br>Witchwolves can speak, read, and write Common and Sylvan (Moon)";
    }

    if($_SESSION["race"] == "Witchwolf-Hound"){
        $size = "Medium";
        $speed = "30";
        $wisdom = $wisdom + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Senses: A lineage of night hunters has given you excellent hunting senses. You gain 60 ft. Darkvision and gain a Scent sense with a range of 30 ft.<br>Tenacious: You critically succeed on death saving throws on a 18, 19, or 20<br>Clawed: You have sharp claws which you can use to make unarmed strikes. On a hit, they deal 1d6 slashing damage + your Strength modifier<br>Attentive: You gain proficiency in Perception<br>Dogged Pursuit: Your Scent range increases by 60 feet. You have advantage on Perception or Survival checks that rely on Scent<br>Hunter’s Howl: As an action, you let loose a low and keening howl. For the next minute, your Scent range increases by 30 feet, allowing you to know the exact location of every creature at less than their maximum hit points within this Scent radius. Once you use this trait, you can't use it again until you finish a long rest<br>Witchwolves can speak, read, and write Common and Sylvan (Moon)";
    }

    if($_SESSION["race"] == "Kenku"){
        $size = "Medium";
        $speed = "30";
        $dexterity = $dexterity + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Expert Forgery: You can duplicate other creatures' handwriting and craftwork. You have advantage on all checks made to produce forgeries or duplicates of existing objects<br>Kenku Training: You are proficient in your choice of two of the following skills: Acrobatics, Deception, Stealth, and Sleight of Hand<br>Mimicry: You can mimic sounds you have heard, including voices. A creature that hears the sounds can tell they are imitations with a successful Wisdom (Insight) check opposed by your Charisma (Deception) check<br>Kenku can read and write Common and Auran, but you can only speak using your Mimicry trait.";
    }

    if($_SESSION["race"] == "Tabaxi"){
        $size = "Medium";
        $speed = "30";
        $dexterity = $dexterity + 2;
        $charisma = $charisma + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: You have a cat's keen senses, especially in the dark. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Feline Agility: Your reflexes and agility allow you to move with a burst of speed. When you move on your turn in combat, you can double your speed until the end of the turn. Once you use this trait, you can't use it again until you move 0 feet on one of your turns<br>Cat's Claws: Because of your claws, you have a climbing speed of 20 feet. In addition, your claws are natural weapons, which you can use to make unarmed strikes. If you hit with them, you deal slashing damage equal to 1d4 + your Strength modifier, instead of the bludgeoning damage normal for an unarmed strike<br>Cat's Talents: You have proficiency in the Perception and Stealth skills<br>Tabaxi can read and write Common and any other language of your choice";
    }

    if($_SESSION["race"] == "Tortle"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Claws: Your claws are natural weapons, which you can use to make unarmed strikes. If you hit with them, you deal slashing damage equal to 1d4 + your Strength modifier, instead of bludgeoning damage normal for an unarmed strike<br>Hold Breath: You can hold your breath for up to 1 hour at a time. Tortles aren't natural swimmers, but they can remain underwater for some time before needing to come up for air<br>Natural Armor: Due to your shell and the shape of your body, you are ill-suited to wearing armor. Your shell provides ample protection, however; it gives you a base AC of 17 (your Dexterity modifier doesn't affect this number). You gain no benefit from wearing armor, but if you are using a shield, you can apply the shield's bonus as normal<br> Shell Defense: You can withdraw into your shell as an action. Until you emerge, you gain a +4 bonus to AC, and you have advantage on Strength and Constitution saving throws. While in your shell, you are prone, your speed is 0 and can't increase, you have disadvantage on Dexterity saving throws, you can't take reactions, and the only action you can take is a bonus action to emerge from your shell<br>Survival Instinct: You gain proficiency in the Survival skill. Tortles have finely honed survival instincts<br>Tortles can read and write Common and Aquan";
    }

    if($_SESSION["race"] == "Mountain Dwarf"){
        $size = "Medium";
        $speed = "25";
        $strenth = $strenth + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Speed: Your speed is not reduced by wearing heavy armor<br>Darkvision: Accustomed to life underground, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Dwarven Resilience: You have advantage on saving throws against poison, and you have resistance against poison damage<br>Dwarven Combat Training: You have proficiency with the battleaxe, handaxe, light hammer, and warhammer<br>Tool Proficiency: You gain proficiency with the artisan's tools of your choice: Smith's tools, brewer's supplies, or mason's tools<br>Stonecunning: Whenever you make an Intelligence (History) check related to the origin of stonework, you are considered proficient in the History skill and add double your proficiency bonus to the check, instead of your normal proficiency bonus<br>Dwarven Armor Training: You have proficiency with light and medium armor<br>Mountain Dwarves can read and write Common and Dwarven";
    }

    if($_SESSION["race"] == "Hill Dwarf"){
        $size = "Medium";
        $speed = "25";
        $constitution = $constitution + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Speed: Your speed is not reduced by wearing heavy armor<br>Darkvision: Accustomed to life underground, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Dwarven Resilience: You have advantage on saving throws against poison, and you have resistance against poison damage<br>Dwarven Combat Training: You have proficiency with the battleaxe, handaxe, light hammer, and warhammer<br>Tool Proficiency: You gain proficiency with the artisan's tools of your choice: Smith's tools, brewer's supplies, or mason's tools<br>Stonecunning: Whenever you make an Intelligence (History) check related to the origin of stonework, you are considered proficient in the History skill and add double your proficiency bonus to the check, instead of your normal proficiency bonus<br>Dwarven Toughness: Your hit point maximum increases by 1, and it increases by 1 every time you gain a level<br>Hill Dwarves can read and write Common and Dwarven";
    }

    if($_SESSION["race"] == "Duergar"){
        $size = "Medium";
        $speed = "25";
        $constitution = $constitution + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Speed: Your speed is not reduced by wearing heavy armor<br>Superior Darkvision: Accustomed to life underground, you have superior vision in dark and dim conditions. You can see in dim light within 120 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Dwarven Resilience: You have advantage on saving throws against poison, and you have resistance against poison damage<br>Dwarven Combat Training: You have proficiency with the battleaxe, handaxe, light hammer, and warhammer<br>Stonecunning: Whenever you make an Intelligence (History) check related to the origin of stonework, you are considered proficient in the History skill and add double your proficiency bonus to the check, instead of your normal proficiency bonus<br>Duergar Magic: When you reach 3rd level, you can cast the Enlarge/Reduce spell on yourself once with this trait, using only the spell's enlarge option. When you reach 5th level, you can cast the Invisibility spell on yourself once with this trait. You don't need material components for either spell, and you can't cast them while you're in direct sunlight, although sunlight has no effect on them once cast. You regain the ability to cast these spells with this trait when you finish a long rest. Intelligence is your spellcasting ability for these spells<br>Sunlight Sensitivity: You have disadvantage on attack rolls and Wisdom (Perception) checks that rely on sight when you, the target of your attack, or whatever you are trying to perceive is in direct sunlightl<br>Duergar can read and write Common, Dwarven, and Undercommon";
    }

    if($_SESSION["race"] == "Lightfoot Halfling"){
        $size = "Small";
        $speed = "25";
        $dexterity = $dexterity + 2;
        $charisma = $charisma + 1;
        $notes .= "<br><b>Race Features</b><br>Lucky: When you roll a 1 on an attack roll, ability check, or saving throw, you can reroll the die and must use the new roll<br>Brave: You have advantage on saving throws against being frightened<br>Halfling Nimbleness: You can move through the space of any creature that is of a size larger than yours<br>Naturally Stealthy: You can attempt to hide even when you are obscured only by a creature that is at least one size larger than you<b>Lightfoot Halfling can read and write Common and Halfling";
    }

    if($_SESSION["race"] == "Stout Halfling"){
        $size = "Small";
        $speed = "25";
        $dexterity = $dexterity + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Lucky: When you roll a 1 on an attack roll, ability check, or saving throw, you can reroll the die and must use the new roll<br>Brave: You have advantage on saving throws against being frightened<br>Halfling Nimbleness: You can move through the space of any creature that is of a size larger than yours<br>Stout Resilience: You have advantage on saving throws against poison, and you have resistance against poison damage<b>Stout Halfling can read and write Common and Halfling";
    }

    if($_SESSION["race"] == "Songsworn"){
        $size = "Small";
        $speed = "25";
        $charisma = $charisma + 2;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Race Features</b><br>Lucky: When you roll a 1 on an attack roll, ability check, or saving throw, you can reroll the die and must use the new roll<br>Brave: You have advantage on saving throws against being frightened<br>Halfling Nimbleness: You can move through the space of any creature that is of a size larger than yours<br>Songsworn: You gain proficiency in the performance skill. You have resistance to thunder damage<br>Songsworn can read and write Common and Halfling";
    }

    if($_SESSION["race"] == "Ghostwise"){
        $size = "Small";
        $speed = "25";
        $dexterity = $dexterity + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Lucky: When you roll a 1 on an attack roll, ability check, or saving throw, you can reroll the die and must use the new roll<br>Brave: You have advantage on saving throws against being frightened<br>Halfling Nimbleness: You can move through the space of any creature that is of a size larger than yours<br>Silent Speech: You can speak telepathically to any creature within 30 feet of you. The creature understands you only if the two of you share a language. You can speak telepathically in this way to one creature at a time<br>Ghostwise can read and write Common and Halfling";
    }

    if($_SESSION["race"] == "Half-Orc"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your orc blood, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Menacing: You gain proficiency in the Intimidation skill<br>Relentless Endurance: When you are reduced to 0 hit points but not killed outright, you can drop to 1 hit point instead. You can't use this feature again until you finish a long rest<br>Savage Attacks: When you score a critical hit with a melee weapon attack, you can roll one of the weapon's damage dice one additional time and add it to the extra damage of the critical hit<br>Half-Orcs can read and write Common and Orclin";
    }

    if($_SESSION["race"] == "Bugbear"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 2;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your orc blood, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Long-Limbed: When you make a melee attack on your turn, your reach for it is 5 feet greater than normal<br>Powerful Build: You count as one size larger when determining your carrying capacity and the weight you can push, drag, or lift<br>Sneaky: You are proficient in the Stealth skill<br>Surprise Attack: If you surprise a creature and hit it with an attack on your first turn in combat, the attack deals an extra 2d6 damage to it. You can use this trait only once per combat<br>Bugbear can read and write Common and Goblin";
    }

    if($_SESSION["race"] == "Hobgoblin"){
        $size = "Medium";
        $speed = "30";
        $constitution = $constitution + 2;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your orc blood, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Martial Training: You are proficient with one exotic weapon of your choice and one exotic light armor of your choice<br>Saving Face: Hobgoblins are careful not to show weakness in front of their allies, for fear of losing status. If you miss with an attack roll or fail an ability check or a saving throw, you can gain a bonus to the roll equal to the number of allies you can see within 30 feet of you (maximum bonus of +5). Once you use this trait, you can’t use it again until you finish a short or long rest<br>Hobgolbin can read and write Common and Orclin";
    }

    if($_SESSION["race"] == "Orc"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 2;
        $constitution = $constitution + 1;
        $intelligence = $intelligence - 2;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your orc blood, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<brAggressive: As a bonus action, you can move up to your movement speed toward a hostile creature you can see or hear. You must end this move closer to the enemy than you started<br>
        Menacing: You are trained in the Intimidation skill<br>Powerful Build: You count as one size larger when determining your carrying capacity and the weight you can push, drag, or lift<br>Half-Orcs can read and write Common and Orclin";
    }

    if($_SESSION["race"] == "Red Orc"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your orc blood, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Menacing: You are trained in the Intimidation skill<br>Powerful Build: You count as one size larger when determining your carrying capacity and the weight you can push, drag, or lift<br>Tribalism: Orcs all belong to tribes with very distinct cultures, these cultures are so distinct that magical changes occur in the orcs, changing their physical qualities and hueing their skin. As such orcs have very different abilities and outlooks dependent on their tribe. This gives them access to a tribal ability that all of that tribe share. However, if an orc does not belong to a tribe due to a variety of circumstances, they receive the following ability:<br>&#8226;Burning Blood: Whenever an enemy within 5 feet of you would attack you with a melee weapon and deal more damage than your Constitution modifier, you can bleed fire on that enemy for an amount of fire damage equal to your Constitution modifier. This can only occur once per round<br>Red Orc can read and write Common and Orclin";
    }

    if($_SESSION["race"] == "Goblin"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your orc blood, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Fury of the Small: When you damage a creature with an attack or a spell and the creature's size is larger than yours, you can cause the attack or spell to deal extra damage to the creature. The extra damage equals your level. Once you use this trait, you can't use it again until you finish a short or long rest<br>Nimble Escape: You can take the Disengage or Hide action as a bonus action on each of your turns<br>Goblin can read and write Common and Goblin";
    }

    if($_SESSION["race"] == "Dragonborn"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 2;
        $charisma = $charisma + 1;
        $notes .= "<br><b>Race Features</b><br>Draconic Ancestry: You have draconic ancestry. Choose one type of dragon from the Draconic Ancestry table. Your breath weapon and damage resistance are determined by the dragon type (Select your dragon type)<br>Breath Weapon: You can use your action to exhale destructive energy. Your draconic ancestry determines the size, shape, and damage type of the exhalation<br>&#8226;When you use your breath weapon, each creature in the area of the exhalation must make a saving throw, the type of which is determined by your draconic ancestry. The DC for this saving throw equals 8 + your Constitution modifier + your proficiency bonus. A creature takes 2d6 damage on a failed save, and half as much damage on a successful one. The damage increases to 3d6 at 6th level, 4d6 at 11th level, and 5d6 at 16th level<br>&#8226;
        After you use your breath weapon, you can't use it again until you complete a short or long rest<br>Damage Resistance: You have resistance to the damage type associated with your draconic ancestry<br>Dragonborn can read and write Common and Draconic";
    }

    if($_SESSION["race"] == "Earth Genasi"){
        $size = "Medium";
        $speed = "30";
        $constitution = $constitution + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Earth Walk: You can move across difficult terrain without it affecting you as long as it is from a ground based source<br>Merge with Stone: You can cast the pass without trace spell once with this trait, requiring no material components, and you regain the ability to cast it this way when you finish a long rest. Constitution is your spellcasting ability for this spell<br>Seal of Earth: You gain a burrow speed of 30ft. If you should deal acid damage, the damage is increased by 2, this applies only once per source<br>Earth Genasi can read and write Common and Terran";
    }

    if($_SESSION["race"] == "Water Genasi"){
        $size = "Medium";
        $speed = "30";
        $constitution = $constitution + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Cold Resistance: You have resistance to cold damage<br> Amphibious: You can breathe air and water<br>Swim: You have a swimming speed of 30 feet<br>Call to the Wave: You know the shape water cantrip. When you reach 3rd level, you can cast the create or destroy water spell as a 2nd-level spell once with this trait, and you regain the ability to cast it this way when you finish a long rest. Constitution is your spellcasting ability for these spells<br>Seal of Water: Your swim speed is increased by 30ft. If you should deal cold damage, the damage is increased by 2, this applies only once per source<br>Water Genasi can read and write Common and Aquan";
    }

    if($_SESSION["race"] == "Air Genasi"){
        $size = "Medium";
        $speed = "30";
        $constitution = $constitution + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Unending Breath: You can hold your breath indefinitely while you're not incapacitated<br>Mingle with the Wind: You can cast the levitate spell once with this trait, requiring no material components, and you regain the ability to cast it this way when you finish a long rest. Constitution is your spellcasting ability for this spell<br>Seal of Air: You gain a fly speed of 30ft. If you should deal lightning damage, the damage is increased by 2, this applies only once per source<br>Air Genasi can read and write Common and Auran";
    }

    if($_SESSION["race"] == "Fire Genasi"){
        $size = "Medium";
        $speed = "60";
        $constitution = $constitution + 2;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. Your ties to the Elemental Plane of Fire make your darkvision unusual: everything you see in darkness is in a shade of red<br>Fire Resistance: You have resistance to fire damage<br>Reach to the Blaze: You know the produce flame cantrip. Once you reach 3rd level, you can cast the burning hands spell once with this trait as a 1st-level spell, and you regain the ability to cast it this way when you finish a long rest. Constitution is your spellcasting ability for these spells<br>Seal of Fire: You increase your walking speed by 30. If you should deal fire damage, the damage is increased by 2, this applies only once per source<br>Fire Genasi can read and write Common and Iqnan";
    }

    if($_SESSION["race"] == "Asmodeus"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Infernal Legacy: You know the thaumaturgy cantrip. Once you reach 3rd level, you can cast the hellish rebuke spell as a 2nd-level spell; you must finish a long rest in order to cast the spell again using this trait. Once you reach 5th level, you can also cast the darkness spell; you must finish a long rest in order to cast the spell again using this trait. Charisma is your spellcasting ability for these spells<br>Asmodeus can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Baalzebul"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Legacy of Maladomini: You know the thaumaturgy cantrip. When you reach 3rd level, you can cast the ray of sickness spell as a 2nd-level spell once with this trait and regain the ability to do so when you finish a long rest. When you reach 5th level, you can cast the crown of madness spell once with this trait and regain the ability to do so when you finish a long rest. Charisma is your spellcasting ability for these spells<br>Baalzebul can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Dispater"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Legacy of Dis: You know the thaumaturgy cantrip. When you reach 3rd level, you can cast the disguise self spell once with this trait and regain the ability to do so when you finish a long rest. When you reach 5th level, you can cast the detect thoughts spell once with this trait and regain the ability to do so when you finish a long rest. Charisma is your spellcasting ability for these spells<br>Dispater can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Fierna"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Legacy of Phlegethos: You know the friends cantrip. When you reach 3rd level, you can cast the charm person spell as a 2nd-level spell once with this trait and regain the ability to do so when you finish a long rest. When you reach 5th level, you can cast the suggestion spell once with this trait and regain the ability to do so when you finish a long rest. Charisma is your spellcasting ability for these spells<br>Fierna can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Glasya"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Legacy of Malbolge: You know the minor illusion cantrip. When you reach 3rd level, you can cast the disguise self spell once with this trait and regain the ability to do so when you finish a long rest. When you reach 5th level, you can cast the invisibility spell once with this trait and regain the ability to do so when you finish a long rest. Charisma is your spellcasting ability for these spellss<br>Glasya can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Levistus"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Legacy of Stygia: You know the ray of frost cantrip. When you reach 3rd level, you can cast the armor of Agathys spell as a 2nd-level spell once with this trait and regain the ability to do so when you finish a long rest. When you reach 5th level, you can cast the darkness spell once with this trait and regain the ability to do so when you finish a long rest. Charisma is your spellcasting ability for these spells<br>Levistus can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Mammon"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Legacy of Minauros: You know the mage hand cantrip. When you reach 3rd level, you can cast the Tenser's floating disk spell once with this trait and regain the ability to do so when you finish a short or long rest. When you reach 5th level, you can cast the arcane lock spell once with this trait, requiring no material component, and regain the ability to do so when you finish a long rest. Charisma is your spellcasting ability for these spells<br>Levistus can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Mephistopheles"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Legacy of Cania: You know the mage hand cantrip. When you reach 3rd level, you can cast the burning hands spell as a 2nd-level spell once with this trait and regain the ability to do so when you finish a long rest. When you reach 5th level, you can cast the flame blade spell once with this trait and regain the ability to do so when you finish a long rest. Charisma is your spellcasting ability for these spells<br>Mephistopheles can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Zariel"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Legacy of Avernus: You know the thaumaturgy cantrip. When you reach 3rd level, you can cast the searing smite spell as a 2nd-level spell once with this trait and regain the ability to do so when you finish a long rest. When you reach 5th level, you can cast the branding smite spell once with this trait and regain the ability to do so when you finish a long rest. Charisma is your spellcasting ability for these spells<br>Zariel can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Variant-Infernal Legacy"){
        $size = "Medium";
        $speed = "30";
        $intelligence = $intelligence + 1;
        $availablepoints = $availablepoints + 2;
        $availablepointstext .= "Choose Dexterity or Charisma +2<br>";
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Infernal Legacy: You know the thaumaturgy cantrip. Once you reach 3rd level, you can cast the hellish rebuke spell as a 2nd-level spell; you must finish a long rest in order to cast the spell again using this trait. Once you reach 5th level, you can also cast the darkness spell; you must finish a long rest in order to cast the spell again using this trait. Charisma is your spellcasting ability for these spells<br>Tiefling can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Variant-Devil's Tongue"){
        $size = "Medium";
        $speed = "30";
        $intelligence = $intelligence + 1;
        $availablepoints = $availablepoints + 2;
        $availablepointstext .= "Choose Dexterity or Charisma +2<br>";
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Devil's Tongue: You know the vicious mockery cantrip. When your reach 3rd level, you can cast the charm person spell as a 2nd-level spell once with this trait. When you reach 5th level, you can cast the enthrall spell once with this trait. You must finish a long rest to cast these spells once again with this trait. Charisma is your spellcasting ability for them. This trait replaces the Infernal Legacy trait<br>Tiefling can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Variant-Hellfire"){
        $size = "Medium";
        $speed = "30";
        $intelligence = $intelligence + 1;
        $availablepoints = $availablepoints + 2;
        $availablepointstext .= "Choose Dexterity or Charisma +2<br>";
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Hellfire: You know the thaumaturgy cantrip. Once you reach 3rd level, you can cast the burning hands spell once per day as a 2nd-level spell; you must finish a long rest in order to cast the spell again using this trait. Once you reach 5th level, you can also cast the darkness spell; you must finish a long rest in order to cast the spell again using this trait. Charisma is your spellcasting ability for these spells<br>Tiefling can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Variant-Winged"){
        $size = "Medium";
        $speed = "30";
        $intelligence = $intelligence + 1;
        $availablepoints = $availablepoints + 2;
        $availablepointstext .= "Choose Dexterity or Charisma +2<br>";
        $notes .= "<br><b>Race Features</b><br>Darkvision: Thanks to your infernal heritage, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Hellish Resistance: You have resistance to fire damage<br>Winged: You have bat-like wings sprouting from your shoulder blades. You have a flying speed of 30 feet while you aren't wearing heavy armor<br>Tiefling can read and write Common and Infernal";
    }

    if($_SESSION["race"] == "Fallen"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Blessed with a radiant soul, your vision can easily cut through darkness. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Celestial Resistance: You have resistance to necrotic damage and radiant damage<br>Healing Hands: As an action, you can touch a creature and cause it to regain a number of hit points equal to your level. Once you use this trait, you can't use it again until you finish a long rest<br>
        Light Bearer: You know the light cantrip. Charisma is your spellcasting ability for it<br>Necrotic Shroud: Starting at 3rd level, you can use your action to unleash the divine energy within yourself, causing your eyes to turn into pools of darkness and two skeletal, ghostly, flightless wings to sprout from your back. The instant you transform, other creatures within 10 feet of you that can see you must succeed on a Charisma saving throw (DC 8 + your proficiency bonus + your Charisma modifier) or become frightened of you until the end of your next turn<br>&#8226;Your transformation lasts for 1 minute or until you end it as a bonus action. During it, once on each of your turns, you can deal extra necrotic damage to one target when you deal damage to it with an attack or a spell. The extra necrotic damage equals your level<br>&#8226;Once you use this trait, you can't use it again until you finish a long rest<br>Aasimar can read and write Common and Celestial";
    }

    if($_SESSION["race"] == "Protector"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Blessed with a radiant soul, your vision can easily cut through darkness. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Celestial Resistance: You have resistance to necrotic damage and radiant damage<br>Healing Hands: As an action, you can touch a creature and cause it to regain a number of hit points equal to your level. Once you use this trait, you can't use it again until you finish a long rest<br>
        Light Bearer: You know the light cantrip. Charisma is your spellcasting ability for it<br>Radiant Soul: Starting at 3rd level, you can use your action to unleash the divine energy within yourself, causing your eyes to glimmer and two luminous, incorporeal wings to sprout from your back<br>&#8226;Your transformation lasts for 1 minute or until you end it as a bonus action. During it, you have a flying speed of 30 feet, and once on each of your turns, you can deal extra radiant damage to one target when you deal damage to it with an attack or a spell. The extra radiant damage equals your level<br>&#8226;Once you use this trait, you can't use it again until you finish a long rest<br>Aasimar can read and write Common and Celestial";
    }

    if($_SESSION["race"] == "Scourge"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Blessed with a radiant soul, your vision can easily cut through darkness. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Celestial Resistance: You have resistance to necrotic damage and radiant damage<br>Healing Hands: As an action, you can touch a creature and cause it to regain a number of hit points equal to your level. Once you use this trait, you can't use it again until you finish a long rest<br>
        Light Bearer: You know the light cantrip. Charisma is your spellcasting ability for it<br>Radiant Consumption: Starting at 3rd level, you can use your action to unleash the divine energy within yourself, causing a searing light to radiate from you, pour out of your eyes and mouth, and threaten to char you<br>&#8226;Your transformation lasts for 1 minute or until you end it as a bonus action. During it, you shed bright light in a 10-foot radius and dim light for an additional 10 feet, and at the end of each of your turns, you and each creature within 10 feet of you take radiant damage equal to half your level (rounded up). In addition, once on each of your turns, you can deal extra radiant damage to one target when you deal damage to it with an attack or a spell. The extra radiant damage equals your level<br>&#8226;Once you use this trait, you can't use it again until you finish a long rest<br>Aasimar can read and write Common and Celestial";
    }

    if($_SESSION["race"] == "Triton"){
        $size = "Medium";
        $speed = "30";
        $strenth = $strenth + 2;
        $constitution = $constitution + 1;
        $charisma = $charisma + 1;
        $notes .= "<br><b>Race Features</b><br>Swim Speed: You have a swimming speed of 30 feet<br>Amphibious: You can breathe air and water<br>Darkvision: Adapted to life where the sun's rays fail to reach, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Control Air and Water: A child of the sea, you can call on the magic of elemental air and water. You can cast fog cloud with this trait. Starting at 3rd level, you can cast gust of wind with it, and starting at 5th level, you can also cast wall of water with it. Once you cast a spell with this trait, you can't cast that spell with it again until you finish a long rest. Charisma is your spellcasting ability for these spells<br>Emissary of the Sea: Aquatic beasts have an extraordinary affinity with your people. You can communicate simple ideas with beasts that can breathe water. They can understand the meaning of your words, though you have no special ability to understand them in return<br>Guardians of the Depths: Adapted to even the most extreme ocean depths, you have resistance to cold damage, and you ignore any of the drawbacks caused by a deep, underwater environment<br>Triton can read and write Common and Aquan";
    }

    if($_SESSION["race"] == "Yuan-Ti"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Innate Spellcasting: You know the poison spray cantrip. You can cast animal friendship an unlimited number of times with this trait, but you can target only snakes with it. Starting at 3rd level, you can also cast suggestion with this trait. Once you cast it, you can't do so again until you finish a long rest. Charisma is your spellcasting ability for these spells<br>Magic Resistance: You have advantage on saving throws against spells and other magical effects<br>Poison Immunity: You are immune to poison damage and the poisoned condition<br>Yuan-Ti can read and write Common, Abyssal, and Draconic";
    }

    if($_SESSION["race"] == "Kobold"){
        $size = "Small";
        $speed = "30";
        $dexterity = $dexterity + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Grovel, Cower, and Beg: As an action on your turn, you can cower pathetically to distract nearby foes. Until the end of your next turn, your allies gain advantage on attack rolls against enemies within 10 feet of you that you can see. Once you use this trait, you can't use it again until you finish a short or long rest<br>Pack Tactics: You have advantage on an attack roll against a creature if at least one of your allies is within 5 feet of the creature and the ally isn't incapacitated<br>Sunlight Sensitivity: You have disadvantage on attack rolls and on Wisdom (Perception) checks that rely on sight when you, the target of your attack, or whatever you are trying to perceive is in direct sunlight<br>Kobold can read and write Common and Draconic";
    }

    if($_SESSION["race"] == "Changeling"){
        $size = "Medium";
        $speed = "30";
        $dexterity = $dexterity + 1;
        $availablepoints = $availablepoints + 2;
        $availablepointstext .= "Choose Charisma, Intelligence, or Wisdom +2<br>";
        $notes .= "<br><b>Race Features</b><br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Duplicity: You gain proficiency with the Deception skill<br>Adaptive Physiology: You have advantage on any Strength (Athletics) or Dexterity (Acrobatics) check you make to escape from being grappled or restrained<br>Shapechanger: You can use an action to shapeshift into any humanoid of your size that you have seen, or back into your true form. Your equipment does not change with you. You do not gain any racial traits or abilities of your form, only cosmetic changes. If you die, you revert to your true form<br>Changeling can read and write Common and two languages of your choice";
    }

    if($_SESSION["race"] == "Satyr-Ram"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Laughing Mad: Satyrs are immune to the confusion spell and forms of madness that are not fey in origin<br>Horn-Ram: These horns grant the satyr the ability to charge opponents with their horns. Whenever you would use the dash action move at least of 20 ft, you may make a bonus action attack with your horns, dealing 1d6 bludgeoning damage. If you have the charger feat and you charge with your horns, the damage of the horns increases to 1d12<br>Satyr can read and write Common and Sylvan";
    }

    if($_SESSION["race"] == "Satyr-Mountain"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Laughing Mad: Satyrs are immune to the confusion spell and forms of madness that are not fey in origin<br>Horn-Mountain: These horns grant the Satyr advantage on any saving throw that would cause forced movement. In addition, you gain a climb speed of 20ft<br>Satyr can read and write Common and Sylvan";
    }

    if($_SESSION["race"] == "Satyr-Dragon"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Laughing Mad: Satyrs are immune to the confusion spell and forms of madness that are not fey in origin<br>Horn-Dragon: These horns are infused with the wisdom of the fey dragons, as such these Satyrs possess a stunning insight into other beings. You gain proficiency in Insight, Perception, and Persuasion<br>Satyr can read and write Common and Sylvan";
    }

    if($_SESSION["race"] == "Satyr-Regal"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Laughing Mad: Satyrs are immune to the confusion spell and forms of madness that are not fey in origin<br>Horn-Regal: You know one cantrip of your choice from the wizard spell list. Intelligence is your spellcasting ability for it. In addition, you gain advantage on saving throws vs. spells of the same school of magic as the cantrip you chose<br>Satyr can read and write Common and Sylvan";
    }

    if($_SESSION["race"] == "Satyr-Crown"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Any ability other than Charisma<br>";
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Laughing Mad: Satyrs are immune to the confusion spell and forms of madness that are not fey in origin<br>Horn-Crown: Whenever you take the help action to provide aid to an ally, you may gain temporary hitpoints equal to 1d12 + your character level. You regain the use of this ability when you finish a short or long rest<br>Satyr can read and write Common and Sylvan";
    }

    if($_SESSION["race"] == "Satyr-Antlers"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Laughing Mad: Satyrs are immune to the confusion spell and forms of madness that are not fey in origin<br>Horn-Antlers: You know one cantrip of your choice from the druid spell list. Wisdom is your spellcasting ability for it. Whenever you spend Hit Dice during a short rest, you can heal your other allies for 1d6 additional hit points per die spent<br>Satyr can read and write Common and Sylvan";
    }
    
    if($_SESSION["race"] == "Satyr-Fel"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilit forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Laughing Mad: Satyrs are immune to the confusion spell and forms of madness that are not fey in origin<br>Horn-Fel: You gain proficiency with martial weapons and proficiency in one exotic weapon<br>Satyr can read and write Common and Sylvan";
    }

    if($_SESSION["race"] == "Sprite"){
        $size = "Small";
        $speed = "30";
        $dexterity = $dexterity + 2;
        $charisma = $charisma + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: Accustomed to twilight forests and the night sky, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Laughing Mad: Satyrs are immune to the confusion spell and forms of madness that are not fey in origin<br>Petite Stature: You cannot wield two-handed or heavy weapons, you cannot wear medium or heavy armor, and you cannot carry other creatures when you fly unless otherwise stated from your choice of wings<br>Wing Selection: A sprite's wings can determine not only its physical aspects but also the focus of its fey blessings:<br>&#8226;Quick Wing: Your wings are fast moving and look similar to those of a dragonfly. Your flying speed increases to 50 feet<br>&#8226;Strong Wing: Your wings are long and feathered much like those of a bird. You can carry one creature of medium size or smaller so long as you have the lifting capacity to do so. Additionally, you have advantage on checks and saving throws made to resist effects that would cause you to fall or fail at flying<br>&#8226;Bright Wing: Your wings are colorful, bright, and look similar to those of a butterfly. You have advantage on stealth checks made in bright light, but you have disadvantage on perception checks made in areas of dim light or darkness<br>&#8226;Dark Wing: Your wings are colored in dark hues and look similar to those of a moth. You have advantage on stealth checks made in darkness, but you have disadvantage on perception checks made in areas of bright light<br>&#8226;Iron Wing: Your wings are tough and chitinous like a beetle or boned like a skeleton. You can wield two-handed and heavy weapons, and you can wear medium and heavy armor<br>Sprite can read and write Common and Sylvan";
    }

    if($_SESSION["race"] == "Dhampir-Feral"){
        $size = "Medium";
        $speed = "30";
        $dexterity = $dexterity + 2;
        $charisma = $charisma + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Sunlight Sensitivity: You have disadvantage on attack rolls and on Wisdom (Perception) checks that rely on sight when you, the target of your attack, or whatever you are trying to perceive is in direct sunlight<br>Vampiric Guile: You gain proficiency with one of the following skills of your choice: Deception, Intimidation, or Persuasion<br>Blood Curse: Once per week, Dhampirs must partake in the blood of another humanoid in order to replace their own blood to survive. If a Dhampir fails to do so, they gain one point of exhaustion per day afterwards that cannot be removed until they consume the blood of another humanoid<br>Fangs: Your fangs are a natural weapon which you can use to make unarmed strikes. Your fangs count as a finesse weapon, and as such if you hit with it, you deal piercing damage equal to 1d4 + your Strength or Dexterity modifier<br>Invigorate: Once per long rest, when you successfully attack a living humanoid with blood using your fangs, you can spend one Hit Die to heal yourself (no action required). Roll the die, add your Constitution modifier, and regain a number of hit points equal to the total. Using this ability counts as a source of blood for the blood curse effect<br>Blood Frenzy: Consuming the blood of the living in excess imbues you with power, and embracing it allows for you to enter a state of rage and fervor. Whenever you successfully strike a creature with blood using your fangs, you may choose to enter a Blood Frenzy. Until the end of your turn, you may use a bonus action to make a fang attack against a target. If you succeed on this or any other fang attack on your turn, you may extend the duration of your frenzy by one additional round. If your frenzy was extended by one or more rounds, you gain one point of exhaustion when your frenzy ends<br>Dhampir can read and write Common and Necrill";
    }

    if($_SESSION["race"] == "Dhampir-Royal"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can't discern color in darkness, only shades of gray<br>Sunlight Sensitivity: You have disadvantage on attack rolls and on Wisdom (Perception) checks that rely on sight when you, the target of your attack, or whatever you are trying to perceive is in direct sunlight<br>Vampiric Guile: You gain proficiency with one of the following skills of your choice: Deception, Intimidation, or Persuasion<br>Blood Curse: Once per week, Dhampirs must partake in the blood of another humanoid in order to replace their own blood to survive. If a Dhampir fails to do so, they gain one point of exhaustion per day afterwards that cannot be removed until they consume the blood of another humanoid<br>Fangs: Your fangs are a natural weapon which you can use to make unarmed strikes. Your fangs count as a finesse weapon, and as such if you hit with it, you deal piercing damage equal to 1d4 + your Strength or Dexterity modifier<br>Invigorate: Once per long rest, when you successfully attack a living humanoid with blood using your fangs, you can spend one Hit Die to heal yourself (no action required). Roll the die, add your Constitution modifier, and regain a number of hit points equal to the total. Using this ability counts as a source of blood for the blood curse effect<br>Predatory Charm: You can magically beguile the mind of creatures, twisting their perception of you. You can cast the spell Charm Person once with this trait. At 7th level, you can cast the spell Charm Monster with this trait instead. You regain the ability to cast it this way when you finish a long rest. Charisma is your spellcasting ability for this spell<br>Dhampir can read and write Common and Necrill";
    }

    if($_SESSION["race"] == "Siren-Sailer's Bane"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You cannot discern color in darkness, only shades of grey<br>The Voice: All Sirens can sing, indeed it is their method of feeding and a great tool to their survival. As such, all Sirens have proficiency in the performance skill<br>Emotional Feed: Fear The dread and fear of the sailors they lead astray has long sustained these Sirens throughout the ages. Sailors Bane feeds off of the Frightened condition<br>Speed: Sailer's Bane gains a 40ft Swim Speed<br>Communion: Upon completion of a short or long rest, you can choose a number of allies up to your proficiency modifier to commune with, granting them a boon for combat. This boon is lost upon the target completing another short or long rest<br>&#8226;As an action, you can call out and activate the effects of the communion on any effected ally within 60ft that can hear you. This benefit lasts for 1 minute<br>&#8226;Foreboding Ballad: All selected allies deal an additional 1d6 of thunder damage with their weapon attacks while the Communion is active<br>Siren can read and write Common and Undercommon";
    }

    if($_SESSION["race"] == "Siren-Harpy"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You cannot discern color in darkness, only shades of grey<br>The Voice: All Sirens can sing, indeed it is their method of feeding and a great tool to their survival. As such, all Sirens have proficiency in the performance skill<br>Emotional Feed: Sorrow The weight of sorrow and helplessness felt by cornered prey is one easily exploitable to this Siren. The Medusa feeds off of the Restrained condition<br>Speed: Medusa have an affinity for stone, they have a burrow speed of 10ft<br>Communion: Upon completion of a short or long rest, you can choose a number of allies up to your proficiency modifier to commune with, granting them a boon for combat. This boon is lost upon the target completing another short or long rest<br>&#8226;As an action, you can call out and activate the effects of the communion on any effected ally within 60ft that can hear you. This benefit lasts for 1 minute<br>&#8226;Lamentation: All selected allies gain a +1 to AC while the Communion is active<br>Siren can read and write Common and Undercommon";
    }

    if($_SESSION["race"] == "Siren-Medusa"){
        $size = "Medium";
        $speed = "30";
        $charisma = $charisma + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Darkvision: You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You cannot discern color in darkness, only shades of grey<br>The Voice: All Sirens can sing, indeed it is their method of feeding and a great tool to their survival. As such, all Sirens have proficiency in the performance skill<br>Emotional Feed: Elation The joy and elation of both friend and foe alike bring a sense of fulfillment to this Siren. The Harpy feeds off of the Charmed condition<br>Speed: Harpy's Possess wings that allow them to slowly glide, when they fall. They have a gliding distance of twice their base speed. They possess a climb speed of 30ft<br>Communion: Upon completion of a short or long rest, you can choose a number of allies up to your proficiency modifier to commune with, granting them a boon for combat. This boon is lost upon the target completing another short or long rest<br>&#8226;As an action, you can call out and activate the effects of the communion on any effected ally within 60ft that can hear you. This benefit lasts for 1 minute<br>&#8226;Lamentation: All selected allies gain a +1 to AC while the Communion is active<br>Siren can read and write Common and Undercommon";
    }

    if($_SESSION["race"] == "Kuo-Toa-Goggles"){
        $size = "Medium";
        $speed = "30";
        $constitution = $constitution + 2;
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Race Features</b><br>Swimming: Kuo-Toa have a swim speed of 30ft<br>Superior Darkvision: You can see in dim light within 120 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Deepwalker: Adapted to even the most extreme ocean depths, you have resistance to cold damage, and you ignore any of the drawbacks caused by a deep, underwater environment<br>Slippery: Thanks to the slime-like substance that your skin secretes, you are able to slip from bonds and holds with ease. You gain advantage on ability checks and saving throws made to avoid becoming grappled or restrained<br>Sunlight Sensitivity: You have disadvantage on attack rolls and on Wisdom (Perception) checks that rely on sight when you, the target of your attack, or whatever you are trying to perceive is in direct sunlight<br>Wordwyrd: You are immune to the damage and ill effects produced by glyphs, runes or similar dangers dealing with magical writing<br>Otherworldly Perception: As a bonus action, the Goggler can flick a special lens upon their eye that allows them to see beyond the natural realm. For the next hour, you see invisible creatures and objects as if they were visible, and you can see into the Ethereal Plane. Ethereal creatures and objects appear ghostly and translucent. You can use this ability once per short rest<br>Whispered Reality: A Goggler has lost a sense of their self from the pain and mental anguish they have suffered, but from this loss they have learned to see things in a new light, and to create their own reality. You suffer disadvantage against any Madness effect, but you can cast silent image with this trait. Starting at 3rd level, you can cast phantasmal force with it, and starting at 5th level, you can also cast major image with it. Once you cast a spell with this trait, you can't cast that spell with it again until you finish a long rest. Wisdom is your spellcasting ability for these spells<br>Kuo-Toa can read and write Common and Undercommon";
    }

    if($_SESSION["race"] == "Kuo-Toa-Whips"){
        $size = "Medium";
        $speed = "30";
        $constitution = $constitution + 2;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Race Features</b><br>Swimming: Kuo-Toa have a swim speed of 30ft<br>Superior Darkvision: You can see in dim light within 120 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray<br>Deepwalker: Adapted to even the most extreme ocean depths, you have resistance to cold damage, and you ignore any of the drawbacks caused by a deep, underwater environment<br>Slippery: Thanks to the slime-like substance that your skin secretes, you are able to slip from bonds and holds with ease. You gain advantage on ability checks and saving throws made to avoid becoming grappled or restrained<br>Sunlight Sensitivity: You have disadvantage on attack rolls and on Wisdom (Perception) checks that rely on sight when you, the target of your attack, or whatever you are trying to perceive is in direct sunlight<br>Wordwyrd: You are immune to the damage and ill effects produced by glyphs, runes or similar dangers dealing with magical writing<br>Bite: Your maw of needle-sharp teeth is a natural weapon which you can use to make unarmed strikes with. If you hit with it, you deal piercing damage equal to 1d6 + your Strength modifier, instead of the bludgeoning damage normal for an unarmed strike<br>Feeding Frenzy: Whenever you would score a critical hit, you can make an additional attack as a bonus action<br>Kuo-Toa can read and write Common and Undercommon";
    }

    /*Origin*/
    if($_SESSION["origin"] == "Lowlander"){
        $constitution = $constitution + 1;
        $hitpoints = $hitpoints + 5;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Survival<br>&#8226;Athletics";
    }

    if($_SESSION["origin"] == "Legionnaire"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Survival<br>&#8226;Martial<br>You receive proficiency with a single martial weapon. If you already possess all martial weapon proficiencies, you may instead choose one weapon or unarmed strikes and gain a +1 to attack rolls with them";
    }

    if($_SESSION["origin"] == "Peakfolk"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Survival<br>&#8226;Acrobatics<br>You gain advantage on any skill checks and saving throws to avoid falling off an edge of a height greater than 10ft";
    }

    if($_SESSION["origin"] == "Greenskin-Bane"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Survival<br>&#8226;Nature<br>You gain a +3 to attack rolls vs creatures of the greenskin subtype";
    }

    if($_SESSION["origin"] == "Forgechild"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Survival<br>&#8226;Religion<br>&#8226;Smith's Tools";
    }

    if($_SESSION["origin"] == "Rangeroamer"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Survival<br>&#8226;History<br>Whenever you use the help action, your ally receives an additional +2 to their total roll";
    }

    if($_SESSION["origin"] == "Minesworn"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Survival<br>&#8226;Perception<br>&#8226;Jeweler's Tools<br>You gain a +3 bonus to your passive perception and passive investigation. This bonus does not stack with the Observant feat";
    }

    if($_SESSION["origin"] == "Songport Arrival-Krazak"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Survival<br>&#8226;Performance<br>You may use Bardic Inspiration the bard class feature once per long rest. If you become a bard you instead gain an additional use of your Bardic Inspiration per long rest";
    }

    if($_SESSION["origin"] == "Night Guard Aspirant"){
        $wisdom = $wisdom + 1;
        $constitution = $constitution + 1;
        $hitpoints = $hitpoints + 5;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Perception<br>You gain a +3 bonus to saving throws vs. Fear effects<br>You have disadvantage on perception checks made in the sunlight. This cannot be removed in any way";
    }

    if($_SESSION["origin"] == "Gravewatcher"){
        $wisdom = $wisdom + 1;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Medicine<br>&#8226;Woodcarver's Tools<br>You gain a +3 bonus to saving throws vs. Fear effects<br>You can cast the Detect Evil and Good spell at will, but only to detect undead creatures<br>Healing effects on you are reduced by 3, to a minimum of 1";
    }

    if($_SESSION["origin"] == "Ward of Witchtown"){
        $wisdom = $wisdom + 1;
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Investigation<br>&#8226;Brewer's Supplies<br>You gain a +3 bonus to saving throws vs. Fear effects<br>You gain a +2 bonus to passive perception and passive investigation<br>You do not trust anyone completely, you cannot benefit from allies performing the help action";
    }

    if($_SESSION["origin"] == "Bleak Blessed"){
        $wisdom = $wisdom + 1;
        $charisma = $charisma + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Performance<br>You gain a +3 bonus to saving throws vs. Fear effects<br>You receive a +3 bonus to saving throws versus poison<br>You gain -1 max hitpoint per level";
    }

    if($_SESSION["origin"] == "Gambler Born"){
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Insight<br>You gain a +3 bonus to saving throws vs. Fear effects<br>You gain +2 to initiative checks<br>Roll two d6 after each long rest, you may choose one of the results and gain a +2 to the associated ability score until your next long rest<br>&#8226;1-Strength, 2-Dexterity, 3-Constitution, 4-Intelligence, 5-Wisdom, 6-Charisma<br>Whenever you would roll a 2 on an attack roll, saving throw, or skill check, it counts as though you rolled a 1";
    }

    if($_SESSION["origin"] == "The Skittering"){
        $wisdom = $wisdom + 1;
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Perception<br>&#8226;Weaver's Tools<br>You gain a +3 bonus to saving throws vs. Fear effects<br>You start your career with 800 additional gold<br>You must consume 8 times the normal amount that your race requires. However, you have no problem eating sentient races";
    }

    if($_SESSION["origin"] == "Fangs in the Night"){
        $wisdom = $wisdom + 1;
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Deception<br>You gain a +3 bonus to saving throws vs. Fear effects<br>You have advantage on saving throws versus Enchantment spells<br>You can be turned as an undead using your character level divided by 4 rounded down as the CR";
    }

    if($_SESSION["origin"] == "Dark Howler"){
        $wisdom = $wisdom + 1;
        $strenth = $strenth + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>You gain a +3 bonus to saving throws vs. Fear effects<br>You gain scent with a range of 60ft. You gain advantage on scent based Perception checks<br>The traces of lupine in your blood means that you take double damage from silver or blessed weapons. If a weapon happens to be both silver and blessed, you take triple damage";
    }

    if($_SESSION["origin"] == "Fae-Lost"){
        $wisdom = $wisdom + 1;
        $charisma = $charisma + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Perception<br>You gain a +3 bonus to saving throws vs. Fear effects<br>Your spell DC for Enchantment spells is increased by 1<br>You have vulnerability to lightning damage";
    }

    if($_SESSION["origin"] == "Mage Coast"){
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Arcana<br>You gain 1 wizard cantrip of your choice and cast it at character level";
    }

    if($_SESSION["origin"] == "Navigator"){
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Survival<br>You always know north and you also have advantage on Survival checks to navigate";
    }

    if($_SESSION["origin"] == "Spelunker"){
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Perception<br>You increase your passive perception by 5. This bonus does not stack with the feat, Observant";
    }

    if($_SESSION["origin"] == "Copper Coveman"){
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Persuasion<br>You gain 10% more on official rewards for story arcs and missions";
    }

    if($_SESSION["origin"] == "Shipwreck Diver"){
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Investigation<br>&#8226;Carpenter's Tools<br>You can hold your breath for 1 hour. In addition, you reduce damage taken from bludgeoning damage by 5";
    }

    if($_SESSION["origin"] == "Privateer"){
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Acrobatics<br>You gain a +1 to attack rolls with improvised weapons and with any weapon you do not have proficiency with";
    }

    if($_SESSION["origin"] == "Brutal Coast"){
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Intimidate<br>You are relentless and savage. Once per round when you hit a creature with a weapon attack, the creature takes an extra 2 damage if it's below its hit point maximum";
    }

    if($_SESSION["origin"] == "Whispering Isles"){
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Deception<br>You may cast Speak With Dead once per long rest. You have advantage on Charisma skill checks versus spirits and undead creatures";
    }

    if($_SESSION["origin"] == "Divini"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Choose 2 attributes, you receive a -1 to them<br>Gain proficiency in three skills of your choice";
    }

    if($_SESSION["origin"] == "Lu'Us"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $charisma = $charisma + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Denied Skill - Insight";
    }

    if($_SESSION["origin"] == "Envus"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Denied Skill - Medicine";
    }

    if($_SESSION["origin"] == "Priend"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $dexterity = $dexterity + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Denied Skill - Perception<br>&#8226;Painter's Supplies";
    }

    if($_SESSION["origin"] == "Gla'Ton"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $wisdom = $wisdom + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Denied Skill - Persuasion";
    }

    if($_SESSION["origin"] == "Gri'Id"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Denied Skill - History";
    }

    if($_SESSION["origin"] == "Vrath"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $strenth = $strenth + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Denied Skill - Martial";
    }

    if($_SESSION["origin"] == "Slog"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $charisma = $charisma + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Denied Skill - Athletics";
    }

    if($_SESSION["origin"] == "Bulette Slayer"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Insight<br>You gain a burrow speed of 10ft";
    }

    if($_SESSION["origin"] == "Dragonslayer"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Arcana<br>You reduce all physical damage taken from non draconic enemies by 2. This stacks with other forms of damage reduction";
    }

    if($_SESSION["origin"] == "Floating Nomad"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Arcana<br>You manipulate the metallic properties of ammunition, you deal +2 damage with projectile weapons and receive +2 AC against a ranged attack of the same material";
    }

    if($_SESSION["origin"] == "Giant Slayer"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;History<br>You ignore the extra reach of creatures larger than you";
    }

    if($_SESSION["origin"] == "Manticore Hunter"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Medicine<br>&#8226;Cook's Utensils<br>You gain resistance against poison damage";
    }

    if($_SESSION["origin"] == "Hide Flayer"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Survival<br>&#8226;Leatherworker's Tools<br>The AC of light armors is increased by 1 for you";
    }

    if($_SESSION["origin"] == "Roc Tracker"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Acrobatics<br>Against flying creatures, your critical threat range is 19-20";
    }

    if($_SESSION["origin"] == "Chimera Hunter"){
        $constitution = $constitution + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Investigation<br>Choose a one of the following damage types: Acid, Cold, Fire, Lightning, Poison, or Thunder. Increase the DC of spells you cast that deal that damage by 1";
    }

    if($_SESSION["origin"] == "Riverrunner"){
        $strenth = $strenth + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Perception<br>You gain a swim speed of 30ft. This has no effect if you already possess a swim speed";
    }

    if($_SESSION["origin"] == "Bandit of the Rolling Wastes"){
        $strenth = $strenth + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Stealth<br>You gain advantage on initiative checks";
    }

    if($_SESSION["origin"] == "Daborakian Noble"){
        $strenth = $strenth + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;History Skill<br>&#8226;Calligrapher's Tools<br>You begin your career with 1 Prestige";
    }

    if($_SESSION["origin"] == "Stablemaster"){
        $strenth = $strenth + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Animal Handling<br>You gain the secret language Cantor and may speak to any equine animal easily. You are also a little more well off and start your career with 500 additional gold pieces";
    }

    if($_SESSION["origin"] == "Calvaryman"){
        $strenth = $strenth + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Martial<br>You gain a +1 to melee attack rolls whenever you would move at least 20ft or more before the attack. If you possess the Charger feat, this bonus is increased to +2";
    }

    if($_SESSION["origin"] == "Courier"){
        $strenth = $strenth + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Sleight of Hand<br>You gain 3 additional languages";
    }

    if($_SESSION["origin"] == "Soldier in Training"){
        $strenth = $strenth + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Intimidation<br>You gain proficiency with a martial weapon of your choice. If you already possess all martial weapon proficiencies, you may instead choose one weapon or unarmed strikes and gain a +1 to damage rolls with them";
    }

    if($_SESSION["origin"] == "Plainsrunner"){
        $strenth = $strenth + 1;
        $speed = $speed + 5;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Athletics<br>&#8226;Acrobatic's Skill<br>&#8226;Cobbler's Tools";
    }

    if($_SESSION["origin"] == "Wendigo Soul"){
        $hitpoints = $hitpoints + 10;
        $notes .= "<br><b>Origin Features</b><br>You gain a +2 bonus to all saving throws<br>Whenever an enemy you can see within 10ft rolls a 1 on a d20 roll, you are healed for 3 hit points as you feed on the misfortune of others";
    }

    if($_SESSION["origin"] == "Doomsayer"){
        $hitpoints = $hitpoints + 10;
        $notes .= "<br><b>Origin Features</b><br>You gain a +2 bonus to all saving throws<br>Whenever you roll a 1 on an attack roll, saving throw or skill check in combat, you are healed for a number of hitpoints equal to your Constitution modifier (The heal takes place after the effect of the roll, e.g you miss and then you are healed, not before)";
    }

    if($_SESSION["origin"] == "Banshee Born"){
        $hitpoints = $hitpoints + 10;
        $notes .= "<br><b>Origin Features</b><br>You gain a +2 bonus to all saving throws<br>Whenever you would take a short rest you are healed an amount equal to your constitution modifier";
    }

    if($_SESSION["origin"] == "Woeful Warrior"){
        $hitpoints = $hitpoints + 10;
        $notes .= "<br><b>Origin Features</b><br>You gain a +2 bonus to all saving throws<br>Whenever you kill an enemy, you are healed for a number of hitpoints equal to the killed enemy's Constitution modifier (minimum one)";
    }

    if($_SESSION["origin"] == "Twice Cursed"){
        $hitpoints = $hitpoints + 10;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Glassblower's Tools<br>Whenever you receive a penalty to attack rolls, saving throws or AC, you are healed a number of hit points equal to the penalty. This only counts the first time you receive a given penalty in a combat";
    }

    if($_SESSION["origin"] == "The Path of the Ael"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Martial<br>You gain an additional use of the Glory of Aladine before you must rest<br>Whenever you use the Glory of Aladine, you may make an attack with your weapon against another creature that is within 30ft of you as a bonus action";
    }

    if($_SESSION["origin"] == "The Path of the Scion"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Martial<br>You gain an additional use of the Glory of Aladine before you must rest<br>Whenever you benefit from the Glory of Aladine, the next spell you cast has it's DC increased by 2";
    }

    if($_SESSION["origin"] == "The Path of the Gilded"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Martial<br>You gain an additional use of the Glory of Aladine before you must rest<br>Those that walk the path of the Gilded are more versatile in their skill sets and therefore gain proficiency in a skill of their choice";
    }

    if($_SESSION["origin"] == "The Path of the Forsaken"){
        $availablepoints = $availablepoints + 1;
        $availablepointstext .= "Choose any score of your choice +1<br>";
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Martial<br>You gain an additional use of the Glory of Aladine before you must rest<br>Whenever you benefit from the Glory of Aladine, you may heal all of your allies within 30ft as well as yourself";
    }

    if($_SESSION["origin"] == "Paladin in Training"){
        $charisma = $charisma + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Religion<br>&#8226;Martial<br>Whenever you deal damage to an evil creature, you deal 1 additional radiant damage";
    }

    if($_SESSION["origin"] == "Church Child"){
        $charisma = $charisma + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Religion<br>&#8226;History<br>You gain a cantrip from the cleric spell list and may cast it at character level";
    }

    if($_SESSION["origin"] == "In Plain Sight"){
        $charisma = $charisma + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Religion<br>&#8226;Deception<br>You choose a warlock cantrip. You may cast it at character level";
    }

    if($_SESSION["origin"] == "Ex-Priest"){
        $charisma = $charisma + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Religion<br>&#8226;Insight<br>You may not follow a deity, nor may you benefit from any effect in which this is a prerequisite, this includes spells, classes, items and any other effect. This includes Patrons<br>You gain twice as many hitpoints when spending hit dice to heal during a short rest";
    }

    if($_SESSION["origin"] == "Lineage of the Barrister"){
        $charisma = $charisma + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Religion<br>&#8226;Investigation<br>Choose two tenets required by your class. You mustn't follow those tenets, but you may not actively work against your order or faith";
    }

    if($_SESSION["origin"] == "Wall Born"){
        $charisma = $charisma + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Religion<br>&#8226;Perception<br>&#8226;Mason's Tools<br>You have advantage on attack rolls for opportunity attacks";
    }

    if($_SESSION["origin"] == "Lineage of Coin"){
        $charisma = $charisma + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Religion<br>&#8226;Persuasion<br>Choose a single cleric domain, you may use that domain's channel divinity once per week. If you gain channel divinity from a domain you possess, you may instead change your channel divinity once per long rest to that of another domain. This choice remains until you change it. Your character level counts as your cleric level for the purposes of this channel divinity. Clerics cannot use this origin to change their Turn Undead channel divinity effect";
    }

    if($_SESSION["origin"] == "Tracker"){
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Survival<br>You have resistance to falling damage and suffer no damage from falls of 30ft or less";
        $special .= "<br><b>Khao Origin:</b> You must select to be from either the jungle or the city. Jungle born gain a +1 to Wisdom. City born gain +1 to Charisma.<strong>This has not been pre-calculated</strong>";
    }

    if($_SESSION["origin"] == "Mender"){
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Investigation<br>&#8226;Tinker's Tools<br>You know the Mending cantrip, except you can cast it as an action, and at character level";
        $special .= "<br><b>Khao Origin:</b> You must select to be from either the jungle or the city. Jungle born gain a +1 to Wisdom. City born gain +1 to Charisma.<strong>This has not been pre-calculated</strong>";
    }

    if($_SESSION["origin"] == "Exile"){
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Survival<br>&#8226;Poisoner's Kit<br>Spells you cast that target only yourself have three times the duration as normal. This only effects spells that last more than 1 round";
        $special .= "<br><b>Khao Origin:</b> You must select to be from either the jungle or the city. Jungle born gain a +1 to Wisdom. City born gain +1 to Charisma.<strong>This has not been pre-calculated</strong>";
    }

    if($_SESSION["origin"] == "Druid in Training"){
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Animal Handling<br>&#8226;Herbalism Kit<br>You gain a cantrip from the Druid spell list and cast it at character level";
        $special .= "<br><b>Khao Origin:</b> You must select to be from either the jungle or the city. Jungle born gain a +1 to Wisdom. City born gain +1 to Charisma.<strong>This has not been pre-calculated</strong>";
    }

    if($_SESSION["origin"] == "Forager"){
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Medicine<br>&#8226;Alchemist's Supplies<br>When you use a healing kit to stabilize a creature, you restore 1d4 hit points to that creature. If you use the action from the Healer feat, you heal the target for an additional 1d10 hit points";
        $special .= "<br><b>Khao Origin:</b> You must select to be from either the jungle or the city. Jungle born gain a +1 to Wisdom. City born gain +1 to Charisma.<strong>This has not been pre-calculated</strong>";
    }

    if($_SESSION["origin"] == "Dark One"){
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Religion<br>You may choose two tenets required by your class. You have the option to not follow those tenets, but you may not actively work against your order or faith";
        $special .= "<br><b>Khao Origin:</b> You must select to be from either the jungle or the city. Jungle born gain a +1 to Wisdom. City born gain +1 to Charisma.<strong>This has not been pre-calculated</strong>";
    }

    if($_SESSION["origin"] == "Enforcer"){
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Nature<br>&#8226;Martial<br>Increase your jump height to 20ft. You have advantage on Acrobatics checks for attempting such jumps";
        $special .= "<br><b>Khao Origin:</b> You must select to be from either the jungle or the city. Jungle born gain a +1 to Wisdom. City born gain +1 to Charisma.<strong>This has not been pre-calculated</strong>";
    }

    if($_SESSION["origin"] == "Arcane Student"){
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Arcana<br>&#8226;Gain two other skills of your choice<br>You can cast Detect Magic as an at will ability<br>Choose a single wizard cantrip, you cast that at character level";
    }

    if($_SESSION["origin"] == "Merchant of Magic"){
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Arcana<br>&#8226;Insight<br>&#8226;Alchemist's Supplies<br>You can cast Detect Magic as an at will ability<br>You have advantage on Persuasion and Deception checks used for bartering";
    }

    if($_SESSION["origin"] == "Portal Born"){
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Arcana<br>&#8226;Religion<br>You can cast Detect Magic as an at will ability<br>Choose one of the following damage types: Acid, Cold, Fire, Lightning, Poison, or Thunder. You reduce the damage you take from that damage type by 3. This is specifically applied after resistance";
    }

    if($_SESSION["origin"] == "Mirage Born"){
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Arcana<br>&#8226;History<br>You can cast Detect Magic as an at will ability<br>You can cast Identify at will without needing material components";
    }

    if($_SESSION["origin"] == "Guild Born"){
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Arcana<br>&#8226;Persuasion<br>&#8226;Calligrapher's Suplies<br>You can cast Detect Magic as an at will ability<br>You start your career with an additional 1,000 gold pieces";
    }

    if($_SESSION["origin"] == "Sand Strider"){
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Arcana<br>&#8226;Survival<br>You can cast Detect Magic as an at will ability<br>You don't need to sleep, but can instead meditate similar to an elf for 4 hours, gaining the benefit of an 8 hour rest. If you are also an elf, you reduce the time to 2 hours";
    }

    if($_SESSION["origin"] == "Oasis Native"){
        $intelligence = $intelligence + 1;
        $hitpoints = $hitpoints + 5;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Arcana<br>&#8226;Perception<br>You can cast Detect Magic as an at will ability";
    }

    if($_SESSION["origin"] == "Ruin Dweller"){
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Arcana<br>&#8226;Investigation<br>You can cast Detect Magic as an at will ability<br>You gain a +2 bonus to saving throws vs spells";
    }

    if($_SESSION["origin"] == "Songport Arrival-Majital"){
        $intelligence = $intelligence + 1;
        $notes .= "<br><b>Origin Features</b><br>Skill proficiencies<br>&#8226;Arcana<br>&#8226;Performance<br>You can cast Detect Magic as an at will ability<br>You may use Bardic Inspiration the bard class feature once per long rest. If you become a bard you instead gain an additional use of your Bardic Inspiration per long rest";
    }

    if($_SESSION["divinity"] == "Viderick"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Insight";
    }

    if($_SESSION["divinity"] == "Vavren"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Perception";
    }

    if($_SESSION["divinity"] == "Glory"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Athletics";
    }

    if($_SESSION["divinity"] == "Runethares"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Arcana";
    }

    if($_SESSION["divinity"] == "The Seven"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Any Skill of your choice";
    }

    if($_SESSION["divinity"] == "Iass"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Survival";
    }

    if($_SESSION["divinity"] == "Oun"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Perception";
    }

    if($_SESSION["divinity"] == "Kaheeli"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Nature";
    }

    if($_SESSION["divinity"] == "Wondox"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Athletics";
    }

    if($_SESSION["divinity"] == "Ezokhine"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Insight";
    }

    if($_SESSION["divinity"] == "Sekelcuse"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Deception";
    }

    if($_SESSION["divinity"] == "Matron of Fate"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Persuasion";
    }

    if($_SESSION["divinity"] == "Nero"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Persuasion";
    }

    if($_SESSION["divinity"] == "Vinsc"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Sleight of Hand";
    }

    if($_SESSION["divinity"] == "Inca"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Nature";
    }

    if($_SESSION["divinity"] == "Silloway"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Athletics";
    }

    if($_SESSION["divinity"] == "Lorn"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Medicine";
    }

    if($_SESSION["divinity"] == "Gazenaroc"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Animal Handling";
    }

    if($_SESSION["divinity"] == "Gwaina"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Nature";
    }

    if($_SESSION["divinity"] == "Talven"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Insight";
    }

    if($_SESSION["divinity"] == "Tilt"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Any Skill of your choice";
    }

    if($_SESSION["divinity"] == "Falaael"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: History";
    }

    if($_SESSION["divinity"] == "Cassius"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Martial";
    }

    if($_SESSION["divinity"] == "Astaroth"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Insight";
    }

    if($_SESSION["divinity"] == "Raquel"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Investigation";
    }

    if($_SESSION["divinity"] == "Lorita"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Intimidate";
    }

    if($_SESSION["divinity"] == "Oleken'Hai"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Any Skill of your choice";
    }
    
    if($_SESSION["divinity"] == "Wode"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Stealth";
    }

    if($_SESSION["divinity"] == "Babylon"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Persuasion";
    }

    if($_SESSION["divinity"] == "Crowley"){
        $notes .= "<br><b>Lip Service</b><br>Skill Proficiency: Insight";
    }

    /*Special*/
    if($_SESSION["class"] == "Barbarian"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Strength 13<br>When you gain a level in a class other than your first, you gain only some of that class's starting proficiencies.<br>Armor: Shields<br>Weapons: Simple weapons and martial weapons";
    }

    if($_SESSION["class"] == "Bard"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Charisma 13<br>When you gain a level in a class other than your first, you gain only some of that class's starting proficiencies.<br>Armor: Light armor<br>Tools: One musical instrument of your choice<br>Skills: Choose any skill";
    }

    if($_SESSION["class"] == "Cleric"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Wisdom 13<br>When you gain a level in a class other than your first, you gain only some of that class's starting proficiencies.<br>Armor: Light armor, medium armor, and shields";
    }

    if($_SESSION["class"] == "Druid"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Wisdom 13<br>When you gain a level in a class other than your first, you gain only some of that class's starting proficiencies.<br>Armor: light armor, medium armor, and shields (druids will not wear armor or use shields made of metal)";
    }

    if($_SESSION["class"] == "Fighter"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Strength 13 or Dexterity 13<br>When you gain a level in a class other than your first, you gain only some of that class's starting proficiencies.<br>Armor: Light armor, medium armor, and shields<br>Weapons: Simple weapons and martial weapons";
    }

    if($_SESSION["class"] == "Monk"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Dexterity 13 and Wisdom 13<br>When you gain a level in a class other than your first, you gain only some of that class's starting proficiencies.<br>Weapons: Simple weapons and shortswords";
    }

    if($_SESSION["class"] == "Paladin"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Strength 13 and Charisma 13<br>When you gain a level in a class other than your first, you gain only some of that class's starting proficiencies.<br>Armor: Light armor, medium armor, and shields<br>Weapons: Simple weapons and martial weapons";
    }

    if($_SESSION["class"] == "Ranger"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Dexterity 13 and Wisdom 13<br>When you gain a level in a class other than your first, you gain only some of that class's starting proficiencies.<br>Armor: Light armor, medium armor, and shields<br>Weapons: Simple weapons and martial weapons";
    }

    if($_SESSION["class"] == "Rogue"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Dexterity 13<br>When you gain a level in a class other than your first, you gain only some of that class's starting proficiencies.<br>Armor: Light armor<br>Tools: Thieves' tools<br>Skills: Choose 1 from Acrobatics, Athletics, Deception, Insight, Intimidation, Investigation, Perception, Performance, Persuasion, Sleight of Hand, and Stealth";
    }

    if($_SESSION["class"] == "Sorcerer"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Charisma 13";
    }

    if($_SESSION["class"] == "Warlock"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Charisma 13<br>When you gain a level in a class other than your first, you gain only some of that class's starting proficiencies.<br>Armor: Light armor<br>Weapons: Simple weapons";
    }

    if($_SESSION["class"] == "Wizard"){
        $special .= "<br><b>Multiclassing</b><br>Ability Score Minimum: Intelligence 13";
    }

    $_SESSION["strength"] = $strenth;
    $_SESSION["dexterity"] = $dexterity;
    $_SESSION["constitution"] = $constitution;
    $_SESSION["intelligence"] = $intelligence;
    $_SESSION["wisdom"] = $wisdom;
    $_SESSION["charisma"] = $charisma;
    $_SESSION["hitpoints"] = $hitpoints;
    $_SESSION["speed"] = $speed;
    $_SESSION["availablepoints"] = $availablepoints;
    $_SESSION["size"] = $size;
    $_SESSION["notes"] = $notes;
    $_SESSION["special"] = $special;
    $_SESSION["availablepointstext"] = $availablepointstext;
    header("Location: show_character.php");
    exit;
    ob_end_flush();
?>