<?php
/**
 * Class ISConstants
 *
 * @package RedsysAPI
 */

if ( ! class_exists( 'ISConstants' ) ) {
	/**
	 * Class ISConstants
	 */
	class ISConstants {
		// Environments.
		/**
		 * Sandbox environment identifier.
		 *
		 * @var string
		 */
		public static $env_sandbox = '0';

		/**
		 * Sandbox JavaScript URL.
		 *
		 * @var string
		 */
		public static $sandbox_js = 'https://sis-t.redsys.es:25443/sis/NC/sandbox/redsys2.js';

		/**
		 * Sandbox endpoint URL.
		 *
		 * @var string
		 */
		public static $sandbox_endpoint = 'https://sis-t.redsys.es:25443/sis/rest/entradaREST';

		/**
		 * Production environment identifier.
		 *
		 * @var string
		 */
		public static $env_production = '1';

		/**
		 * Production JavaScript URL.
		 *
		 * @var string
		 */
		public static $production_js = 'https://sis.redsys.es/sis/NC/redsys.js';

		/**
		 * Production endpoint URL.
		 *
		 * @var string
		 */
		public static $production_endpoint = 'https://sis.redsys.es/sis/rest/entradaREST';

		/**
		 * Connection timeout value in seconds.
		 *
		 * @var int
		 */
		public static $connection_timeout_value = 10;

		/**
		 * Read timeout value in seconds.
		 *
		 * @var int
		 */
		public static $read_timeout_value = 120;

		/**
		 * SSL/TLS version.
		 *
		 * @var int
		 */
		public static $ssl_tlsv12 = 6;

		/**
		 * Target URL.
		 *
		 * @var string
		 */
		public static $target = 'http://webservice.sis.sermepa.es';

		/**
		 * Service name.
		 *
		 * @var string
		 */
		public static $service_name = 'SerClsWSEntradaService';

		/**
		 * Port name.
		 *
		 * @var string
		 */
		public static $port_name = 'SerClsWSEntrada';

		/**
		 * Request tag.
		 *
		 * @var string
		 */
		public static $request_request_tag = 'REQUEST';

		/**
		 * Datos entrada tag.
		 *
		 * @var string
		 */
		public static $request_datosentrada_tag = 'DATOSENTRADA';

		/**
		 * Signature version tag.
		 *
		 * @var string
		 */
		public static $request_signatureversion_tag = 'DS_SIGNATUREVERSION';

		/**
		 * Signature version value.
		 *
		 * @var string
		 */
		public static $request_signatureversion_value = 'HMAC_SHA256_V1';

		/**
		 * Signature tag.
		 *
		 * @var string
		 */
		public static $request_signature_tag = 'DS_SIGNATURE';

		/**
		 * Merchant order tag.
		 *
		 * @var string
		 */
		public static $request_merchant_order_tag = 'DS_MERCHANT_ORDER';

		/**
		 * Merchant code tag.
		 *
		 * @var string
		 */
		public static $request_merchant_merchatcode_tag = 'DS_MERCHANT_MERCHANTCODE';

		/**
		 * Terminal tag.
		 *
		 * @var string
		 */
		public static $request_merchant_terminal_tag = 'DS_MERCHANT_TERMINAL';

		/**
		 * Titular tag.
		 *
		 * @var string
		 */
		public static $request_merchant_titular_tag = 'DS_MERCHANT_TITULAR';

		/**
		 * Transaction type tag.
		 *
		 * @var string
		 */
		public static $request_merchant_transactiontype_tag = 'DS_MERCHANT_TRANSACTIONTYPE';

		/**
		 * ID oper tag.
		 *
		 * @var string
		 */
		public static $request_merchant_idoper_tag = 'DS_MERCHANT_IDOPER';

		/**
		 * Currency tag.
		 *
		 * @var string
		 */
		public static $request_merchant_currency_tag = 'DS_MERCHANT_CURRENCY';

		/**
		 * Amount tag.
		 *
		 * @var string
		 */
		public static $request_merchant_amount_tag = 'DS_MERCHANT_AMOUNT';

		/**
		 * SIS currency tag.
		 *
		 * @var string
		 */
		public static $request_merchant_sis_currency_tag = 'Sis_Divisa';

		/**
		 * Session tag.
		 *
		 * @var string
		 */
		public static $request_merchant_session_tag = 'DS_MERCHANT_SESION';

		/**
		 * Merchant identifier tag.
		 *
		 * @var string
		 */
		public static $request_merchant_identifier_tag = 'DS_MERCHANT_IDENTIFIER';

		/**
		 * Merchant identifier required.
		 *
		 * @var string
		 */
		public static $request_merchant_identifier_required = 'REQUIRED';

		/**
		 * Direct payment tag.
		 *
		 * @var string
		 */
		public static $request_merchant_directpayment_tag = 'DS_MERCHANT_DIRECTPAYMENT';

		/**
		 * Direct payment true value.
		 *
		 * @var string
		 */
		public static $request_merchant_directpayment_true = 'true';

		/**
		 * Direct payment 3DS value.
		 *
		 * @var string
		 */
		public static $request_merchant_direcpayment_3ds = '3DS';

		/**
		 * Response code tag.
		 *
		 * @var string
		 */
		public static $response_code_tag = 'CODIGO';

		/**
		 * Response amount tag.
		 *
		 * @var string
		 */
		public static $response_amount_tag = 'Ds_Amount';

		/**
		 * Response currency tag.
		 *
		 * @var string
		 */
		public static $response_currency_tag = 'Ds_Currency';

		/**
		 * Response order tag.
		 *
		 * @var string
		 */
		public static $response_order_tag = 'Ds_Order';

		/**
		 * Response signature tag.
		 *
		 * @var string
		 */
		public static $response_signature_tag = 'Ds_Signature';

		/**
		 * Response merchant tag.
		 *
		 * @var string
		 */
		public static $response_merchant_tag = 'Ds_MerchantCode';

		/**
		 * Response terminal tag.
		 *
		 * @var string
		 */
		public static $response_terminal_tag = 'Ds_Terminal';

		/**
		 * Response response tag.
		 *
		 * @var string
		 */
		public static $response_response_tag = 'Ds_Response';

		/**
		 * Response authorization code tag.
		 *
		 * @var string
		 */
		public static $response_authorization_code_tag = 'Ds_AuthorisationCode';

		/**
		 * Response transaction type tag.
		 *
		 * @var string
		 */
		public static $response_transaction_type_tag = 'Ds_TransactionType';

		/**
		 * Response secure payment tag.
		 *
		 * @var string
		 */
		public static $response_secure_payment_tag = 'Ds_SecurePayment';

		/**
		 * Response language tag.
		 *
		 * @var string
		 */
		public static $response_language_tag = 'Ds_Language';

		/**
		 * Response merchant data tag.
		 *
		 * @var string
		 */
		public static $response_merchant_data_tag = 'Ds_MerchantData';

		/**
		 * Response card country tag.
		 *
		 * @var string
		 */
		public static $response_card_country_tag = 'Ds_Card_Country';

		/**
		 * Response card number tag.
		 *
		 * @var string
		 */
		public static $response_card_number_tag = 'Ds_Card_Number';

		/**
		 * Response expiry date tag.
		 *
		 * @var string
		 */
		public static $response_expiry_date_tag = 'Ds_Card_Number';

		/**
		 * Response merchant identifier tag.
		 *
		 * @var string
		 */
		public static $response_merchant_identifier_tag = 'Ds_Card_Number';

		/**
		 * Response DCC tag.
		 *
		 * @var string
		 */
		public static $response_dcc_tag = 'DCC';

		/**
		 * Response DCC currency tag.
		 *
		 * @var string
		 */
		public static $response_dcc_currency_tag = 'moneda';

		/**
		 * Response DCC currency string tag.
		 *
		 * @var string
		 */
		public static $response_dcc_currency_string_tag = 'litMoneda';

		/**
		 * Response DCC currency code tag.
		 *
		 * @var string
		 */
		public static $response_dcc_currency_code_tag = 'litMonedaR';

		/**
		 * Response DCC change rate tag.
		 *
		 * @var string
		 */
		public static $response_dcc_change_rate_tag = 'cambio';

		/**
		 * Response DCC change date tag.
		 *
		 * @var string
		 */
		public static $response_dcc_change_date_tag = 'fechaCambio';

		/**
		 * Response DCC checked tag.
		 *
		 * @var string
		 */
		public static $response_dcc_checked_tag = 'checked';

		/**
		 * Response DCC amount tag.
		 *
		 * @var string
		 */
		public static $response_dcc_amount_tag = 'importe';

		/**
		 * Response DCC margin tag.
		 *
		 * @var string
		 */
		public static $response_dcc_margin_tag = 'margenDCC';

		/**
		 * Response DCC bank name tag.
		 *
		 * @var string
		 */
		public static $response_dcc_bank_name_tag = 'nombreEntidad';

		/**
		 * Response ACS URL tag.
		 *
		 * @var string
		 */
		public static $response_acs_url_tag = 'Ds_AcsUrl';

		/**
		 * Response JSON ACS entry.
		 *
		 * @var string
		 */
		public static $response_json_acs_entry = 'acsURL';

		/**
		 * Response JSON PAREQ entry.
		 *
		 * @var string
		 */
		public static $response_json_pareq_entry = 'PAReq';

		/**
		 * Response JSON PARES entry.
		 *
		 * @var string
		 */
		public static $response_json_pares_entry = 'PARes';

		/**
		 * Response JSON MD entry.
		 *
		 * @var string
		 */
		public static $response_json_md_entry = 'MD';

		/**
		 * Response JSON protocol version entry.
		 *
		 * @var string
		 */
		public static $response_json_protocol_version_entry = 'protocolVersion';

		/**
		 * Response JSON 3DS info entry.
		 *
		 * @var string
		 */
		public static $response_json_threedsinfo_entry = 'threeDSInfo';

		/**
		 * Response 3DS challenge request.
		 *
		 * @var string
		 */
		public static $response_3ds_challenge_request = 'ChallengeRequest';

		/**
		 * Response 3DS challenge response.
		 *
		 * @var string
		 */
		public static $response_3ds_challenge_response = 'ChallengeResponse';

		/**
		 * Response 3DS version 1.
		 *
		 * @var string
		 */
		public static $response_3ds_version_1 = '1.0.2';

		/**
		 * Response 3DS version 2 prefix.
		 *
		 * @var string
		 */
		public static $response_3ds_version_2_prefix = '2.';

		/**
		 * Response code OK.
		 *
		 * @var string
		 */
		public static $resp_code_ok = '0';

		/**
		 * Response literal OK.
		 *
		 * @var string
		 */
		public static $resp_literal_ok = 'OK';

		/**
		 * Response literal KO.
		 *
		 * @var string
		 */
		public static $rest_literal_ko = 'KO';

		/**
		 * Response literal AUT.
		 *
		 * @var string
		 */
		public static $resp_literal_aut = 'AUT';

		/**
		 * Authorization OK code.
		 *
		 * @var int
		 */
		public static $authorization_ok = 0000;

		/**
		 * Confirmation OK code.
		 *
		 * @var int
		 */
		public static $confirmation_ok = 900;

		/**
		 * Cancellation OK code.
		 *
		 * @var int
		 */
		public static $cancelation_ok = 400;

		/**
		 * Authorization code.
		 *
		 * @var string
		 */
		public static $authorization = '0';

		/**
		 * Refund code.
		 *
		 * @var string
		 */
		public static $refund = '3';

		/**
		 * Preauthorization code.
		 *
		 * @var string
		 */
		public static $preauthorization = '1';

		/**
		 * Confirmation code.
		 *
		 * @var string
		 */
		public static $confirmation = '2';

		/**
		 * Cancellation code.
		 *
		 * @var string
		 */
		public static $cancellation = '9';

		/**
		 * Get JavaScript path based on environment.
		 *
		 * @param string $env Environment identifier.
		 * @return string JavaScript path.
		 */
		public static function get_js_path( $env ) {
			if ( $env === self::$env_production ) {
				return self::$production_js;
			} else {
				return self::$sandbox_js;
			}
		}
	}
}
