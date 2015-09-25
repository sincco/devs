<?php
class Controladores_Pedidos extends Sfphp_Controlador
{
	public function inicio()
	{
		#$this->_vista->pedidos = 
		echo json_encode($this->modeloPedidos->get());
		$this->vistaPedidos;
	}
}