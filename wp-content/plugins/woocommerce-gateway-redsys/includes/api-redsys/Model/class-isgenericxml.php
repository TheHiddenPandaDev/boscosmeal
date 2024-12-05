<?php
/**
 * Class ISGenericXml
 *
 * @package RedsysAPI
 */

if ( ! class_exists( 'ISGenericXml' ) ) {
	include_once $GLOBALS['REDSYS_API_PATH'] . '/utils/ISAnnotation.php';

	/**
	 * Class ISGenericXml
	 */
	abstract class ISGenericXml {

		/**
		 * Set the value of a property.
		 *
		 * @param ReflectionProperty $prop  Property to set.
		 * @param mixed              $value Value to set.
		 */
		private function set_property_value( ReflectionProperty $prop, $value ) {
			$nombre_setter = 'set' . strtoupper( substr( $prop->getName(), 0, 1 ) ) . substr( $prop->getName(), 1, strlen( $prop->getName() ) - 1 );
			$setter        = new ReflectionMethod( get_class( $this ), $nombre_setter );
			if ( $setter ) {
				$setter->invoke( $this, $value );
			}
		}

		/**
		 * Get the value of a property.
		 *
		 * @param ReflectionProperty $prop Property to get.
		 *
		 * @return mixed Value of the property.
		 */
		private function get_property_value( ReflectionProperty $prop ) {
			$resultado = null;

			$nombre_setter = 'get' . strtoupper( substr( $prop->getName(), 0, 1 ) ) . substr( $prop->getName(), 1, strlen( $prop->getName() ) - 1 );
			$setter        = new ReflectionMethod( get_class( $this ), $nombre_setter );
			if ( $setter ) {
				$resultado = $setter->invoke( $this );
			}

			return $resultado;
		}

		/**
		 * Get the content of a specific XML tag.
		 *
		 * @param string $tag The tag name.
		 * @param string $xml The XML content.
		 *
		 * @return string|null The content of the tag or null if not found.
		 */
		public function get_tag_content( $tag, $xml ) {
			$retorno = null;

			if ( $tag && $xml ) {
				$ini = strpos( $xml, '<' . $tag . '>' );
				$fin = strpos( $xml, '</' . $tag . '>' );
				if ( false !== $ini && false !== $fin ) {
					$ini = $ini + strlen( '<' . $tag . '>' );
					if ( $ini <= $fin ) {
						$retorno = substr( $xml, $ini, $fin - $ini );
					}
				}
			}

			return $retorno;
		}

		/**
		 * Parse XML content and populate the object properties.
		 *
		 * @param string $xml The XML content.
		 */
		public function parse_xml( $xml ) {
			$this_class = new ReflectionClass( get_class( $this ) );
			$this_tag   = ISAnnotation::getXmlElem( $this_class );
			if ( null !== $this_tag ) {
				$this_content = $this->get_tag_content( $this_tag, $xml );
				if ( null !== $this_content ) {
					foreach ( $this_class->getProperties() as $prop ) {
						$xml_class = ISAnnotation::getXmlClass( $prop );
						if ( null !== $xml_class ) {
							$prop_class = new ReflectionClass( $xml_class );
							$obj        = $prop_class->newInstance();

							$prop_class->getMethod( 'parse_xml' )->invoke( $obj, $this_content );

							$this->set_property_value( $prop, $obj );

							$xml_elem     = ISAnnotation::getXmlElem( $prop_class );
							$this_content = str_replace( '<' . $xml_elem . '>' . $this->get_tag_content( $xml_elem, $this_content ) . '</' . $xml_elem . '>', '', $this_content );
						} else {
							$xml_elem = ISAnnotation::getXmlElem( $prop );
							if ( null !== $xml_elem ) {
								$tag_content = $this->get_tag_content( $xml_elem, $this_content );
								if ( null !== $tag_content ) {
									$this->set_property_value( $prop, $tag_content );
									$this_content = str_replace( '<' . $xml_elem . '>' . $tag_content . '</' . $xml_elem . '>', '', $this_content );
								}
							}
						}
					}
				}
			}
		}

		/**
		 * Convert the object to XML format.
		 *
		 * @return string The XML representation of the object.
		 */
		public function to_xml() {
			$xml        = '';
			$this_class = new ReflectionClass( get_class( $this ) );
			$this_tag   = ISAnnotation::getXmlElem( $this_class );
			if ( null !== $this_tag ) {
				$xml .= '<' . $this_tag . '>';
				foreach ( $this_class->getProperties() as $prop ) {
					$xml_class = ISAnnotation::getXmlClass( $prop );
					if ( null !== $xml_class ) {
						$obj = $this->get_property_value( $prop );
						if ( null !== $obj ) {
							$prop_class = new ReflectionClass( $xml_class );
							$xml       .= $prop_class->getMethod( 'to_xml' )->invoke( $obj );
						}
					} else {
						$xml_elem = ISAnnotation::getXmlElem( $prop );
						if ( null !== $xml_elem ) {
							$obj = $this->get_property_value( $prop );
							if ( null !== $obj ) {
								$xml .= '<' . $xml_elem . '>' . $obj . '</' . $xml_elem . '>';
							}
						}
					}
				}
				try {
					$params = $this_class->getProperty( 'parameters' );
					if ( $params ) {
						$valores = $this->get_property_value( $params );

						if ( null !== $valores ) {
							foreach ( $valores as $key => $value ) {
								$xml .= '<' . $key . '>' . $value . '</' . $key . '>';
							}
						}
					}
				} catch ( Exception $e ) {
					error_log( 'Exception caught in ISGenericXml::to_xml: ' . $e->getMessage() ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
				}
				$xml .= '</' . $this_tag . '>';
			}

			return $xml;
		}

		/**
		 * Convert the object to JSON format.
		 *
		 * @return string The JSON representation of the object.
		 */
		public function to_json() {
			return wp_json_encode( $this->to_json_with_array( array() ) );
		}

		/**
		 * Convert the object to an associative array for JSON encoding.
		 *
		 * @param array $arr The initial array to populate.
		 *
		 * @return array The associative array representation of the object.
		 */
		public function to_json_with_array( $arr ) {
			$this_class = new ReflectionClass( get_class( $this ) );
			$this_tag   = ISAnnotation::getXmlElem( $this_class );
			if ( null !== $this_tag ) {
				foreach ( $this_class->getProperties() as $prop ) {
					$xml_class = ISAnnotation::getXmlClass( $prop );
					if ( null !== $xml_class ) {
						$xml_elem = ISAnnotation::getXmlElem( $prop );
						$obj      = $this->get_property_value( $prop );
						if ( null !== $obj && null !== $xml_elem ) {
							$prop_class       = new ReflectionClass( $xml_class );
							$val              = $prop_class->getMethod( 'to_json_with_array' )->invoke( $obj, array() );
							$arr[ $xml_elem ] = $val;
						}
					} else {
						$xml_elem = ISAnnotation::getXmlElem( $prop );
						if ( null !== $xml_elem ) {
							$obj = $this->get_property_value( $prop );
							if ( null !== $obj ) {
								$arr[ $xml_elem ] = $obj;
							}
						}
					}
				}

				try {
					$params = $this_class->getProperty( 'parameters' );
					if ( $params ) {
						$valores = $this->get_property_value( $params );

						if ( null !== $valores ) {
							foreach ( $valores as $key => $value ) {
								$arr[ $key ] = $value;
							}
						}
					}
				} catch ( Exception $e ) {
					error_log( 'Exception caught in ISGenericXml::to_json_with_array: ' . $e->getMessage() ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
				}

				return $arr;
			}
		}

		/**
		 * Parse JSON content and populate the object properties.
		 *
		 * @param string $json The JSON content.
		 */
		public function parse_json( $json ) {
			$arr = json_decode( $json, true );

			$this_class = new ReflectionClass( get_class( $this ) );
			foreach ( $this_class->getProperties() as $prop ) {
				$xml_class = ISAnnotation::getXmlClass( $prop );
				if ( null !== $xml_class ) {
					$prop_class = new ReflectionClass( $xml_class );
					$xml_elem   = ISAnnotation::getXmlElem( $prop );

					if ( null !== $xml_elem && isset( $arr[ $xml_elem ] ) ) {
						$obj = $prop_class->newInstance();

						$prop_class->getMethod( 'parse_json' )->invoke( $obj, $arr[ $xml_elem ] );

						$this->set_property_value( $prop, $obj );
						unset( $arr[ $xml_elem ] );
					}
				} else {
					$xml_elem = ISAnnotation::getXmlElem( $prop );
					if ( null !== $xml_elem && isset( $arr[ $xml_elem ] ) ) {
						$tag_content = $arr[ $xml_elem ];
						if ( null !== $tag_content ) {
							$this->set_property_value( $prop, $tag_content );
							unset( $arr[ $xml_elem ] );
						}
					}
				}
			}
		}
	}
}
