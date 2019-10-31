import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Route, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-formulario-cliente',
  templateUrl: './formulario-cliente.component.html',
  styleUrls: ['./formulario-cliente.component.css']
})
export class FormularioClienteComponent implements OnInit {

  clienteForm: FormGroup;
  //cliente: Cliente;

  constructor(private route: Route,
              private router: ActivatedRoute,
              private formbuilder: FormBuilder) { }

  ngOnInit() {
    this.clienteForm = this.formbuilder.group({
      
    })
  }

}
