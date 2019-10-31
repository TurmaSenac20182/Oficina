import { Component, OnInit } from '@angular/core';
import { Cep } from '../Cep';
import { CepService } from '../cep.service';

@Component({
  selector: 'app-cep',
  templateUrl: './cep.component.html',
  styleUrls: ['./cep.component.css']
})
export class CepComponent implements OnInit {

  cep = new Cep();

  constructor(private _cepService:CepService) { }

  buscarCep(){
    this._cepService.buscarCepService(this.cep.cep)
      .then((cep:Cep) => this.cep = cep);
  }

  ngOnInit() {
  }

}
