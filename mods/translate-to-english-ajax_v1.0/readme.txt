********************************************************************
              F L U X B B     M O D I F I C A T I O N
********************************************************************

##
##
##        Mod title:  Translate to english ajax
##
##      Mod version:  1.0
##  Works on FluxBB:  1.4.x
##     Release date:  2011-01-14
##
##           Author:  AFL / Fra2591 - www.theworlddebating.com
##
##      Description:  Adds an ajax translator on quickpot and post.php which translates any language to english (default), or any other language (you can choose which one).
Ajoute un traducteur ajax à quickpost et à post.php qui traduit toute langue vers l'anglais (par défault) ou une autre (vous pourrez choisir)
Demo : http://www.theworlddebating.com/images/translate.png                     
##   Affected files:  viewtopic.php / post.php
##
##       Affects DB:  No
##
##       DISCLAIMER:  Please note that "mods" are not officially supported by
##                    FluxBB. Installation of this modification is done at
##                    your own risk. Backup your forum database and any and
##                    all applicable files before proceeding.
##


*************************** INSTALLATION *********************************


#-------[ A. UPLOAD]-----------------------------------------------


translate.png   to  /your_forum_file/img/

SpryAssets/SpryCollapsiblePanel.js   to  /your_forum_file/
SpryAssets/SpryCollapsiblePanel.css   to  /your_forum_file/


#-------[ 1. OPEN viewtopic.php]-----------------------------------------------


#-------[ 2.FIND - TROUVER]-----------------------------------------------


<textarea name="req_message" rows="7" cols="75" tabindex="1"></textarea>


#-------[3.REPLACE BY - REMPLACER PAR]-----------------


<textarea name="req_message" rows="7" cols="75" tabindex="1" id="target"></textarea><br />
  <script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<div id="CollapsiblePanel1" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0"><img src="img/translate.png" width="257" height="22"></div>
  <div class="CollapsiblePanelContent">
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">
  google.load("language", "1");
  
  var abortable;
  function translate() {
    var txt = document.getElementById("src").value;
    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;
    txt = txt.replace(/\n+/g, "<br>");
    clearTimeout(abortable);
    if (txt.length < 5) { // More than 5 characters to init the translation
      update(' ');
    } else {
      abortable = setTimeout(function(){
        google.language.translate(txt, from, to, function(result) {
          var translation = '';
          if (!result.error) {
            translation = result.translation;
          } else {
            translation = 'Error invoking translator';  // or something like that
          }
          update(translation);
        });      
      }, 500);
    }
  }
  
  function update(withText) {
    var targetDiv = document.getElementById('target');
    targetDiv.value = withText;
    
  }
</script>
<style type="text/css">
#rien {
	visibility: hidden;
}
</style>
<div><br>
    <textarea cols="50" rows="4" id="src" onKeyUp="translate(this)"></textarea>
  <div id="rien">
      <select name="from" id="from" tabindex=0 onChange="translate()">
        <option  value="" selected="selected">Select language</option>
        <option  value="sq">Albanian</option>
        <option  value="ar">Arabic</option>
        <option  value="bg">Bulgarian</option>
        <option  value="ca">Catalan</option>
        <option  value="zh-CN">Chinese</option>
        <option  value="hr">Croatian</option>
        <option  value="cs">Czech</option>
        <option  value="da">Danish</option>
        <option  value="nl">Dutch</option>
        <option  value="en">English</option>
        <option  value="et">Estonian</option>
        <option  value="tl">Filipino</option>
        <option  value="fi">Finnish</option>
        <option  value="fr">French</option>
        <option  value="gl">Galician</option>
        <option  value="de">German</option>
        <option  value="el">Greek</option>
        <option  value="iw">Hebrew</option>
        <option  value="hi">Hindi</option>
        <option  value="hu">Hungarian</option>
        <option  value="id">Indonesian</option>
        <option  value="it">Italian</option>
        <option  value="ja">Japanese</option>
        <option  value="ko">Korean</option>
        <option  value="lv">Latvian</option>
        <option  value="lt">Lithuanian</option>
        <option  value="mt">Maltese</option>
        <option  value="no">Norwegian</option>
        <option  value="fa">Persian ALPHA</option>
        <option  value="pl">Polish</option>
        <option  value="pt">Portuguese</option>
        <option  value="ro">Romanian</option>
        <option  value="ru">Russian</option>
        <option  value="sr">Serbian</option>
        <option  value="sk">Slovak</option>
        <option  value="sl">Slovenian</option>
        <option value="es">Spanish</option>
        <option  value="sv">Swedish</option>
        <option  value="th">Thai</option>
        <option  value="tr">Turkish</option>
        <option  value="uk">Ukrainian</option>
        <option  value="vi">Vietnamese</option>
      </select>
  &gt;
  <select name="to" id="to" tabindex=0 onChange="translate()" >
    <option  value="en" selected="selected">English</option>
  </select>
  </div>
</div>

<script type="text/javascript">
  // Google requires this
  google.language.getBranding('branding');
</script>
</div>
</div>
<script type="text/javascript">
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1", {contentIsOpen:false});
</script>


#-------[3b. If you want to tanslate to another language than english, find]-----------------
#-------[3b. SI vous voulez traduire vers une langue autre que l'anglais, trouvez]-----------------

    <option  value="en" selected="selected">English</option>

#-------[3c. And replace "en" and "English" by another language ]-----------------
#-------[3c. Et remplacez "en" et "English" par une autre langue]-----------------


#-------[ 4. OPEN post.php]-----------------------------------------------


#-------[ 5.FIND - TROUVER]-----------------------------------------------


<textarea name="req_message" rows="20" cols="95" tabindex="<?php echo $cur_index++ ?>"><?php echo isset($_POST['req_message']) ? pun_htmlspecialchars($message) : (isset($quote) ? $quote : ''); ?></textarea>


#-------[6.REPLACE BY - REMPLACER PAR]-----------------


<textarea name="req_message" rows="20" cols="95" id="target" tabindex="<?php echo $cur_index++ ?>"><?php echo isset($_POST['req_message']) ? pun_htmlspecialchars($message) : (isset($quote) ? $quote : ''); ?></textarea><br />
  <script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<div id="CollapsiblePanel1" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0"><img src="img/translate.png" width="257" height="22"></div>
  <div class="CollapsiblePanelContent">
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">
  google.load("language", "1");
  
  var abortable;
  function translate() {
    var txt = document.getElementById("src").value;
    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;
    txt = txt.replace(/\n+/g, "<br>");
    clearTimeout(abortable);
    if (txt.length < 5) { // More than 5 characters to init the translation
      update(' ');
    } else {
      abortable = setTimeout(function(){
        google.language.translate(txt, from, to, function(result) {
          var translation = '';
          if (!result.error) {
            translation = result.translation;
          } else {
            translation = 'Error invoking translator';  // or something like that
          }
          update(translation);
        });      
      }, 500);
    }
  }
  
  function update(withText) {
    var targetDiv = document.getElementById('target');
    targetDiv.value = withText;
    
  }
</script>
<style type="text/css">
#rien {
	visibility: hidden;
}
</style>
<div><br>
    <textarea cols="50" rows="4" id="src" onKeyUp="translate(this)"></textarea>
  <div id="rien">
      <select name="from" id="from" tabindex=0 onChange="translate()">
        <option  value="" selected="selected">Select language</option>
        <option  value="sq">Albanian</option>
        <option  value="ar">Arabic</option>
        <option  value="bg">Bulgarian</option>
        <option  value="ca">Catalan</option>
        <option  value="zh-CN">Chinese</option>
        <option  value="hr">Croatian</option>
        <option  value="cs">Czech</option>
        <option  value="da">Danish</option>
        <option  value="nl">Dutch</option>
        <option  value="en">English</option>
        <option  value="et">Estonian</option>
        <option  value="tl">Filipino</option>
        <option  value="fi">Finnish</option>
        <option  value="fr">French</option>
        <option  value="gl">Galician</option>
        <option  value="de">German</option>
        <option  value="el">Greek</option>
        <option  value="iw">Hebrew</option>
        <option  value="hi">Hindi</option>
        <option  value="hu">Hungarian</option>
        <option  value="id">Indonesian</option>
        <option  value="it">Italian</option>
        <option  value="ja">Japanese</option>
        <option  value="ko">Korean</option>
        <option  value="lv">Latvian</option>
        <option  value="lt">Lithuanian</option>
        <option  value="mt">Maltese</option>
        <option  value="no">Norwegian</option>
        <option  value="fa">Persian ALPHA</option>
        <option  value="pl">Polish</option>
        <option  value="pt">Portuguese</option>
        <option  value="ro">Romanian</option>
        <option  value="ru">Russian</option>
        <option  value="sr">Serbian</option>
        <option  value="sk">Slovak</option>
        <option  value="sl">Slovenian</option>
        <option value="es">Spanish</option>
        <option  value="sv">Swedish</option>
        <option  value="th">Thai</option>
        <option  value="tr">Turkish</option>
        <option  value="uk">Ukrainian</option>
        <option  value="vi">Vietnamese</option>
      </select>
  &gt;
  <select name="to" id="to" tabindex=0 onChange="translate()" >
    <option  value="en" selected="selected">English</option>
  </select>
  </div>
</div>

<script type="text/javascript">
  // Google requires this
  google.language.getBranding('branding');
</script>
</div>
</div>
<script type="text/javascript">
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1", {contentIsOpen:false});
</script>


#-------[6b. If you want to tanslate to another language than english, find]-----------------
#-------[6b. SI vous voulez traduire vers une langue autre que l'anglais, trouvez]-----------------

    <option  value="en" selected="selected">English</option>

#-------[6c. And replace "en" and "English" by another language ]-----------------
#-------[6c. Et remplacez "en" et "English" par une autre langue]-----------------


#-------[ B. UPLOAD]-----------------------------------------------
viewtopic.php
post.php


#-------[ INSTALLATION COMPLETED - INSTALLATION TERMINEE]--------------------------------

