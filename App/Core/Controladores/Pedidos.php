<?php
class Controladores_Pedidos extends Sfphp_Controlador
{
	public function inicio()
	{
		$this->_vista->pedidos = array_map('utf8_encode',$this->modeloPedidos->get());
		#echo "ERROR".json_last_error();
		$this->vistaPedidos;
	}
}