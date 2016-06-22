<?php
    /*
     * GCM.php用來處理GCM相關的功能
     * 使用require_once來引用此檔案
     * 
     */
    function gcm_push_notification($registatoin_ids, $message) {
	require_once("config.php");
	
	$url = 'https://android.googleapis.com/gcm/send';

	$fields = array(
	    'registration_ids' => $registatoin_ids,
	    'data' => $message,
	);

	$headers = array(
	    'Authorization: key=' . GOOGLE_API_KEY,
	    'Content-Type: application/json'
	);
	
	$ch = curl_init();

	
	curl_setopt($ch, CURLOPT_URL, $url);

	curl_setopt($ch, CURLOPT_POST, true); //啟用POST
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); //加入header
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //將curl_exec()獲取的訊息以文件流的形式返回，而不是直接輸出。
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不驗證SSL憑證
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields)); //傳入POST內容
	
	$result = curl_exec($ch);
	if ($result == FALSE) {
	    //die('Curl failed: ' . curl_error($ch));
	}
	curl_close($ch);
	return $result;
    }
?>
