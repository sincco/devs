<?php
class Modelos_Pedidos extends Sfphp_Modelo 
{
	public function get($id = '')
	{
		$query = "
			SELECT 
				FAC.CVE_DOC PEDIDO, FAC.CVE_CLPV, CTE.NOMBRE,PF.
				FAC.STATUS, FAC.FECHA_DOC, FAC.FECHA_ENT, FAC.FECHA_VEN,
				FAC.TIP_DOC_SIG
			FROM FACTP01 FAC
			INNER JOIN CLIE01 CTE ON CTE.CLAVE = FAC.CVE_CLPV
			WHERE FAC.STATUS = 'E' AND 
				FAC.TIP_DOC_SIG IS NULL AND 
				FAC.FECHA_DOC >= '01-01-2015';
		";
		$where = NULL;
		return $this->db->query($query);
	}
}