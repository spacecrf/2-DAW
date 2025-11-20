<?php
/* Clase encargada de gestionar las conexiones a la base de datos */
namespace App\Models;
use mysqli;

class DB
{
	private $link;
	private $result;
	private $regActual;

	static $_instance;

	/*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
	private function __construct()
	{
		include  'DB.conf.php';
		$this->Conectar($GLOBALS['DB_conf']);
	}

	/*Evitamos el clonaje del objeto. Patrón Singleton*/
	private function __clone() {}

	/*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
	public static function getInstance(): self
	{
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/*Realiza la conexión a la base de datos.*/
	private function Conectar(array $conf): void
	{
		if (
			! is_array($conf) ||
			!isset($conf['servidor']) ||
			!isset($conf['usuario']) ||
			!isset($conf['password'])
		) {
			throw new \Exception("<p>Faltan parámetros de configuración</p>");
			// Puede que no se requiera ser tan 'expeditivos' y que lanzar una excepción sea más versatil
		}
		$this->link = new mysqli($conf['servidor'], $conf['usuario'], $conf['password']);

		/* check connection */
		if (! $this->link) {
			throw new \Exception(sprintf("Error de conexión: %s\n", mysqli_connect_error()));
		}

		$this->link->select_db($conf['base_datos']);
		$this->link->query("SET NAMES 'utf8'");
	}


	/**
	 * Ejecuta una consulta SQL y devuelve el resultado de esta
	 * @param string $sql
	 * @return mixed
	 */
	public function query(string $sql): mixed
	{
		$this->result = $this->link->query($sql);
		return $this->result;
	}

	/**
	 * Devuelve el siguiente registro del result set devuelto por una consulta.
	 * 
	 * @param mixed $result
	 * @return object | NULL
	 */
	public function LeeRegistro(mixed $result = NULL): ?object
	{
		if (! $result) {
			if (! $this->result) {
				return NULL;
			}
			$result = $this->result;
		}
		$this->regActual = $result->fetch_object();
		return $this->regActual;
	}

	/**
	 * Devuelve el último registro leido
	 */
	public function RegistroActual()
	{
		return $this->regActual;
	}


	/**
	 * Devuelve el valor del último campo autonumérico insertado
	 * @return int
	 */
	public function LastID()
	{
		return $this->link->insert_id;
	}

	/**
	 * Devuelve el primer registro que cumple la condición indicada
	 * @param string $tabla
	 * @param string $condicion
	 * @param string $campos
	 * @return object|NULL
	 */
	public function LeeUnRegistro($tabla, $condicion, $campos = '*'): ?object
	{
		$sql = "select $campos from $tabla where $condicion limit 1";
		$rs = $this->link->query($sql);
		if ($rs) {
			return $rs->fetch_row();
		} else {
			return NULL;
		}
	}
}