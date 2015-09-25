<?php
class Controladores_Pedidos extends Sfphp_Controlador
{
	public function inicio()
	{
		var_dump($this->modeloPedidos->get());
		#$this->vistaInicio;
	}
}