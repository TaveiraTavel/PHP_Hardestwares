USE dbHardestwares;

-- View Hardware
	CREATE VIEW vwHardware as
		SELECT 	H.CodHardware,
				H.Nome,
				D.Nome as 'Departamento',
				F.Nome as 'Fabricante',
				H.Valor,
				H.Especificacoes,
				H.QntEstoque,
				H.Lancamento,
				H.Imagem
			FROM tbHardware as H
				INNER JOIN tbDepartamento as D
					ON H.CodDepartamento = D.CodDepartamento
				INNER JOIN tbFabricante as F
					ON H.CodFabricante = F.CodFabricante;

	SELECT * FROM vwHardware;

-- View Usuario
	CREATE VIEW vwUsuario as
		SELECT 	U.CodUsuario,
				U.Nome,
				U.Email,
				U.Senha,
				U.Privilegio,
				U.NumEndereco,
				E.Logradouro,
				E.Cep as 'CEP',
				C.Nome as 'Cidade',
				Es.Sigla as 'UF'
			FROM tbUsuario as U
				INNER JOIN tbEndereco as E
					ON U.Cep = E.Cep
				INNER JOIN tbCidade as C
					ON E.IdCidade = C.IdCidade
				INNER JOIN tbCidade_Estado as C_Es
					ON C.IdCidade = C_Es.IdCidade
				INNER JOIN tbEstado as Es
					ON C_Es.IdUf = Es.IdUf;
                    
    SELECT * FROM vwUsuario;
