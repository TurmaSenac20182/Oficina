import { DadoCarro } from 'src/app/Model/TesteBanco';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Cep } from 'src/app/Model/Cep';
import { CepService } from 'src/app/services/cep.service';
import { DAOService } from 'src/app/services/dao.service';
import { ActivatedRoute, Router } from '@angular/router';



@Component({
  selector: 'app-formulario-cliente',
  templateUrl: './formulario-cliente.component.html',
  styleUrls: ['./formulario-cliente.component.css']
})
export class FormularioClienteComponent implements OnInit {


  dadosCarro : DadoCarro
  //Preencher campos do cep
  cep: Cep = {
    cep: "",
    logradouro: "",
    complemento: "",
    bairro: "",
    numero: "",
    localidade: "",
    uf: ""
  }

  ArrayCep = [];

  AddCep() {
    let newCep = Object.assign({}, this.cep);
    this.ArrayCep.push(newCep);
  }

  clienteForm: FormGroup;
  //  cliente: Cliente;


  constructor(private formBuilder: FormBuilder,
     private _cepService: CepService ,
      //private DAO: DAOService,
      private crud: DAOService,
      private route: ActivatedRoute, 
      private router: Router,) { }

  //Consultar cep
  buscarCep() {
    this._cepService.buscarCepService(this.cep.cep)
      .then((cep: Cep) => this.cep = cep);
  }


  ngOnInit() {
    this.clienteForm = this.formBuilder.group({
      nome: [
        '',
        [
          Validators.required,
          Validators.minLength(1),
          Validators.maxLength(100),
          Validators.pattern('^[a-zA-Z ]+$')
        ]
      ],
      cpf: [
        '',
        [
          Validators.required,
          Validators.minLength(11),
          Validators.maxLength(11),
          Validators.pattern('^[0-9]+$')
        ]
      ],
      rg: [
        '',
        [
          Validators.required,
          Validators.minLength(9),
          Validators.maxLength(9),
          Validators.pattern('^[0-9]+$')
        ]
      ],
      email: [
        '',
        [
          Validators.required,
          Validators.minLength(2),
          Validators.maxLength(100)
        ]
      ],
      telefone: [
        '',
        [
          Validators.required,
          Validators.minLength(10),
          Validators.maxLength(10),
          Validators.pattern('^[0-9]+$')
        ]
      ],
      celular: [
        '',
        [
          Validators.required,
          Validators.minLength(11),
          Validators.maxLength(11),
          Validators.pattern('^[0-9]+$')
        ]
      ],
      cep: [
        '',
        [
          Validators.required,
          Validators.minLength(8),
          Validators.maxLength(9),
          Validators.pattern('^[0-9]+$')
        ]
      ],
      estado: [
        '',
        [
          Validators.required,
          Validators.minLength(2),
          Validators.maxLength(50),
          Validators.pattern('^[a-zA-Z ´~ ]+$')
        ]
      ],
      cidade: [
        '',
        [
          Validators.required,
          Validators.minLength(2),
          Validators.maxLength(100),
          //Validators.pattern('^[a-zA-Z -ç~´]+$')
        ]
      ],
      logradouro: [
        '',
        [
          Validators.required,
          Validators.minLength(2),
          Validators.maxLength(100),
          Validators.pattern('^[a-zA-Z0-9 ]+$')
        ]
      ],
      numero: [
        '',
        [
          //Validators.required,
          Validators.maxLength(10),
          Validators.pattern('^[0-9]+$')
        ]
      ],
      complemento: [
        '',
        [
          //Validators.required,
          Validators.minLength(2),
          Validators.maxLength(100),
          Validators.pattern('^[a-zA-Z0-9 -]+$')
        ]
      ],
      bairro: [
        '',
        [
          Validators.required,
          Validators.minLength(2),
          Validators.maxLength(100),
          Validators.pattern('^[a-zA-Z0-9 -]+$')
        ]
      ],
      marca: [
        '',
        [
          Validators.required,
          Validators.minLength(1),
          Validators.maxLength(100),
          Validators.pattern('^[a-zA-Z ]+$')
        ]
      ],
      modelo: [
        '',
        [
          Validators.required,
          Validators.minLength(1),
          Validators.maxLength(100),
          Validators.pattern('^[a-zA-Z0-9 -]+$')
        ]
      ],
      cor: [
        '',
        [
          Validators.required,
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern('^[a-zA-Z ]+$')
        ]
      ],
      placa: [
        '',
        [
          Validators.required,
          Validators.minLength(4),
          Validators.maxLength(20),
           Validators.pattern('^[a-zA-Z0-9-]+$')
        ]
      ],
      ano: [
        '',
        [
          Validators.required,
          Validators.minLength(4),
          Validators.maxLength(4),
          Validators.pattern('^[0-9]+$')
        ]
      ]
    });
  }

  addProduto() {
    // Resgata os valores do campo e faz um cast(conversão) para o modelo Produto
    const novoProduto = this.clienteForm.getRawValue() as DadoCarro;
    this.crud
      .adddadosCarro(novoProduto)
      .subscribe(
        () =>// { 
          // arrow function
        // this.router.navigateByUrl('tabs/lista'); // redireciona para a pagina list
         //this.clienteForm.reset(); // Limpa os campos do formulario
        //},
        error => {
          console.log(error);
         // this.clienteForm.reset();
        }
      );
  }
}
