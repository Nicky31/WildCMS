<!DOCTYPE html>
<html>

<head>
<title><?php echo $titre; ?></title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<?php echo header('Content-Type: text/html; charset=utf-8'); ?>
<meta name="Description" content="TA DESCRIPTION." />
<link rel="stylesheet" type="text/css" href= "<?php echo css_url('default'); ?>" />
<link rel="shortcut icon" href="<?php echo img_url('favicon.png'); ?>"/>
</head>

<body>
<div id="corps">
<div id="header"></div>

<div id="left">
<div class="menu_up"></div>
<div class="menu_content">
<div class="menuc_up">
<div class="menuc_txt_up">
LE SITE
</div>
</div>

<div class="menuc_content">
<li><a href="<?php echo site_url('news','index'); ?>">Accueil</a></li>
<li><a href="<?php echo site_url('informations','index'); ?>">Informations</a></li>
<li><a href="<?php echo site_url('vote','index'); ?>">Voter</a></li>
</div>

<div class="menuc_bottom"></div>

<div class="menuc_up">
<div class="menuc_txt_up">
COMMUNAUTÉ
</div>
</div>

<div class="menuc_content">
<li><a href="<?php echo site_url('staff','index'); ?>">L'équipe</a></li>
<li><a href="<?php echo $forum; ?>">Forum</a></li>
<li>Classement<ul class="li2"><a href="<?php echo site_url('ladder','persos'); ?>"><li>Personnages</li></a><a href="<?php echo site_url('ladder','guilds'); ?>"><li>Guildes</li></a><a href="<?php echo site_url('ladder','votes'); ?>"><li>Votes</li></a></ul></li>
<li><a href="<?php echo site_url('guessbook','index'); ?>">Livre d'Or</a></li>

</div>

<div class="menuc_bottom"></div>

<div class="menuc_up">
<div class="menuc_txt_up">
STATISTIQUES
</div>
</div>

<div class="menuc_content">
<li><a>Serveur: <?php echo $stats['server']; ?></a></li>
<li><a>BDD: <b><font color="green">EN LIGNE</font></b> </a></li>
<li><a>Comptes: <b><?php echo $stats['comptes']; ?></b></a></li>
<li><a>Personnages: <b><?php echo $stats['persos']; ?></b></a></li>
<li><a>Connectés: <b><?php echo $stats['cos']; ?></b></a></li>
<li><a>IPs connectés: <b><?php echo $stats['ip_cos']->newsCount; ?></b></a></li>
</div>

<div class="menuc_bottom2"></div>


</div>
<div class="menu_bottom"></div>
</div>


<div id="middle">
<div class="c-up"></div>
<div class="c-content">

 <?php echo $output ?>

 </div>
<div class="c-bottom"></div>
</div>


<div id="right">
<div class="menu_up"></div>
<div class="menu_content">
<div class="menuc_up">
<div class="menuc_txt_up">
PANEL MEMBRE
</div>
</div>

<div class="menuc_content">
<li>Bienvenue <b><?php echo $pseudo; ?></b> <br /> Tu disposes de <b><font color="green"><?php echo $points; ?></font></b> points.</li>
<li><a href="<?php echo site_url('account','index'); ?>">Mon compte</a></li>
<li><a href="<?php echo site_url('join','index'); ?>">Mes personnages</a></li>
<li><a href="<?php echo site_url('boutique','index'); ?>">Boutique</a></li>
<li><a href="<?php echo site_url('connection','logout'); ?>">Déconnexion</a></li>
</div>

<div class="menuc_bottom"></div>

<div class="menuc_up">
<div class="menuc_txt_up">
DIVERS
</div>
</div>

<div class="menuc_content">
<li><a href="<?php echo site_url('chat','index'); ?>">Tchat Box</a></li>
<li><a href="?p=dropsInfo">Encyclopédie</a></li>
</div>

<div class="menuc_bottom2"></div>


</div>
<div class="menu_bottom"></div>
</div>

<div class="clear"></div>

<center>
<div id="footer">
<div class="copy">
© 2012 - <b> <?php echo $titre; ?></b> - Tous droits réservés
<br>
Création graphique par <a href="http://celthium.exano.net">CELTHIUM</a> & PHP par <strong>Nicky31</strong>
<br>
Design & code sous <b>CREATIVE COMMON BY-NC-ND 3.0</b>
</div>
</div>
</center>

</div> <!-- /corps -->

</body>
</html>