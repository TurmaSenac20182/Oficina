/* View de Cliente */

DROP VIEW IF EXISTS VIEW_LISTA;

CREATE VIEW VIEW_LISTA AS
SELECT cliente.idCliente AS IDCliente, dadocarro.idCarro AS IDCarro, cliente.nome AS Cliente, cliente.cpf AS CPF, cliente.rg AS RG, 
contato.tel AS Telefone, contato.cel AS Celular, contato.email AS Email, endereco.cep AS CEP, endereco.logradouro AS Logradouro, 
endereco.bairro AS Bairro, endereco.numero AS Numero, endereco.cidade AS cidade, endereco.uf AS Estado, endereco.complemento AS Complemento,
dadoCarro.marca AS Marca, dadoCarro.modelo AS Modelo, dadoCarro.cor AS Cor, dadoCarro.placa AS Placa, dadoCarro.anoCarro AS Ano
FROM cliente, dadoCarro, contato, endereco
where dadoCarro.FK_Cliente = cliente.idCliente and contato.idContato = cliente.contato_cliente and endereco.idEndereco = cliente.endereco_cliente
order by idCarro, FK_Cliente asc;

SELECT *FROM VIEW_LISTA;

/* View de Ordem de Serviço */

DROP VIEW IF EXISTS VIEW_OS;

CREATE VIEW VIEW_OS AS
SELECT ordemServico.idordemServico AS idOS, cliente.idCliente AS idCliente, dadoCarro.idCarro AS idCarro, funcionario.idFuncionario AS idFuncionario, cliente.nome AS Nome_Cliente, 
cliente.cpf AS CPF_Cliente, dadoCarro.marca AS Marca_Veiculo, dadoCarro.modelo AS Modelo_Veiculo, dadoCarro.cor AS Cor_Veiculo, dadoCarro.placa AS Placa_Veiculo,
dadoCarro.anoCarro AS Ano_Veiculo, ordemServico.funcionario AS Funcionário, ordemServico.dataEntrada AS Data_de_Entrada,
ordemServico.dataSaida AS Data_de_Saida, servico.valor AS Valor_do_Servico, ordemServico.valorTotal AS Valor_Total,  ordemServico.finalizada AS FimOS, servico.MaoDeObra AS Mão_de_Obra,
servico.descricao AS Descrição, funcionario.nomeFuncionario AS Nome_do_Funcionario
FROM ordemServico, cliente, dadoCarro, servico, funcionario, servico_has_ordemservico
where ordemServico.Fk_Funcionario = funcionario.idFuncionario and servico_has_ordemservico.Fk_Servico = servico.idServico 
and servico_has_ordemservico.Fk_OrdemServico = ordemServico.idordemServico and ordemServico.cliente_ordemServ = cliente.idCliente
order by idordemServico, cliente_ordemServ, Fk_Funcionario asc;

SELECT *FROM VIEW_OS;