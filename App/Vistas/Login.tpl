<incluir archivo="Header">
<header class="wow fadeInLeft">
	<div class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{BASE_URL}">{APP_NAME}</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <form class="navbar-form navbar-left" id="acceso">
                <input type="text" class="form-control col-lg-8" placeholder="usuario" name="correo">
                <input type="password" class="form-control col-lg-8" placeholder="contraseña" name="password">
                <button type="button" class="btn btn-success" onclick="accesar()">entrar</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Soporte <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Olvidé mi contraseña</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Contactar a sincco</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>
<script>
function accesar() {
	$.ajax({
		type: "POST",
		url: "{BASE_URL}inicio/acceder",
		data: $("#acceso").serialize(),
		success: function (data) {
			console.log(data)
			data = JSON.parse(data)
			if(data.id > 0)
				window.location = "{BASE_URL}inicio/inicio"
			else
				alert("Usuario no valido")
		},
		error: function (xhr) {
			console.log(xhr)
		}
	})
}
</script>