<?php // phpcs:disable

if(!class_exists('ISService')){
	include_once $GLOBALS["REDSYS_API_PATH"]."/service/ISOperationService.php";
	include_once $GLOBALS["REDSYS_API_PATH"]."/service/impl/ISDCCConfirmationService.php";
	include_once $GLOBALS["REDSYS_API_PATH"]."/model/impl/ISDCCConfirmationMessage.php";
	include_once $GLOBALS["REDSYS_API_PATH"]."/model/impl/ISOperationElement.php";
	include_once $GLOBALS["REDSYS_API_PATH"]."/model/impl/ISResponseMessage.php";
	include_once $GLOBALS["REDSYS_API_PATH"]."/model/impl/class-isrequestelement.php";
	include_once $GLOBALS["REDSYS_API_PATH"]."/utils/ISSignatureUtils.php";
	
	class ISService extends ISOperationService{
		private $request;
		function __construct($signatureKey, $env){
			parent::__construct($signatureKey, $env);
		}

		public function createRequestMessage($message){
			$this->request=$message;
			$req=new ISRequestElement();
			$req->set_datos_entrada($message);
			
			$signatureUtils=new ISSignatureUtils();
			$localSignature=$signatureUtils->create_merchant_signature($this->getSignatureKey(), $req->get_datos_entrada_b64());
			
			$req->set_signature($localSignature);
			
			return $req;
		}
		
		public function createResponseMessage($trataPeticionResponse){
			$response=new ISResponseMessage();
			$varArray=json_decode($trataPeticionResponse,true);
			
			if(isset($varArray["ERROR"]) || isset($varArray["errorCode"])){
				ISLogger::error("Received JSON '".$trataPeticionResponse."'");
				$response->setResult(ISConstants::$rest_literal_ko);
			}
			else{
				$varArray=json_decode(base64_decode($varArray["Ds_MerchantParameters"]),true);
				
				$dccElem=isset($varArray[ISConstants::$response_dcc_margin_tag]);
			
				if($dccElem){
// 					$dccService=new ISDCCConfirmationService($this->getSignatureKey(), $this->getEnv());
// 					$dccResponse=$dccService->unMarshallResponseMessage($trataPeticionResponse);
// 					ISLogger::debug("Received ".ISLogger::beautifyXML($dccResponse->to_xml()));
				
// 					$dccConfirmation=new ISDCCConfirmationMessage();
// 					$currency="";
// 					$amount="";
// 					if($this->request->is_dcc()){
// 						$currency=$dccResponse->getDcc0()->get_currency();
// 						$amount=$dccResponse->getDcc0()->get_amount();
// 					}
// 					else{
// 						$currency=$dccResponse->getDcc1()->get_currency();
// 						$amount=$dccResponse->getDcc1()->get_amount();
// 					}
				
// 					$dccConfirmation->setCurrencyCode($currency, $amount);
// 					$dccConfirmation->set_merchant($this->request->get_merchant());
// 					$dccConfirmation->set_terminal($this->request->get_terminal());
// 					$dccConfirmation->set_order($this->request->get_order());
// 					$dccConfirmation->setSesion($dccResponse->getSesion());
				
// 					$response=$dccService->sendOperation($dccConfirmation);
				}
				else{
					$response=$this->unMarshallResponseMessage($trataPeticionResponse);
					ISLogger::debug("Received ".ISLogger::beautifyXML($response->to_xml()));
					$paramsB64=json_decode($trataPeticionResponse,true)["Ds_MerchantParameters"];
				
					if($response->getOperation()->requires3DS1()){
						if(!$this->checkSignature($paramsB64, $response->getOperation()->get_signature()))
						{
							$response->setResult(ISConstants::$rest_literal_ko);
						}
						else{
							$response->setResult(ISConstants::$resp_literal_aut);
						}
					}
					else{
						$transType = $response->get_tansaction_type();
						if(!$this->checkSignature($paramsB64, $response->getOperation()->get_signature()))
						{
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
					}
				}
					
				if($response->getResult()==ISConstants::$resp_literal_ok){
					ISLogger::info("Operation finished successfully");
				}
				else{
					if($response->getResult()==ISConstants::$resp_literal_aut){
						ISLogger::info("Operation requires autentication");
					}
					else{
						ISLogger::info("Operation finished with errors");
					}
				}
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