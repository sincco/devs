<?php
class Controladores_Pedidos extends Sfphp_Controlador
{
	public function inicio()
	{
		$this->_vista->pedidos = $this->modeloPedidos->get();
		$this->vistaPedidos;
	}
}