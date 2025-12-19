[1mdiff --git a/sistema/css/style.css b/sistema/css/style.css[m
[1mindex b28e702..c50de4a 100644[m
[1m--- a/sistema/css/style.css[m
[1m+++ b/sistema/css/style.css[m
[36m@@ -378,4 +378,137 @@[m [mtable tr:hover{[m
 [m
 #container span {[m
 	font-weight: bold;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m
[32m+[m[32m/********** eliminar_confirmar_usuario.php **********/[m
[32m+[m[32m#eliminar_container {[m
[32m+[m	[32mmin-height: calc(100vh - 80px); /* resta el header */[m
[32m+[m	[32mdisplay: flex;[m
[32m+[m	[32mjustify-content: center;[m
[32m+[m	[32malign-items: center;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m/* CAJA PRINCIPAL */[m
[32m+[m[32m.confirm_delete {[m
[32m+[m	[32mwidth: 550px;[m
[32m+[m	[32mmargin: 20vh auto;[m
[32m+[m	[32mbackground: #FFF;[m
[32m+[m	[32mborder: 3px solid transparent;[m
[32m+[m	[32mborder-radius: 8px;[m
[32m+[m	[32mbox-shadow: 0 8px 25px rgba(0,0,0,0.1);[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m/* TITULO */[m
[32m+[m[32m.confirm_delete h1 {[m
[32m+[m	[32mfont-family: 'GothamBook';[m
[32m+[m	[32mcolor: #e74c3c;[m
[32m+[m	[32mfont-size: 28px;[m
[32m+[m	[32mmargin-bottom: 10px;[m
[32m+[m	[32mmargin-top: 10px;[m
[32m+[m	[32mwidth: 100%;[m
[32m+[m	[32mtext-align: center;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m/* PREGUNTA */[m
[32m+[m[32m.confirm_delete .question {[m
[32m+[m	[32mfont-family: "GothamBold";[m
[32m+[m	[32mtext-align: center;[m
[32m+[m	[32mfont-size: 18px;[m
[32m+[m	[32mcolor: #555;[m
[32m+[m	[32mmargin-bottom: 20px;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m/* INFO USUARIO */[m
[32m+[m[32m.user_info {[m
[32m+[m	[32mbackground: #f4f6f7;[m
[32m+[m	[32mborder-left: 5px solid #393e3c;[m
[32m+[m	[32mpadding: 15px;[m
[32m+[m	[32mmargin-bottom: 25px;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m.user_info p {[m
[32m+[m	[32mfont-family: 'Trebuchet MS';[m
[32m+[m	[32mfont-size: 15px;[m
[32m+[m	[32mcolor: #000000;[m
[32m+[m	[32mmargin-bottom: 7px;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m.user_info strong {[m
[32m+[m	[32mfont-family: 'Trebuchet MS';[m
[32m+[m	[32mfont-size: 15px;[m
[32m+[m	[32mcolor: #e74c3c;[m
[32m+[m	[32mmargin-bottom: 7px;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m/* BOTONES */[m
[32m+[m[32m.form_actions {[m
[32m+[m	[32mdisplay: flex;[m
[32m+[m	[32mjustify-content: center;[m
[32m+[m	[32malign-items: center;[m
[32m+[m	[32mgap: 15px;[m
[32m+[m	[32mwidth: 100%;[m
[32m+[m	[32mborder: none;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m/* CANCELAR */[m
[32m+[m[32m.btn_cancel {[m
[32m+[m	[32mdisplay: inline-flex;[m
[32m+[m	[32malign-items: center;[m
[32m+[m	[32mjustify-content: center;[m
[32m+[m	[32mtext-decoration: none;[m
[32m+[m	[32mbackground: #7f8c8d;[m
[32m+[m	[32mcolor: #fff;[m
[32m+[m	[32mpadding: 10px 25px;[m
[32m+[m	[32mwidth: 100px;[m
[32m+[m	[32mborder-radius: 5px;[m
[32m+[m	[32mfont-size: 14px;[m
[32m+[m	[32mcursor: pointer;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m.btn_cancel:hover {[m
[32m+[m	[32mbackground: #6c7a7b;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m/* ELIMINAR */[m
[32m+[m[32m.btn_delete {[m
[32m+[m	[32mdisplay: inline-flex;[m
[32m+[m	[32malign-items: center;[m
[32m+[m	[32mjustify-content: center;[m
[32m+[m	[32mwidth: 100px;[m
[32m+[m	[32mpadding: 10px 25px;[m
[32m+[m	[32mbackground: #e74c3c;[m
[32m+[m	[32mcolor: #fff;[m
[32m+[m	[32mborder: none;[m
[32m+[m	[32mborder-radius: 5px;[m
[32m+[m	[32mfont-size: 14px;[m
[32m+[m	[32mcursor: pointer;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m.btn_delete:hover {[m
[32m+[m	[32mbackground: #c0392b;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m/* ADICIONALES */[m
[32m+[m[32m.icon_warning {[m
[32m+[m	[32mfont-size: 48px;[m
[32m+[m	[32mcolor: #e74c3c;[m
[32m+[m	[32mtext-align: center;[m
[32m+[m	[32mmargin-bottom: 10px;[m
[32m+[m	[32mopacity: 0.8;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m.warning_text {[m
[32m+[m	[32mtext-align: center;[m
[32m+[m	[32mfont-size: 14px;[m
[32m+[m	[32mcolor: #888;[m
[32m+[m	[32mmargin-bottom: 20px;[m
[32m+[m[32m}[m
[32m+[m
[32m+[m[32m.user_info .user_main {[m
[32m+[m	[32mfont-size: 22px;[m
[32m+[m	[32mfont-weight: 700;[m
[32m+[m	[32mcolor: #d60b52;[m
[32m+[m	[32mtext-align: center;[m
[32m+[m	[32mmargin-bottom: 10px;[m
 }[m
\ No newline at end of file[m
[1mdiff --git a/sistema/lista_usuarios.php b/sistema/lista_usuarios.php[m
[1mindex 6bbc337..f19d285 100644[m
[1m--- a/sistema/lista_usuarios.php[m
[1m+++ b/sistema/lista_usuarios.php[m
[36m@@ -28,7 +28,7 @@[m
 			</thead>[m
 			<tbody>[m
 			<?php [m
[31m-				$stmt = $conection->prepare("select u.idusuario, u.nombre, u.correo, u.usuario, r.rol from usuario u inner join rol r on u.rol = r.idrol");[m
[32m+[m				[32m$stmt = $conection->prepare("select u.idusuario, u.nombre, u.correo, u.usuario, r.rol from usuario u inner join rol r on u.rol = r.idrol WHERE u.estatus = 1");[m
 				$stmt->execute();[m
 				$result = $stmt->get_result();[m
 				[m
[36m@@ -43,9 +43,14 @@[m
 					<td><?php echo $data['usuario']?></td>[m
 					<td><?php echo $data['rol']?></td>[m
 					<td>[m
[31m-						<a href="editar_usuario.php?id=<?php echo $data['idusuario']?>" class="link_edit"><i class="fa-solid fa-user-pen"></i></a>[m
[32m+[m						[32m<a href="editar_usuario.php?id=}" class="link_edit"><i class="fa-solid fa-user-pen"></i></a>[m
 						<span>|</span>[m
[31m-						<a href="eliminar_confirmar_usuario.php?id=<?php echo $data['idusuario']?>" class="link_delete"><i class="fa-solid fa-user-minus"></i></a>[m
[32m+[m
[32m+[m						[32m<?php[m
[32m+[m							[32m$protegidos = [1, 7];[m
[32m+[m							[32mif (!in_array($data['idusuario'], $protegidos)) {?>[m
[32m+[m							[32m<a href="eliminar_confirmar_usuario.php?id=<?php echo $data['idusuario']?>" class="link_delete"><i class="fa-solid fa-user-minus"></i></a>[m
[32m+[m						[32m<?php } ?>[m
 					</td>[m
 				</tr>[m
 			<?php[m
