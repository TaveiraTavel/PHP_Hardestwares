-- Listar produtos pelo Departamento:
	DELIMITER $$
    CREATE PROCEDURE spConsultaProdsDepart(
		in $depart varchar(25)
    )
    BEGIN
		if ($depart = 'Home') then
			SELECT CodHardware, Nome, Valor, Departamento, QntEstoque, Imagem
				FROM vwHardware;
		else if ($depart = 'Lancamentos') then
			SELECT CodHardware, Nome, Valor, Departamento, QntEstoque, Imagem
				FROM vwHardware WHERE Lancamento = true;
		else if exists (SELECT Nome FROM tbDepartamento WHERE Nome = $depart) then
			SELECT CodHardware, Nome, Valor, Departamento, QntEstoque, Imagem
				FROM vwHardware WHERE Departamento = $depart;
		end if;
        end if;
        end if;
	END$$
    
-- Consultar produto específico:
	DELIMITER $$
    CREATE PROCEDURE spConsultaProduto(
		in $codprod int
    )
    BEGIN
		SELECT *
			FROM vwHardware WHERE CodHardware = $codprod;
	END$$

-- Consultar produto por busca:
DELIMITER $$
CREATE PROCEDURE spBuscarPor(
	in $nome varchar(25)
)
BEGIN
	SELECT CodHardware, Nome, Fabricante, Valor, Departamento, QntEstoque, Imagem
		FROM vwHardware
        WHERE Nome LIKE concat('%', $nome,'%')
		   or Fabricante LIKE concat ('%', $nome, '%');
END$$

-- Inserir Cliente
	DELIMITER $$
    CREATE PROCEDURE spInsertUsuario(
		in $Nome varchar(130),
		in $Email varchar(75),
		in $Senha char(60),
		in $Privilegio boolean,
		in $NumEndereco mediumint,
        in $Logradouro varchar(150),
		in $Cep char(9),
        in $Cidade varchar(150),
        in $Uf char(2)
    )
    BEGIN
		if not exists (SELECT Sigla FROM tbEstado WHERE Sigla = $Uf) then
			INSERT INTO tbEstado(Sigla) VALUES ($Uf);
        end if;
        
        if not exists (SELECT Nome FROM tbCidade WHERE Nome = $Cidade) then
			INSERT INTO tbCidade(Nome) VALUES ($Cidade);
        end if;
        
        if not exists  (SELECT Nome, Sigla FROM tbCidade as C
							INNER JOIN tbCidade_Estado as C_Es ON C.IdCidade = C_Es.IdCidade
							INNER JOIN tbEstado as Es ON C_Es.IdUf = Es.IdUf
						WHERE Nome = $Cidade and Sigla = $Uf) then
			INSERT INTO tbCidade_Estado VALUES ((SELECT IdCidade FROM tbCidade WHERE Nome = $Cidade),
												(SELECT IdUf FROM tbEstado WHERE Sigla = $Uf));
		end if;
		
        if not exists (SELECT Cep FROM tbEndereco WHERE Cep = $Cep) then
			INSERT INTO tbEndereco VALUES($Cep, $Logradouro, (SELECT IdCidade FROM tbCidade WHERE Nome = $Cidade));
		end if;
        
        INSERT INTO tbUsuario VALUES (default, $Nome, $Email, $Senha, $Privilegio, $NumEndereco, $Cep);
    END$$

-- Inserir Hardware
	DELIMITER $$
    CREATE PROCEDURE spInsertHardware(
		in $Nome varchar(130),
        in $CodDepart int,
        in $CodFabric int,
        in $Valor decimal(7, 2),
        in $Espec  varchar(255),
        in $Qnt int,
        in $Lanc tinyint(1),
        in $Imagem  varchar(30)
    )
    BEGIN
		INSERT INTO tbHardware (CodDepartamento, Nome, CodDepartamento, CodFabricante, 
								Valor, Especificacoes, QntEstoque, Lancamento, Imagem)
			VALUES (default, $Nome, $CodDepart, $CodFabric,
					$Valor, $Espec, $Qnt, $Lanc, $Imagem);
    END$$
