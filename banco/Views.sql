DROP VIEW IF EXISTS VIEW_LISTA;

CREATE VIEW VIEW_LISTA AS
SELECT cliente.idCliente AS IDCliente, dadocarro.idCarro AS IDCarro, cliente.nome AS Cliente, cliente.cpf AS CPF, cliente.rg AS RG, 
contato.tel AS Telefone, contato.cel AS Celular, contato.email AS Email, endereco.cep AS CEP, endereco.logradouro AS Logradouro, 
endereco.bairro AS Bairro, endereco.numero AS Numero, endereco.cidade AS cidade, endereco.uf AS Estado, endereco.complemento AS Complemento,
dadoCarro.marca AS Marca, dadoCarro.modelo AS Modelo, dadoCarro.cor AS Cor, dadoCarro.placa AS Placa, dadoCarro.anoCarro AS Ano
FROM cliente, dadoCarro, contato, endereco
where dadoCarro.FK_Cliente = cliente.idCliente
order by idCarro, FK_Cliente asc;

SELECT *FROM VIEW_LISTA;