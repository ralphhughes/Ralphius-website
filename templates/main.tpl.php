<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title><?php print @$this->title; ?></title>
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="css/960.css"/>
        <script src="js/highlight.js" type="text/javascript"></script>
        <?php print @$this->head; ?>
    </head>
    <body onload="highlight('menu');<?php print @$this->onload; ?>">
        <?php include_once("includes/analytics.php") ?>
        <div class="container_12">
            <div class="grid_12 rounded-corners" style="background-color: #C7B773; margin-bottom: 20px;">
                <img src="images/neontitle.gif" class="center">
            </div>
            <div class="clear"></div>
            <div class="grid_3 rounded-corners" style="background-color: #C7B773;">
                <?php include_once("includes/sidebar.php") ?>
            </div>
            <div class="grid_9 rounded-corners" style="background-color: #E3DB9A;">
                <div style="padding: 15px 5px 15px 5px;">
                    <?php print $this->body; ?>
                </div>
            </div>
            <div class="clear"></div>
            <div class="grid_12">
                <p class="center">Ralph Hughes 2013</p>
            </div>
        </div>
    </body>
</html>