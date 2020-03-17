<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Codeigniter email template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div>

<style>*{margin:0px;padding:0px;}</style>
<table bgcolor="#ececec" style="border-bottom:1px solid #e0e0e0;width: 100%;margin:0px;">
<tr>
<td style="display:block!important;max-width:600px!important;margin:0 auto!important;clear:both!important;">
<div style="padding:15px;max-width:600px;margin:0 auto;display:block;">
<table bgcolor="white">
<tr>
<td><a href="https://www.sheppard.agency/" target="_self"><img src="<?php echo base_url()?>images/Sheppard-Redefining-Voiceover-Branding-Logo.jpg" class="img-responsive" alt="Sheppard Agency Logo"></a></td>
</tr>
</table>
</div>
</td>
</tr>
</table>
<table style="width: 100%;">
<tr>
<td style="display:block!important;max-width:600px!important;clear:both!important;margin:0 auto;" bgcolor="#FFFFFF" align="center">
<div style="padding:15px;max-width:600px;display:block;margin:0 auto;">
<table>
<tr>
<td style="font-family: Open Sans,arial,sans-serif; font-size:16px;">
<h3 style="font-family: Open Sans,arial,sans-serif; font-size:22px;margin-bottom:10px;">Dear <?php echo $name; ?></h3>
<p style="font-family: Open Sans,arial,sans-serif; font-size: 16px;margin-bottom:20px;">Please click below link to View or Download Shared Files</p>
<p style="margin-bottom: 10px;line-height:1.6;font-family: Open Sans,arial,sans-serif; font-size: 16px;">
Url: <a href="<?php echo $URL; ?>" target="_blank">Click here</a><br/>
</p><br/>
<p style="margin-bottom: 10px;line-height:1.6;font-family: Open Sans,arial,sans-serif; font-size: 16px;">
Best Regards,<br/>Sheppard Agency<br/></p>
</td>
</tr>
</table>
</div>
</td>
</tr>
</table>
</body>
</html>
