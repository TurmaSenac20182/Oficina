export class TesteBanco {

      
}
export class Servicos{
    
    idServico: number;
    descricao: string;
    valor: string;      
}
export class OrdemSerivco{       
  
    idordemServico: number;
    cliente_ordemServ: string;
    carro_ordemServ: string;
    servico_ordemServ: string;
    funcionario: string;
    dataEntrada: string;
    dataSaida: string; 
    maoDeObra: string;
    valorTotal: string;
}
export class  DadoCarro {
    
    idCarro : number;
    marca: string;
    modelo: string;
    cor: string;
    placa: string;
    anoCarro: string;  	
}
export class Contato {
    
    idContato: number;
    tel1: string;
    tel2: string;
    email: string;      
}
export class Cliente {

    idCliente: number;
    nome: string;
    cpf: string;
    rg: string;
    contato_cliente: string;
    endereco_cleinte: string;
    carro_cliente: string;
    ordemServico_cliente: string;
}
export class Cep  {
    cep: string;
    logradouro: string;
    complemento: string;
    bairro: string;
    numero: string;
    localidade: string;
    uf: string;
  }
  