<?php
class Controladores_Pedidos extends Sfphp_Controlador
{
	public function inicio()
	{
		$this->_vista->categorias = $this->modeloPedidos->get();
		$this->vistaPedidos;
	}
}