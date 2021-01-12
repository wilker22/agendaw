
<section class="caixa">
				<div class="thead"><i class="ico cad"></i>Formulario de cadastro</div>
				<div class="base-form">
					<div class="caixa-form">
						<div class="thead">Inserir novo cadastro</div>
						<form action="<?php echo URL_BASE ."cliente/salvar"?>" method="POST" enctype="multipart/form-data">
						<?php 
						      $this->verMsg();
						      $this->verErro();
						?>					
							<div class="rows">
							  <div class="col-3 position-relative">
								  <?php $imagem = isset($cliente->foto) ? "Array".$cliente->foto : "img-usuario.png"; ?>									
									<img src="<?php echo URL_IMAGEM . $imagem ?>" class="img-fluido foto" id="imgUp">
									<div  class="foto-file">
										<input type="file" id="arquivo" name="arquivo" onchange="pegaArquivo(this.files)">
										<label for="arquivo"><span>Editar foto</span></label>
									</div>
								</div>
								
								<div class="col-9">
								<div class="rows">
									<div class="col-12">
										<label>Nome</label>
										<input name="cliente" value="<?php echo isset($cliente->cliente) ? $cliente->cliente : null ?>" type="text" placeholder="Insira um nome" class="form-campo">
									</div>
									<div class="col-4">
										<label>Cep</label>
										<input name="cep" value="<?php echo isset($cliente->cep) ? $cliente->cep : null ?>" type="text" placeholder="Insira seu CEP" class="form-campo mascara-cep busca_cep">
									</div>
									
									<div class="col-8">				
										<label>Endereço</label>
										<input name="endereco" value="<?php echo isset($cliente->endereco) ? $cliente->endereco : null ?>" type="text" placeholder="Insira seu endereço" class="form-campo rua">
									</div>
								</div>
								</div>
								<div class="col-4">
									<label>Complemento</label>
									<input name="complemento" value="<?php echo isset($cliente->complemento) ? $cliente->complemento : null ?>" type="text" placeholder="Insira um Número" class="form-campo">	
								</div>			
								<div class="col-2">
									<label>Número</label>
									<input name="numero" value="<?php echo isset($cliente->numero) ? $cliente->numero : null ?>" type="text" placeholder="Insira um Número" class="form-campo">	
								</div>									
								<div class="col-6">
									<label>Bairro</label>
									<input name="bairro" value="<?php echo isset($cliente->bairro) ? $cliente->bairro : null ?>" type="text" placeholder="Insira seu bairro" class="form-campo bairro">
								</div>
								<div class="col-6">
									<label>Cidade</label>
									<input name="cidade" value="<?php echo isset($cliente->cidade) ? $cliente->cidade : null ?>" type="text" placeholder="Insira sua cidade" class="form-campo cidade">	
								</div>	
							
								<div class="col-3">
									<label>UF</label>
									<input name="uf" value="<?php echo isset($cliente->uf) ? $cliente->uf : null ?>" type="text" placeholder="Insira o Estado" class="form-campo estado">	
								</div>								
													
								<div class="col-3">
									<label>Celular</label>
									<input name="celular" value="<?php echo isset($cliente->celular) ? $cliente->celular : null ?>" type="text" placeholder="Insira seu celular" class="form-campo mascara-celular">
								</div>
								<div class="col-4">
									<label>CPF</label>
									<input name="cpf" value="<?php echo isset($cliente->cpf) ? $cliente->cpf : null ?>" type="text" placeholder="Insira seu CPF" class="form-campo mascara-cpf">
								</div>
								<div class="col-4">
									<label>Sexo</label>
									<?php $sexo = isset($cliente->sexo) ? $cliente->cpf : null ?>
									<select class="form-campo" name="sexo">
										<option value="M" <?php echo ($sexo=="M") ? "selected" : "" ?>>Masculino</option>
										<option value="F" <?php echo ($sexo=="F") ? "selected" : "" ?>>Feminino</option>
									</select>
								</div>
								
								<div class="col-4">
									<label>Data de cadastro</label>
									<input name="data_cadastro" value="<?php echo isset($cliente->data_cadastro) ? $cliente->data_cadastro : null ?>" type="date" placeholder="Insira sua data" class="form-campo">
								</div>
							
							
								<div class="col-8">
									<label>Email</label>
									<input name="email" value="<?php echo isset($cliente->email) ? $cliente->email : null ?>" type="text" placeholder="Insira um email" class="form-campo">
								</div>
								<div class="col-4">
									<label>senha</label>
									<input name="senha" value="<?php echo isset($cliente->senha) ? $cliente->senha : null ?>" type="password" placeholder="Insira seu Site" class="form-campo">
								</div>
								<div class="col-12">
									<label>Observação</label>
									<textarea rows="10" name="observacao" class="form-campo"><?php echo isset($cliente->observacao) ? $cliente->observacao : null ?></textarea>
								</div>
								<input type="hidden" name="id_cliente" value="<?php echo isset($cliente->id_cliente) ? $cliente->id_cliente : null ?>" />
								<input type="submit" value="Cadastrar" class="btn">
						</form>
					</div>
				</div>
				
				</section>