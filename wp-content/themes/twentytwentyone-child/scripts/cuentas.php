<?php
/**
 * La API para consultar los datos de una cuenta identificada por el usuario actual de WP
 *
 * @since 0.1.0
 *
 * @author Ruben Glez Lzo <rgonzalez@civicos.com>
 * @link https://github.com/guanchgonzalez/mywp
 *
 * @param text $username Nombre del usuario en WP al que pertenece la cuenta en Vtiger
 * @return html vtiger account info
 */

class infocuenta
{
  /*
   * Variables de clase
   */
  private $current_user;
  protected $api;

  /*
   * Vtiger access variables
   */
  $url = "http://vtiger.talecsystem.com/webservice.php";
  $username = 'admin';
  $accessKey = 'etrtYpzoQExjbh0';

  /**
   * Constructor para cargar el nombre de la cuenta y el script que establece la conexión y devuelve los resultados para todas las APIw
   */
  function __construct($ername {
    require_once('BerliCRM_WS_Curl_Class20.php');
    $this -> wpuser -> $current_user;
    $this -> api = new WS_Curl_Class($url, $username, $accessKey);
  }

  /*
   * Crea una sesion y realiza la consulta a traves de la API
  */
  function get_infocuenta() {
    // Inicia una sesion en Vtiger
    if ( !$api -> login() ) {
      return $api -> errorMsg;
    }
    // ObjectID internal API id for retrieved data
    $objectid = '';
    
  }

}
