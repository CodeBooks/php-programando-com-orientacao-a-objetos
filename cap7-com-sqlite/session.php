<?php
include 'app.widgets/TSession.class.php';
new TSession;
if (!TSession::getValue('counted'))
{
	   echo 'registrando visita';
	   TSession::setValue('counted', true);
}
else
{
	   echo 'visita já registrada';
}
?>

