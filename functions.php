<?php
function payment(Payment $payment)
{
	// get the number of articles purchased
	if($payment->code == "SUERTE") {
		Connection::query("
		UPDATE _bolita_suerte
		SET paid = 1
		WHERE id_person = {$payment->buyer} AND DATE(`date`)=DATE(NOW())");
	}

	return true;
}
