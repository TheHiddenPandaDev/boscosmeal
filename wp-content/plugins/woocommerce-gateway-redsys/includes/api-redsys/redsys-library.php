<?php // phpcs:disable
/**
 * NOTA SOBRE LA LICENCIA DE USO DEL SOFTWARE
 *
 * El uso de este software está sujeto a las Condiciones de uso de software que
 * se incluyen en el paquete en el documento "Aviso Legal.pdf". También puede
 * obtener una copia en la siguiente url:
 * http://www.redsys.es/wps/portal/redsys/publica/areadeserviciosweb/descargaDeDocumentacionYEjecutables
 *
 * Redsys es titular de todos los derechos de propiedad intelectual e industrial
 * del software.
 *
 * Quedan expresamente prohibidas la reproducción, la distribución y la
 * comunicación pública, incluida su modalidad de puesta a disposición con fines
 * distintos a los descritos en las Condiciones de uso.
 *
 * Redsys se reserva la posibilidad de ejercer las acciones legales que le
 * correspondan para hacer valer sus derechos frente a cualquier infracción de
 * los derechos de propiedad intelectual y/o industrial.
 *
 * Redsys Servicios de Procesamiento, S.L., CIF B85955367
 */

// FUNCIONES DE VALIDACION
// Importe

/**
 * Check if the total amount is a valid integer.
 *
 * @param string $total The total amount to check.
 * @return bool True if the total amount is valid, false otherwise.
 */
function checkImporte( $total ) {
	// Function implementation
}

/**
 * Check if the order number is a valid numeric string with 1 to 12 digits.
 *
 * @param string $pedido The order number to check.
 * @return bool True if the order number is valid, false otherwise.
 */
function checkPedidoNum( $pedido ) {
	// Function implementation
}

/**
 * Check if the order number is a valid alphanumeric string with 1 to 12 characters.
 *
 * @param string $pedido The order number to check.
 * @return bool True if the order number is valid, false otherwise.
 */
function checkPedidoAlfaNum( $pedido ) {
	// Function implementation
}

/**
 * Check if the FUC code is valid.
 *
 * @param string $codigo The FUC code to check.
 * @return bool True if the FUC code is valid, false otherwise.
 */
function checkFuc( $codigo ) {
	// Function implementation
}

/**
 * Check if the currency code is a valid numeric string with 1 to 3 digits.
 *
 * @param string $moneda The currency code to check.
 * @return bool True if the currency code is valid, false otherwise.
 */
function checkMoneda( $moneda ) {
	// Function implementation
}

/**
 * Check if the response code is a valid numeric string with 1 to 4 digits.
 *
 * @param string $respuesta The response code to check.
 * @return bool True if the response code is valid, false otherwise.
 */
function checkRespuesta( $respuesta ) {
	// Function implementation
}

/**
 * Check if the signature is a valid base64 string with 32 characters.
 *
 * @param string $firma The signature to check.
 * @return bool True if the signature is valid, false otherwise.
 */
function checkFirma( $firma ) {
	// Function implementation
}

/**
 * Check if the authorization code is a valid alphanumeric string with 1 to 6 characters.
 *
 * @param string $id_trans The authorization code to check.
 * @return bool True if the authorization code is valid, false otherwise.
 */
function checkAutCode( $id_trans ) {
	// Function implementation
}

/**
 * Check if the merchant name is a valid alphanumeric string.
 *
 * @param string $nombre The merchant name to check.
 * @return bool True if the merchant name is valid, false otherwise.
 */
function checkNombreComecio( $nombre ) {
	// Function implementation
}

/**
 * Check if the terminal code is a valid numeric string with 1 to 3 digits.
 *
 * @param string $terminal The terminal code to check.
 * @return bool True if the terminal code is valid, false otherwise.
 */
function checkTerminal( $terminal ) {
	// Function implementation
}

/**
 * Generate a random ID for logging purposes.
 *
 * @return string The generated ID.
 */
function generateIdLog() {
	// Function implementation
}

/**
 * Write a log entry if logging is active.
 *
 * @param string $texto The text to log.
 * @param string $activo Whether logging is active ('si' for active).
 */
function escribirLog( $texto, $activo ) {
	// Function implementation
}

/**
 * Get the version of the key used for HMAC SHA256.
 *
 * @return string The version of the key.
 */
function getVersionClave() {
	// Function implementation
}
