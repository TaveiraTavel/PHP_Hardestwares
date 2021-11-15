USE dbHardestwares;

INSERT INTO tbDepartamento(Nome)
	VALUES	('Processador'),
			('Placa Mãe'),
			('Memória'),
			('Placa de Vídeo'),
			('HD e SSD'),
			('Fonte');

INSERT INTO tbFabricante(Nome)
	VALUES	('INTEL'),
			('AMD'),
			('MSI'),
			('ASROCK'),
			('GIGABYTE'),
			('ASUS'),
			('TEAM GROUP'),
			('ADATA'),
			('DUEX'),
			('PNY'),
			('AFOX'),
			('WESTERN DIGITAL'),
			('CORSAIR');
            
            
INSERT INTO tbHardware(Nome, CodDepartamento, CodFabricante, Valor, Especificacoes, QntEstoque, Lancamento, Imagem)
	VALUES	('PROCESSADOR INTEL CORE I7-9700KF, 8-CORE, 8-THREADS, 3.6GHZ (4.9GHZ TURBO), CACHE 12MB, LGA1151, BX80684I79700KF',
			1, 1, '1555.90',
            '{"Modelo":"BX80684I79700KF","Frequência":"3,60 ~ 4,90 GHz","Núcleos":"8","Threads":"8","Litografia":"14 nm","Cache":"SmartCache de 12 MB","Soquete":"FCLGA1151","TDP":"95 W"}', 10, false, 'BX80684I79700KF.jpg'),
            ('PROCESSADOR AMD ATHLON 3000G, 2-CORE, 4-THREADS, 3.5GHZ, CACHE 5MB, AM4, YD3000C6FBBOX',
            1, 2, '495.91',
            '{"Modelo":"YD3000C6FBBOX","Frequência":"3,50 GHz","Núcleos":"2","Threads":"4","Litografia":"14 nm","Cache":"1 + 4 MB","Soquete":"AM4","TDP": "35 W"}', 15, false, 'YD3000C6FBBOX.jpg'),
            ('PROCESSADOR INTEL CORE I5-10600KF, 6-CORE, 12-THREADS, 4.1GHZ (4.8GHZ TURBO), CACHE 12MB, LGA1200, BX8070110600KF',
            1, 1, '1159.90',
            '{"Modelo":"BX8070110600KF","Frequência":"4,10 ~ 4,80 GHz","Núcleos":"6","Threads":"12","Litografia":"14 nm","Cache":"12 MB Intel® Smart Cache","Soquete":"FCLGA1200","TDP": "95 W"}', 5, true, 'BX8070110600KF.jpg'),
            ('PROCESSADOR AMD RYZEN 9 5950X, 16-CORE, 32-THREADS, 3.4GHZ (4.9GHZ TURBO), CACHE 72MB, AM4, 100-100000059WOF',
            1, 2, '5237.90',
            '{"Modelo":"100-100000059WOF","Frequência":"3,50 GHz","Núcleos":"16","Threads":"32","Litografia":"7 nm","Cache":"8 + 64 MB","Soquete":"AM4","TDP": "105 W"}', 0, false, '100-100000059WOF.jpg'),
            ('PROCESSADOR AMD RYZEN 7 5800X, 8-CORE, 16-THREADS, 3.8GHZ (4.7GHZ TURBO), CACHE 36MB, AM4, 100-100000063WOF',
            1, 2, '2555.90',
            '{"Modelo":"100-100000063WOF","Frequência":"3,80 ~ 4.7 GHz","Núcleos":"8","Threads":"16","Litografia":"7 nm","Cache":"4 + 32 MB","Soquete":"AM4","TDP": "105 W"}', 8, false, '100-100000063WOF.jpg');

INSERT INTO tbHardware(Nome, CodDepartamento, CodFabricante, Valor, Especificacoes, QntEstoque, Lancamento, Imagem)
	VALUES	('PLACA MAE MSI MEG Z590 GODLIKE DDR4 SOCKET LGA1200 CHIPSET INTEL Z590',
			2, 3, '8999.88',
            '{"Modelo":"MEG Z590 GODLIKE","Chipset":"Intel ® Z590","Memória":"4x32 GB - DDR4 ","Soquete":"LGA1200"}', 7, false, 'MEG_Z590_GODLIKE.jpg'),
            ('PLACA MAE MSI A520M-A PRO DDR4 SOCKET AM4 CHIPSET AMD A520',
			2, 3, '618.30',
            '{"Modelo":"A520M-A PRO","Chipset":"AMD A520","Memória":"2x16 GB - DDR4 ","Soquete":"AM4"}', 16, false, 'A520M-A_PRO.jpg'),
            ('PLACA MAE ASROCK Z590 PG VELOCITA DDR4 SOCKET LGA1200 CHIPSET INTEL Z590',
			2, 4, '2863.32',
            '{"Modelo":"MEG Z590 GODLIKE","Chipset":"Intel ® Z590","Memória":"4x32 GB - DDR4 ","Soquete":"LGA1200"}', 0, false, 'MEG_Z590_GODLIKE.jpg'),
            ('PLACA MAE GIGABYTE A320M-H DDR4 SOCKET AM4 CHIPSET AMD A320',
			2, 5, '415.90',
            '{"Modelo":"GA-A320M-H","Chipset":"AMD A320","Memória":"2x32 GB - DDR4 ","Soquete":"AM4"}', 17, false, 'GA-A320M-H.jpg'),
            ('PLACA MAE ASUS TUF GAMING X570-PLUS/BR DDR4 SOCKET AM4 CHIPSET AMD X570',
			2, 6, '1518.90',
            '{"Modelo":"TUF GAMING X570-PLUS/BR","Chipset":"AMD X570","Memória":"4x32 GB - DDR4 ","Soquete":"AM4"}', 8, false, 'TUF_GAMING_X570-PLUS_BR.jpg');
            
INSERT INTO tbHardware(Nome, CodDepartamento, CodFabricante, Valor, Especificacoes, QntEstoque, Lancamento, Imagem)
	VALUES	('MEMORIA TEAM GROUP T-FORCE DARK Z 16GB (2X8) DDR4 2666MHZ CINZA, TDZGD416G2666HC16CDC01',
			3, 7, '851.43',
            '{"Modelo":"TDZGD416G2666HC16CDC01","Memória":"16 GB (2 x 8GB) DDR4","Frequência":"2666 MHz","Latência":"CL16-18-18-38"}', 12, false, 'TDZGD416G2666HC16CDC01.jpg'),
            ('MEMORIA TEAM GROUP T-FORCE XTREEM ARGB 16GB (2X8) DDR4 3600MHZ BRANCA, TF13D416G3600HC18JDC01',
			3, 7, '1099.03',
            '{"Modelo":"TF13D416G3200HC16CDC01","Memória":"16 GB (2 x 8GB) DDR4","Frequência":"3600 MHz","Latência":"CL18-22-22-42"}', 6, false, 'TF13D416G3200HC16CDC01.jpg'),
            ('MEMÓRIA ADATA XPG GAMMIX D10 8GB (1X8GB) DDR4 3600MHZ PRETO, AX4U36008G18A-SB10',
			3, 8, '489.78',
            '{"Modelo":"AX4U36008G18A-SB10","Memória":"8 GB (1 x 8GB) DDR4","Frequência":"3600 MHz","Latência":"CL18"}', 21, false, 'AX4U36008G18A-SB10.jpg'),
            ('MEMÓRIA ADATA XPG SPECTRIX D60G RGB 8GB (1X8GB) DDR4 3000MHZ, AX4U30008G16A-ST60',
			3, 8, '470.39',
            '{"Modelo":"AX4U30008G16A-ST60","Memória":"8 GB (1 x 8GB) DDR4","Frequência":"3000 MHz","Latência":"CL16"}', 10, true, 'AX4U30008G16A-ST60.jpg'),
            ('MEMÓRIA ADATA XPG SPECTRIX D50 RGB 8GB (1X8GB) DDR4 3200MHZ BRANCO, AX4U32008G16A-SW50',
			3, 8, '470.39',
            '{"Modelo":"AX4U32008G16A-SW50","Memória":"8 GB (1 x 8GB) DDR4","Frequência":"3200 MHz","Latência":"CL 16-20-20"}', 11, false, 'AX4U32008G16A-SW50.jpg');

INSERT INTO tbHardware(Nome, CodDepartamento, CodFabricante, Valor, Especificacoes, QntEstoque, Lancamento, Imagem)
	VALUES	('PLACA DE VIDEO DUEX GEFORCE GT 610 2GB DDR3 64BIT, DX GT610LP-2GD3',
			4, 9, '315.50',
            '{"Modelo":"DX GT610LP-2GD3","GPU":"GF119","Memória":"2048MB DDR3","Clock":"810 MHz"}', 5, false, 'DX_GT610LP-2GD3.jpg'),
            ('PLACA DE VIDEO ASROCK RADEON RX 6700 XT CHALLENGER PRO 12GB GDDR6 OC 192-BIT, 90-GA2LZZ-00UANF',
			4, 4, '6399.91',
            '{"Modelo":"90-GA2LZZ-00UANF","GPU":"AMD Radeon™ RX 6700 XT","Memória":"12GB GDDR6","Clock":"2375 ~ 2620 MHz"}', 1, false, '90-GA2LZZ-00UANF.jpg'),
            ('PLACA DE VIDEO PNY GEFORCE GTX 1650 4GB GDDR6 128-BIT, GMX1650N3J4FP2AKTP',
			4, 10, '2599.96',
            '{"Modelo":"GMX1650N3J4FP2AKTP","GPU":"GTX 1650","Memória":"4GB GDDR6","Clock":"1410 ~ 1590 MHz"}', 0, false, 'GMX1650N3J4FP2AKTP.jpg'),
            ('PLACA DE VIDEO ASUS RADEON RX 6900 XT 16GB GDDR6 TUF GAMING 2‎56-BIT, TUF-RX6900XT-O16G-GAMING',
			4, 6, '11899.90',
            '{"Modelo":"TUF-RX6900XT-O16G-GAMING","GPU":"AMD Radeon RX 6900 XT","Memória":"16GB GDDR6","Clock":"2075 ~ 2340 MHz"}', 2, false, 'TUF-RX6900XT-O16G-GAMING.jpg'),
            ('PLACA DE VIDEO AFOX RADEON RX 550 2GB 128-BIT, AFRX550-2048D5H3',
			4, 11, '999.90',
            '{"Modelo":"AFRX550-2048D5H3","GPU":"AMD Radeon RX 550","Memória":"2GB GDDR5","Clock":"1180 ~ 1183 MHz"}', 7, false, 'AFRX550-2048D5H3.jpg');
            
INSERT INTO tbHardware(Nome, CodDepartamento, CodFabricante, Valor, Especificacoes, QntEstoque, Lancamento, Imagem)
	VALUES	('HD WD PURPLE 3TB 3.5" SATA III 6GB/S, WD30PURZ',
			5, 12, '679.90',
            '{"Modelo":"WD30PURZ","Capacidade":"3 TB","Formato":"3.5&quot;","Interface":"SATA 6.0 Gb/s","Cache":"64 MB","Velocidade":"5400 RPM"}', 16, false, 'WD30PURZ.jpg'),
            ('HD WD BLUE 1TB 3.5" SATA III 6GB/S, WD10EZEX',
			5, 12, '349.90',
            '{"Modelo":"WD10EZEX","Capacidade":"1 TB","Formato":"3.5&quot;","Interface":"SATA 6.0 Gb/s","Cache":"64 MB","Velocidade":"7200 RPM"}', 0, true, 'WD10EZEX.jpg'),
            ('HD WD PURPLE 4TB 3.5" SATA III 6GB/S, WD40PURZ',
			5, 12, '759.90',
            '{"Modelo":"WD40PURZ","Capacidade":"4 TB","Formato":"3.5&quot;","Interface":"SATA 6.0 Gb/s","Cache":"64 MB","Velocidade":"5400RPM"}', 8, false, 'WD40PURZ.jpg'),
            ('SSD GIGABYTE UD PRO 1TB 2.5" SATA III 6GB/S, GP-UDPRO1T',
			5, 5, '1299.04',
            '{"Modelo":"GP-UDPRO1T","Capacidade":"1 TB","Formato":"2.5&quot;","Interface":"SATA 6.0 Gb/s","Cache":"256 MB","Velocidade":"Read: 550 MB/s Write: 530 MB/s"}', 2, true, 'GP-UDPRO1T.jpg'),
            ('SSD GIGABYTE 480GB 2.5" SATA III 6GB/S, GP-GSTFS31480GNTD',
			5, 5, '389.00',
            '{"Modelo":"GP-GSTFS31480GNTD","Capacidade":"480 GB","Formato":"2.5&quot;","Cache":"N/A","Velocidade":"Read: 550 MB/s Write: 480 MB/s"}', 2, false, 'GP-GSTFS31480GNTD.jpg');

INSERT INTO tbHardware(Nome, CodDepartamento, CodFabricante, Valor, Especificacoes, QntEstoque, Lancamento, Imagem)
	VALUES	('FONTE GIGABYTE P1000GM FULL MODULAR 1000W 80 PLUS GOLD, GP-P1000GM',
			6, 5, '1169.99',
            '{"Modelo":"GP-P1000GM","Formato":"ATX 12V v2.31","Potência":"1000W","Eficiência":"80 PLUS Gold","Proteção":"OVP / OPP / SCP / UVP / OCP / OTP"}', 5, true, 'GP-P1000GM.jpg'),
            ('FONTE GIGABYTE P750GM FULL MODULAR 750W 80 PLUS GOLD, GP-P750GM',
			6, 5, '698.10',
            '{"Modelo":"GP-P750GM","Formato":"ATX 12V v2.31","Potência":"750W","Eficiência":"80 PLUS Gold","Proteção":"OVP / OPP / SCP / UVP / OCP / OTP"}', 9, false, 'GP-P750GM.jpg'),
            ('FONTE CORSAIR CX-F RGB SERIES CX650F RGB FULL MODULAR 80 PLUS BRONZE, CP-9020217-BR',
			6, 13, '899.93',
            '{"Modelo":"CP-9020217-BR","Formato":"ATX","Potência":"650W","Eficiência":"80 PLUS Bronze","Proteção":"OVP / UVP / SCP / OTP / OPP"}', 2, false, 'CP-9020217-BR.jpg'),
            ('FONTE CORSAIR CV SERIES CV650 80 PLUS BRONZE 650W, CP-9020236',
			6, 13, '379.91',
            '{"Modelo":"CP-9020236","Formato":"ATX","Potência":"650W","Eficiência":"80 PLUS Bronze","Proteção":"OVP / UVP / SCP / OTP / OPP"}', 15, false, 'CP-9020236.jpg'),
            ('FONTE CORSAIR CV SERIES CV450 80 PLUS BRONZE 450W, CP-9020209-BR',
			6, 13, '299.91',
            '{"Modelo":"CP-9020209-BR","Formato":"ATX","Potência":"450W","Eficiência":"80 PLUS Bronze","Proteção":"OVP / UVP / SCP / OTP / OPP"}', 10, false, 'CP-9020209-BR.jpg');


CALL spInsertUsuario('Pedro Ribeiro', 'pedrorirk@gmail.com', '$2y$10$Wp6YC2EA1VFxuOzSw5UZN.ar0ZU/Tr3Z4JEKC6o.Hb.Jq4oioqjV.', true, 
				  512, 'R. das Flôres', '05273-120', 'São Paulo', 'SP');
                  
CALL spInsertUsuario('George Henrique', 'geor.g.rique@uol.com', '$2y$10$l1/pXTobplWXpMBgyFMHCeD66YeM30GOWVORxccpyq9UJb.ahz9XW', false, 
				  712, 'R. das Flôres', '29032-362', 'Vitória', 'ES');
                  
CALL spInsertUsuario('Gêníbio Silva', 'geeeenibio7@gmail.com', '$2y$10$3qdKqf4xYxGlikyBHegXA.8KyQWn0R3cDL8dlpkmfqwkgZv8TnXlq', false, 
				  9, 'R. Guaipá', '05089-000', 'São Paulo', 'SP');
