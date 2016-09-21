<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Machine Learning</title>
    </head>
    <body>
        <div id="temps_div"></div>
        <?php 
        	echo \Lava::render('AreaChart', 'Temps', 'temps_div'); 
        	echo "<br>";
        ?>
        <div id="temps_div1"></div>
        <?php 
        	echo \Lava::render('AreaChart', 'Temps1', 'temps_div1'); 
        	echo "<br>";
        ?>
        <div id="temps_div2"></div>
        <?php 
        	echo \Lava::render('AreaChart', 'Temps2', 'temps_div2'); 
        	echo "<br>";
        ?>
        <div id="temps_div3"></div>
        <?php 
        	echo \Lava::render('AreaChart', 'Temps3', 'temps_div3'); 
        	echo "<br>";
        ?>
        <div id="temps_div4"></div>
        <?php 
        	echo \Lava::render('AreaChart', 'Temps4', 'temps_div4'); 
        	echo "<br>";
        ?>
        <div id="temps_div1"></div>
        
    </body>
</html>
