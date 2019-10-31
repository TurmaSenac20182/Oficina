import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Route, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-formulario-cliente',
  templateUrl: './formulario-cliente.component.html',
  styleUrls: ['./formulario-cliente.component.css']
})
export class FormularioClienteComponent implements OnInit {

  clienteForm: FormGroup;
  //cliente: Cliente;

  constructor(private formBuilder: FormBuilder) { }

  ngOnInit() {
    this.clienteForm = this.formBuilder.group({
      nome: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[a-zA-Z ]+$/)
        ]
      ],
      cpf: [
        '',
        [
          Validators.required, 
          Validators.minLength(11),
          Validators.maxLength(15),
          Validators.pattern(/^[1-9]+$/)
        ]
      ],
      rg: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(9),
          Validators.pattern(/^[1-9]+$/)
        ]
      ],
      email: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[a-zA-Z *]+$/)
        ]
      ],
      telefone: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(10),
          Validators.pattern(/^[0-9]+$/)
        ]
      ],
      celular: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(11),
          Validators.pattern(/^[0-9]+$/)
        ]
      ],
      cep: [
        '',
        [
          Validators.required, 
          Validators.minLength(8),
          Validators.maxLength(9),
          Validators.pattern(/^[0-9]+$/)
        ]
      ],
      estado: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[a-zA-Z ]+$/)
        ]
      ],
      cidade: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[a-zA-Z ]+$/)
        ]
      ],
      logradouro: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[a-zA-Z0-9 ]+$/)
        ]
      ],
      numero: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(10),
          Validators.pattern(/^[0-9]+$/)
        ]
      ],
      complemento: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[a-zA-Z *]+$/)
        ]
      ],
      bairro: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[a-zA-Z *]+$/)
        ]
      ],
      marca: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[a-zA-Z *]+$/)
        ]
      ],
      modelo: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[a-zA-Z0-9 *]+$/)
        ]
      ],
      cor: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[a-zA-Z ]+$/)
        ]
      ],
      placa: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[a-zA-Z0-9-]+$/)
        ]
      ],
      ano: [
        '',
        [
          Validators.required, 
          Validators.minLength(4),
          Validators.maxLength(100),
          Validators.pattern(/^[0-9]+$/)
        ]
      ]
    });
  }

}
