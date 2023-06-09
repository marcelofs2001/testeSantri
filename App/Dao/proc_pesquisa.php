<?php

	include_once "../Connection/Connection.php";
	include_once "../Model/usuario.class.php";

	if (isset($_POST["nome"])) {
		$busca = $_POST["nome"];
		$q_busca = "SELECT * FROM usuarios U INNER JOIN autorizacao A ON U.id = A.id
					WHERE U.nome LIKE '%" . $busca . "%' ORDER BY U.nome";
	} else {
		$q_busca = "SELECT * FROM usuarios U INNER JOIN autorizacao A ON U.id = A.id ORDER BY U.nome";
	}

	$str = Conexao::getConexao()->prepare($q_busca);
	$str->execute();
	$result = $str->fetchAll();
	$rowCount = $str->rowCount();

	if ($rowCount > 0) {
		$data = '<div class="w3-container w3-round-large">
					<table>
						<tr>
							<th>Nome</th>
							<th>Login</th>
							<th>Ativo</th>
							<th>Opções</th>
						</tr>';

		foreach ($result as $row) {
			$modalId = "id01_" . $row["id"]; // ID único para cada modal

			$data .= '<tr>
						<td>' . $row["nome"] . '</td>
						<td>' . $row["usuario"] . '</td>
						<td>' . $row["ativo"] . '</td>
						<td>
							<!-- Deletar -->
							<a href="../Control/UsuarioControl.php?del=' . $row["id"] . '" class="w3-button w3-theme w3-margin-top" type="button">
								<i class="fas fa-user-times"></i>
							</a>
							<!-- Editar -->
							<button onclick="document.getElementById(\'' . $modalId . '\').style.display=\'block\'" class="w3-button w3-theme w3-margin-top" id="' . $row["id"] . '">
								<i class="fas fa-edit"></i>
							</button> 
						</td>
					</tr>
					<!-- Modal -->
					<div id="' . $modalId . '" class="w3-modal w3-animate-opacity" style="display: none;">
						<div class="w3-round-large w3-modal-content w3-card-4">
							<header class="w3-theme w3-margin-top w3-margin-bottom"> 
								<span onclick="document.getElementById(\'' . $modalId . '\').style.display=\'none\'" class="w3-large w3-display-topright">&times;</span>
								<h2>Editar Usuários</h2>
							</header>
							<div class="w3-container">
								<form action="../Control/UsuarioControl.php" method="POST">
									<div>
										<label>Nome</label>
										<input type="text" name="nomeUser" placeholder="Digite o nome completo" class="w3-input w3-block w3-border" value="' . $row["nome"] . '" required>

										<label>Usuario</label>
										<input type="text" name="usuarioUser" placeholder="Digite o login para acessar o sistema" class="w3-input w3-block w3-border" value="' . $row["usuario"] . '" required>

										<label>Senha</label>
										<input type="password" placeholder="Digite a senha" name="senhaUser" class="w3-input w3-block w3-border" value="' . $row["senha"] . '" required>

										<label>Ativo</label>
										<input type="text" name="ativoUser" placeholder="Digite \'S\' para sim e \'N\' para não" class="w3-input w3-block w3-border" value="' . $row["ativo"] . '" required>
									</div>
									<hr>	
									<Label>Autorizações do Usuário</Label><br>
									<br>
									<ul>
										<li id="opt_cadastrar_clientes">
											<input type="checkbox" name="autorizacoes[]" value="cadastrar_clientes"' . (isset($row["autorizacoes"]) && in_array("cadastrar_clientes", $row["autorizacoes"]) ? " checked" : "") . '>
											<label>Cadastrar clientes</label>
										</li>
										<li id="opt_excluir_clientes">
											<input type="checkbox" name="autorizacoes[]" value="excluir_clientes"' . (isset($row["autorizacoes"]) && in_array("excluir_clientes", $row["autorizacoes"]) ? " checked" : "") . '>
											<label>Excluir clientes</label>
										</li>
										<li id="opt_cadastrar_fornecedores">
											<input type="checkbox" name="autorizacoes[]" value="cadastrar_fornecedores"' . (isset($row["autorizacoes"]) && in_array("cadastrar_fornecedores", $row["autorizacoes"]) ? " checked" : "") . '>
											<label>Cadastrar fornecedores</label>
										</li>
										<li id="opt_excluir_fornecedores">
											<input type="checkbox" name="autorizacoes[]" value="excluir_fornecedores"' . (isset($row["autorizacoes"]) && in_array("excluir_fornecedores", $row["autorizacoes"]) ? " checked" : "") . '>
											<label>Excluir fornecedores</label>
										</li>
										<li id="opt_cadastrar_produtos">
											<input type="checkbox" name="autorizacoes[]" value="cadastrar_produtos"' . (isset($row["autorizacoes"]) && in_array("cadastrar_produtos", $row["autorizacoes"]) ? " checked" : "") . '>
											<label>Cadastrar produtos</label>
										</li>
										<li id="opt_alterar_preco_produtos">
											<input type="checkbox" name="autorizacoes[]" value="alterar_preco_produtos"' . (isset($row["autorizacoes"]) && in_array("alterar_preco_produtos", $row["autorizacoes"]) ? " checked" : "") . '>
											<label>Alterar preço de produtos</label>
										</li>
									</ul>
									<button type="submit" name="editar" class="w3-button w3-theme w3-margin-top w3-margin-bottom">Gravar</button>
									<a href="" class="w3-button w3-margin-top w3-margin-bottom w3-right">Cancelar</a>
								</form>
							</div>
						</div>
					</div>';
		}

		$data .= '</table></div>';
	} else {
		$data = "Nenhum resultado foi encontrado.";
	}

	echo $data;
?>