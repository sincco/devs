<?php
class Modelos_Pedidos extends Sfphp_Modelo 
{
	public function get($id = '')
	{
		$query = "
			SELECT P.CVE_DOC PEDIDO, P.CVE_CLPV,C.NOMBRE,PF.CVE_ART,I.DESCR, PF.CANT,PF.UNI_VENTA, P.STATUS, P.FECHA_DOC, P.FECHA_ENT, P.FECHA_VEN, P.TIP_DOC_SIG 
			FROM FACTP01 P
			INNER JOIN CLIE01 C ON C.CLAVE=P.CVE_CLPV
			INNER JOIN PAR_FACTP01 PF ON P.CVE_DOC=PF.CVE_DOC
			INNER JOIN INVE01 I ON I.CVE_ART=PF.CVE_ART
			WHERE P.STATUS = 'E' AND P.TIP_DOC_SIG IS NULL;
		";
		$query = "SELECT * FROM FACTP01;";
		$where = NULL;
		return $this->db->query($query);
	}
}