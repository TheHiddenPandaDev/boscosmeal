<?php // phpcs:disable

if(!class_exists('ISAuthenticationService')){
	include_once $GLOBALS["REDSYS_API_PATH"]."/model/impl/class-isrequestelement.php";
	include_once $GLOBALS["REDSYS_API_PATH"]."/model/impl/ISResponseMessage.php";
	include_once $GLOBALS["REDSYS_API_PATH"]."/utils/ISSignatureUtils.php";
	include_once $GLOBALS["REDSYS_API_PATH"]."/constants/class-isconstants.php";
	
	class ISAuthenticationService extends ISOperationService{
		function __construct($signatureKey, $env){
			parent::__construct($signatureKey, $env);
		}

		public function createRequestMessage($message){
			$req=new ISRequestElement();
			$req->set_datos_entrada($message);
		
			$tagDE=$message->to_json();
			
			$signatureUtils=new ISSignatureUtils();
			$localSignature=$signatureUtils->create_merchant_signature($this->getSignatureKey(), $req->get_datos_entrada_b64());
			$req->set_signature($localSignature);

			return $req;
		}
		
		public function createResponseMessage($trataPeticionResponse){
			$response=$this->unMarshallResponseMessage($trataPeticionResponse);
			ISLogger::debug("Received ".ISLogger::beautifyXML($response->to_xml()));
			$paramsB64=json_decode($trataPeticionResponse,true)["Ds_MerchantParameters"];
			
			$transType = $response->get_tansaction_type();
			if(!$this->checkSignature($paramsB64, $response->getOperation()->get_signature()))
			{
				ISLogger::error("Received JSON '".$trataPeticionResponse."'");
				$response->setResult(ISConstants::$rest_literal_ko);
			}
			else{
				switch ((int)$response->getOperation()->getResponseCode()){
					case ISConstants::$authorization_ok: $response->setResult(($transType==ISConstants::$authorization || $transType==ISConstants::$preauthorization)?ISConstants::$resp_literal_ok:ISConstants::$rest_literal_ko); break;
					case ISConstants::$confirmation_ok: $response->setResult(($transType==ISConstants::$confirmation || $transType==ISConstants::$refund)?ISConstants::$resp_literal_ok:ISConstants::$rest_literal_ko);  break;
					case ISConstants::$cancelation_ok: $response->setResult($transType==ISConstants::$cancellation?ISConstants::$resp_literal_ok:ISConstants::$rest_literal_ko);  break;
					default: $response->setResult(ISConstants::$rest_literal_ko);
				}
			}
			
			if($response->getResult()==ISConstants::$resp_literal_ok){
				ISLogger::info("Operation finished successfully");
			}
			else{
				ISLogger::info("Operation finished with errors");
			}
			
			return $response;
		}
		
		public function unMarshallResponseMessage($message){
			$response=new ISResponseMessage();
			
			$varArray=json_decode($message,true);
			
			$operacion=new ISOperationElement();
			$operacion->parse_json(base64_decode($varArray["Ds_MerchantParameters"]));
			$operacion->set_signature($varArray["Ds_Signature"]);
			
			$response->setOperation($operacion);
			
			return $response;
		}
	}
}