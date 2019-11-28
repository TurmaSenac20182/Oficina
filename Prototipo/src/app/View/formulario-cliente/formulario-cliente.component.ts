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

  clienteForm: FormGroup;
  dadosCarroDB : DadoCarro;
  dadosCarroForm: FormGroup;
  dadosCarroID:number;
  editable: boolean = false;

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
  //Consultar cep
  buscarCep() {
    this._cepService.buscarCepService(this.cep.cep)
      .then((cep: Cep) => this.cep = cep);
  }

  constructor(private formBuilder: FormBuilder,
     private _cepService: CepService ,
      private daoService: DAOService,
      private route: ActivatedRoute, 
      private router: Router,) { }

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

    this.route.paramMap.subscribe(params => {
      this.dadosCarroID =+ params.get('id');
      if(this.dadosCarroID) {
        this.getCarroID(this.dadosCarroID);
        this.editable = true;
      }
    })
  }

  addCarro() {
    const novoCarro = this.dadosCarroForm.getRawValue() as DadoCarro;
    this.daoService
      .adddadosCarro(novoCarro)
      .subscribe(
        () => { // arrow function
         this.router.navigateByUrl('lista-cliente'); // redireciona para a pagina list
         this.dadosCarroForm.reset(); // Limpa os campos do formulario
        },
        error => {
          console.log(error);
          this.dadosCarroForm.reset();
        }
      );
  }

  getCarroID(id: number) {
    this.daoService.selectdadosCarroById(id).subscribe(
      (dadosCarroDB: DadoCarro) => this.loadForm(dadosCarroDB),
      errorDB => console.log(errorDB)
    );
  }


  loadForm(dadosCarroDB: DadoCarro) {
    this.dadosCarroForm.patchValue({
      marca: dadosCarroDB.marca,
      modelo: dadosCarroDB.modelo,
      cor: dadosCarroDB.cor,
      placa: dadosCarroDB.placa,
      anoCarro: dadosCarroDB.anoCarro,
    });
  }

  editDadosCarro() {
    const carroEditado = this.dadosCarroForm.getRawValue() as DadoCarro;
    carroEditado.idCarro = this.dadosCarroID;

    this.daoService.updatedadosCarro(carroEditado).subscribe(
      () => {
        this.router.navigateByUrl('lista-cliente');
        this.dadosCarroForm.reset();
      },
      error => {
        console.log(error);
        this.dadosCarroForm.reset();
      }
    );
  }
}
