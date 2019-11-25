import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-ordem-servico',
  templateUrl: './ordem-servico.component.html',
  styleUrls: ['./ordem-servico.component.css']
})
export class OrdemServicoComponent implements OnInit {

  osForm: FormGroup;

  constructor(private formBuilder: FormBuilder) { }

  ngOnInit() {
    this.osForm = this.formBuilder.group({
      funcionario: [
        '',
        [
          Validators.required,
          Validators.minLength(1),
          Validators.maxLength(50),
          Validators.pattern('^[a-zA-Z ]+$')
        ]
      ],
      maoDeObra: [
        '',
        [
          Validators.required,
          Validators.minLength(11),
          Validators.maxLength(11),
          Validators.pattern('^[a-zA-Z ]+$')
        ]
      ],
      valorServico: [
        '',
        [
          Validators.required,
          Validators.minLength(2),
          Validators.maxLength(100),
          Validators.pattern('^[a-zA-Z ]+$')
        ]
      ],

      dataEntrada: [
        '',
        [
          Validators.required,
          Validators.pattern('^[0-9]{2}\/[0-9]{2}\/[0-9]{4}+$')
        ]
      ],

      dataSaida: [
        '',
        [
          Validators.required,
          Validators.pattern('^[0-9]{2}\/[0-9]{2}\/[0-9]{4}+$')
        ]
      ],
      valorTotal: [
        '',
        [
          Validators.required,
          Validators.minLength(2),
          Validators.maxLength(100),
          Validators.pattern('^[0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}+$')

        ]
      ],

      descricao: [
        '',
        [
          Validators.required,
          Validators.minLength(11),
          Validators.maxLength(200),
          Validators.pattern('^[a-zA-Z0-9 ]+$')
        ]
      ]
    });
  }

}
