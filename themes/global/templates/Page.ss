<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<% base_tag %>
$MetaTags
</head>
<body class="typography">
<div id="header">
  <div id="logo">
    <h1><a href="#">Metamorph_global</a></h1>
    <h2><a href="http://www.metamorphozis.com/" id="metamorph">Design by Metamorphosis
        Design</a></h2>
  </div>
  <div id="menu">
    <% include Navigation %>
  </div>
</div>
<hr />
<div id="page">
  <div id="content"> $Layout </div>
  <div id="sidebar2" class="sidebar">
    <% include SideNav %>
  </div>
  <div style="clear: both;">&nbsp;</div>
</div>
<hr />
<div id="footer">
  <% include Footer %>
</div>
</body>
</html>
