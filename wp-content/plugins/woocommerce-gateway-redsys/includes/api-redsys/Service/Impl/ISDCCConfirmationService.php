<?php // phpcs:disable

if ( ! class_exists( 'ISDCCConfirmationService' ) ) {
	include_once $GLOBALS['REDSYS_API_PATH'] . '/service/ISOperationService.php';
	include_once $GLOBALS['REDSYS_API_PATH'] . '/model/impl/class-isrequestelement.php';
	include_once $GLOBALS['REDSYS_API_PATH'] . '/model/impl/ISResponseMessage.php';
	include_once $GLOBALS['REDSYS_API_PATH'] . '/model/impl/ISDCCResponseMessage.php';
	include_once $GLOBALS['REDSYS_API_PATH'] . '/utils/ISSignatureUtils.php';
	include_once $GLOBALS['REDSYS_API_PATH'] . '/constants/class-isconstants.php';

	class ISDCCConfirmationService extends ISOperationService {
		function __construct( $signatureKey, $env ) {
			parent::__construct( $signatureKey, $env );
		}

		public function createRequestMessage( $message ) {
			if ( $message !== null ) {
				$req = new ISRequestElement();
				$req->set_datos_entrada( $message );

				$tagDE = $message->to_xml();

				$signatureUtils = new ISSignatureUtils();
				$localSignature = $signatureUtils->create_merchant_signature_host_to_host( $this->getSignatureKey(), $tagDE );
				$req->set_signature( $localSignature );

				return $req->to_xml();
			}
			return '';
		}

		public function createResponseMessage( $trataPeticionResponse ) {
			$response = new ISResponseMessage();
			$response->parse_xml( $trataPeticionResponse );
			ISLogger::debug( 'Received ' . ISLogger::beautifyXML( $response->to_xml() ) );

			$acsElem = $response->get_tag_content( ISConstants::$response_acs_url_tag, $trataPeticionResponse );

			if ( $acsElem !== null && strlen( $acsElem ) ) {
				if ( $response->getApiCode() !== ISConstants::$resp_code_ok
					|| ! $this->checkSignature( $response->getOperation() ) ) {
					$response->setResult( ISConstants::$rest_literal_ko );
				} else {
					$response->setResult( ISConstants::$resp_literal_aut );
				}
			} else {
				$response = new ISResponseMessage();
				$response->parse_xml( $trataPeticionResponse );
				$transType = $response->get_tansaction_type();
				if ( $response->getApiCode() !== ISConstants::$resp_code_ok
						|| ! $this->checkSignature( $response->getOperation() ) ) {
					$response->setResult( ISConstants::$rest_literal_ko );
				} else {
					switch ( (int) $response->getOperation()->getResponseCode() ) {
						case ISConstants::$authorization_ok:
							$response->setResult( $transType == ISConstants::$authorization || $transType == ISConstants::$preauthorization );
							break;
						case ISConstants::$confirmation_ok:
							$response->setResult( $transType == ISConstants::$confirmation || $transType == ISConstants::$refund );
							break;
						case ISConstants::$cancelation_ok:
							$response->setResult( $transType == ISConstants::CANCELLATION );
							break;
						default:
							$response->setResult( ISConstants::$rest_literal_ko );
					}
				}
			}

			return $response;
		}

		public function unMarshallResponseMessage( $message ) {
			$response = new ISDCCResponseMessage();
			$response->parse_xml( $message );
			return $response;
		}
	}
}
